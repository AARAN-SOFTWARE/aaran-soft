<div>
    <x-slot name="header">Contact Entry</x-slot>

    <x-forms.m-panel>
        <div class="lg:flex">

            <!-- Left area -------------------------------------------------------------------------------------------->
            <div class="lg:w-1/2 ml-2 px-8">

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
            <div class="lg:w-1/2 px-8">

                <x-input.model-select wire:model="address_type" :label="'Address Type'">
                    <option class="text-gray-400"> choose ..</option>
                    <option value="Primary">Primary</option>
                    <option value="Secondary">Second</option>
                    <option value="Third">Third</option>
                </x-input.model-select>

                <x-input.model-text wire:model="address_1" :label="'Address'"/>
                <x-input.model-text wire:model="address_2" :label="'Area-Road'"/>

                <div class="flex flex-row  gap-3">
                    <div class="xl:flex w-full gap-2">
                        <label for="city_name" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">City</label>
                        <div x-data="{isTyped: @entangle('cityTyped')}" @click.away="isTyped = false" class="w-full">
                            <div class="relative">
                                <input
                                    id="city_name"
                                    type="search"
                                    wire:model.live="city_name"
                                    autocomplete="off"
                                    placeholder="Choose.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementCity"
                                    wire:keydown.arrow-down="incrementCity"
                                    wire:keydown.enter="enterCity"
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
                                                            wire:click.prevent="setCity('{{$city->vname}}','{{$city->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $city->vname }}
                                                        </li>
                                                    @empty
                                                        <button wire:click.prevent="citySave('{{$city_name}}')" class="text-white bg-green-500 text-center w-full">
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

                <div class="flex flex-col mt-3 gap-2">
                    <div class="xl:flex w-full gap-2">
                        <label for="state_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                        <div x-data="{isTyped: @entangle('stateTyped')}" @click.away="isTyped = false" class="w-full">
                            <div class="relative">
                                <input
                                    id="state_name"
                                    type="search"
                                    wire:model.live="state_name"
                                    autocomplete="off"
                                    placeholder="Choose.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementState"
                                    wire:keydown.arrow-down="incrementState"
                                    wire:keydown.enter="enterState"
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

                <div class="flex flex-col gap-2 mt-3">
                    <div class="xl:flex w-full gap-2">
                        <label for="pincode_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                        <div x-data="{isTyped: @entangle('pincodeTyped')}" @click.away="isTyped = false" class="w-full">
                            <div class="relative">
                                <input
                                    id="pincode_name"
                                    type="search"
                                    wire:model.live="pincode_name"
                                    autocomplete="off"
                                    placeholder="Choose.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementPincode"
                                    wire:keydown.arrow-down="incrementPincode"
                                    wire:keydown.enter="enterPincode"
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
                                                            wire:click.prevent="setPincode('{{$pincode->vname}}','{{$pincode->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $pincode->vname }}
                                                        </li>
                                                    @empty
                                                        <button wire:click.prevent="pincodeSave('{{$pincode_name}}')" class="text-white bg-green-500 text-center w-full">
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

                <div class="flex flex-col gap-2 mt-3">
                    <div class="xl:flex w-full gap-2">
                        <label for="country_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Country</label>
                        <div x-data="{isTyped: @entangle('countryTyped')}" @click.away="isTyped = false" class="w-full">
                            <div class="relative">
                                <input
                                    id="country_name"
                                    type="search"
                                    wire:model.live="country_name"
                                    autocomplete="off"
                                    placeholder="Choose.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementCountry"
                                    wire:keydown.arrow-down="incrementCountry"
                                    wire:keydown.enter="enterCountry"
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
                                                            wire:click.prevent="setCountry('{{$country->vname}}','{{$country->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $country->vname }}
                                                        </li>
                                                    @empty
                                                        <button wire:click.prevent="countrySave('{{$country_name}}')" class="text-white bg-green-500 text-center w-full">
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

                <x-input.model-text wire:model="gstin" :label="'GST'"/>

                <x-input.model-text wire:model="email" :label="'Email'"/>

                <button wire:click="addItems"
                        class="px-3 bg-green-500 text-white font-semibold tracking-wider rounded-lg p-2">Add
                    Address
                </button>
            </div>

        </div>

        <!-- Address Display ------------------------------------------------------------------------------------------>
        <section>
            @if ($itemList)
                <x-forms.table>
                    <x-slot name="table_header">
                        <x-table.header-text center>id</x-table.header-text>
                        <x-table.header-text center>Address Type</x-table.header-text>
                        <x-table.header-text left>Address</x-table.header-text>
                        <x-table.header-text left>Area-Road</x-table.header-text>
                        <x-table.header-text center>City</x-table.header-text>
                        <x-table.header-text center>State</x-table.header-text>
                        <x-table.header-text center>Pincode</x-table.header-text>
                        <x-table.header-text center>Country</x-table.header-text>
                        <x-table.header-text center>Gst</x-table.header-text>
                        <x-table.header-text left>Email</x-table.header-text>
                        <x-table.header-text class="w-[6rem]">Action</x-table.header-text>
                    </x-slot>

                    <x-slot name="table_body">
                        @forelse ($itemList as $index =>  $row)
                            <x-table.row>

                                <x-table.cell-text center>
                                    @if(isset($row['contact_detail_id']))
                                        {{  $row['contact_detail_id'] }}
                                    @endif
                                </x-table.cell-text>

                                <x-table.cell-text wire:click.prevent="changeItems({{$index}})" center>
                                    {{  $row['address_type'] }}
                                </x-table.cell-text>

                                <x-table.cell-text>
                                    {{  $row['address_1'] }}
                                </x-table.cell-text>

                                <x-table.cell-text>
                                    {{  $row['address_2'] }}
                                </x-table.cell-text>

                                <x-table.cell-text center>
                                    {{  $row['city_name'] }}
                                </x-table.cell-text>

                                <x-table.cell-text center>
                                    {{  $row['state_name'] }}
                                </x-table.cell-text>

                                <x-table.cell-text center>
                                    {{  $row['pincode_name'] }}
                                </x-table.cell-text>

                                <x-table.cell-text center>
                                    {{  $row['country_name'] }}
                                </x-table.cell-text>

                                <x-table.cell-text center>
                                    {{  $row['gstin'] }}
                                </x-table.cell-text>

                                <x-table.cell-text>
                                    {{  $row['email'] }}
                                </x-table.cell-text>

                                <x-table.cell>
                                    <div class="flex justify-center gap-3">
                                        <x-table.edit  wire:click.prevent="changeItems({{$index}})"/>
                                        <x-table.delete wire:click.prevent="removeItems({{$index}})"/>
                                    </div>
                                </x-table.cell>

                            </x-table.row>

                        @empty
                            <x-table.empty/>
                        @endforelse
                    </x-slot>
                </x-forms.table>
            @endif
        </section>

    </x-forms.m-panel>

    <!-- Save Button area --------------------------------------------------------------------------------------------->
    <x-forms.m-panel-bottom-button save back active />
</div>
