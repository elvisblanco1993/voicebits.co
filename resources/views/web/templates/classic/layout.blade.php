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
    <body class="antialiased min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-0 mb-44">
            <header class="py-12 grid grid-cols-12 items-center gap-8">
                <div class="col-span-12 md:col-span-4">
                    <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="rounded-2xl shadow w-3/4 mx-auto md:w-full aspect-square object-center object-cover">
                </div>

                <div class="col-span-12 md:col-span-8 text-center sm:text-left">
                    <h1 class="mt-0 text-xl md:text-4xl font-bold lg:font-extrabold">{{ $podcast->name }}</h1>
                    <p class="mt-6 text-sm">By {{ $podcast->author }}</p>
                    <p class="mt-6 text-sm font-medium">{{ $podcast->description }}</p>
                    <div class="mt-6">
                        @include('web.templates.classic.distributors')
                    </div>
                </div>
            </header>

            {{-- Episodes --}}
            <main class="mb-12">
                @forelse ($podcast->episodes as $episode)
                    <article class="mb-4 w-full p-4">
                        <div class="grid grid-cols-12 items-center gap-8">
                            <div class="col-span-2 lg:col-span-1 w-full flex items-center justify-center">
                                <button id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')" class="episode-btn text-slate-800 hover:text-slate-600 transition-all p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div class="h-full col-span-10 lg:col-span-11 flex items-center justify-between">
                                <div>
                                    <a href="{{ route('podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}" class="hover:underline transition-all">
                                        <h2 class="text-xl font-bold text-slate-800">{{ $episode->title }}</h2>
                                    </a>
                                    <span class="mt-1 text-sm text-slate-600">{!! strip_tags(Str::limit($episode->description, 80, ' [...]')) !!}</span>
                                </div>
                                <div class="hidden h-full text-xs text-slate-500 md:flex flex-col justify-between items-end">
                                    <p>{{ Carbon\Carbon::parse($episode->published_at)->format('M d, Y') }}</p>
                                    <p>{{ ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    @if (!$loop->last)
                        <div class="mb-4 border-t border-slate-200"></div>
                    @endif
                @empty
                @endforelse
            </main>
        </div>

        {{-- Audio Player --}}
        <div class="sticky md:absolute inset-x-0 bottom-0 z-10 bg-white/80 border-t border-t-slate-200 backdrop-blur-md">
            <div class="max-w-5xl mx-auto">
                @livewire('player.player')
            </div>
        </div>

        @vite("resources/js/app.js")
        @livewireScripts
    </body>
</html>
