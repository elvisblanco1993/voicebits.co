<span class="font-semibold">Also available on:</span>
<a href="{{ route('show.feed', ['url' => $podcast->url]) }}" class="header-link">RSS</a>
@if ($podcast->apple)
    <a href="{{ $podcast->apple }}" class="header-link">Apple Podcasts</a>
@endif
@if ($podcast->spotify)
    <a href="{{ $podcast->spotify }}" class="header-link">Spotify</a>
@endif

@if ($podcast->google)
    <a href="{{ $podcast->google }}" class="header-link">Google Podcasts</a>
@endif

@if ($podcast->stitcher)
    <a href="{{ $podcast->stitcher }}" class="header-link">Stitcher</a>
@endif

@if ($podcast->pocketcasts)
    <a href="{{ $podcast->pocketcasts }}" class="header-link">Pocket Casts</a>
@endif

@if ($podcast->amazon)
    <a href="{{ $podcast->amazon }}" class="header-link">Amazon Music</a>
@endif

@if ($podcast->pandora)
    <a href="{{ $podcast->pandora }}" class="header-link">Pandora</a>
@endif

@if ($podcast->iheartradio)
    <a href="{{ $podcast->iheartradio }}" class="header-link">iHeartRadio</a>
@endif

@if ($podcast->castbox)
    <a href="{{ $podcast->castbox }}" class="header-link">Castbox</a>
@endif

@if ($podcast->deezer)
    <a href="{{ $podcast->deezer }}" class="header-link">Deezer</a>
@endif

@if ($podcast->castro)
    <a href="{{ $podcast->castro }}" class="header-link">Castro</a>
@endif
