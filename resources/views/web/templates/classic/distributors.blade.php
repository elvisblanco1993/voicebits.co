@if ($podcast->apple)
<a href="{{ $podcast->apple }}" target="_blank" class="podcatcher-link">Listen on Apple Podcasts</a>
@endif
@if ($podcast->spotify)
<a href="{{ $podcast->spotify }}" target="_blank" class="podcatcher-link">Listen on Spotify</a>
@endif

@if ($podcast->google)
<a href="{{ $podcast->google }}" target="_blank" class="podcatcher-link">Listen on Google Podcasts</a>
@endif

@if ($podcast->stitcher)
<a href="{{ $podcast->stitcher }}" target="_blank" class="podcatcher-link">Listen on Stitcher</a>
@endif

@if ($podcast->pocketcasts)
<a href="{{ $podcast->pocketcasts }}" target="_blank" class="podcatcher-link">Listen on Pocket Casts</a>
@endif

@if ($podcast->amazon)
<a href="{{ $podcast->amazon }}" target="_blank" class="podcatcher-link">Listen on Amazon Music</a>
@endif

@if ($podcast->pandora)
<a href="{{ $podcast->pandora }}" target="_blank" class="podcatcher-link">Listen on Pandora</a>
@endif

@if ($podcast->iheartradio)
<a href="{{ $podcast->iheartradio }}" target="_blank" class="podcatcher-link">Listen on iHeartRadio</a>
@endif

@if ($podcast->castbox)
<a href="{{ $podcast->castbox }}" target="_blank" class="podcatcher-link">Listen on Castbox</a>
@endif

@if ($podcast->deezer)
<a href="{{ $podcast->deezer }}" target="_blank" class="podcatcher-link">Listen on Deezer</a>
@endif

@if ($podcast->castro)
<a href="{{ $podcast->castro }}" target="_blank" class="podcatcher-link">Listen on Castro</a>
@endif
<a href="{{ route('public.podcast.feed', ['url' => $podcast->url, 'player' => 'rss']) }}" target="_blank" class="podcatcher-link">RSS Feed</a>
