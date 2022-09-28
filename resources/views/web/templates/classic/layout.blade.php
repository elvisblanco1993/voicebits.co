<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $podcast->name . ' | ' . config('app.name', 'Voicebits - The Podcast Hosting and Distribution Platform') }}</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased min-h-screen max-w-5xl mx-auto px-4 sm:px-6 lg:px-0">

        <header class="py-12 grid grid-cols-12 items-center gap-8">
            <div class="col-span-12 md:col-span-4">
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="rounded-2xl shadow w-full aspect-video md:aspect-square">
            </div>

            <div class="col-span-12 md:col-span-8">
                <h1 class="mt-0 text-xl md:text-4xl lg:text-5xl font-bold lg:font-extrabold">{{ $podcast->name }}</h1>
                <p class="mt-6 text-sm">By {{ $podcast->author }}</p>
                <p class="mt-6 font-medium">{{ $podcast->description }}</p>
                <div class="mt-6">
                    <a href="" class="inline-block mt-1 px-4 py-1.5 border rounded-full text-sm text-slate-500 hover:text-slate-700">Listen on Spotify</a>
                    <a href="" class="inline-block mt-1 px-4 py-1.5 border rounded-full text-sm text-slate-500 hover:text-slate-700">Listen on Apple Podcasts</a>
                    <a href="" class="inline-block mt-1 px-4 py-1.5 border rounded-full text-sm text-slate-500 hover:text-slate-700">Listen on Google Podcasts</a>
                    <a href="" class="inline-block mt-1 px-4 py-1.5 border rounded-full text-sm text-slate-500 hover:text-slate-700">RSS Feed</a>
                </div>
            </div>
        </header>

        {{-- Episodes --}}
        <main>
            @include('web.partials.player')
            <span id="playingTitle"></span>
            @forelse ($podcast->episodes as $episode)
                <article class="mb-4 w-full p-4 rounded-xl border shadow-sm">
                    <div class="grid grid-cols-12 items-center gap-8">
                        <div class="col-span-2 lg:col-span-1 w-full flex items-center justify-center">
                            <button id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')" class="episode-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="h-full col-span-10 lg:col-span-11 flex items-center justify-between">
                            <div class="">
                                <h2 class="text-xl font-bold text-slate-800">{{ $episode->title }}</h2>
                                <p class="mt-1 text-base text-slate-600">{!! Str::limit($episode->description, 80, ' [...]') !!}</p>
                            </div>
                            <div class="h-full text-xs text-slate-500 flex flex-col justify-between items-end">
                                <p>Jun 25, 2022</p>
                                <p>00:24</p>
                            </div>
                        </div>
                    </div>
                </article>
            @empty

            @endforelse
        </main>

        @vite("resources/js/app.js")
        @livewireScripts
    </body>
</html>
