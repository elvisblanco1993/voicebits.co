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

        @vite('resources/js/app.js')
    </head>
    <body class="antialiased min-h-screen">
        @include('web.partials.player', ['podacst' => $podcast])
        <header class="">
            <div class="px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
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
                    <a href=""
                        class="px-4 py-2 header-link border rounded-lg transition-all">Episodes</a>
                    <a href=""
                        class="px-4 py-2 header-link border rounded-lg transition-all">About</a>
                </div>
            </div>
        </header>

        {{-- Content area --}}
        <main class="py-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-8">
                <div class="col-span-4 sm:col-span-3 md:py-8">
                    {{-- Content area --}}

                </div>

                {{-- Show distributors --}}
                <div class="col-span-4 sm:col-span-1">
                    @include('web.templates.big-square.distributors')
                </div>
            </div>
        </main>

        <footer>

        </footer>
        @livewireScripts
    </body>
</html>
