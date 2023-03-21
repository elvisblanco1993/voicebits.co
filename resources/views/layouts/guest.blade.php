<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('logo-mark.svg') }}" type="image/svg">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fira-sans:100,200,300,400,500,600,700,800,900|inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="font-serif text-black antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
