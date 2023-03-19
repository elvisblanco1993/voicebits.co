<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="description" content="Voicebits is the hosting and distribution platform for all your podcasts." />
        <link rel="shortcut icon" href="<?php echo e(asset('logo-mark.svg')); ?>" type="image/svg">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <link rel="canonical" href="<?php echo e(url()->current()); ?>">

        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
        <?php echo \Livewire\Livewire::styles(); ?>

        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    </head>
    <body class="antialiased min-h-screen bg-gray-100 dark:bg-gray-900">
        <?php echo $__env->make('web.website.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('web.website.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/web/website/layout.blade.php ENDPATH**/ ?>