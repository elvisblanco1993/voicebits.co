@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-slate-200 focus:border-indigo-500 ring-0 rounded-md block']) !!}>
