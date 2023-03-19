<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{ route('home') }}" class="flex items-center justify-center gap-3">
                <img src="{{ asset('logo-mark.svg') }}" alt="" class="block h-8 w-auto">
                <span class="text-2xl font-semibold text-slate-800">voicebits</span>
                <sup class="text-xs font-light tracking-wider text-slate-400">beta</sup>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
