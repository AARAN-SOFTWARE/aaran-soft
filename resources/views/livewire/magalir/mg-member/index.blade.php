<div>
    <x-slot name="header">Magalir Club Members</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Photo</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Name</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Mobile</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">City</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Club No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Action</x-table.ths-center>
            </x-slot>
            <x-slot name="table_body">

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell>



                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    <img class="h-10 w-auto"
                                         src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->photo))}}"
                                         alt="img">
{{--                                    {{ $row->photo }}--}}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->vname }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->mobile }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->city->vname?? $row->city }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->mgClub->vno }}&nbsp;-&nbsp;{{ $row->mgClub->vname }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.action :id="$row->id"/>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse

            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <x-forms.create :id="$vid">

            <x-input.model-select wire:model="mg_club_id" :label="'Club No'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clubs as $row)
                    <option value="{{$row->id}}">{{$row->vno}}&nbsp;-&nbsp;{{$row->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-text wire:model="vname" :label="'Name'"/>
            <x-input.model-text wire:model="father" :label="'Father Name'"/>
            <x-input.model-text wire:model="mother" :label="'Mother Name'"/>
            <x-input.model-text wire:model="dob" type="date" :label="'Date of Birth'"/>
            <x-input.model-text wire:model="aadhaar" :label="'Aadhaar'"/>
            <x-input.model-text wire:model="pan" :label="'Pan'"/>
            <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
            <x-input.model-text wire:model="mobile_2" :label="'Mobile'"/>
            <x-input.model-text wire:model="email" :label="'Email'"/>
            <x-input.model-text wire:model="address_1" :label="'address'"/>
            <x-input.model-text wire:model="address_2" :label="'Address'"/>
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
            <x-input.model-text wire:model="nominee" :label="'Nominee'"/>
            <x-input.model-text wire:model="n_mobile" :label="'Mobile'"/>
            <x-input.model-text wire:model="n_aadhaar" :label="'Aadhaar'"/>
            <label class="w-[10rem] text-zinc-500 tracking-wide py-2"></label>
            <div class="grid grid-cols-2 flex-shrink-0 h-80 w-80 mr-4">
                <div>
                    @if($image)
                        <img class="h-48 w-full" src="{{ $image->temporaryUrl() }}" alt="{{$image?:''}}"/>
                    @endif

                    @if(!$image && isset($old_image))
                        <img class="h-48 w-full"
                             src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
                             alt="img">
                    @else
                        <div class="h-48 w-full justify-center flex items-center">
                            Select image
                        </div>

                    @endif
                </div>
            </div>
            <div>
                <input type="file" wire:model="image">
                <button wire:click.prevent="save_image"></button>
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
