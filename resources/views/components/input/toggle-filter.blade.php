@props([
'showFilters'=>false
])
<button wire:click="toggleShowFilters"
        class="md:w-3 mb-8 md:mb-1 md:mt-2 ml-1.5 ">
    <x-icons.icon :icon="$showFilters ? 'cog':'adjustments'" class="h-6 w-auto block"/>
</button>
