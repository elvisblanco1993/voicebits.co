@php
   echo "<?xml version='1.0' encoding='UTF-8'?>" . PHP_EOL;
@endphp
<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">
    <channel>
        <title>{{ $podcast->name }}</title>
        <description>{{ $podcast->description }}</description>
        <link>{{ config('app.url') . "/shows/" . $podcast->url }}</link>
        <image>
            <url>{{ asset($podcast->cover) }}</url>
            <title>{{ $podcast->name }}</title>
            <link>{{ config('app.url') . "/shows/" . $podcast->url }}</link>
        </image>
        <generator>Voicebits Podcasts</generator>
        <lastBuildDate>{{ date('r', strtotime(now())) }}</lastBuildDate>
        <author>{{ $podcast->author }}</author>
        <copyright>{{ $podcast->author }}</copyright>
        <language>{{ $podcast->language }}</language>
        <itunes:author>{{ $podcast->author }}</itunes:author>
        <itunes:summary>{{ $podcast->description }}</itunes:summary>
        <itunes:type>{{ $podcast->type }}</itunes:type>
        <itunes:owner>
            <itunes:name>{{ $podcast->author }}</itunes:name>
            <itunes:email>{{ $podcast->team->owner->email }}</itunes:email>
        </itunes:owner>
        <itunes:explicit>{{ ($podcast->explicit) ? "Yes" : "No" }}</itunes:explicit>
        <itunes:category text="{{ $podcast->category }}" />
        <itunes:image href="{{ asset($podcast->cover) }}" />
        @forelse ($podcast->episodes as $episode)
            <item>
                <title>{{ $episode->title }}</title>
                <description>{{ $episode->description }}</description>
                <guid>{{ $episode->guid }}</guid>
                <pubDate>{{ date('r', strtotime($episode->created_at)) }}</pubDate>
                <enclosure length="{{ $episode->track_size }}" type="audio/mpeg" url="{{ route('episode.play', ['url' => $podcast->url, 'episode' => $episode->guid]) }}"/>
                <itunes:summary>{{ $episode->description }}</itunes:summary>
                <itunes:explicit>{{ ($episode->explicit) ? "Yes" : "No" }}</itunes:explicit>
                <itunes:duration>{{ $episode->track_length }}</itunes:duration>
                @if ($episode->cover)
                    <itunes:image href="{{ asset($episode->cover) }}"/>
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
