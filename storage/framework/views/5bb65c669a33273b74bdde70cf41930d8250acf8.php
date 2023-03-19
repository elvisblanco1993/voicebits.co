<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('logo-mark.svg')); ?>" type="image/svg">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Styles -->
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    </head>
    <body>
        <div class="font-sans text-black antialiased">
            <?php echo e($slot); ?>

        </div>
    </body>
</html>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/layouts/guest.blade.php ENDPATH**/ ?>