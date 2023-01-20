<div>
    <div class="flex md:block items-center justify-between">
        <a href="{{ route('home') }}" class="inline-block md:hidden w-full">
            <img src="{{ asset('logo-mark.svg') }}" alt="{{ config('app.name') }}" class="block h-8 md:h-6 w-auto">
        </a>
        {{-- Mobile Menu --}}
        <nav class="block md:hidden antialiased w-full text-right"
            x-data="{ menu: false }">
            <button class="p-2 rounded-lg" @click="menu = !menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>
            </button>

            <div x-show="menu"
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute z-50 mt-2 60 rounded-md shadow-lg origin-top-right right-8 text-left"
                @click.outside="menu = false">
                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                    <div class=" w-60">
                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('shows') }}">Podcasts</a>
                        @can('manage_platform')
                            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('article.index') }}">Articles</a>
                        @endcan
                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('profile.show') }}">Profile</a>
                        @can('manage_billing')
                            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('billing') }}">Billing</a>
                        @endcan
                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="mailto:support@voicebits.co?subject=Need help">Support</a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}"
                                @click.prevent="$root.submit();"
                                @class([
                                    'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition',
                            ])>{{ __('Log Out') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        {{-- Desktop Menu --}}
        <nav class="hidden md:block w-full antialiased">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('logo-mark.svg') }}" alt="{{ config('app.name') }}" class="block h-8 w-auto">
                <h1 class="text-xl font-black text-slate-900">voicebits</h1>
            </div>

            <div class="mt-6 text-slate-500">
                <a href="{{ route('shows') }}" @class([
                    'block font-semibold px-4 py-2 rounded-lg hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('shows')
                ])>
                    {{ __('Podcasts') }}
                </a>

                @can('manage_platform')
                    <a href="{{ route('article.index') }}" @class([
                        'block font-semibold px-4 py-2 rounded-lg hover:text-blue-600 transition-all',
                        'text-blue-600' => request()->routeIs('article.index')
                    ])>
                        {{ __('Articles') }}
                    </a>
                @endcan
            </div>

            <div class="mt-6 py-2 border-t text-slate-500">
                <a href="{{ route('profile.show') }}" @class([
                    'block font-semibold px-4 py-2 rounded-lg hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('profile.show')
                ])>{{ __('Profile') }}</a>
                @can('manage_billing')
                    <a href="{{ route('billing') }}" @class([
                        'block font-semibold px-4 py-2 rounded-lg hover:text-blue-600 transition-all',
                        'text-blue-600' => request()->routeIs('billing')
                    ])>
                        {{ __('Billing') }}
                    </a>
                @endcan
                <a href="mailto:support@voicebits.co?subject=Need help" @class([
                    'block font-semibold px-4 py-2 rounded-lg hover:text-blue-600 transition-all',
                ])>{{ __('Support') }}</a>

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a href="{{ route('logout') }}"
                        @click.prevent="$root.submit();"
                        @class([
                            'block font-semibold px-4 py-2 rounded-lg hover:text-red-500 transition-all',
                    ])>{{ __('Log Out') }}</a>
                </form>
            </div>
        </nav>
    </div>
</div>
