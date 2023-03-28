@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-slate-200 focus:ring focus:ring-indigo-100 focus:outline-none rounded-md block outline-none focus:border-indigo-400']) !!}>
