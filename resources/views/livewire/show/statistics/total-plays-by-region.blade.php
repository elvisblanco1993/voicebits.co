<div>
    <div class="w-full pt-8 px-8 pb-6 bg-white rounded-lg shadow">
        <div class="py-2 border-b flex items-center justify-between" title="Learn where is your show most popular.">
            <h1 class="font-semibold">Show's Popularity By Region</h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
            </svg>
        </div>
        <div class="py-4">
            @forelse ($mostPopularByRegion as $item)
                <li class="flex items-center justify-between">
                    <span class="text-sm font-normal text-slate-500 text-center">{{ $item->region }}, {{ $item->country }}</span>
                    <span class="font-normal text-blue-600">{{ $item->total }}</span>
                </li>
            @empty

            @endforelse
        </div>
    </div>
</div>
