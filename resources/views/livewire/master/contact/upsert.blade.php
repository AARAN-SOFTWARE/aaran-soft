<div>
    <x-slot name="header">Contact Entry</x-slot>

    <x-forms.m-panel>
        <div class="lg:flex">

            <!-- Left area -------------------------------------------------------------------------------------------->
            <div class="lg:w-1/2 ml-2 px-8 flex flex-col gap-3">

                <x-input.model-text wire:model="vname" :label="'Name'"/>

                <x-input.model-text wire:model="mobile" :label="'Mobile'"/>

                <x-input.model-text wire:model="whatsapp" :label="'Whatsapp'"/>

                <x-input.model-text wire:model="contact_person" :label="'Contact Person'"/>

                <x-input.model-select wire:model="contact_type" :label="'Contact Type'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach(\App\Enums\ContactType::cases() as $contact_type)
                        <option value="{{$contact_type->value}}">{{$contact_type->getName()}}</option>
                    @endforeach
                </x-input.model-select>

                <x-input.model-text wire:model="msme_no" :label="'MSME No'"/>
                <x-input.model-text wire:model="msme_type" :label="'MSME Type'"/>
                <x-input.model-text wire:model="opening_balance" :label="'Opening Balance'"/>
                <x-input.model-date wire:model="effective_from" :label="'Opening Date'"/>
            </div>

            <!-- Right area ------------------------------------------------------------------------------------------->
            <div class="lg:w-1/2 flex flex-col gap-3">

                <div x-data="{
            openTab: 0,
            activeClasses: 'border-l border-t border-r rounded-t text-blue-700',
            inactiveClasses: 'text-blue-500 hover:text-blue-700'
        }" class="">
                    <ul class="flex border-b overflow-x-scroll py-2">
                        <li x-on:click="$wire.sortSearch('{{0}}')" @click="openTab = 0"
                            :class="{ '-mb-px': openTab === 0 }" class="-mb-px mr-1">
                            <a href="#" :class="openTab === 0 ? activeClasses : inactiveClasses"
                               class="bg-white inline-block py-2 px-4 font-semibold ">
                                Primary
                            </a>
                        </li>
                        @foreach($secondaryAddress as $index => $row)
                            <li @click="openTab = {{$row}}" :class="{ '-mb-px': openTab === {{$row}} }" class="mr-1 ">
                                <!-- Set active class by using :class provided by Alpine -->
                                <div class="inline-flex gap-2 py-2 px-4"  :class="openTab === {{$row}} ? activeClasses : inactiveClasses">
                                    <a href="#" x-on:click="$wire.sortSearch('{{$row}}')"

                                       class="bg-white inline-block   font-semibold">
                                        <span>Secondary</span>
                                    </a>
                                        <button class="hover:text-red-400 pt-1" @click="openTab = {{$row-1}}"
                                                wire:click="removeAddress('{{$index}}','{{$row}}')">
                                            <x-icons.icon :icon="'x-mark'" class="block h-4 w-4"/>
                                        </button>
                                </div>
                            </li>
                        @endforeach
                        <li class="mr-1">
                            <button :class="inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold"
                                    wire:click="addAddress('{{$addressIncrement}}')">
                                + Add
                            </button>
                        </li>
                    </ul>
                    <div class="w-full">
                        <div x-show="openTab === 0" class="p-2">
                            <div class="flex flex-col gap-3">

                                <x-input.model-text wire:model.live="itemList.{{0}}.address_1" :label="'Address'"/>
                                <x-input.model-text wire:model.live="itemList.{{0}}.address_2" :label="'Area-Road'"/>

                                <div class="flex flex-row ">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="city_name"
                                               class="w-[10rem] text-zinc-500 tracking-wide py-2 ">City</label>
                                        <div x-data="{isTyped: @entangle('cityTyped')}" @click.away="isTyped = false"
                                             class="w-full">
                                            <div class="relative">
                                                <input
                                                    id="city_name"
                                                    type="search"
                                                    wire:model.live="itemList.{{0}}.city_name"
                                                    autocomplete="off"
                                                    placeholder="Choose.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementCity"
                                                    wire:keydown.arrow-down="incrementCity"
                                                    wire:keydown.enter="enterCity('{{0}}')"
                                                    class="block w-full purple-textbox "
                                                />

                                                <!-- City Dropdown -------------------------------------------------------------------->

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
                                                                            wire:click.prevent="setCity('{{$city->vname}}','{{$city->id}}','{{0}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $city->vname }}
                                                                        </li>
                                                                    @empty
                                                                        <button
                                                                            wire:click.prevent="citySave('{{ $itemList[0]['city_name'] }}','{{0}}')"
                                                                            class="text-white bg-green-500 text-center w-full">
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

                                <div class="flex flex-col ">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="state_name"
                                               class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                                        <div x-data="{isTyped: @entangle('stateTyped')}" @click.away="isTyped = false"
                                             class="w-full">
                                            <div class="relative">
                                                <input
                                                    id="state_name"
                                                    type="search"
                                                    wire:model.live="itemList.{{0}}.state_name"
                                                    autocomplete="off"
                                                    placeholder="Choose.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementState"
                                                    wire:keydown.arrow-down="incrementState"
                                                    wire:keydown.enter="enterState('{{0}}')"
                                                    class="block w-full purple-textbox"
                                                />

                                                <!-- State Dropdown -------------------------------------------------------------------->
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
                                                                            wire:click.prevent="setState('{{$states->vname}}','{{$states->id}}','{{0}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $states->vname }}
                                                                        </li>

                                                                    @empty

                                                                        @livewire('controls.model.common.state-model',[$itemList[0]['state_name'],0])

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

                                <div class="flex flex-col ">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="pincode_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                                        <div x-data="{isTyped: @entangle('pincodeTyped')}" @click.away="isTyped = false"
                                             class="w-full">
                                            <div class="relative">
                                                <input
                                                    id="pincode_name"
                                                    type="search"
                                                    wire:model.live="itemList.{{0}}.pincode_name"
                                                    autocomplete="off"
                                                    placeholder="Choose.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementPincode"
                                                    wire:keydown.arrow-down="incrementPincode"
                                                    wire:keydown.enter="enterPincode('{{0}}')"
                                                    class="block w-full purple-textbox"
                                                />

                                                <!-- Pin-code Dropdown -------------------------------------------------------------------->
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
                                                                            wire:click.prevent="setPincode('{{$pincode->vname}}','{{$pincode->id}}','{{0}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $pincode->vname }}
                                                                        </li>
                                                                    @empty
                                                                        <button
                                                                            wire:click.prevent="pincodeSave('{{$itemList[0]['pincode_name'] }}','{{0}}')"
                                                                            class="text-white bg-green-500 text-center w-full">
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

                                <div class="flex flex-col ">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="country_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Country</label>
                                        <div x-data="{isTyped: @entangle('countryTyped')}" @click.away="isTyped = false"
                                             class="w-full">
                                            <div class="relative">
                                                <input
                                                    id="country_name"
                                                    type="search"
                                                    wire:model.live="itemList.{{0}}.country_name"
                                                    autocomplete="off"
                                                    placeholder="Choose.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementCountry"
                                                    wire:keydown.arrow-down="incrementCountry"
                                                    wire:keydown.enter="enterCountry('{{0}}')"
                                                    class="block w-full purple-textbox"
                                                />

                                                <!-- Country Dropdown -------------------------------------------------------------------->
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
                                                                @if($countryCollection)
                                                                    @forelse ($countryCollection as $i => $country)
                                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightCountry === $i ? 'bg-yellow-100' : '' }}"
                                                                            wire:click.prevent="setCountry('{{$country->vname}}','{{$country->id}}','{{0}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $country->vname }}
                                                                        </li>
                                                                    @empty
                                                                        <button
                                                                            wire:click.prevent="countrySave('{{$itemList[0]['country_name']}}','{{0}}')"
                                                                            class="text-white bg-green-500 text-center w-full">
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

                                <x-input.model-text wire:model.live="itemList.{{0}}.gstin" :label="'GST'"/>

                                <x-input.model-text wire:model.live="itemList.{{0}}.email" :label="'Email'"/>

                            </div>

                        </div>

                        @foreach( $secondaryAddress as $index => $row )
                            <div x-show="openTab === {{$row}}" class="p-2">

                                <div class="flex flex-col gap-3">
                                    <x-input.model-text wire:model="itemList.{{$row}}.address_1" :label="'Address'"/>
                                    <x-input.model-text wire:model="itemList.{{$row}}.address_2" :label="'Area-Road'"/>

                                    <div class="flex flex-row ">
                                        <div class="xl:flex w-full gap-2">
                                            <label for="city_name"
                                                   class="w-[10rem] text-zinc-500 tracking-wide py-2 ">City</label>
                                            <div x-data="{isTyped: @entangle('cityTyped')}"
                                                 @click.away="isTyped = false"
                                                 class="w-full">
                                                <div class="relative">
                                                    <input
                                                        id="city_name"
                                                        type="search"
                                                        wire:model.live="itemList.{{$row}}.city_name"
                                                        autocomplete="off"
                                                        placeholder="Choose.."
                                                        @focus="isTyped = true"
                                                        @keydown.escape.window="isTyped = false"
                                                        @keydown.tab.window="isTyped = false"
                                                        @keydown.enter.prevent="isTyped = false"
                                                        wire:keydown.arrow-up="decrementCity"
                                                        wire:keydown.arrow-down="incrementCity"
                                                        wire:keydown.enter="enterCity('{{$row}}')"
                                                        class="block w-full purple-textbox "
                                                    />

                                                    <!-- City Dropdown -------------------------------------------------------------------->

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
                                                                                wire:click.prevent="setCity('{{$city->vname}}','{{$city->id}}','{{$row}}')"
                                                                                x-on:click="isTyped = false">
                                                                                {{ $city->vname }}
                                                                            </li>
                                                                        @empty
                                                                            <button
                                                                                wire:click.prevent="citySave('{{$itemList[$row]['city_name']}}','{{$row}}')"
                                                                                class="text-white bg-green-500 text-center w-full">
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

                                    <div class="flex flex-col ">
                                        <div class="xl:flex w-full gap-2">
                                            <label for="state_name"
                                                   class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                                            <div x-data="{isTyped: @entangle('stateTyped')}"
                                                 @click.away="isTyped = false"
                                                 class="w-full">
                                                <div class="relative">
                                                    <input
                                                        id="state_name"
                                                        type="search"
                                                        wire:model.live="itemList.{{$row}}.state_name"
                                                        autocomplete="off"
                                                        placeholder="Choose.."
                                                        @focus="isTyped = true"
                                                        @keydown.escape.window="isTyped = false"
                                                        @keydown.tab.window="isTyped = false"
                                                        @keydown.enter.prevent="isTyped = false"
                                                        wire:keydown.arrow-up="decrementState"
                                                        wire:keydown.arrow-down="incrementState"
                                                        wire:keydown.enter="enterState('{{$row}}')"
                                                        class="block w-full purple-textbox"
                                                    />

                                                    <!-- State Dropdown -------------------------------------------------------------------->
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
                                                                                wire:click.prevent="setState('{{$states->vname}}','{{$states->id}}','{{$row}}')"
                                                                                x-on:click="isTyped = false">
                                                                                {{ $states->vname }}
                                                                            </li>

                                                                        @empty

                                                                            @livewire('controls.model.common.state-model',[$itemList[$row]['state_name'],$row])

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

                                    <div class="flex flex-col ">
                                        <div class="xl:flex w-full gap-2">
                                            <label for="pincode_name"
                                                   class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                                            <div x-data="{isTyped: @entangle('pincodeTyped')}"
                                                 @click.away="isTyped = false"
                                                 class="w-full">
                                                <div class="relative">
                                                    <input
                                                        id="pincode_name"
                                                        type="search"
                                                        wire:model.live="itemList.{{$row}}.pincode_name"
                                                        autocomplete="off"
                                                        placeholder="Choose.."
                                                        @focus="isTyped = true"
                                                        @keydown.escape.window="isTyped = false"
                                                        @keydown.tab.window="isTyped = false"
                                                        @keydown.enter.prevent="isTyped = false"
                                                        wire:keydown.arrow-up="decrementPincode"
                                                        wire:keydown.arrow-down="incrementPincode"
                                                        wire:keydown.enter="enterPincode('{{$row}}')"
                                                        class="block w-full purple-textbox"
                                                    />

                                                    <!-- Pin-code Dropdown -------------------------------------------------------------------->
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
                                                                                wire:click.prevent="setPincode('{{$pincode->vname}}','{{$pincode->id}}','{{$row}}')"
                                                                                x-on:click="isTyped = false">
                                                                                {{ $pincode->vname }}
                                                                            </li>
                                                                        @empty
                                                                            <button
                                                                                wire:click.prevent="pincodeSave('{{$itemList[$row]['pincode_name']}}','{{$row}}')"
                                                                                class="text-white bg-green-500 text-center w-full">
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

                                    <div class="flex flex-col ">
                                        <div class="xl:flex w-full gap-2">
                                            <label for="country_name"
                                                   class="w-[10rem] text-zinc-500 tracking-wide py-2">Country</label>
                                            <div x-data="{isTyped: @entangle('countryTyped')}"
                                                 @click.away="isTyped = false"
                                                 class="w-full">
                                                <div class="relative">
                                                    <input
                                                        id="country_name"
                                                        type="search"
                                                        wire:model.live="itemList.{{$row}}.country_name"
                                                        autocomplete="off"
                                                        placeholder="Choose.."
                                                        @focus="isTyped = true"
                                                        @keydown.escape.window="isTyped = false"
                                                        @keydown.tab.window="isTyped = false"
                                                        @keydown.enter.prevent="isTyped = false"
                                                        wire:keydown.arrow-up="decrementCountry"
                                                        wire:keydown.arrow-down="incrementCountry"
                                                        wire:keydown.enter="enterCountry('{{$row}}')"
                                                        class="block w-full purple-textbox"
                                                    />

                                                    <!-- Country Dropdown -------------------------------------------------------------------->
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
                                                                    @if($countryCollection)
                                                                        @forelse ($countryCollection as $i => $country)
                                                                            <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightCountry === $i ? 'bg-yellow-100' : '' }}"
                                                                                wire:click.prevent="setCountry('{{$country->vname}}','{{$country->id}}','{{$row}}')"
                                                                                x-on:click="isTyped = false">
                                                                                {{ $country->vname }}
                                                                            </li>
                                                                        @empty
                                                                            <button
                                                                                wire:click.prevent="countrySave('{{$itemList[$row]['country_name']}}','{{$row}}')"
                                                                                class="text-white bg-green-500 text-center w-full">
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

                                    <x-input.model-text wire:model="itemList.{{$row}}.gstin" :label="'GST'"/>

                                    <x-input.model-text wire:model="itemList.{{$row}}.email" :label="'Email'"/>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </x-forms.m-panel>

    <!-- Save Button area --------------------------------------------------------------------------------------------->
    <x-forms.m-panel-bottom-button save back active/>
</div>
