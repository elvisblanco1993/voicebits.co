<div class="mt-2 space-y-3">
    @if ($podcast->podcastindex)
        <a href="{{ $podcast->podcastindex }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-red-500 transition-all">
            <span>{{ __("Podcast Index") }}</span>
        </a>
    @endif
    @if ($podcast->google)
        <a href="{{ $podcast->google }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-blue-400 transition-all">
            <span>{{ __("Google Podcasts") }}</span>
        </a>
    @endif
    @if ($podcast->spotify)
        <a href="{{ $podcast->spotify }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-green-400 transition-all">
            <span>{{ __("Spotify") }}</span>
        </a>
    @endif
    @if ($podcast->apple)
        <a href="{{ $podcast->apple }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#9933CC] transition-all">
            <span>{{ __("Apple Podcasts") }}</span>
        </a>
    @endif
    @if ($podcast->stitcher)
        <a href="{{ $podcast->stitcher }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-black transition-all">
            <span>{{ __("Stitcher") }}</span>
        </a>
    @endif
    @if ($podcast->pocketcasts)
        <a href="{{ $podcast->pocketcasts }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#F43E37] transition-all">
            <span>{{ __("Pocket Casts") }}</span>
        </a>
    @endif
    @if ($podcast->amazon)
        <a href="{{ $podcast->amazon }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#FF9900] transition-all">
            <span>{{ __("Amazon Music") }}</span>
        </a>
    @endif
    @if ($podcast->pandora)
        <a href="{{ $podcast->pandora }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#224099] transition-all">
            <span>{{ __("Pandora") }}</span>
        </a>
    @endif
    @if ($podcast->iheartradio)
        <a href="{{ $podcast->iheartradio }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#C6002B] transition-all">
            <span>{{ __("iHeartRadio") }}</span>
        </a>
    @endif
    @if ($podcast->castbox)
        <a href="{{ $podcast->castbox }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#F55B23] transition-all">
            <span>{{ __("Castbox") }}</span>
        </a>
    @endif
    @if ($podcast->podcastaddict)
        <a href="{{ $podcast->podcastaddict }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#F4842D] transition-all">
            <span>{{ __("Podcast Addict") }}</span>
        </a>
    @endif
    @if ($podcast->deezer)
        <a href="{{ $podcast->deezer }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#FEAA2D] transition-all">
            <span>{{ __("Deezer") }}</span>
        </a>
    @endif
    @if ($podcast->castro)
        <a href="{{ $podcast->castro }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-3 py-1.5 border rounded text-sm text-slate-600 hover:border-[#00B265] transition-all">
            <span>{{ __("Castro") }}</span>
        </a>
    @endif
</div>
