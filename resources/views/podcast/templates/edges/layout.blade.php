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

        {{-- Scripts --}}
        @vite('resources/css/app.css')
        @livewireStyles

        <style>
            * {
                font-family: 'Inter', sans-serif;
            }

            #header,
            .person-badge {
                background-color: {{ $podcast->website->header_background }};
                color: {{ $podcast->website->header_text_color }};
            }

            #nav {
                background-color: {{ $podcast->website->header_background }};
            }

            .nav-container {
                color: {{ $podcast->website->body_background }};
            }

            .nav-link {
                padding: 1rem 0;
                font-weight: 700;
            }

            .nav-link:hover,
            .nav-link-selected {
                color: {{ $podcast->website->header_link_color }};
            }

            /*
                Body Elements
            */
            .search-input:focus {
                border: 1px solid {{ $podcast->website->body_link_color }};
                outline-offset: 0px;
                outline-color: {{ $podcast->website->body_link_color }};
            }

            #body {
                background: {{ $podcast->website->body_background }};
                color: {{ $podcast->website->body_text_color }};
            }

            .body-btn {
                color: {{ $podcast->website->body_link_color }};
            }

            .progress-bar {
                background-color: {{ $podcast->website->body_link_color }};
            }
            /* User-defined Styles */
            {!! $podcast->website->custom_styles !!}
        </style>
    </head>
    <body class="antialiased min-h-screen text-black bg-white">
        @yield('content')
        @livewireScripts
        @vite('resources/js/app.js')
    </body>
</html>
