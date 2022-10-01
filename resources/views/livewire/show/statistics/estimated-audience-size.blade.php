<div>
    <div class="w-full p-8 bg-white rounded-lg shadow text-right">
        <div class="py-2 border-b flex items-center justify-between" title="This is our best estimate of the size of your audience. You can get a more exact number of subscribers by visiting the platforms where you are distributing your show.">
            <h1 class="font-semibold">Estimated audience size</h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
            </svg>
        </div>
        <div class="text-center gap-2 py-8">
            <p class="font-normal text-xl text-blue-600">{{ $average_size ?? 0 }}</p>
            <p class="text-sm font-normal text-slate-500">Subscribers</p>
        </div>
    </div>

</div>
