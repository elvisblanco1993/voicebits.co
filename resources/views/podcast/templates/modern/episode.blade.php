@extends('podcast.templates.modern.layout')

@section('content')
    {{-- Slim player --}}
    @livewire('player.slim')
    {{-- End of Slim player --}}

    {{-- Navbar --}}
    <div class="w-full">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between border-b md:border-b-0">
            <div class="hidden md:flex items-center space-x-12">
                <a href="{{ route('public.podcast.website', ['url' => $podcast->url]) }}">&leftarrow; Go back</a>
            </div>

            <div class="hidden md:flex items-center space-x-3">
                @include('podcast.templates.modern.partials.social')
                <a href="{{ route('public.podcast.feed', ['url' => $podcast->url, 'player' => 'rss']) }}" target="_blank">
                    <svg class="w-5 h-5 fill-[#FFA500]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>RSS</title><path d="M19.199 24C19.199 13.467 10.533 4.8 0 4.8V0c13.165 0 24 10.835 24 24h-4.801zM3.291 17.415c1.814 0 3.293 1.479 3.293 3.295 0 1.813-1.485 3.29-3.301 3.29C1.47 24 0 22.526 0 20.71s1.475-3.294 3.291-3.295zM15.909 24h-4.665c0-6.169-5.075-11.245-11.244-11.245V8.09c8.727 0 15.909 7.184 15.909 15.91z"/></svg>
                </a>
            </div>

            {{-- Mobile menu --}}
            <a href="{{ url()->current() }}" class="block md:hidden text-lg font-medium">{{ $podcast->name }}</a>
            <div class="block md:hidden">
                <a href="{{ route('public.podcast.website', ['url' => $podcast->url]) }}">&leftarrow; Go back</a>
            </div>
        </nav>
    </div>
    {{-- End of Navbar --}}

    {{-- Home page --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">
        <img src="{{ Storage::url($episode->cover ?? $podcast->cover) }}" alt="{{ $podcast->name }}" class="block md:hidden w-full object-center object-cover rounded">
        <div class="mt-4 md:mt-0 md:flex items-start justify-between md:space-x-8">
            <div class="w-full">
                <h1 class="text-3xl md:text-4xl font-semibold">{{ $episode->title }}</h1>
                <div class="mt-4 text-slate-400">{{ Carbon\Carbon::parse($episode->published_at)->format('M d, Y') }} | {{ ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}</div>

                <button onclick="play('{{ $episode->guid }}')" class="mt-4 flex items-center space-x-4 bg-green-400 px-3 py-2 rounded text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Play episode</span>
                </button>

                <div class="mt-6 prose prose-h1:text-3xl prose-h1:font-semibold max-w-full">{!! Str::markdown($episode->description) !!}</div>
            </div>
            <img src="{{ Storage::url($episode->cover ?? $podcast->cover) }}" alt="{{ $podcast->name }}" class="hidden md:block w-full md:w-1/3 object-center object-cover rounded">
        </div>
    </div>
    {{-- End of Home page --}}

@endsection
