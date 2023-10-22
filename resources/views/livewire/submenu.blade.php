<div>
    <div class="max-w-5xl mx-auto py-4">
        <div class="flex items-center">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-md object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-md bg-gradient-to-tr from-indigo-50 to-indigo-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                    </svg>
                </div>
            @endif
            <div class="ml-6">
                <h1 class="text-3xl font-bold">{{ $podcast->name }}</h1>
                @if ($podcast->url && !$podcast->isPrivate() && $podcast->episodes->count() > 0)
                    <a href="{{ route('public.podcast.website', ['url' => $podcast->url]) }}" target="_blank" class="text-sm bg-slate-200 text-slate-700 px-1 py-0.5 rounded">Visit website</a>
                @endif
            </div>
        </div>
    </div>
    <ul class="h-12 flex items-center space-x-1 overflow-x-scroll sm:overflow-x-hidden">
        <x-nav-link href="{{ route('podcast.dashboard') }}" :active="request()->routeIs('podcast.dashboard')">Dashboard</x-nav-link>
        @can('view_episodes')
            @if (!$podcast->is_completed)
                <x-nav-link href="{{ route('podcast.episodes') }}" :active="request()->routeIs('podcast.episodes')">Episodes</x-nav-link>
            @endif
        @endcan
        @if ($podcast->isPrivate())
            <x-nav-link href="{{ route('podcast.subscribers') }}" :active="request()->routeIs('podcast.subscribers')">Subscribers</x-nav-link>
        @endif
        @can('manage_social')
            @if (!$podcast->isPrivate())
                <x-nav-link href="{{ route('podcast.social') }}" :active="request()->routeIs('podcast.social')">Social media</x-nav-link>
            @endif
        @endcan
        @if ($podcast->url && !$podcast->isPrivate())
            @can('manage_contributors')
                <x-nav-link href="{{ route('podcast.contributors') }}" :active="request()->routeIs('podcast.contributors')">People</x-nav-link>
            @endcan
            @if ($podcast->episodes->count() > 0)
                @can('manage_distribution')
                    <x-nav-link href="{{ route('podcast.distribution') }}" :active="request()->routeIs('podcast.distribution')">Distribution</x-nav-link>
                @endcan
                @can('manage_website')
                    <x-nav-link href="{{ route('podcast.website') }}" :active="request()->routeIs('podcast.website')">Website</x-nav-link>
                @endcan
            @endif
        @endif
        @can('view_users')
            <x-nav-link href="{{ route('podcast.team') }}" :active="request()->routeIs('podcast.team')">Team</x-nav-link>
        @endcan
        @can('edit_podcast')
            <x-nav-link href="{{ route('podcast.settings') }}" :active="request()->routeIs('podcast.settings')">Settings</x-nav-link>
        @endcan
    </ul>
</div>
