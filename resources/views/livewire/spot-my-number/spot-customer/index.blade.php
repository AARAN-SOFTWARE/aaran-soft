<div>
    <x-slot name="header">Customer Details</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <div class="relative">
            <x-forms.table :list="$list">
                <x-slot name="table_header">
                    <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Customer</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Contact Person
                    </x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Mobile</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Geo Location</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Working Days</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Open/Close Time
                    </x-table.header-text>
                    <x-table.header-action/>
                </x-slot>

                <!-- Table Body --------------------------------------------------------------------------------------->
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <x-table.row>
                            <x-table.cell-text center>
                                {{ $index + 1 }}
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <a href="{{route('spotCustomer.pic',[$row->id])}}">
                                    {{ $row->vname}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <a href="{{route('spotCustomer.pic',[$row->id])}}">
                                    {{ $row->contact_person}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <a href="{{route('spotCustomer.pic',[$row->id])}}">
                                    {{ $row->mobile}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <a href="{{route('spotCustomer.pic',[$row->id])}}">
                                    {{ $row->geoLocation}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <a href="{{route('spotCustomer.pic',[$row->id])}}">
                                    {{ $row->working_days}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <a href="{{route('spotCustomer.pic',[$row->id])}}">
                                    @if($row->business_open_timing||$row->business_close_timing)
                                        {{ $row->business_open_timing.'am - '.$row->business_close_timing.'pm'}}
                                    @endif
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-action id="{{$row->id}}"/>
                        </x-table.row>

                    @empty
                        <x-table.empty/>
                    @endforelse
                </x-slot>

                <!-- Pagination/Loading-------------------------------------------------------------------------------->
            </x-forms.table>
        </div>

        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create-new :id="$vid">
            <div class="flex gap-5 w-full">
                <div class="w-full flex flex-col gap-5">
                    <x-input.model-text wire:model="vname" :label="'Business Name'"/>
                    @error('vname')
                    <span class="text-red-500">{{  $message }}</span>
                    @enderror
                    <x-input.model-text wire:model="contact_person" :label="'Contact Person'"/>
                    <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
                    <x-input.model-text wire:model="whatsapp" :label="'Whatsapp'"/>
                    <x-input.model-text wire:model="gstin" :label="'Gst'"/>
                    <x-input.model-text wire:model="address_1" :label="'Address'"/>
                    <x-input.model-text wire:model="address_2" :label="'Road'"/>
                    <x-input.model-text wire:model="landmark" :label="'Landmark'"/>

                </div>

                <div class="w-full flex flex-col gap-5">
                    <div class="flex flex-row ">
                        <div class="xl:flex w-full gap-2">
                            <label for="city_name" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">City</label>
                            <div x-data="{isTyped: @entangle('cityTyped')}" @click.away="isTyped = false"
                                 class="w-full">
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
                                                            <button wire:click.prevent="citySave('{{$city_name}}')"
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
                            <label for="state_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                            <div x-data="{isTyped: @entangle('stateTyped')}" @click.away="isTyped = false"
                                 class="w-full">
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

                    <div class="flex flex-col ">
                        <div class="xl:flex w-full gap-2">
                            <label for="pincode_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                            <div x-data="{isTyped: @entangle('pincodeTyped')}" @click.away="isTyped = false"
                                 class="w-full">
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
                                                            <button
                                                                wire:click.prevent="pincodeSave('{{$pincode_name}}')"
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
                                                            <button
                                                                wire:click.prevent="countrySave('{{$country_name}}')"
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

                    <x-input.model-text wire:model="geoLocation" :label="'Geo Location'"/>
                    <x-input.model-select wire:model="working_days" :label="'Working Days'">
                        <option>Choose...</option>
                        <option value="MONDAY-FRIDAY">MONDAY-FRIDAY</option>
                        <option value="MONDAY-SATURDAY">MONDAY-SATURDAY</option>
                        <option value="MONDAY-SUNDAY">MONDAY-SUNDAY</option>
                    </x-input.model-select>
                    <x-input.model-text wire:model="business_open_timing" :label="'Open Time'"/>
                    <x-input.model-text wire:model="business_close_timing" :label="'Close Time'"/>
                </div>
            </div>
        </x-forms.create-new>

    </x-forms.m-panel>
</div>
