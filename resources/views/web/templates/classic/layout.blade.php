<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $podcast->name . ' | ' . config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        {{-- Used-defined styles --}}
        <style>
            header {
                background-color: {{ $podcast->website->header_background ?? "#0F172A" }};
                color: {{ $podcast->website->header_text_color ?? "#F8FAFC" }};
                border-color: {{ $podcast->website->header_background ?? "#0F172A" }};
            }
            .header-link {
                color: {{ $podcast->website->header_link_color ?? "#CBD5E1" }};
                padding: 1px 3px 1px 3px;
                border-radius: 2px;
                margin-right: 4px;
            }
            .header-link:hover {
                background-color: {{ $podcast->website->header_link_color ?? "#CBD5E1" }};
                color: {{ $podcast->website->header_background ?? '#0F172A' }};
            }

            body {
                background-color: {{ $podcast->website->body_background ?? "#0F172A" }};
                color: {{ $podcast->website->body_text_color ?? "#F8FAFC" }};
                --plyr-audio-controls-background: {{ $podcast->website->body_background ?? "#0F172A" }};
                --plyr-audio-control-color: {{ $podcast->website->body_text_color ?? "#F8FAFC" }};
            }

            .episode-container {
                border: 1px solid {{ $podcast->website->body_text_color ?? "#F8FAFC" }};
            }

            .episode-description {
                color: {{ $podcast->website->body_text_color ?? "#F8FAFC" }};
            }

            #player-container {
                border-radius: 0.5rem;
                background-color: {{ $podcast->website->body_background ?? '#0F172A' }};
                color: {{ $podcast->website->body_text_color ?? '#F8FAFC' }};
                border-bottom: 1px solid  {{ $podcast->website->header_background ?? '#0F172A' }};
            }

        </style>

        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased min-h-screen">

        <nav class="w-full h-16 border-b">
            <div class="max-w-7xl mx-auto h-full flex items-center justify-between px-4 sm:px-0">
                <a href="{{ url()->current() }}" class="font-bold">{{ $podcast->name }}</a>
                @include('web.templates.classic.social')
            </div>
        </nav>

        <header class="mt-24 py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border border-black lg:rounded-lg">
            <div class="grid grid-cols-4 gap-8">
                <div class="col-span-4 sm:col-span-1">
                    <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="object-center object-cover rounded-lg">
                </div>
                <div class="col-span-4 sm:col-span-3">
                    <h1 class="text-2xl font-extrabold">
                        {{ $podcast->name }}
                    </h1>
                    <p class="mt-4 text-base text-opacity-70">
                        {{ $podcast->description }}
                    </p>
                    <div class="mt-6">
                        @include('web.templates.classic.distributors')
                    </div>
                </div>

                <div class="col-span-4">
                    @include('web.partials.player', ['podacst' => $podcast])
                </div>
            </div>
        </header>

        {{-- Content area --}}
        <main class="py-12 max-w-7xl mx-auto">
            @include('web.templates.classic.episodes')
        </main>

        <footer>
            <div class="text-center text-sm text-slate-500 px-4 sm:px-6 lg:px-8 py-6">
                Podcast powered and distributed by <a href="https://voicebits.co" target="_blank" class="underline">Voicebits</a>
            </div>
        </footer>
        @livewireScripts
    </body>
</html>
