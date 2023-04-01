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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
            <header class="py-12 grid grid-cols-12 items-center gap-8">
                <div class="col-span-12 md:col-span-4">
                    <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="rounded-2xl shadow w-3/4 mx-auto md:w-full aspect-square object-center object-cover">
                </div>

                <div class="col-span-12 md:col-span-8 text-center sm:text-left">
                    <h1 class="mt-0 text-xl md:text-4xl font-bold lg:font-extrabold">{{ $podcast->name }}</h1>
                    <p class="mt-6 text-sm">By {{ $podcast->author }}</p>
                    <p class="mt-6 text-sm font-medium">{{ $podcast->description }}</p>
                    <div class="mt-6">
                        @include('podcast.templates.classic.distributors')
                    </div>
                </div>
            </header>

            {{-- Episodes --}}
            <main class="mb-12">
                <embed width="100%" height="160" frameborder="no" scrolling="no" seamless
                    src="{{ route('public.episode.embed', ['guid' => $episode->guid, 'player' => 'web']) }}"
                />
                <div class="mt-12 prose max-w-full">
                    {!! str($episode->description)->markdown() !!}
                </div>
            </main>
        </div>
        @vite("resources/js/app.js")
        @livewireScripts
    </body>
</html>
