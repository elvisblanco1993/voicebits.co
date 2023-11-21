<div id="nav">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-start space-x-6 text-sm font-medium uppercase tracking-wider nav-container">
            <a @class(['nav-link transition-all', 'nav-link-selected' => request()->routeIs('public.podcast.website')])
                href="/"
                wire:navigate
            >{{__("Home")}}</a>

            <a @class(['nav-link transition-all', 'nav-link-selected' => request()->routeIs('public.podcast.episodes')])
                href="{{ route('public.podcast.episodes', ['url' => $podcast->url]) }}"
                wire:navigate
            >{{__("Episodes")}}</a>

            <a @class(['nav-link transition-all', 'nav-link-selected' => request()->routeIs('public.podcast.people')])
                href="{{ route('public.podcast.people', ['url' => $podcast->url]) }}"
                wire:navigate
            >{{__("People")}}</a>

            <a @class(['nav-link transition-all', 'nav-link-selected' => request()->routeIs('public.podcast.subscribe')])
                href="{{ route('public.podcast.subscribe', ['url' => $podcast->url]) }}"
                wire:navigate
            >{{__("Subscribe")}}</a>
        </nav>
    </div>
</div>
