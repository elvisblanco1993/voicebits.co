<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('logo-mark-dark.svg') }}" type="image/svg">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-50 relative">

            @if ( (Auth::user()->onTrial() && !Auth::user()->subscribed('voicebits')) && !request()->routeIs('signup') )
                <div class="w-full bg-yellow-100">
                    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-center text-indigo-700 py-2">
                        Your trial expires in <strong>{{ abs(round((strtotime(Auth::user()->trial_ends_at) - strtotime(now()))/86400)) }} days</strong>. <a href="{{ route('signup') }}" class="underline">Upgrade</a> to continue using Voicebits after your trial.
                    </div>
                </div>
            @elseif (Auth::user()->hasExpiredTrial() && !Auth::user()->subscribed('voicebits') && !request()->routeIs('signup'))
                <div class="w-full bg-yellow-100">
                    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-center text-indigo-700 py-2">
                        Your trial has ended. <a href="{{ route('signup') }}" class="underline">Please upgrade</a> to continue managing your podcasts.
                    </div>
                </div>
            @endif

            @include('navigation-menu')

            <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>

        </div>

        @stack('modals')

        @livewireScripts
    </body>
    @vite('resources/js/app.js')
</html>
