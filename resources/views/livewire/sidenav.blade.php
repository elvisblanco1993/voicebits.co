<div class="md:col-span-3 lg:col-span-2">
    <aside class="hidden md:block">
        <a href="{{ route('dashboard') }}" @class([
            'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
            'bg-slate-100 text-indigo-600' => request()->routeIs('dashboard'),
        ])>{{ __("Dashboard") }}</a>

        @if (auth()->user()->podcasts->count() > 0)

            @can('view_episodes', $podcast)
            <a href="{{ route('episodes') }}" @class([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('episodes'),
            ])>{{ __("Episodes") }}</a>
            @endcan

            @if ($podcast->isReadyToDistribute())
                @can('manage_social', $podcast)
                    <a href="{{ route('show.social') }}" @class([
                        'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                        'bg-slate-100 text-indigo-600' => request()->routeIs('show.social'),
                    ])>{{ __("Social media") }}</a>
                @endcan
                @can('manage_distribution', $podcast)
                    <a href="{{ route('show.distribution') }}" @class([
                        'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                        'bg-slate-100 text-indigo-600' => request()->routeIs('show.distribution'),
                    ])>{{ __("Distribution") }}</a>
                @endcan
            @endif

            @if (config('app.env') === 'local')
                @can('manage_website', $podcast)
                    <a href="#" @class([
                        'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                        'bg-slate-100 text-indigo-600' => request()->routeIs('show.website'),
                    ])>{{ __("Website") }}</a>
                @endcan
            @endif

            @can('view_users', $podcast)
                <a href="{{ route('show.users') }}" @class([
                    'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                    'bg-slate-100 text-indigo-600' => request()->routeIs('show.users'),
                ])>{{ __("Team") }}</a>
            @endcan

            @can('edit_podcast', $podcast)
                <a href="{{ route('show.settings') }}" @class([
                    'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                    'bg-slate-100 text-indigo-600' => request()->routeIs('show.settings'),
                ])>{{ __("Settings") }}</a>
            @endcan
        @endif

        @if (Auth::user()->is_admin)
            <span class="block my-2 px-2 text-sm font-medium text-slate-400">{{ __("Admin tools") }}</span>

            <a href="{{ route('customers') }}" @class([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('customers'),
            ])>{{ __("Customers") }}</a>

            <a href="{{ route('log-viewer.index') }}" @class([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('log-viewer.index'),
            ])>{{ __("System logs") }}</a>

            <a href="{{ route('horizon.index') }}" @class([
                'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
                'bg-slate-100 text-indigo-600' => request()->routeIs('horizon.index'),
            ])>{{ __("Horizon") }}</a>
        @endif

        <a href="https://linkd.tawk.help?utm_source=linkd_customer_portal"
            target="_blank" class="block my-1 px-3 py-2 rounded-md hover:bg-slate-100"
        >{{ __("Support") }}</a>

        <a href="{{ route('profile.show') }}" @class([
            'block my-1 px-3 py-2 rounded-md hover:bg-slate-100',
            'bg-slate-100 text-indigo-600' => request()->routeIs('profile.show'),
        ])>{{ __("Profile") }}</a>

        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <a href="{{ route('logout') }}"
                class="block my-1 px-3 py-2 rounded-md hover:bg-red-100"
                @click.prevent="$root.submit();"
            >{{ __('Log Out') }}</a>
        </form>
    </aside>

    <nav class="block md:hidden col-span-12">
        <div class="h-16 flex items-center justify-between">
            <div class="shrink-0 flex items-center">
                {{-- @livewire('admin.page.selector') --}}
            </div>

            <x-dropdown>
                <x-slot name="trigger">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    {{-- <x-dropdown-link href="{{ route('dashboard') }}">{{__("Dashboard")}}</x-dropdown-link>
                    <x-dropdown-link href="{{ route('links') }}">{{__("Links")}}</x-dropdown-link>
                    <x-dropdown-link href="{{ route('social') }}">{{__("Social media")}}</x-dropdown-link>
                    <x-dropdown-link href="{{ route('appearance') }}">{{__("Appearance")}}</x-dropdown-link>
                    <x-dropdown-link href="{{ route('bio') }}">{{__("Page details")}}</x-dropdown-link>
                    <x-dropdown-link href="{{ route('referrals') }}">{{__("Referrals")}}</x-dropdown-link> --}}

                    @if (Auth::user()->is_admin)
                        <div class="my-1 border-t"></div>
                        {{-- <x-dropdown-link href="{{ route('customers') }}">{{__("Customers")}}</x-dropdown-link>
                        <x-dropdown-link href="{{ route('log-viewer.index') }}">{{__("System logs")}}</x-dropdown-link>
                        <x-dropdown-link href="{{ route('horizon.index') }}">{{__("Horizon")}}</x-dropdown-link> --}}
                        <div class="my-1 border-t"></div>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-indigo-50 focus:outline-none focus:bg-gray-100 transition"
                            @click.prevent="$root.submit();"
                        >{{ __('Log Out') }}</a>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </nav>
</div>
