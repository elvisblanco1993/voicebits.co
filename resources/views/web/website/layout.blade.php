<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Voicebits is the hosting and distribution platform for all your podcasts." />
        <link rel="shortcut icon" href="{{ asset('logo-mark.svg') }}" type="image/svg">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="canonical" href="{{ url()->current() }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fira-sans:100,200,300,400,500,600,700,800,900|inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        @vite('resources/css/app.css')
        @livewireStyles
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </head>
    <body class="font-serif antialiased min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('web.website.partials.navbar')
        @yield('content')
        @include('web.website.partials.footer')
        @livewireScripts
    </body>
</html>
