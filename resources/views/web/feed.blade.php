@php
    echo "<?xml version='1.0' encoding='UTF-8'?>" . PHP_EOL;
@endphp
<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <atom:link xmlns:atom="http://www.w3.org/2005/Atom" rel="self" type="application/rss+xml" href="{{ url()->current() }}"/>
        <generator>{{ config('app.url') }}</generator>
        <title>{{ $podcast->name }}</title>
        <description>{{ $podcast->description }}</description>
        <copyright>{{ $podcast->author }}</copyright>
        <language>{{ $podcast->language }}</language>
        <pubDate>{{ date(DateTime::RFC2822, strtotime($podcast->created_at)) }}</pubDate>
        <lastBuildDate>{{ date(DateTime::RFC2822, strtotime(now())) }}</lastBuildDate>
        <image>
            <link>{{ config('app.url') . "/s/" . $podcast->url }}</link>
            <title>{{ $podcast->name }}</title>
            <url>
                {{ config('app.url') . "/" . $podcast->cover . "?aid=rss_feed" }}
            </url>
        </image>
        <link>{{ config('app.url') . "/s/" . $podcast->url }}</link>
        <itunes:type>{{ $podcast->type }}</itunes:type>
        <itunes:summary>{{ $podcast->description }}</itunes:summary>
        <itunes:author>{{ $podcast->author }}</itunes:author>
        <itunes:explicit>{{ ($podcast->explicit) ? 'yes' : 'no' }}</itunes:explicit>
        <itunes:image
            href="{{ config('app.url') . '/' . $podcast->cover  . '?aid=rss_feed' }}" />
        <itunes:owner>
            <itunes:name>{{ $podcast->author }}</itunes:name>
            <itunes:email>{{ $podcast->owner()->email }}</itunes:email>
        </itunes:owner>
        <itunes:category text="{{ $podcast->category }}" />
        <itunes:block>{{ $podcast->is_locked ? 'yes' : 'no' }}</itunes:block>
        @if ($podcast->funding)
            <podcast:funding url="{{ $podcast->funding_url }}">{{ $podcast->funding_text }}</podcast:funding>
        @endif

        @forelse ($podcast->episodes as $episode)
            <item>
                <guid isPermaLink="false">{{ $episode->guid }}</guid>
                <title>{{ $episode->title }}</title>
                <description>{{ $episode->description }}</description>
                <pubDate>{{ date(DateTime::RFC2822, strtotime($episode->created_at)) }}</pubDate>
                <author>{{ $podcast->owner()->email }} ({{ $podcast->author }})</author>
                <link>{{ config('app.url') . "/s/" . $podcast->url }}</link>
                <content:encoded>
                    {{ $episode->description }}
                </content:encoded>
                <enclosure length="{{ $episode->track_size }}" type="audio/mpeg"
                    url="{{ route('episode.play', ['url' => $podcast->url, 'episode' => $episode->guid, 'player' => $player]) }}" />
                <itunes:title>{{ $episode->title }}</itunes:title>
                <itunes:author>{{ $podcast->author }}</itunes:author>
                <itunes:duration>{{  ( is_numeric($episode->track_length) ) ? gmdate("H:i:s", (int) $episode->track_length) : $episode->track_length }}</itunes:duration>
                <itunes:summary>{{ str($episode->description)->limit(180) }}...</itunes:summary>
                <itunes:subtitle>{{ str($episode->description)->limit(180) }}...</itunes:subtitle>
                <itunes:explicit>{{ ($episode->explicit) ? "yes" : "no" }}</itunes:explicit>
                <itunes:episodeType>{{ $episode->type }}</itunes:episodeType>
                @if ($episode->podcast->type == "serial")
                    <itunes:episode>{{ $episode->number }}</itunes:episode>
                    <itunes:season>{{ $episode->season }}</itunes:season>
                @endif
            </item>
        @empty

        @endforelse
    </channel>
</rss>
