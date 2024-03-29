<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ $podcast->cover ? Storage::url($podcast->cover) : '' }}" type="image/x-icon">
        <title>{{ $podcast->name . ' | ' . config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fira-sans:100,200,300,400,500,600,700,800,900|inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        {{-- Used-defined styles --}}
        <style>
            * {
                font-family: 'Fira Sans', sans-serif;
            }
        </style>

        {{-- Scripts --}}
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased min-h-screen">
        @yield('content')
        @livewireScripts
    </body>
    @vite('resources/js/app.js')
</html>
