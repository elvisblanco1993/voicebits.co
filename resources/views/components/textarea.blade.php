@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-slate-200 focus:ring focus:ring-amber-100 focus:outline-none rounded-md block outline-none focus:border-amber-200']) !!}></textarea>
