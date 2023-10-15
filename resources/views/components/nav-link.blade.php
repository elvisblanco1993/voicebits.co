@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block items-center whitespace-nowrap px-3 py-0.5 bg-slate-200 rounded-full text-sm font-medium tracking-wide leading-6 text-black focus:outline-none transition'
            : 'block items-center whitespace-nowrap px-3 py-0.5 rounded-full text-sm font-medium tracking-wide leading-6 text-gray-500 hover:text-black hover:bg-slate-300 focus:outline-none focus:bg-slate-200 focus:text-black transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
