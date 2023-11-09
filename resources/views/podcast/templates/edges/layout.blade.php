<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ $podcast->cover ? Storage::url($podcast->cover) : '' }}" type="image/x-icon">
        <title>{{ $podcast->name . ' | ' . config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        {{-- Used-defined styles --}}
        <style>
            * {
                font-family: 'Inter', sans-serif;
            }

            .nav-link {
                color: #ffffff;
                padding: 1rem 0;
                font-weight: 700;
            }
            .nav-link:hover {
                color: #b8b8b8
            }

            /* DB website style columns
            header_background
            header_text_color
            header_link_color
            body_background
            body_text_color
            body_link_color
            */

        </style>

        {{-- Scripts --}}
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased min-h-screen text-black bg-white">
        @yield('content')
        @livewireScripts
        @vite('resources/js/app.js')
    </body>
</html>
