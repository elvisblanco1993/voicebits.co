<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $podcast->name . ' | ' . config('app.name', 'Laravel') }}</title>
        @vite('resources/css/app.css')
        @livewireStyles
        {{-- User-defined styles --}}
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
                --plyr-color-main: {{ $podcast->website->body_link_color ?? "#00b3ff" }};
            }

            time {
                color: {{ $podcast->website->body_text_color ?? '#F8FAFC' }};
                opacity: 0.9;
            }

            article > h2 {
                color: {{ $podcast->website->body_text_color ?? '#F8FAFC' }};
            }

            article > .description {
                color: {{ $podcast->website->body_text_color ?? '#F8FAFC' }};
                opacity: 0.9;
            }

            .episode-btn,
            .episode-notes {
                color: {{ $podcast->website->body_link_color ?? '#F8FAFC' }};
                opacity: 0.9;
            }
            .episode-btn:hover,
            .episode-notes:hover {
                color: {{ $podcast->website->body_link_color ?? '#F8FAFC' }};
                opacity: 1;
            }

        </style>
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased min-h-screen">

        <header class="pb-12">
            <nav class="w-full h-16">
                <div class="max-w-7xl mx-auto h-full flex items-center justify-between px-4 sm:px-6 md:px-8 lg:px-4">
                    <a href="{{ url()->current() }}" class="text-xl font-bold uppercase">
                        <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-12 aspect-square object-cover object-center rounded-lg">
                    </a>
                    @include('web.templates.classic.social')
                </div>
            </nav>

            <div class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 md:px-8 lg:px-4 text-center">
                <h1 class="text-7xl font-black">{{ $podcast->name }}</h1>
                <div class="my-12"></div>
                <div class="max-w-3xl mx-auto text-center md:text-left">
                    @include('web.partials.player')
                    <div class="mt-2 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 animate-pulse" viewBox="0 0 16 16">
                            <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                        </svg>
                        <p class="text-sm font-light tracking-wider">Now playing: <span id="player-title"></span></p>
                    </div>
                </div>
            </div>
        </header>

        @include('web.templates.classic.episodes')

        @livewireScripts
    </body>
</html>
