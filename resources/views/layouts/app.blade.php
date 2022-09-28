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
        <div class="min-h-screen bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-6 md:py-24">
                    <div class="grid grid-cols-4 gap-12">
                        <aside class="col-span-4 md:col-span-1">
                            @livewire('navigation-menu')
                            @if (Auth::user()->onTrial() && !request()->routeIs('signup'))
                                <div class=" leading-6 mb-4 w-full px-2 py-1.5 text-sm text-indigo-600 bg-indigo-100 rounded-lg border border-indigo-200">
                                    You have {{ abs(round((strtotime(Auth::user()->trial_ends_at) - strtotime(now()))/86400)) }} days left on your free trial. If you are enjoying Voicebits, you can <a href="{{ route('signup') }}" class="inline-block text-yellow-700 bg-yellow-50 px-1 rounded border-b border-b-yellow-600">sign up here.</a> 🚀
                                </div>
                            @endif
                        </aside>

                        <main class="col-span-4 md:col-span-3">
                            {{-- Trial --}}
                            {{-- @if (Auth::user()->onTrial() && !request()->routeIs('signup'))
                                <div class="mb-4 w-full px-4 py-1.5 text-sm text-indigo-600 bg-indigo-100 text-center rounded-lg border border-indigo-200">
                                    You have {{ abs(round((strtotime(Auth::user()->trial_ends_at) - strtotime(now()))/86400)) }} days left on your free trial. If you are enjoying Voicebits, you can <a href="{{ route('signup') }}" class="text-yellow-700 bg-yellow-50 py-0.5 px-1 rounded border-b border-b-yellow-600">sign up here.</a> 🚀
                                </div>
                            @endif --}}
                            {{-- End - Trial --}}

                            {{-- Content Section --}}
                            {{ $slot }}
                        </main>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    @vite('resources/js/app.js')
</html>
