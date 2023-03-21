<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('logo-mark.svg') }}" type="image/svg">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-white relative">

            @include('navigation-menu')

            <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>

            @if ( (Auth::user()->onTrial() && !Auth::user()->subscribed('voicebits')) && !request()->routeIs('signup') )
                <div class="w-full bg-indigo-50 fixed bottom-0">
                    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-center text-black py-2">
                        Your trial expires in <strong>{{ abs(round((strtotime(Auth::user()->trial_ends_at) - strtotime(now()))/86400)) }} days</strong>. <a href="{{ route('signup') }}" class="underline">Upgrade</a> to continue using Voicebits after your trial.
                    </div>
                </div>
            @endif
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    @vite('resources/js/app.js')
</html>
