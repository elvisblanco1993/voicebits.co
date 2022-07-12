<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $podcast->name . ' | ' . config('app.name', 'Laravel') }}</title>



        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        {{-- Used-defined styles --}}
        <style>
            header {
                background-color: {{ $podcast->website->header_background ?? "#0F172A" }};
                color: {{ $podcast->website->header_text_color ?? "#F8FAFC" }};
            }
            .header-link {
                color: {{ $podcast->website->header_link_color ?? "#CBD5E1" }};
                border-color: {{ $podcast->website->header_link_color ?? "#CBD5E1" }};
            }
            .header-link:hover {
                background-color: {{ $podcast->website->header_link_color ?? "#CBD5E1" }};
                color: {{ $podcast->website->header_background ?? '#0F172A' }};
            }
            body {
                background-color: {{ $podcast->website->body_background ?? "#0F172A" }};
                color: {{ $podcast->website->body_text_color ?? "#F8FAFC" }};
            }
        </style>

        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased min-h-screen" x-data="{selected: 'episodes'}">

        @include('web.partials.player', ['podacst' => $podcast])

        <header class="py-12">
            <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
                <div class="py-4 sm:py-8 lg:py-24 grid grid-cols-2 gap-8">
                    <div class="col-span-2 sm:col-span-1 flex flex-col items-center justify-center">
                        <h1 class="text-6xl font-extrabold">{{ $podcast->name }}</h1>
                    </div>
                    <div class="col-span-2 sm:col-span-1 flex justify-end">
                        <img src="{{ Storage::url($podcast->cover) }}" alt=""
                            class="w-full max-w-full aspect-square object-cover">
                    </div>
                </div>
                <div class="flex items-center justify-center gap-8 py-2">
                    <button
                        id="episodes"
                        @click="selected = $el.id"
                        class="px-4 py-2 header-link border rounded-lg transition-all"
                    >Episodes</button>
                    <button
                        id="about"
                        @click="selected = $el.id"
                        class="px-4 py-2 header-link border rounded-lg transition-all"
                    >About</button>
                </div>
            </div>
        </header>

        {{-- Content area --}}
        <main class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-8">
                <div class="col-span-4 sm:col-span-3 md:py-8">
                    {{-- Content area --}}
                    <div x-show="selected === 'episodes'">
                        @include('web.templates.big-square.episodes')
                    </div>
                    <div x-show="selected === 'about'">
                        @include('web.templates.big-square.about')
                    </div>
                </div>

                {{-- Show distributors --}}
                <div class="col-span-4 sm:col-span-1">
                    @include('web.templates.big-square.distributors')
                </div>
            </div>
        </main>

        <footer>
            <div class="text-center text-sm text-slate-500 px-4 sm:px-6 lg:px-8 py-6">
                Podcast powered and distributed by <a href="https://voicebits.co" target="_blank" class="underline">Voicebits</a>
            </div>
        </footer>
        @livewireScripts
    </body>
</html>
