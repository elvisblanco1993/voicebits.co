@forelse ($episodes as $episode)
    <article class="mb-4 w-full p-4 border rounded-xl">
        <div class="grid grid-cols-12 items-center gap-4">
            <div class="col-span-10 lg:col-span-11 w-full flex items-center">
                <button id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')" class="episode-btn text-slate-800 hover:text-slate-600 transition-all p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div class="ml-6">
                    <a href="{{ route('public.podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}" class="hover:underline transition-all">
                        <h2 class="text-xl font-bold text-slate-800">{{ $episode->title }}</h2>
                    </a>
                    <span class="mt-1 text-sm text-slate-600">{!! strip_tags(Str::limit($episode->description, 80, ' [...]')) !!}</span>
                </div>
            </div>
            <div class="h-full col-span-2 lg:col-span-1 flex items-center justify-between">
                <div class="hidden h-full text-xs text-slate-500 md:flex flex-col justify-between items-end">
                    <p>{{ Carbon\Carbon::parse($episode->published_at)->format('M d, Y') }}</p>
                    <p>{{ ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}</p>
                </div>
            </div>
        </div>
    </article>
@empty
@endforelse

<div class="mt-6">
    {{ $episodes->links() }}
</div>
