<div id="header">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="sm:flex items-center justify-between gap-8 space-y-4">
            <div>
                <h1 class="text-5xl font-bold">{{ $podcast->name }}</h1>
                <h2 class="mt-4 text-xl font-medium">{{ $podcast->tagline }}</h2>
            </div>
            <div class="flex-none">
                <img src="{{ route('public.podcast.cover', ['url' => $podcast->url]) }}" alt="{{ $podcast->name }}" class="block w-full sm:w-44 lg:w-64 aspect-square shadow">
            </div>
        </div>
    </div>
</div>
