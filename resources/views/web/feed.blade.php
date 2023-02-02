@php
   echo "<?xml version='1.0' encoding='UTF-8'?>" . PHP_EOL;
@endphp
<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title>{{ $podcast->name }}</title>
        <description>{{ $podcast->description }}</description>
        <atom10:link
            xmlns:atom10="http://www.w3.org/2005/Atom"
            rel="self"
            type="application/rss+xml"
            href="{{ url()->current() }}"
        />
        <link>{{ config('app.url') . "/s/" . $podcast->url }}</link>
        <image>
            <url>{{ Storage::url($podcast->cover) }}</url>
            <title>{{ $podcast->name }}</title>
            <link>{{ config('app.url') . "/s/" . $podcast->url }}</link>
        </image>
        <generator>Voicebits Podcasts</generator>
        <lastBuildDate>{{ date('r', strtotime(now())) }}</lastBuildDate>
        <itunes:author>{{ $podcast->author }}</itunes:author>
        <copyright>{{ $podcast->author }}</copyright>
        <language>{{ $podcast->language }}</language>
        <itunes:summary>{{ $podcast->description }}</itunes:summary>
        <itunes:type>{{ $podcast->type }}</itunes:type>
        <itunes:owner>
            <itunes:name>{{ $podcast->author }}</itunes:name>
            <itunes:email>{{ $podcast->owner()->email }}</itunes:email>
        </itunes:owner>
        <itunes:explicit>{{ ($podcast->explicit) ? "Yes" : "No" }}</itunes:explicit>
        <itunes:category text="{{ $podcast->category }}" />
        <itunes:image href="{{ Storage::url($podcast->cover) }}" />
        <itunes:block>{{ $podcast->is_locked ? 'yes' : 'no' }}</itunes:block>
        @if ($podcast->funding)
            <podcast:funding url="{{ $podcast->funding_url }}">{{ $podcast->funding_text }}</podcast:funding>
        @endif
        @forelse ($podcast->episodes as $episode)
            <item>
                <link>{{ config('app.url') . "/s/" . $podcast->url }}</link>
                <title>{{ $episode->title }}</title>
                <itunes:title>{{ $episode->title }}</itunes:title>
                <description>{{ $episode->description }}</description>
                <guid isPermaLink="false">{{ $episode->guid }}</guid>
                <pubDate>{{ date(DateTime::RFC2822, strtotime($episode->created_at)) }}</pubDate>
                <enclosure length="{{ $episode->track_size }}" type="audio/mpeg" url="{{ route('episode.play', ['url' => $podcast->url, 'episode' => $episode->guid, 'player' => $player]) }}"/>
                <itunes:summary>{{ $episode->description }}</itunes:summary>
                <itunes:explicit>{{ ($episode->explicit) ? "true" : "false" }}</itunes:explicit>
                <itunes:duration>{{  ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}</itunes:duration>
                <itunes:episodeType>{{ $episode->type }}</itunes:episodeType>
                <itunes:block>{{ $podcast->is_locked ? 'yes' : 'no' }}</itunes:block>
                @if ($episode->cover)
                    <itunes:image href="{{ Storage::url($episode->cover) }}"/>
                @endif
                @if ($episode->podcast->type === "serial")
                    <itunes:episode>{{ $episode->number }}</itunes:episode>
                    <itunes:season>{{ $episode->season }}</itunes:season>
                @endif
            </item>
        @empty
        @endforelse
    </channel>
</rss>
