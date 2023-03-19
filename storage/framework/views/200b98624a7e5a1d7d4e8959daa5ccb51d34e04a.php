<div class="w-full h-64 bg-gradient-to-tr from-slate-300 to-slate-200 text-slate-900 rounded-xl bg-center bg-cover" <?php if($podcast->cover): ?>style="background-image: url(<?php echo e(Storage::url($podcast->cover)); ?>)"<?php endif; ?>>
    <div class="w-full h-full bg-white/40 backdrop-blur-lg rounded-xl flex items-center justify-between space-x-6 px-4 sm:px-6 lg:px-8">
        <div class="">
            <h1 class="text-4xl font-extrabold"><?php echo e($podcast->name); ?></h1>
            <p class="mt-2 text-xl font-semibold">with <?php echo e($podcast->author); ?></p>
        </div>
        <div class="hidden sm:block sm:flex-none items-center justify-center">
            <?php if($podcast->cover): ?>
                <img src="<?php echo e(Storage::url($podcast->cover)); ?>" class="flex-none h-40 w-40 aspect-square object-center object-cover rounded-full">
            <?php else: ?>
                <div class="flex-none h-40 w-40 rounded-full bg-white flex items-center justify-center">
                    <img src="<?php echo e(asset('logo-mark.svg')); ?>" class="w-12 h-auto">
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="py-4 flex items-center justify-between overflow-auto">
    <div class="flex items-center space-x-4">
        <a href="<?php echo e(route('show', ['show' => $podcast->id])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
            'text-blue-600' => request()->routeIs('show')
        ]) ?>">Dashboard</a>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_episodes', $podcast)): ?>
            <a href="<?php echo e(route('episodes', ['show' => $podcast->id])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                'text-blue-600' => request()->routeIs('episodes')
            ]) ?>">Episodes</a>
        <?php endif; ?>
        <?php if($podcast->isReadyToDistribute()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_social', $podcast)): ?>
                <a href="<?php echo e(route('show.social', ['show' => $podcast->id])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('show.social')
                ]) ?>">Social</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_distribution', $podcast)): ?>
                <a href="<?php echo e(route('show.distribution', ['show' => $podcast->id])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('show.distribution')
                ]) ?>">Distribution</a>
            <?php endif; ?>

            <?php if(config('app.env') === 'local'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_website', $podcast)): ?>
                    <a href="<?php echo e(route('show.website', ['show' => $podcast->id])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                        'text-blue-600' => request()->routeIs('show.website')
                    ]) ?>">Website</a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users', $podcast)): ?>
            <a href="<?php echo e(route('show.users', ['show' => $podcast->id])); ?>"class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                'text-blue-600' => request()->routeIs('show.users')
            ]) ?>">Team</a>
        <?php endif; ?>
    </div>
    <div class="ml-4">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_podcast', $podcast)): ?>
            <a href="<?php echo e(route('show.settings', ['show' => $podcast->id])); ?>"class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                'text-blue-600' => request()->routeIs('show.settings')
            ]) ?>">Settings</a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/layouts/podcast-menu.blade.php ENDPATH**/ ?>