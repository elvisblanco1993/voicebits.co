<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $podcast->name . ' | ' . config('app.name', 'Laravel') }}</title>

        @vite('resources/css/app.css')
        @livewireStyles

        {{-- Used-defined styles --}}
        <style>
            header {
                background-color: {{ $podcast->website->header_background ?? "#0F172A" }};
                color: {{ $podcast->website->header_text_color ?? "#F8FAFC" }};
                border-color: {{ $podcast->website->header_background ?? "#0F172A" }};
            }
            .header > a {
                color: {{ $podcast->website->header_link_color ?? "#CBD5E1" }};
                padding: 1px 3px 1px 3px;
                border-radius: 2px;
                margin-right: 4px;
            }
            .header > a:hover {
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

            .episode-description, footer {
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
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased min-h-screen">
        <div class="grid grid-cols-6 lg:min-h-screen">
            <header class="col-span-6 lg:col-span-2 xl:col-span-1 lg:border-x lg:border-slate-200">
                <div class="py-12 px-4 sm:px-6 lg:px-12">
                    <a href="" class="relative mx-auto block w-48 overflow-hidden rounded-lg bg-slate-200 shadow-xl shadow-slate-200 sm:w-64 sm:rounded-xl lg:w-auto lg:rounded-2xl">
                        <img src="{{ Storage::url($podcast->cover) }}" alt="podcast cover image" width="100%" height="100%" class="w-full" sizes="(min-width: 1024px) 20rem, (min-width: 640px) 16rem, 12rem">
                    </a>
                    <section class="mt-10 text-center lg:mt-12 lg:text-left">
                        <p class="text-xl font-bold">
                            <a href="">{{$podcast->name}}</a>
                        </p>
                    </section>
                    <section class="mt-12 hidden lg:block">
                        <h2 class="flex items-center font-mono text-sm font-medium leading-7">About</h2>
                        <p class="mt-2 text-base leading-7">{{ $podcast->description }}</p>
                    </section>
                    <section class="mt-10 lg:mt-12">
                        <h2 class="sr-only flex items-center font-mono text-sm font-medium leading-7 lg:not-sr-only">Listen</h2>
                        <div class="h-px bg-gradient-to-r from-slate-200/0 via-slate-200 to-slate-200/0 lg:hidden"></div>
                        @include('web.templates.modern.distributors')
                    </section>
                    @if ($podcast->funding)
                        <section class="mt-4 lg:mt-12">
                            <h2 class="sr-only flex items-center font-mono text-sm font-medium leading-7 lg:not-sr-only">Funding</h2>
                            <div class="h-px bg-gradient-to-r from-slate-200/0 via-slate-200 to-slate-200/0 lg:hidden"></div>
                            <p class="mt-4 text-center">
                                <a href="{{ $podcast->funding_url }}" target="_blank" class="w-full inline-block px-2 py-2 text-sm rounded-lg border bg-white">{{ $podcast->funding_text }}</a>
                            </p>
                        </section>
                    @endif
                    <div class="mt-4 h-px bg-slate-200 lg:hidden"></div>
                </div>
            </header>
            <main class="col-span-6 lg:col-span-4 xl:col-span-5">
                <div class="overflow-x-hidden max-w-full">
                    @include('web.templates.modern.episodes')
                </div>
            </main>
            <div class="col-span-6 fixed bottom-0 w-full">
                @include('web.partials.player', ['podacst' => $podcast])
            </div>
        </div>
        @livewireScripts
    </body>
</html>
