<div>

    <div class="text-lg font-bold">Episodes</div>
    <div class="mt-4 flex items-center justify-between">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'search','wire:model' => 'search','placeholder' => 'Search episode','class' => 'w-1/2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'search','wire:model' => 'search','placeholder' => 'Search episode','class' => 'w-1/2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('upload_episodes', $podcast)): ?>
            <a href="<?php echo e(route('episode.create')); ?>"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
            >Upload</a>
        <?php endif; ?>
    </div>

    <div class="mt-4 overflow-x-auto relative shadow rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Title
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Length
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Published at
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            <?php echo e($episode->title); ?>

                        </th>
                        <td class="py-4 px-6">
                            <?php echo e(( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length); ?>

                        </td>
                        <td class="py-4 px-6">
                            <?php echo e(Carbon\Carbon::parse($episode->published_at)->format("M d, Y")); ?>

                        </td>
                        <td class="py-4 px-6">
                            <?php if(!$episode->published_at || $episode->published_at > now()): ?>
                                <span class="text-xs font-medium text-slate-600 bg-slate-200 px-3 py-1 rounded-lg uppercase tracking-wider"><?php echo e(__("Draft")); ?></span>
                            <?php else: ?>
                                <span class="text-xs font-medium text-green-600 bg-green-200 px-3 py-1 rounded-lg uppercase tracking-wider"><?php echo e(__("Published")); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_episodes', $episode->podcast)): ?>
                                <a href="<?php echo e(route('episode.edit', ['episode' => $episode->id])); ?>" class="uppercase text-xs">Edit</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($episodes->links()); ?>

    </div>

</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/livewire/episode/index.blade.php ENDPATH**/ ?>