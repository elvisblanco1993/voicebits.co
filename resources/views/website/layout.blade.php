<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Podcast hosting and distribution - Voicebits') }}</title>
        <link rel="shortcut icon" href="{{ asset('logo-mark-dark.svg') }}" type="image/svg">
        <meta name="description" content="Voicebits is the hosting and distribution platform for all your podcasts." />
        <link rel="canonical" href="https://voicebits.co">

        <meta property="og:url" content="https://voicebits.co">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Voicebits - The best podcast hosting platform.">
        <meta property="og:description" content="Voicebits is the hosting and distribution platform for all your podcasts.">
        <meta property="og:image" content="https://voicebits.co/voicebits-modern-template.png">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="voicebits.co">
        <meta property="twitter:url" content="https://voicebits.co">
        <meta name="twitter:title" content="Voicebits - The best podcast hosting platform.">
        <meta name="twitter:description" content="Voicebits is the hosting and distribution platform for all your podcasts.">
        <meta name="twitter:image" content="https://voicebits.co/voicebits-modern-template.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased min-h-screen bg-white">

        @include('website.partials.navbar')
        @yield('content')
        @include('website.partials.footer')

        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
        @livewireScripts
    </body>
</html>
