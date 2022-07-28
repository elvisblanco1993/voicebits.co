@forelse ($podcast->episodes()->orderBy('published_at', 'DESC')->get() as $episode)
    <div class="w-full grid grid-cols-6 items-center gap-8 py-4 border-b border-b-slate-300">
        <div class="col-span-6 md:col-span-5">
            <div class="flex items-center gap-4">
                <button class="episode-btn" id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
                <div class="">
                    <a href="{{ route('podcast.public.episode', ['episode' => $episode->guid, 'url' => $podcast->url]) }}" class="text-lg font-bold episode-link">{{ $episode->title }}</a>
                    <div class="text-xs uppercase text-slate-600 flex items-center gap-1">
                        <span>{{ Carbon\Carbon::parse($episode->published_at)->format('M d, Y') }}</span>
                        |
                        <span>{{ (is_numeric($episode->track_length)) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}</span>
                        <span>
                            |
                            @if ($episode->season)
                                S{{$episode->season}}
                            @endif
                            @if ($episode->number)
                                E{{$episode->number}}
                            @endif
                        </span>
                        @if ($episode->type === 'bonus')
                            |
                            <span class="bg-slate-600 text-white px-1 rounded font-semibold tracking-wide">bonus</span>
                        @endif
                        @if ($episode->type === 'trailer')
                            |
                            <span class="bg-slate-600 text-white px-1 rounded font-semibold tracking-wide">trailer</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden md:col-span-1 md:flex justify-end">
            @if ($episode->cover)
                <img src="{{ Storage::url($episode->cover) }}" alt="{{ $episode->title }}" class="w-24 aspect-square object-cover object-center">
            @endif
        </div>
    </div>
@empty
@endforelse
