@extends('podcast.templates.edges.layout')

@section('content')
    @include('podcast.templates.edges.partials.header')
    @include('podcast.templates.edges.partials.navigation')

    <div class="py-6">
        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold">{{__("All episodes")}}</h2>
                <form method="get">
                    <input type="search" name="search" placeholder="Find episodes" class="border border-gray-300 search-input ring-0 focus:ring-0 rounded-lg shadow-sm"/>
                </form>
            </div>

            <div class="mt-4"></div>
                @forelse ($episodes as $episode)
                    <div class="border-t border-slate-300/20 py-4">
                        <time class="order-first font-mono text-sm leading-7 text-slate-500" datetime="{{ $episode->published_at }}">{{ \Carbon\Carbon::parse($episode->published_at)->format("M d, Y") }}</time>
                        <h3 class="mt-2 text-lg font-bold">
                            <a wire:navigate href="{{ route('public.podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}">{{ $episode->title }}</a>
                        </h3>
                        <p class="mt-1 text-base leading-7 text-slate-600">{!! str($episode->description)->limit(200) !!}</p>

                        <div class="mt-4 flex items-center gap-4">
                            <button id="{{ $episode->guid }}"
                                onclick="setEpisode(
                                    '{{ route('public.episode.play', ['url' => $episode->podcast->url, 'episode' => $episode->guid, 'player' => 'web']) }}',
                                    '{{$episode->title}}',
                                    {{ $episode->track_length }},
                                    '{{ $episode->guid }}'
                                )"
                                class="episode-btn flex items-center gap-x-3 text-sm font-bold leading-6 body-btn"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                                </svg>
                                <span aria-hidden="true">{{ __("Listen") }}</span>
                            </button>

                            <span aria-hidden="true" class="text-sm font-bold text-slate-400">/</span>

                            <a wire:navigate class="flex items-center text-sm font-bold body-btn" aria-label="Show notes {{ $episode->title }}"
                                href="{{ route('public.podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}"
                            >Show notes</a>
                        </div>
                    </div>
                @empty

                @endforelse
        </main>
    </div>

    @include('podcast.templates.edges.partials.footer')

    @persist('player')
        @include('podcast.templates.edges.partials.player')
    @endpersist
@endsection
