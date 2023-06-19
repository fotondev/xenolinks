@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-2  text-base font-bold leading-5 text-gray-300 bg-secondary hover:text-gray-500 focus:outline-none  focus:border-indigo-700 transition duration-150 ease-in-out '
            : 'inline-flex items-center px-2  text-base font-bold leading-5 text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
