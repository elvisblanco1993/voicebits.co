<x-mail::message>
# Welcome to {{ $subscriber->podcast->name }}

<div style="margin: 10px 0 10px; border-top: 1px solid #e2e8f0"></div>

You've been subscribed to the **{{ $subscriber->podcast->name }}** podcast by **{{ $subscriber->podcast->author }}**.

Stay updated in real-time! Open the link below on your phone and tap it to add this podcast to your preferred podcast player.

[Open podcast]({{ route('private.podcast.website', ['token' => $subscriber->token]) }})

@if ($subscriber->podcast->passkey)
Podcast password: {{ base64_decode($subscriber->podcast->passkey) }}
@endif

Thanks,<br>
{{ $subscriber->podcast->author }}
</x-mail::message>
