<div class="md:col-span-3 lg:col-span-2">
    <aside class="hidden md:block">
        <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
            'bg-slate-100 text-indigo-600' => request()->routeIs('dashboard'),
        ]) ?>"><?php echo e(__("Dashboard")); ?></a>

        <?php if(auth()->user()->podcasts->count() > 0): ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_episodes', $podcast)): ?>
            <a href="<?php echo e(route('episodes')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('episodes'),
            ]) ?>"><?php echo e(__("Episodes")); ?></a>
            <?php endif; ?>

            <?php if($podcast->isReadyToDistribute()): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_social', $podcast)): ?>
                    <a href="<?php echo e(route('show.social')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                        'bg-slate-100 text-indigo-600' => request()->routeIs('show.social'),
                    ]) ?>"><?php echo e(__("Social media")); ?></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_distribution', $podcast)): ?>
                    <a href="<?php echo e(route('show.distribution')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                        'bg-slate-100 text-indigo-600' => request()->routeIs('show.distribution'),
                    ]) ?>"><?php echo e(__("Distribution")); ?></a>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(config('app.env') === 'local'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_website', $podcast)): ?>
                    <a href="#" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                        'bg-slate-100 text-indigo-600' => request()->routeIs('show.website'),
                    ]) ?>"><?php echo e(__("Website")); ?></a>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users', $podcast)): ?>
                <a href="<?php echo e(route('show.users')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                    'bg-slate-100 text-indigo-600' => request()->routeIs('show.users'),
                ]) ?>"><?php echo e(__("Team")); ?></a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_podcast', $podcast)): ?>
                <a href="<?php echo e(route('show.settings')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                    'bg-slate-100 text-indigo-600' => request()->routeIs('show.settings'),
                ]) ?>"><?php echo e(__("Settings")); ?></a>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(Auth::user()->is_admin): ?>
            <span class="block my-2 px-2 text-sm font-medium text-slate-400"><?php echo e(__("Admin tools")); ?></span>

            <a href="<?php echo e(route('customers')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('customers'),
            ]) ?>"><?php echo e(__("Customers")); ?></a>

            <a href="<?php echo e(route('log-viewer.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('log-viewer.index'),
            ]) ?>"><?php echo e(__("System logs")); ?></a>

            <a href="<?php echo e(route('horizon.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('horizon.index'),
            ]) ?>"><?php echo e(__("Horizon")); ?></a>
        <?php endif; ?>

        <a href="https://linkd.tawk.help?utm_source=linkd_customer_portal"
            target="_blank" class="block my-1 px-3 py-2 rounded-md hover:bg-slate-100"
        ><?php echo e(__("Support")); ?></a>

        <a href="<?php echo e(route('profile.show')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
            'bg-slate-100 text-indigo-600' => request()->routeIs('profile.show'),
        ]) ?>"><?php echo e(__("Profile")); ?></a>

        <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
            <?php echo csrf_field(); ?>
            <a href="<?php echo e(route('logout')); ?>"
                class="block my-1 px-3 py-2 rounded-md hover:bg-red-100"
                @click.prevent="$root.submit();"
            ><?php echo e(__('Log Out')); ?></a>
        </form>
    </aside>

    <nav class="block md:hidden col-span-12">
        <div class="h-16 flex items-center justify-between">
            <div class="shrink-0 flex items-center">
                
            </div>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php $__env->slot('trigger', null, []); ?> 
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                 <?php $__env->endSlot(); ?>
                 <?php $__env->slot('content', null, []); ?> 
                    

                    <?php if(Auth::user()->is_admin): ?>
                        <div class="my-1 border-t"></div>
                        
                        <div class="my-1 border-t"></div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                        <?php echo csrf_field(); ?>
                        <a href="<?php echo e(route('logout')); ?>"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-indigo-50 focus:outline-none focus:bg-gray-100 transition"
                            @click.prevent="$root.submit();"
                        ><?php echo e(__('Log Out')); ?></a>
                    </form>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </nav>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/livewire/sidenav.blade.php ENDPATH**/ ?>