<div class="w-full h-64 bg-gradient-to-tr from-slate-300 to-slate-200 text-slate-900 rounded-xl bg-center bg-cover" @if($podcast->cover)style="background-image: url({{ Storage::url($podcast->cover) }})"@endif>
    <div class="w-full h-full bg-white/40 backdrop-blur-lg rounded-xl flex items-center justify-between space-x-6 px-4 sm:px-6 lg:px-8">
        <div class="">
            <h1 class="text-4xl font-extrabold">{{ $podcast->name }}</h1>
            <p class="mt-2 text-xl font-semibold">with {{ $podcast->author }}</p>
        </div>
        <div class="hidden sm:block sm:flex-none items-center justify-center">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" class="flex-none h-40 w-40 aspect-square object-center object-cover rounded-full">
            @else
                <div class="flex-none h-40 w-40 rounded-full bg-white flex items-center justify-center">
                    <img src="{{ asset('logo-mark.svg') }}" class="w-12 h-auto">
                </div>
            @endif
        </div>
    </div>
</div>

<div class="py-4 flex items-center justify-between overflow-auto">
    <div class="flex items-center space-x-4">
        <a href="{{ route('show', ['show' => $podcast->id]) }}" @class([
            'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
            'text-blue-600' => request()->routeIs('show')
        ])>Dashboard</a>
        @can('view_episodes', $podcast)
            <a href="{{ route('episodes', ['show' => $podcast->id]) }}" @class([
                'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                'text-blue-600' => request()->routeIs('episodes')
            ])>Episodes</a>
        @endcan
        @if ($podcast->isReadyToDistribute())
            @can('manage_social', $podcast)
                <a href="{{ route('show.social', ['show' => $podcast->id]) }}" @class([
                    'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('show.social')
                ])>Social</a>
            @endcan
            @can('manage_distribution', $podcast)
                <a href="{{ route('show.distribution', ['show' => $podcast->id]) }}" @class([
                    'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('show.distribution')
                ])>Distribution</a>
            @endcan

            @if (config('app.env') === 'local')
                @can('manage_website', $podcast)
                    <a href="{{ route('show.website', ['show' => $podcast->id]) }}" @class([
                        'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                        'text-blue-600' => request()->routeIs('show.website')
                    ])>Website</a>
                @endcan
            @endif
        @endif
        @can('view_users', $podcast)
            <a href="{{ route('show.users', ['show' => $podcast->id]) }}"@class([
                'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                'text-blue-600' => request()->routeIs('show.users')
            ])>Team</a>
        @endcan
    </div>
    <div class="ml-4">
        @can('edit_podcast', $podcast)
            <a href="{{ route('show.settings', ['show' => $podcast->id]) }}"@class([
                'flex items-center w-full text-center text-sm font-semibold hover:text-blue-600 transition-all',
                'text-blue-600' => request()->routeIs('show.settings')
            ])>Settings</a>
        @endcan
    </div>
</div>
