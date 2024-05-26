{{--<x-button.base--}}
{{--    {{ $attributes->merge(['class' => 'text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 border-indigo-600']) }}--}}
{{-->--}}
{{--    {{ $slot }}--}}
{{--</x-button.base>--}}


<x-button.base
    {{ $attributes->merge(['class' => 'inline-block text-white transition-all rounded-md shadow-md
                bg-gradient-to-r from-red-600 to-red-600 hover:bg-gradient-to-b dark:shadow-red-900
                shadow-red-200 hover:shadow-2xl hover:shadow-red-400 hover:-tranneutral-y-px']) }}
>
    {{ $slot }}
</x-button.base>

