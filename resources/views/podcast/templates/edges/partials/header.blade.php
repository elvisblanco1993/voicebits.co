<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="sm:flex items-center justify-between gap-8 space-y-4">
        <div class="">
            <h1 class="text-4xl font-bold">{{ $podcast->name }}</h1>
            <p class="mt-3">{{ str($podcast->description)->limit(400) }}</p>
        </div>
        <div class="flex-none">
            <img src="{{ route('public.podcast.cover', ['url' => $podcast->url]) }}" alt="{{ $podcast->name }}" class="block w-full sm:w-44 lg:w-64 aspect-square shadow">
        </div>
    </div>
</div>
