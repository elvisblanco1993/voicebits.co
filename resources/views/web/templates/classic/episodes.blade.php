<div class="py-12 max-w-3xl mx-auto px-4 sm:px-6 md:px-8 lg:px-0">
    @forelse ($podcast->episodes as $episode)
        <article @class([
            'w-full py-4',
            'border-t' => !$loop->first
        ])>
            <time class="order-first font-mono text-xs leading-7" datetime="">{{ Carbon\Carbon::parse($episode->published_at)->format('M d,Y') }}</time>
            <h2 class="mt-1 text-lg font-bold">{{ $episode->title }}</h2>
            <p class="truncate text-base description">{!! $episode->description !!}</p>
            <div class="mt-4 flex items-center gap-4">
                <button id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')" class="episode-btn flex items-center text-sm font-bold leading-6">
                    <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='h-6 w-6 fill-current' viewBox='0 0 16 16'><path d='m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z'/></svg>
                    <span class='ml-3' aria-hidden='true'>Listen</span>
                </button>
                <span class="text-sm font-bold divider" aria-hidden="true">/</span>
                <a href="" class="episode-notes flex items-center text-sm font-bold leading-6" aria-label="Show notes for episode: Episode number one">Show notes</a>
            </div>
        </article>
    @empty

    @endforelse
</div>
