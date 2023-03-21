@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block items-center whitespace-nowrap px-3 py-0.5 bg-indigo-500 rounded-full text-sm font-medium tracking-wide leading-6 text-white focus:outline-none transition'
            : 'block items-center whitespace-nowrap px-3 py-0.5 rounded-full text-sm font-medium tracking-wide leading-6 text-gray-500 hover:text-white hover:bg-indigo-500 focus:outline-none focus:text-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
