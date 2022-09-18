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
                'block font-semibold px-4 py-2 rounded-lg hover:text-[#0099ff] transition-all',
                'text-[#0099ff]' => request()->routeIs('shows')
            ])>
                {{ __('Podcasts') }}
            </a>

            <a href="{{ route('article.index') }}" @class([
                'block font-semibold px-4 py-2 rounded-lg hover:text-[#0099ff] transition-all',
                'text-[#0099ff]' => request()->routeIs('article.index')
            ])>
                {{ __('Articles') }}
            </a>
        </div>

        <div class="mt-6 py-2 border-t text-slate-500">
            <a href="{{ route('profile.show') }}" @class([
                'block font-semibold px-4 py-2 rounded-lg hover:text-[#0099ff] transition-all',
                'text-[#0099ff]' => request()->routeIs('profile.show')
            ])>{{ __('Account') }}</a>
            @can('manage_billing')
                <a href="{{ route('billing') }}" @class([
                    'block font-semibold px-4 py-2 rounded-lg hover:text-[#0099ff] transition-all',
                    'text-[#0099ff]' => request()->routeIs('billing')
                ])>
                    {{ __('Billing') }}
                </a>
            @endcan
            <a href="" @class([
                'block font-semibold px-4 py-2 rounded-lg hover:text-[#0099ff] transition-all',
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
