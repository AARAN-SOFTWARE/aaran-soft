<div>
    <x-slot name="header">Zync</x-slot>

    <x-forms.m-panel>

        <div class="flex gap-3">

            <button wire:click="clients" class="bg-lime-500 px-2 py-2 rounded-md">Clients</button>

            <button wire:click="vehicles" class="bg-lime-500 px-2 py-2 rounded-md">Vehicles</button>

            <button wire:click="products" class="bg-lime-500 px-2 py-2 rounded-md">Products</button>

            <button wire:click="categories" class="bg-lime-500 px-2 py-2 rounded-md">Category</button>

            <button wire:click="colours" class="bg-lime-500 px-2 py-2 rounded-md">Colours</button>

            <button wire:click="sizes" class="bg-lime-500 px-2 py-2 rounded-md">Size</button>

        </div>

        <div class="flex gap-3">

            <button wire:click="rootLine" class="bg-amber-500 px-2 py-2 rounded-md">Rootline</button>

            <button wire:click="rootLineItems" class="bg-green-500 px-2 py-2 rounded-md text-white">
                Rootline Items
            </button>

            <button wire:click="salesTracks" class="bg-blue-500 px-2 py-2 rounded-md text-white">
                Sales Track
            </button>

            <button wire:click="salesTracksItems" class="bg-red-500 px-2 py-2 rounded-md text-white">
                Sales Track Items
            </button>

            <button wire:click="salesBills" class="bg-violet-500 px-2 py-2 rounded-md text-white">
                Sales Bill
            </button>

            <button wire:click="salesBillsItems" class="bg-gray-500 px-2 py-2 rounded-md text-white">
                Sales Bill Items
            </button>

        </div>

    </x-forms.m-panel>
</div>
