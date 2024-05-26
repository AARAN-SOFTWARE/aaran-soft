<!-- Delete Record -->
<x-modal.confirmation wire:model.defer="showDeleteModal">
    <x-slot name="title">Delete Entry</x-slot>
    <x-slot name="content">
        <div class="py-8 text-cool-gray-700 ">Are you sure you? This action is irreversible.</div>
    </x-slot>
    <x-slot name="footer">
        <div class="gap-5">
            <x-button.secondary wire:click.prevent="$set('showDeleteModal', false)">Cancel</x-button.secondary>

            <x-button.primary wire:click.prevent="delete">Delete</x-button.primary>
        </div>
    </x-slot>
</x-modal.confirmation>
