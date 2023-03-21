<div>
    <ul class="h-10 border-b border-b-slate-100 flex items-center space-x-1 overflow-x-scroll">
        <x-nav-link href="{{ route('podcast.dashboard') }}" :active="request()->routeIs('podcast.dashboard')">Dashboard</x-nav-link>
        <x-nav-link href="{{ route('podcast.episodes') }}" :active="request()->routeIs('podcast.episodes')">Episodes</x-nav-link>
        <x-nav-link href="{{ route('podcast.social') }}" :active="request()->routeIs('podcast.social')">Social media</x-nav-link>
        <x-nav-link href="{{ route('podcast.distribution') }}" :active="request()->routeIs('podcast.distribution')">Distribution</x-nav-link>
        <x-nav-link href="{{ route('podcast.website') }}" :active="request()->routeIs('podcast.website')">Website</x-nav-link>
        <x-nav-link href="{{ route('podcast.team') }}" :active="request()->routeIs('podcast.team')">Team</x-nav-link>
        <x-nav-link href="{{ route('podcast.settings') }}" :active="request()->routeIs('podcast.settings')">Podcast Settings</x-nav-link>
    </ul>
</div>
