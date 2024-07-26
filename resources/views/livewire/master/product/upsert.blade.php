<div>
    <x-slot name="header">Product Entry</x-slot>

    <x-forms.m-panel>
        <div class="flex flex-col gap-4">
            <x-input.model-text wire:model="vname" :label="'Name'"/>

            <!-- Product Type ------------------------------------------------------------------------------------->
            <x-input.model-select wire:model="product_type" :label="'Product Type'">
                <option class="text-gray-400"> choose ..</option>
                @foreach(\App\Enums\ProductType::cases() as $product_type)
                    <option value="{{$product_type->value}}">{{$product_type->getName()}}</option>
                @endforeach
            </x-input.model-select>

            <!-- Hsn-Code------------------------------------------------------------------------------------------>
            <div class="flex flex-row gap-3">
                <div class="xl:flex gap-3 w-full">
                    <label for="hsncode_no" class="w-[10rem] text-zinc-500 tracking-wide py-2">Hsncode</label>
                    <div x-data="{isTyped: @entangle('hsncodeTyped')}" @click.away="isTyped = false" class="w-full">
                        <div>
                            <input
                                id="hsncode_no"
                                type="search"
                                wire:model.live="hsncode_no"
                                autocomplete="off"
                                placeholder="Hsncode No.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementHsncode"
                                wire:keydown.arrow-down="incrementHsncode"
                                wire:keydown.enter="enterHsncode"
                                class="block purple-textbox w-full"
                            />

                            <!-- Hsn-Code Dropdown------------------------------------------------------------->

                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($hsncodeCollection)
                                                @forelse ($hsncodeCollection as $i => $hsncode)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightHsncode === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setHsncode('{{$hsncode->vname}}','{{$hsncode->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $hsncode->vname }}
                                                    </li>

                                                @empty
                                                    <button wire:click.prevent="hsncodeSave('{{$hsncode_no}}')" class="text-white bg-green-500 text-center w-full">
                                                        create
                                                    </button>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Units/Gst ---------------------------------------------------------------------------------------->
            <x-input.model-select wire:model="units" :label="'Units'">
                <option class="text-gray-400"> choose ..</option>
                @foreach(\App\Enums\Units::cases() as $units)
                    <option value="{{$units->value}}">{{$units->getName()}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-select wire:model="gst_percent" :label="'Gst Percent'">
                <option class="text-gray-400"> choose ..</option>
                @foreach(\App\Enums\GstPercent::cases() as $gst_percent)
                    <option value="{{$gst_percent->value}}">{{$gst_percent->getName()}}</option>
                @endforeach
            </x-input.model-select>
        </div>

    </x-forms.m-panel>
    <!-- Save Button area --------------------------------------------------------------------------------------------->
    <x-forms.m-panel-bottom-button save back active/>
</div>
