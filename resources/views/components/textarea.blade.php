@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-sky-500 focus:ring focus:ring-sky-100 rounded-lg shadow-sm']) !!}></textarea>
