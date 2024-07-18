<div>
    <x-slot name="header">Zync</x-slot>

    <x-forms.m-panel>

        <div class="flex gap-3">

            <button wire:click="clients" class="bg-lime-500 px-2 py-2 rounded-md">Clients</button>

            <button wire:click="rootLine" class="bg-amber-500 px-2 py-2 rounded-md">Rootline</button>

            <button wire:click="rootLineItems" class="bg-green-500 px-2 py-2 rounded-md text-white">
                Rootline Items
            </button>

            <button wire:click="rootLineItems" class="bg-blue-500 px-2 py-2 rounded-md text-white">
                Sales Track
            </button>

            <button wire:click="rootLineItems" class="bg-red-500 px-2 py-2 rounded-md text-white">
                Sales Track Items
            </button>

            <button wire:click="rootLineItems" class="bg-violet-500 px-2 py-2 rounded-md text-white">
                Sales Bill
            </button>

            <button wire:click="rootLineItems" class="bg-gray-500 px-2 py-2 rounded-md text-white">
                Sales Bill Items
            </button>

        </div>

    </x-forms.m-panel>
</div>
