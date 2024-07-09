<div>
    <x-slot name="header">Master List</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Master</x-table.header-text>
                <x-table.header-text center>Mobile</x-table.header-text>
                <x-table.header-text center>WhatsApp</x-table.header-text>
                <x-table.header-text center>email</x-table.header-text>
                <x-table.header-text center>city</x-table.header-text>
                <x-table.header-text center>Sport Club</x-table.header-text>
                <x-table.header-text center>Grade</x-table.header-text>
                <x-table.header-text center>Photo</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->mobile}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->whatsapp}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->email}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->city->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->sportClub->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <div class="flex-shrink-0 h-10 w-10 mr-4 rounded-xl">
                                <img
                                    src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->club_photo))}}"
                                    alt="logo"/>
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
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

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->

        <x-forms.create-new :id="$vid">
            <div class="flex gap-5 w-full">
                <div class="w-full">
                    <x-input.model-text wire:model="vname" :label="'Name'"/>
                    <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
                    <x-input.model-text wire:model="whatsapp" :label="'Whatsapp'"/>
                    <x-input.model-text wire:model="email" :label="'Email'"/>
                    <x-input.model-text wire:model="dob" :label="'dob'"/>
                    <x-input.model-text wire:model="age" :label="'age'"/>
                    <x-input.model-text wire:model="gender" :label="'gender'"/>
                    <x-input.model-text wire:model="aadhaar" :label="'aadhaar'"/>
                    <x-input.model-text wire:model="grade" :label="'grade'"/>


                </div>

                <div class="w-full">

                    <!-- Image ---------------------------------------------------------------------------------------------------->
                    <div class="flex flex-row gap-6 mt-4">

                        <div class="flex">

                            <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Photo</label>

                            <div class="flex-shrink-0">

                                <div>
                                    @if($master_photo)
                                        <div class="flex-shrink-0 ">
                                            <img class="h-24 w-full" src="{{ $master_photo->temporaryUrl() }}"
                                                 alt="{{$master_photo?:''}}"/>
                                        </div>
                                    @endif

                                    @if(!$master_photo && isset($master_photo))
                                        <img class="h-24 w-full"
                                             src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_master_photo))}}"
                                             alt="">

                                    @else
                                        <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="relative">

                            <div>
                                <label for="master_photo"
                                       class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                    <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                    Upload Photo

                                    <input type="file" id='master_photo' wire:model="master_photo" class="hidden"/>
                                    <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are Allowed.</p>
                                </label>
                            </div>

                            <div wire:loading wire:target="master_photo" class="z-10 absolute top-6 left-12">
                                <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Address ----------------------------------------------------------------------------------------------------->

                    <x-input.model-text wire:model="address_1" :label="'Address'"/>
                    <x-input.model-text wire:model="address_2" :label="'Street, Area'"/>

                    <!-- City ----------------------------------------------------------------------------------------------------->
                    <div class="flex flex-row  gap-3">
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

                    <!-- State --------------------------------------------------------------------------------------------------->
                    <div class="flex flex-col mt-3 gap-2">
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

                    <!-- Pin-code --------------------------------------------------------------------------------------------------->
                    <div class="flex flex-col gap-2 mt-3">
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

                    <!-- Sports Club --------------------------------------------------------------------------------------------------->
                    <div class="flex flex-col gap-2 mt-3">
                        <div class="xl:flex w-full gap-2">
                            <label for="sportsClub_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Sports Club</label>
                            <div x-data="{isTyped: @entangle('sportsClubTyped')}" @click.away="isTyped = false"
                                 class="w-full">
                                <div class="relative">
                                    <input
                                        id="sportsClub_name"
                                        type="search"
                                        wire:model.live="sport_club_id"
                                        autocomplete="off"
                                        placeholder="Choose.."
                                        @focus="isTyped = true"
                                        @keydown.escape.window="isTyped = false"
                                        @keydown.tab.window="isTyped = false"
                                        @keydown.enter.prevent="isTyped = false"
                                        wire:keydown.arrow-up="decrementSportsClub"
                                        wire:keydown.arrow-down="incrementSportsClub"
                                        wire:keydown.enter="enterSportsClub"
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
                                                    @if($sportsClubCollection)
                                                        @forelse ($sportsClubCollection as $i => $sportsClub)
                                                            <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightSportsClub === $i ? 'bg-yellow-100' : '' }}"
                                                                wire:click.prevent="setPincode('{{$sportsClub->vname}}','{{$sportsClub->id}}')"
                                                                x-on:click="isTyped = false">
                                                                {{ $sportsClub->vname }}
                                                            </li>
                                                        @empty
                                                            <button
                                                                wire:click.prevent="pincodeSave('{{$sportsClub_name}}')"
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


                    <x-input.model-text wire:model="experience" :label="'experience'"/>

                    <x-input.model-date wire:model="started_at" :label="'Started_at'"/>


                </div>
            </div>
        </x-forms.create-new>

    </x-forms.m-panel>

</div>