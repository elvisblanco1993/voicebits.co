<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('logo-mark.svg')); ?>" type="image/svg">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        <!-- Styles -->
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body class="font-sans antialiased">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php if( (Auth::user()->onTrial() && !Auth::user()->subscribed('voicebits')) && !request()->routeIs('signup') ): ?>
            <div class="w-full bg-indigo-50">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-center text-indigo-600 py-2">
                    Your trial ends in <?php echo e(abs(round((strtotime(Auth::user()->trial_ends_at) - strtotime(now()))/86400))); ?> day(s). <a href="<?php echo e(route('signup')); ?>" class="underline">Sign up for Voicebits here</a>.
                </div>
            </div>
        <?php endif; ?>
        <div class="min-h-screen max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="grid grid-cols-12 gap-8">
                <?php if(auth()->user()->podcasts->count() > 0): ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show.selector')->html();
} elseif ($_instance->childHasBeenRendered('phFVCdP')) {
    $componentId = $_instance->getRenderedChildComponentId('phFVCdP');
    $componentTag = $_instance->getRenderedChildComponentTagName('phFVCdP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('phFVCdP');
} else {
    $response = \Livewire\Livewire::mount('show.selector');
    $html = $response->html();
    $_instance->logRenderedChild('phFVCdP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('sidenav')->html();
} elseif ($_instance->childHasBeenRendered('J06uZ2M')) {
    $componentId = $_instance->getRenderedChildComponentId('J06uZ2M');
    $componentTag = $_instance->getRenderedChildComponentTagName('J06uZ2M');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('J06uZ2M');
} else {
    $response = \Livewire\Livewire::mount('sidenav');
    $html = $response->html();
    $_instance->logRenderedChild('J06uZ2M', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>
                <main class="col-span-12 md:col-span-9 lg:col-span-10">
                    <?php echo e($slot); ?>

                </main>
            </div>
        </div>

        <?php echo $__env->yieldPushContent('modals'); ?>

        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</html>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/layouts/app.blade.php ENDPATH**/ ?>