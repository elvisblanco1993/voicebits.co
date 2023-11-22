@extends('podcast.templates.edges.layout')

@section('content')
    <div class="bg-black text-white">
        @include('podcast.templates.edges.partials.header')
        @include('podcast.templates.edges.partials.navigation')
    </div>

    <div id="body" class="py-6">
        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-8 gap-8">
                <div class="col-span-8 md:col-span-6">
                    <h2 class="page-subheading text-slate-500 uppercase text-sm font-semibold">{{__("Episodes")}}</h2>

                    <div class="mt-4"></div>

                    @forelse ($episodes as $episode)
                        <div class="border-t border-slate-300 py-4">
                            <time class="order-first font-mono text-sm leading-7 text-slate-500" datetime="{{ $episode->published_at }}">{{ \Carbon\Carbon::parse($episode->published_at)->format("M d, Y") }}</time>
                            <h3 class="mt-2 text-lg font-bold">
                                <a wire:navigate href="{{ route('public.podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}">{{ $episode->title }}</a>
                            </h3>
                            <p class="mt-1 text-base leading-7 text-slate-700">{!! str($episode->description)->limit(200) !!}</p>

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
                                    href="{{ route('public.podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}">Show notes</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <div class="mt-4 border-t border-t-slate-300"></div>
                    <div class="mt-4">
                        <a wire:navigate class="text-sm font-semibold  underline capitalize text-slate-700 hover:text-slate-900 inline-flex items-center space-x-3"
                            href="{{ route('public.podcast.episodes', ['url' => $podcast->url]) }}"
                        >{{__("More episodes")}} » </a>
                    </div>
                </div>

                {{-- Right side --}}
                <div class="hidden md:block md:col-span-2">
                    <h4 class="page-subheading text-slate-500 uppercase text-sm font-semibold">{{__("Listen on")}}</h4>
                    <div class="my-4 border-t border-slate-300"></div>
                    @include('podcast.templates.edges.partials.podcatchers')
                </div>
            </div>
        </main>
    </div>

    @include('podcast.templates.edges.partials.footer')

    @persist('player')
        @include('podcast.templates.edges.partials.player')
    @endpersist
@endsection
