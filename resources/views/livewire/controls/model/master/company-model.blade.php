<div>
    <x-controls.lookup.model :show-model="$showModel" >
        <x-input.model-text wire:model="vname" :label="'Name'"/>
        <x-input.model-text wire:model="display_name" :label="'Display-name'"/>
        <x-input.model-text wire:model="address_1" :label="'Address'"/>
        <x-input.model-text wire:model="address_2" :label="'Area-Road'"/>
        <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
        <x-input.model-text wire:model="landline" :label="'Landline'"/>
        <x-input.model-text wire:model="gstin" :label="'GSTin'"/>
        <x-input.model-text wire:model="pan" :label="'Pan'"/>
        <x-input.model-text wire:model="email" :label="'Email'"/>
        <x-input.model-text wire:model="website" :label="'Website'"/>


        <div class="flex flex-row py-3 gap-3">
            <div class="xl:flex w-full gap-2">
                <label for="city_name" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">City</label>
                <div x-data="{isTyped: @entangle('cityTyped')}" @click.away="isTyped = false" class="w-full">
                    <div class="relative">
                        <input
                            id="city_name"
                            type="search"
                            wire:model.live="city_name"
                            autocomplete="off"
                            placeholder="City Name.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementCity"
                            wire:keydown.arrow-down="incrementCity"
                            wire:keydown.enter="enterCity"
                            class="block w-full purple-textbox "
                        />

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
                                        @if($cityCollection)
                                            @forelse ($cityCollection as $i => $city)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightCity === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setCity('{{$city->vname}}','{{$city->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $city->vname }}
                                                </li>

                                            @empty
                                                @livewire('controls.model.common.city-model',[$city_name])
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

        <div class="flex flex-col gap-2">
            <div class="xl:flex w-full gap-2">
                <label for="state_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                <div x-data="{isTyped: @entangle('stateTyped')}" @click.away="isTyped = false" class="w-full">
                    <div class="relative">
                        <input
                            id="state_name"
                            type="search"
                            wire:model.live="state_name"
                            autocomplete="off"
                            placeholder="state.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementstate"
                            wire:keydown.arrow-down="incrementstate"
                            wire:keydown.enter="enterstate"
                            class="block w-full purple-textbox"
                        />

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
                                        @if($stateCollection)
                                            @forelse ($stateCollection as $i => $states)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightState === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setState('{{$states->vname}}','{{$states->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $states->vname }}
                                                </li>

                                            @empty
                                                @livewire('controls.model.common.state-model',[$state_name])

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

        <div class="flex flex-col gap-2">
            <div class="xl:flex w-full gap-2">
                <label for="pincode_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                <div x-data="{isTyped: @entangle('pincodeTyped')}" @click.away="isTyped = false" class="w-full">
                    <div class="relative">
                        <input
                            id="pincode_name"
                            type="search"
                            wire:model.live="pincode_name"
                            autocomplete="off"
                            placeholder="pincode.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementPincode"
                            wire:keydown.arrow-down="incrementPincode"
                            wire:keydown.enter="enterPincode"
                            class="block w-full purple-textbox"
                        />

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
                                        @if($pincodeCollection)
                                            @forelse ($pincodeCollection as $i => $pincode)
                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightPincode === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setPincode('{{$pincode->vname}}','{{$pincode->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $pincode->vname }}
                                                </li>
                                            @empty
                                                @livewire('controls.model.common.pincode-model',[$pincode_name])

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
    </x-controls.lookup.model>
</div>
