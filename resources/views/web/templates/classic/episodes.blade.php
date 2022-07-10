<div class="text-xl font-bold">
    Latest episodes
</div>
<div class="mt-6"></div>
@forelse ($podcast->episodes as $episode)
<div @class([
        'py-4 px-4 lg:rounded-lg border episode-container border-opacity-50',
        'mb-4' => !$loop->last
    ])
    x-data="{ expanded: false }"
>

    <div class="flex items-center justify-between">
    <div class="flex items-center gap-4">
            <button class="episode-btn" id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
            <div class="">
                <div class="">{{ $episode->title }}</div>
            </div>
        </div>

        <button @click="expanded = ! expanded">
            <svg x-show="!expanded" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <svg x-show="expanded" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div class="prose max-w-full episode-description" x-show="expanded" x-collapse x-cloak>
        {!! Str::markdown($episode->description) !!}
    </div>
</div>
@empty

@endforelse
