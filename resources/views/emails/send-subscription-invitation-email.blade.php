<x-mail::message>
# {{ $subscriber->podcast->name }}

<div style="margin: 10px 0 10px; border-top: 1px solid #e2e8f0"></div>

**{{ $subscriber->podcast->author }}** added you as a subscriber to their private podcast **{{ $subscriber->podcast->name }}**.

Open the link below to confirm or decline your subscription.

[Verify subscription]({{ route('private.podcast.confirm', ['url' => $subscriber->podcast->url, 'token' => $subscriber->token]) }})

Thanks,<br>
{{ $subscriber->podcast->author }}
</x-mail::message>
