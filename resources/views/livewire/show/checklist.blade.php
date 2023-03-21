<div class="py-6">
    <h2 class="text-2xl font-bold">Welcome to your new podcast! 🎉</h2>
    <p class="mt-2">{{ __("Starting a podcast can be an exciting but overwhelming process, especially if it's your first time. Complete the tasks below to get your podcast ready for distribution. We will help you with the rest.") }}</p>

    <div class="mt-6 bg-white p-6 rounded-lg border border-slate-100">
        <h3 class="text-xl font-semibold">1. {{ __("Create podcast URL") }}</h3>
        <p class="mt-2">{{ __("You need to create a unique URL that's going to be used for your public website and RSS feed.") }}</p>
        @if ($podcast->url)
            <p class="mt-4 inline-flex text-sm px-3 py-1 bg-green-100 text-green-800 rounded-full">Task completed &check;</p>
        @else
            <a href="{{ route('podcast.settings') }}#show-url" class="mt-4 inline-flex text-sm px-3 py-1 bg-amber-100 text-amber-800 rounded-full">Complete task -></a>
        @endif
    </div>

    <div class="mt-6 bg-white p-6 rounded-lg border border-slate-100">
        <h3 class="text-xl font-semibold">2. {{ __("Upload artwork") }}</h3>
        <p class="mt-2">{{ __("Your artwork must comply with the following requirements:") }}</p>
        <ul class="mt-2 text-sm">
            <li><strong>Dimensions:</strong> from 1400x1400 pixels to 3000x3000 pixels.</li>
            <li><strong>Maximum size allowed:</strong> 2MB</li>
            <li><strong>Image formats:</strong> .jpeg, .png</li>
        </ul>
        @if ($podcast->cover)
            <p class="mt-4 inline-flex text-sm px-3 py-1 bg-green-100 text-green-800 rounded-full">Task completed &check;</p>
        @else
            <a href="{{ route('podcast.settings') }}#artwork" class="mt-4 inline-flex text-sm px-3 py-1 bg-amber-100 text-amber-800 rounded-full">Complete task -></a>
        @endif
    </div>

    <div class="mt-6 bg-white p-6 rounded-lg border border-slate-100">
        <h3 class="text-xl font-semibold">3. {{ __("Upload your first episode") }}</h3>
        <p class="mt-2">{{ __("You need upload and publish at least one episode before you can distribute your show.") }}</p>
        <a href="{{ route('podcast.episode.create') }}" class="mt-4 inline-flex text-sm px-3 py-1 bg-amber-100 text-amber-800 rounded-full">Complete task -></a>
    </div>
</div>
