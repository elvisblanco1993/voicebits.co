@if ($podcast->apple)
<a href="{{ $podcast->apple }}" class="podcatcher-link">Listen on Apple Podcasts</a>
@endif
@if ($podcast->spotify)
<a href="{{ $podcast->spotify }}" class="podcatcher-link">Listen on Spotify</a>
@endif

@if ($podcast->google)
<a href="{{ $podcast->google }}" class="podcatcher-link">Listen on Google Podcasts</a>
@endif

@if ($podcast->stitcher)
<a href="{{ $podcast->stitcher }}" class="podcatcher-link">Listen on Stitcher</a>
@endif

@if ($podcast->pocketcasts)
<a href="{{ $podcast->pocketcasts }}" class="podcatcher-link">Listen on Pocket Casts</a>
@endif

@if ($podcast->amazon)
<a href="{{ $podcast->amazon }}" class="podcatcher-link">Listen on Amazon Music</a>
@endif

@if ($podcast->pandora)
<a href="{{ $podcast->pandora }}" class="podcatcher-link">Listen on Pandora</a>
@endif

@if ($podcast->iheartradio)
<a href="{{ $podcast->iheartradio }}" class="podcatcher-link">Listen on iHeartRadio</a>
@endif

@if ($podcast->castbox)
<a href="{{ $podcast->castbox }}" class="podcatcher-link">Listen on Castbox</a>
@endif

@if ($podcast->deezer)
<a href="{{ $podcast->deezer }}" class="podcatcher-link">Listen on Deezer</a>
@endif

@if ($podcast->castro)
<a href="{{ $podcast->castro }}" class="podcatcher-link">Listen on Castro</a>
@endif
<a href="{{ route('show.feed', ['url' => $podcast->url, 'player' => 'rss']) }}" class="podcatcher-link">RSS Feed</a>
