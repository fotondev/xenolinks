@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-2 mt-4 border-t-2 border-r-2 border-l-2  border-sky-500 text-base text-sky-500 font-bold leading-5 text-gray-900 hover:text-sky-300 focus:outline-none bg-gray-700 focus:border-indigo-700 transition duration-150 ease-in-out rounded'
            : 'inline-flex items-center px-2 mt-4 border-b border-transparent text-base font-bold leading-5 text-gray-700 hover:text-gray-900 hover:bg-gradient-to-b from-sky-500 to-sky-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out rounded';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
