<x-mail::layout>
{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© @lang('This email was delivered by Voicebits.co'). Click here to [unsubscribe](https://voicebits.co/subscription/opt-out)
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
