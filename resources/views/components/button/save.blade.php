<button type="submit" wire:click.prevent="save"
    {{ $attributes->merge(['class' => '
                                inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                transition-all shadow-xs
                                bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-blue-200 hover:shadow-2xl hover:shadow-blue-200 hover:-tranneutral-y-px'])}}
>
    <x-icons.icon :icon="'save'" class="h-5 w-auto block px-1.5"/>
    SAVE
</button>
