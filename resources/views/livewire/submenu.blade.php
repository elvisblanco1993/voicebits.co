<div>
    <ul class="h-10 border-b border-b-slate-100 flex items-center space-x-1 overflow-x-scroll">
        <x-nav-link href="{{ route('podcast.dashboard') }}" :active="request()->routeIs('podcast.dashboard')">Dashboard</x-nav-link>
        @can('view_episodes')
            <x-nav-link href="{{ route('podcast.episodes') }}" :active="request()->routeIs('podcast.episodes')">Episodes</x-nav-link>
        @endcan
        @can('manage_social')
            <x-nav-link href="{{ route('podcast.social') }}" :active="request()->routeIs('podcast.social')">Social media</x-nav-link>
        @endcan
        @if ($podcast->url)
            @can('manage_distribution')
                <x-nav-link href="{{ route('podcast.distribution') }}" :active="request()->routeIs('podcast.distribution')">Distribution</x-nav-link>
            @endcan
            @if (config('app.env') == 'local')
                @can('manage_website')
                    <x-nav-link href="{{ route('podcast.website') }}" :active="request()->routeIs('podcast.website')">Website</x-nav-link>
                @endcan
            @endif
        @endif
        @can('view_users')
            <x-nav-link href="{{ route('podcast.team') }}" :active="request()->routeIs('podcast.team')">Team</x-nav-link>
        @endcan
        @can('edit_podcast')
            <x-nav-link href="{{ route('podcast.settings') }}" :active="request()->routeIs('podcast.settings')">Podcast Settings</x-nav-link>
        @endcan
    </ul>
</div>
