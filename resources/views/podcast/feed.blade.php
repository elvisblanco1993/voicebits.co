<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="{{ asset('styles/feed.xsl') }}"?>
<rss version="2.0"
    xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
    xmlns:podcast="https://podcastindex.org/namespace/1.0"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
>
    <channel>
        <atom:link xmlns:atom="http://www.w3.org/2005/Atom" rel="self" type="application/rss+xml" href="{{ url()->current() }}" title="MP3 Podcast Audio"/>
        <atom:link rel="hub" href="https://pubsubhubbub.appspot.com/"/>
        <podcast:podping usesPodping="true"/>
        <podcast:medium>podcast</podcast:medium>

        <generator>{{ config('app.url') }}</generator>
        <podcast:guid>{{$podcast->guid}}</podcast:guid>
        <title>{{ $podcast->name }}</title>
        <itunes:subtitle>{{ $podcast->name }}</itunes:subtitle>
        <description><![CDATA[{{ $podcast->description }}]]></description>
        <copyright>{{ $podcast->copyright }}</copyright>
        @if ($podcast->txt)
            <podcast:txt purpose="verify">{{$podcast->txt}}</podcast:txt>
        @endif
        <language>{{ $podcast->language }}</language>
        <pubDate>{{ date(DateTime::RFC2822, strtotime($podcast->created_at)) }}</pubDate>
        <lastBuildDate>{{ date(DateTime::RFC2822, strtotime(now())) }}</lastBuildDate>
        <image>
            <url>{{ route('public.podcast.cover', ['url' => $podcast->url]) . '?aid=rss_feed' }}</url>
            <title>{{ $podcast->name }}</title>
            <link>{{ route('public.podcast.website', ['url' => $podcast->url]) }}</link>
        </image>
        <link>{{ route('public.podcast.website', ['url' => $podcast->url]) }}</link>
        <itunes:type>{{ $podcast->type }}</itunes:type>
        <itunes:summary><![CDATA[{{ $podcast->description }}]]></itunes:summary>
        <itunes:author>{{ $podcast->author }}</itunes:author>
        <itunes:explicit>{{ ($podcast->explicit) ? 'true' : 'false' }}</itunes:explicit>
        <itunes:image href="{{ route('public.podcast.cover', ['url' => $podcast->url]) }}?aid=rss_feed"/>
        <itunes:owner>
            <itunes:name>{{ $podcast->author }}</itunes:name>
            <itunes:email>{{ $podcast->owner()->email }}</itunes:email>
        </itunes:owner>
        <itunes:category text="{{ $podcast->category }}" />
        <itunes:complete>{{$podcast->is_completed ? 'yes' : 'no'}}</itunes:complete>
        @if ($podcast->is_locked || $podcast->visibility === 'PRIVATE')
            <podcast:locked>yes</podcast:locked>
        @else
            <podcast:locked>no</podcast:locked>
        @endif
        @if ($podcast->funding)
            <podcast:funding url="{{ $podcast->funding_url }}">{{ $podcast->funding_text }}</podcast:funding>
        @endif
        @forelse ($podcast->contributors as $contributor)
            @if ($contributor->is_default)
                <podcast:person name="{{ $contributor->name }}" role="{{ strtolower($contributor->role) }}" img="{{ asset($contributor->avatar) }}" href="{{ $contributor->website }}">{{ $contributor->bio }}</podcast:person>
            @endif
        @empty
        @endforelse

        @forelse ($podcast->episodes as $episode)
            @if (!$episode->blocked)
                <item>
                    <guid isPermaLink="false">{{ $episode->guid }}</guid>
                    <title>{{ $episode->title }}</title>
                    <description><![CDATA[{{ $episode->description }}]]></description>
                    <pubDate>{{ date(DateTime::RFC2822, strtotime($episode->created_at)) }}</pubDate>
                    <author>{{ $podcast->owner()->email }} ({{ $podcast->author }})</author>
                    <link>{{ route('public.podcast.website', ['url' => $podcast->url]) }}</link>
                    @if ($podcast->funding)
                        <podcast:funding url="{{ $podcast->funding_url }}">{{ $podcast->funding_text }}</podcast:funding>
                    @endif
                    @if ($episode->cover)
                        <itunes:image href="{{Storage::url($episode->cover)}}" />
                    @endif
                    @forelse ($episode->contributors as $contributor)
                        <podcast:person role="{{ $contributor->role }}" href="{{ $contributor->website }}" img="{{ asset($contributor->avatar) }}">{{ $contributor->name }}</podcast:person>
                    @empty
                    @endforelse
                    <content:encoded><![CDATA[{{ $episode->description }}]]></content:encoded>
                    <enclosure length="{{ $episode->track_size }}" type="audio/mpeg"
                        url="{{ route('public.episode.play', ['url' => $podcast->url, 'episode' => $episode->guid, 'player' => $player]) }}" />
                    <itunes:title>{{ $episode->title }}</itunes:title>
                    <itunes:author>{{ $podcast->author }}</itunes:author>
                    <itunes:duration>{{ $episode->track_length }}</itunes:duration>
                    <itunes:summary>
                        <![CDATA[{{ str($episode->description)->limit(180) }}...]]>
                    </itunes:summary>
                    <itunes:subtitle><![CDATA[{{ str($episode->description)->limit(180) }}...]]></itunes:subtitle>
                    <itunes:explicit>{{ ($episode->explicit) ? "true" : "false" }}</itunes:explicit>
                    <itunes:episodeType>{{ $episode->type }}</itunes:episodeType>
                    @if ($episode->podcast->type == "serial")
                        <itunes:episode>{{ $episode->number }}</itunes:episode>
                        <itunes:season>{{ $episode->season }}</itunes:season>
                    @endif
                    @if ($episode->transcript)
                        <podcast:transcript url="{{ route('public.podcast.transcript', ['url' => $podcast->url, 'episode' => $episode->guid]) }}" type="text/plain" />
                    @endif
                    <itunes:block>{{ $episode->blocked ? 'yes' : 'no' }}</itunes:block>
                </item>
            @endif
        @empty

        @endforelse
    </channel>
</rss>
