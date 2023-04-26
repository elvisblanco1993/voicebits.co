<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link type="application/rss+xml" rel="alternate" title="{{$podcast->name}}" href="{{ route('public.podcast.feed', ['player' => 'web', 'url' => $podcast->url]) }}"/>
        <title>{{ $podcast->name . ' | ' . config('app.name', 'Voicebits - The Podcast Hosting and Distribution Platform') }}</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased min-h-screen">
        @yield('content')
        @vite("resources/js/app.js")
        @livewireScripts
    </body>
</html>
