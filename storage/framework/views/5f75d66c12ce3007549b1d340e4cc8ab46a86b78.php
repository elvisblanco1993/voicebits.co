<div>
    <div class="w-full p-8 bg-white rounded-lg shadow">
        <div class="py-2 border-b flex items-center justify-between" title="This is the average of reproductions all your episodes get during the times described. This information is specially useful for customers wanting to advertise with you.">
            <h1 class="font-semibold">Average Reproductions Per Episode</h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
            </svg>
        </div>
        <div class="grid grid-cols-2 gap-4 py-6">
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-blue-600 text-center"><?php echo e($thirty_days ?? 0); ?></p>
                <p class="text-sm font-normal text-slate-500 text-center">First 30 days</p>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-blue-600 text-center"><?php echo e($sixty_days ?? 0); ?></p>
                <p class="text-sm font-normal text-slate-500 text-center">First 60 days</p>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-blue-600 text-center"><?php echo e($ninety_days ?? 0); ?></p>
                <p class="text-sm font-normal text-slate-500 text-center">First 90 days</p>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-blue-600 text-center"><?php echo e($hundred_twenty_days ?? 0); ?></p>
                <p class="text-sm font-normal text-slate-500 text-center">First 120 days</p>
            </div>
        </div>
        
    </div>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/livewire/show/statistics/plays-at-show-launch.blade.php ENDPATH**/ ?>