<div class="w-full h-screen sticky top-12">
    @if ($podcast->cover)
        <img src="{{ Storage::url($podcast->cover) }}" class="flex-none w-full aspect-square object-center object-cover shadow-lg rounded-xl">
    @else
        <div class="flex-none w-full aspect-square bg-amber-100 flex items-center justify-center rounded-xl">
            <img src="{{ asset('logo-mark.svg') }}" class="w-16 h-auto">
        </div>
    @endif

    <div class="py-12">
        <a href="{{ route('show', ['show' => $podcast->id]) }}" @class([
            'block w-full my-1 px-3 py-2 rounded-lg text-sm font-medium hover:bg-amber-100 hover:text-amber-700',
            'text-amber-700 bg-amber-100' => request()->routeIs('show')
        ])>Dashboard</a>
        @can('view_episodes', $podcast)
            <a href="{{ route('episodes', ['show' => $podcast->id]) }}" @class([
                'block w-full my-1 px-3 py-2 rounded-lg text-sm font-medium hover:bg-amber-100 hover:text-amber-700',
                'text-amber-700 bg-amber-100' => request()->routeIs('episodes')
            ])>Episodes</a>
        @endcan
        @if ($podcast->isReadyToDistribute())
            @can('manage_social', $podcast)
                <a href="{{ route('show.social', ['show' => $podcast->id]) }}" @class([
                    'block w-full my-1 px-3 py-2 rounded-lg text-sm font-medium hover:bg-amber-100 hover:text-amber-700',
                    'text-amber-700 bg-amber-100' => request()->routeIs('show.social')
                ])>Social</a>
            @endcan
            @can('manage_distribution', $podcast)
                <a href="{{ route('show.distribution', ['show' => $podcast->id]) }}" @class([
                    'block w-full my-1 px-3 py-2 rounded-lg text-sm font-medium hover:bg-amber-100 hover:text-amber-700',
                    'text-amber-700 bg-amber-100' => request()->routeIs('show.distribution')
                ])>Distribution</a>
            @endcan

            @if (config('app.env') === 'local')
                @can('manage_website', $podcast)
                    <a href="{{ route('show.website', ['show' => $podcast->id]) }}" @class([
                        'block w-full my-1 px-3 py-2 rounded-lg text-sm font-medium hover:bg-amber-100 hover:text-amber-700',
                        'text-amber-700 bg-amber-100' => request()->routeIs('show.website')
                    ])>Website</a>
                @endcan
            @endif
        @endif
        @can('view_users', $podcast)
            <a href="{{ route('show.users', ['show' => $podcast->id]) }}"@class([
                'block w-full my-1 px-3 py-2 rounded-lg text-sm font-medium hover:bg-amber-100 hover:text-amber-700',
                'text-amber-700 bg-amber-100' => request()->routeIs('show.users')
            ])>Team</a>
        @endcan
        @can('edit_podcast', $podcast)
            <a href="{{ route('show.settings', ['show' => $podcast->id]) }}"@class([
                'block w-full my-1 px-3 py-2 rounded-lg text-sm font-medium hover:bg-amber-100 hover:text-amber-700',
                'text-amber-700 bg-amber-100' => request()->routeIs('show.settings')
            ])>Settings</a>
        @endcan
    </div>
</div>
