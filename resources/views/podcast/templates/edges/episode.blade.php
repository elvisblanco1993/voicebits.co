@extends('podcast.templates.edges.layout')

@section('content')
    @include('podcast.templates.edges.partials.header')
    @include('podcast.templates.edges.partials.navigation')

    <div class="py-6">
        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-8 gap-8">
                <div class="col-span-8 md:col-span-6">
                    <div class="flex items-center space-x-4">
                        <button id="pp"
                            onclick="setEpisode(
                                '{{ route('public.episode.play', ['url' => $episode->podcast->url, 'episode' => $episode->guid, 'player' => 'web']) }}',
                                '{{$episode->title}}',
                                {{ $episode->track_length }},
                                '{{ $episode->guid }}'
                            )"
                            class="episode-btn flex items-center gap-x-3 text-sm font-bold leading-6 body-btn"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-slate-800 hover:text-slate-700">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div>
                            <h3 class="text-4xl font-extrabold">{{ $episode->title }}</h3>
                            <div class="mt-2 flex items-center space-x-3 text-slate-500">
                                <div>{{ \Carbon\Carbon::parse($episode->published_at)->format('F d, Y') }}</div>
                                @if ($episode->type === 'episodic')
                                    <div>/</div>
                                    <div>
                                        {{ 'S' . $episode->season . 'E' . $episode->number }}
                                    </div>
                                @endif
                                <div>/</div>
                                <div>
                                    {{ (int)($episode->track_length / 60) . ':' .  sprintf('%02d', (int)($episode->track_length % 60)) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 prose max-w-full">
                        {!! str($episode->description)->markdown() !!}
                    </div>
                </div>

                {{-- Right side --}}
                <div class="hidden md:block md:col-span-2">
                    <img src="{{ ($episode->cover) ? Storage::url($episode->cover) : Storage::url($podcast->cover) }}" class="w-full aspect-square rounded-md">
                    <h4 class="mt-8 page-subheading text-slate-500 uppercase text-sm font-semibold">{{__("Listen on")}}</h4>
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
