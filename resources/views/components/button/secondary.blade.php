<x-button.base
    {{ $attributes->merge(['class' => 'bg-gray-400 text-white hover:bg-gray-500 active:bg-gray-700 border-indigo-600']) }}
>
    {{ $slot }}
</x-button.base>
