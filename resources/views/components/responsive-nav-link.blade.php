@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-winnicode-pink dark:border-purple-dark-400 text-start text-base font-medium text-winnicode-pink dark:text-purple-dark-400 bg-pink-light-50 dark:bg-purple-dark-900/30 focus:outline-none focus:text-pink-700 dark:focus:text-purple-dark-300 focus:bg-pink-light-100 dark:focus:bg-purple-dark-800 focus:border-winnicode-pink dark:focus:border-purple-dark-400 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-pink-light-50 dark:hover:bg-purple-dark-800 hover:border-pink-light-300 dark:hover:border-purple-dark-500 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-pink-light-50 dark:focus:bg-purple-dark-800 focus:border-pink-light-300 dark:focus:border-purple-dark-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
