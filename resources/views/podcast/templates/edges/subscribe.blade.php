@extends('podcast.templates.edges.layout')

@section('content')
    <div class="bg-black text-white">
        @include('podcast.templates.edges.partials.header')
        @include('podcast.templates.edges.partials.navigation')
    </div>

    <div>
        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="my-6">
                <h2 class="text-2xl font-semibold">{{__("Subscribe and Listen")}}</h2>
                <p class="mt-3">{!! __("Listen to <strong>$podcast->name</strong> using one of these podcasting apps or directories.") !!}</p>

                @include('podcast.templates.edges.partials.podcatchers')

                <div class="mt-6">
                    <span class="text-sm inline-flex items-center space-x-2 px-4 py-2.5 border border-gray-200 rounded-lg shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-500">
                            <path fill-rule="evenodd" d="M3.75 4.5a.75.75 0 01.75-.75h.75c8.284 0 15 6.716 15 15v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75C18 11.708 12.292 6 5.25 6H4.5a.75.75 0 01-.75-.75V4.5zm0 6.75a.75.75 0 01.75-.75h.75a8.25 8.25 0 018.25 8.25v.75a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75v-.75a6 6 0 00-6-6H4.5a.75.75 0 01-.75-.75v-.75zm0 7.5a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ route('public.podcast.feed', ['url' => $podcast->url, 'player' => 'rss']) }}</span>
                    </span>
                </div>
            </div>
        </main>
    </div>

    @include('podcast.templates.edges.partials.footer')

    @persist('player')
        @include('podcast.templates.edges.partials.player')
    @endpersist
@endsection
