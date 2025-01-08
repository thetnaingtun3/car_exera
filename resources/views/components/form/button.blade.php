@props(['color' => 'primary'])

@php
    $buttonClasses = match ($color) {
        'primary'
            => 'bg-blue-500 text-white hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:ring-indigo-500 ',
        'secondary'
            => 'bg-gray-800 text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500',
        'success' => 'bg-green-500 text-white hover:bg-green-800 focus:bg-green-700 active:bg-gray-900 focus:ring-green-800',
        'tertiary' => 'bg-red-500 text-white hover:bg-red-800 focus:bg-red-700 active:bg-gray-900 focus:ring-red-800',
        'quaternary' => 'bg-white-400 text-gray-700 hover:bg-white-500 focus:bg-white-800 active:bg-white-900 focus:ring-white-800',
    };
@endphp

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => "$buttonClasses border border-transparent tracking-widest rounded-md font-semibold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2  mr-1 ease-linear transition-all duration-150"]) }}>
    {{ $slot }}
</button>
