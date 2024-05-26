<button wire:click="getRoute"
    {{ $attributes->merge(['class' => '
                                inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                transition-all shadow-xs bg-gradient-to-r from-gray-600 to-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 hover:bg-gradient-to-b dark:shadow-gray-900
                                shadow-gray-200 hover:shadow-2xl hover:shadow-gray-300 hover:-tranneutral-y-px'])}}>
    <x-icons.icon :icon="'backward'" class="h-5 w-auto block px-1.5"/>
    Back
</button>


