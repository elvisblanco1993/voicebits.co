<div>
    <div class="max-w-7xl mx-auto py-4">
        <div class="flex items-center">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-md object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-md bg-violet-50 flex items-center justify-center">
                    <img src="{{ asset('logo-mark-dark.svg') }}" alt="{{ $podcast->name }}" class="w-6 h-auto">
                </div>
            @endif
            <div class="ml-6">
                <h1 class="text-3xl font-bold">{{ $podcast->name }}</h1>
                @if ($podcast->url)
                    <a href="{{ route('public.podcast.website', ['url' => $podcast->url]) }}" target="_blank" class="text-sm bg-slate-200 text-slate-700 px-1 py-0.5 rounded">Visit website</a>
                @endif
            </div>
        </div>
    </div>
    <ul class="h-10 border-y border-y-violet-50 flex items-center space-x-1 overflow-x-scroll">
        <x-nav-link href="{{ route('podcast.dashboard') }}" :active="request()->routeIs('podcast.dashboard')">Dashboard</x-nav-link>
        @can('view_episodes')
            <x-nav-link href="{{ route('podcast.episodes') }}" :active="request()->routeIs('podcast.episodes')">Episodes</x-nav-link>
        @endcan
        @can('manage_contributors')
            <x-nav-link href="{{ route('podcast.contributors') }}" :active="request()->routeIs('podcast.contributors')">People</x-nav-link>
        @endcan
        @can('manage_social')
            <x-nav-link href="{{ route('podcast.social') }}" :active="request()->routeIs('podcast.social')">Social media</x-nav-link>
        @endcan
        @if ($podcast->url)
            @can('manage_distribution')
                <x-nav-link href="{{ route('podcast.distribution') }}" :active="request()->routeIs('podcast.distribution')">Distribution</x-nav-link>
            @endcan
            @can('manage_website')
                <x-nav-link href="{{ route('podcast.website') }}" :active="request()->routeIs('podcast.website')">Website</x-nav-link>
            @endcan
        @endif
        @can('view_users')
            <x-nav-link href="{{ route('podcast.team') }}" :active="request()->routeIs('podcast.team')">Team</x-nav-link>
        @endcan
        @can('edit_podcast')
            <x-nav-link href="{{ route('podcast.settings') }}" :active="request()->routeIs('podcast.settings')">Podcast Settings</x-nav-link>
        @endcan
    </ul>
</div>
