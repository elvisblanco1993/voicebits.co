#!/bin/sh

# ********************************************
# RUN THIS SECTION ONLY IN PRODUCTION MACHINE
# ********************************************

# Install web server packages
sudo apt install -y composer npm git php-mbstring php-xml php-fpm php-zip php-intl php-gd php-common php-fpm php-cli unzip curl php-curl nginx redis php-redis mysql-server php-mysql;

# Database Server Setup
sudo mysql_secure_installation;
sudo mysql -u root -p;

# Create DB and set DB user privileges
CREATE DATABASE voicebits;
CREATE USER 'voicebits'@'localhost' IDENTIFIED BY 'Bahia#9398!!';
ALTER USER 'voicebits'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Bahia#9398!!';
GRANT ALL PRIVILEGES ON voicebits.* to 'voicebits'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
exit;

# Setting Folder Permissions
sudo chgrp -R www-data . ;
sudo chown -R www-data:elvis storage;
sudo chown -R www-data:elvis bootstrap/cache;
chmod -R 775 ./storage;
chmod -R 775 bootstrap/cache;

composer install && composer update;
npm install && npm update;

# Create Nginx File
sudo nano /etc/nginx/sites-available/voicebits

# File content starts here
server {
    listen 80;
    server_name localhost; # Edit this
    root /home/elvis/Projects/voicebits-2.0/public; # Edit this

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock; # Replace with correct PHP version information
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    client_max_body_size 256M;
}

# File content ends here

# Enable NGINX Site
sudo ln -s /etc/nginx/sites-available/voicebits /etc/nginx/sites-enabled/
sudo rm /etc/nginx/sites-enabled/default;

# Restart Nginx Server
sudo systemctl restart nginx;

# Setup Horizon Supervisor Process Manager
sudo nano /etc/supervisor/conf.d/horizon.conf

#Add this
[program:horizon]
process_name=%(program_name)s
command=php /home/elvis/Projects/app.voicebits.co/artisan horizon
autostart=true
autorestart=true
user=elvis
redirect_stderr=true
stdout_logfile=/home/elvis/Projects/app.voicebits.co/storage/logs/horizon.log
stopwaitsecs=3600


# Update Supervisor config and reload
sudo supervisorctl reread;
sudo supervisorctl update;
sudo supervisorctl start horizon;

# Migrate database
php artisan migrate:fresh;

# Activate the Stripe client for development (requires Stripe-Cli)
stripe listen --forward-to localhost/stripe/webhook
