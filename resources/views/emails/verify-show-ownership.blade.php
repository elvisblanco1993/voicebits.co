@component('mail::message')
# Verification of {{ $podcast->name }} is pending.

In order to verify ownership, please make sure that you are logged in using the same account used to submit or claim your podcast.

By clicking the link below you are verifying ownership of this podcast.

@component('mail::button', ['url' => config('app.url') . '/show/' . $podcast->id . '/confirm/' . $uniqid ])
Confirm Ownership
@endcomponent

If you did not request to verify ownership of this podcast, please contact <a href="mailto:support@voicebits.co">support@voicebits.co</a>
@endcomponent
