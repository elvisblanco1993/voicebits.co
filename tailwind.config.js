const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/player.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Fira Sans Condensed', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'vborange': '#fe705d',
                'vbpurple': '#6b59cd',
                'vbdeepgreen': '#008081',
                'vbpastel': '#ffb7c5',
                'vbemerald': '#00cc99',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
