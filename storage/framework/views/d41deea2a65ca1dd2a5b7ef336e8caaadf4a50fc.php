<div>

    <div class="text-lg font-bold">Team management</div>
    <div class="mt-4 flex items-center justify-between">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'search','wire:model' => 'search','placeholder' => 'Search by name','class' => 'w-1/2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'search','wire:model' => 'search','placeholder' => 'Search by name','class' => 'w-1/2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invite_users',$podcast)): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show.user.invite', ['podcast' => $podcast->id])->html();
} elseif ($_instance->childHasBeenRendered('l3828281507-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3828281507-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3828281507-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3828281507-0');
} else {
    $response = \Livewire\Livewire::mount('show.user.invite', ['podcast' => $podcast->id]);
    $html = $response->html();
    $_instance->logRenderedChild('l3828281507-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php endif; ?>
    </div>

    <div class="mt-4 overflow-x-auto relative shadow rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        E-mail
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Role
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
                <?php $__empty_1 = true; $__currentLoopData = $invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            <?php echo e($invitation->email); ?>

                        </th>
                        <td class="py-4 px-6">
                            -
                        </td>
                        <td class="py-4 px-6">
                            -
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider"><?php echo e(__("Invited")); ?></span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show.user.resend-invitation', ['podcast_id' => $podcast->id, 'email'=> $invitation->email])->html();
} elseif ($_instance->childHasBeenRendered('resend-'.$invitation->id)) {
    $componentId = $_instance->getRenderedChildComponentId('resend-'.$invitation->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('resend-'.$invitation->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('resend-'.$invitation->id);
} else {
    $response = \Livewire\Livewire::mount('show.user.resend-invitation', ['podcast_id' => $podcast->id, 'email'=> $invitation->email]);
    $html = $response->html();
    $_instance->logRenderedChild('resend-'.$invitation->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            <?php echo e($user->email); ?>

                        </th>
                        <td class="py-4 px-6">
                            <?php echo e($user->name); ?>

                        </td>
                        <td class="py-4 px-6">
                            <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider">
                                <?php echo e($user->podcasts->find($podcast->id)->pivot->role ?? 'member'); ?>

                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <?php if(!$user->podcasts->contains($podcast->id)): ?>
                                <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider"><?php echo e(__("Pending")); ?></span>
                            <?php else: ?>
                                <span class="text-xs font-medium text-green-600 bg-green-200 px-4 py-1 rounded-full border border-green-300 uppercase tracking-wider"><?php echo e(__("Active")); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 flex items-center justify-end space-x-3">
                            <?php if($user->email !== Auth::user()->email && $user->podcasts->find($podcast->id)->pivot->role !== 'owner'): ?>
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show.user.resend-invitation', ['podcast_id' => $podcast->id, 'email'=> $user->email])->html();
} elseif ($_instance->childHasBeenRendered('resend-'.$user->id)) {
    $componentId = $_instance->getRenderedChildComponentId('resend-'.$user->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('resend-'.$user->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('resend-'.$user->id);
} else {
    $response = \Livewire\Livewire::mount('show.user.resend-invitation', ['podcast_id' => $podcast->id, 'email'=> $user->email]);
    $html = $response->html();
    $_instance->logRenderedChild('resend-'.$user->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show.user.edit', ['podcast' => $podcast->id, 'user'=> $user->id])->html();
} elseif ($_instance->childHasBeenRendered('edit-'.$user->id)) {
    $componentId = $_instance->getRenderedChildComponentId('edit-'.$user->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('edit-'.$user->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('edit-'.$user->id);
} else {
    $response = \Livewire\Livewire::mount('show.user.edit', ['podcast' => $podcast->id, 'user'=> $user->id]);
    $html = $response->html();
    $_instance->logRenderedChild('edit-'.$user->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show.user.delete', ['podcast' => $podcast->id, 'user'=> $user->id])->html();
} elseif ($_instance->childHasBeenRendered('unlink-'.$user->id)) {
    $componentId = $_instance->getRenderedChildComponentId('unlink-'.$user->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('unlink-'.$user->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('unlink-'.$user->id);
} else {
    $response = \Livewire\Livewire::mount('show.user.delete', ['podcast' => $podcast->id, 'user'=> $user->id]);
    $html = $response->html();
    $_instance->logRenderedChild('unlink-'.$user->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($users->links()); ?>

    </div>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/livewire/show/user/index.blade.php ENDPATH**/ ?>