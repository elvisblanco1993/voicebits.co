<div>
    <div class="w-full p-8 bg-white rounded-lg shadow">
        <div class="py-2 border-b flex items-center justify-between" title="This are the overall podcast reproductions from your feed and website, and third party podcast distributors, such as Spotify, Apple Podcasts, Google Podcasts, etc...">
            <h1 class="font-semibold">Overall Reproductions</h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:text-indigo-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
            </svg>
        </div>
        <div class="grid grid-cols-2 gap-2 py-8">
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-indigo-600 text-center">{{ $from_third_parties }}</p>
                <p class="text-sm font-normal text-slate-500 text-center">Podcatchers</p>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="font-normal text-xl text-indigo-600 text-center">{{ $from_website }}</p>
                <p class="text-sm font-normal text-slate-500 text-center">RSS/Website</p>
            </div>
        </div>
    </div>
</div>
