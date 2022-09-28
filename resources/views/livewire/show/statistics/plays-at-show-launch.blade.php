<div>
    <div class="w-full p-8 bg-white rounded-lg shadow">
        <div class="py-2 border-b flex items-center justify-between" title="This is the average of reproductions all your episodes get during the times described. This information is specially useful for customers wanting to advertise with you.">
            <h1 class="font-semibold">Average Reproductions Per Episode</h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:text-indigo-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
            </svg>
        </div>
        <div class="grid grid-cols-2 gap-4 py-6">
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-indigo-600 text-center">{{ $thirty_days ?? 0 }}</p>
                <p class="text-sm font-normal text-slate-500 text-center">First 30 days</p>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-indigo-600 text-center">{{ $sixty_days ?? 0 }}</p>
                <p class="text-sm font-normal text-slate-500 text-center">First 60 days</p>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-indigo-600 text-center">{{ $ninety_days ?? 0 }}</p>
                <p class="text-sm font-normal text-slate-500 text-center">First 90 days</p>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-indigo-600 text-center">{{ $hundred_twenty_days ?? 0 }}</p>
                <p class="text-sm font-normal text-slate-500 text-center">First 120 days</p>
            </div>
        </div>
        {{-- <div class="text-base font-semibold text-slate-500 border-b pb-2">Overall initial reproductions</div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 30 days</div>
            <div class="text-xl font-bold">{{ $thirty_days ?? 0 }}</div>
        </div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 60 days</div>
            <div class="text-xl font-bold">{{ $sixty_days ?? 0 }}</div>
        </div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 90 days</div>
            <div class="text-xl font-bold">{{ $ninety_days ?? 0 }}</div>
        </div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 120 days</div>
            <div class="text-xl font-bold">{{ $hundred_twenty_days ?? 0 }}</div>
        </div> --}}
    </div>
</div>
