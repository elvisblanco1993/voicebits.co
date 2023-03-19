<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('logo-mark.svg') }}" type="image/svg">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        <div class="min-h-screen bg-slate-50">
            @include('navigation-menu')

            @if ( (Auth::user()->onTrial() && !Auth::user()->subscribed('voicebits')) && !request()->routeIs('signup') )
            <div class="w-full bg-indigo-50">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-center text-indigo-600 py-2">
                    Your trial ends in {{ abs(round((strtotime(Auth::user()->trial_ends_at) - strtotime(now()))/86400)) }} day(s). <a href="{{ route('signup') }}" class="underline">Sign up for Voicebits here</a>.
                </div>
            </div>
            @endif

            <main class="mt-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    @vite('resources/js/app.js')
</html>
