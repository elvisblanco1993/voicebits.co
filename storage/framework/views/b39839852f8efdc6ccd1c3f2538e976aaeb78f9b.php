<div class="col-span-12 py-4 border-b">
    <?php $__empty_1 = true; $__currentLoopData = $podcasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $podcast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo e($podcast->name); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <?php endif; ?>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/livewire/show/selector.blade.php ENDPATH**/ ?>