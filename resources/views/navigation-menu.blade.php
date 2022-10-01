<div>
    <nav class="inline-block md:hidden w-full">
        <img src="{{ asset('logo-mark.svg') }}" alt="{{ config('app.name') }}" class="block h-6 w-auto">
    </nav>

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
            <a href="" @class([
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
