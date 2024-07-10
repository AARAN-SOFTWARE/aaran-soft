<div>
    <x-slot name="header">Students List</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text center>Photo</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Student Name</x-table.header-text>
                <x-table.header-text center>Institution</x-table.header-text>
                <x-table.header-text center>Standard</x-table.header-text>
                <x-table.header-text center>Mobile</x-table.header-text>
                <x-table.header-text center>Gender</x-table.header-text>
                <x-table.header-text center>DOB</x-table.header-text>
                <x-table.header-text center>Age</x-table.header-text>
                <x-table.header-text center>City</x-table.header-text>
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
                            <img
                                class="w-10 h-10"
                                src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->student_photo))}}"
                                alt="logo"/>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->institution}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->standard}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->mobile}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->gender}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->dob ?  date('d-m-Y', strtotime($row->dob)) :''}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->age}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->city->vname}}
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

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-5 w-full">

                <div class="flex flex-col gap-0 sm:gap-3">
                    <x-input.model-text wire:model="vname" :label="'Student Name'"/>
                    <x-input.model-text wire:model="institution" :label="'Institution'"/>
                    <x-input.model-text wire:model="standard" :label="'Standard'"/>
                    <x-input.model-text wire:model="father_name" :label="'FatherName'"/>
                    <x-input.model-text wire:model="mother_name" :label="'MotherName'"/>
                    <x-input.model-text wire:model="aadhaar" :label="'aadhaar'"/>
                    <x-input.model-date wire:model="dob" :label="'DOB'"/>
                    <x-input.model-text wire:model="age" :label="'Age'"/>

                    <x-input.model-select wire:model="gender" :label="'Gender'">
                        <option>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </x-input.model-select>


                </div>

                <div class="flex flex-col gap-0 sm:gap-3">


                    <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
                    <x-input.model-text wire:model="whatsapp" :label="'Whatsapp'"/>
                    <x-input.model-text wire:model="email" :label="'Email'"/>

                    <x-input.model-text wire:model="address_1" :label="'Address'"/>
                    <x-input.model-text wire:model="address_2" :label="'Street,Area'"/>


                    <!-- City ------------------------------------------------------------------------------------->
                    <div class="flex flex-col sm:flex-row w-full gap-2">
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

                    <!-- State ------------------------------------------------------------------------------------>
                    <div class="flex flex-col sm:flex-row w-full gap-2">
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

                    <!-- Pin-code --------------------------------------------------------------------------------->
                    <div class="flex flex-col sm:flex-row w-full gap-2">
                        <label for="pincode_name"
                               class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
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

                    {{--                    <!-- SportMaster ---------------------------------------------------------------------------------->--}}
                    {{--                    <div class="flex flex-col sm:flex-row w-full gap-2">--}}
                    {{--                        <label for="sportsMaster_name"--}}
                    {{--                               class="w-[10rem] text-zinc-500 tracking-wide py-2 ">Master</label>--}}
                    {{--                        <div x-data="{isTyped: @entangle('sportsMasterTyped')}" @click.away="isTyped = false"--}}
                    {{--                             class="w-full">--}}
                    {{--                            <div class="relative">--}}
                    {{--                                <input--}}
                    {{--                                    id="sportsMaster_name"--}}
                    {{--                                    type="search"--}}
                    {{--                                    wire:model.live="sportsMaster_name"--}}
                    {{--                                    autocomplete="off"--}}
                    {{--                                    placeholder="Choose.."--}}
                    {{--                                    @focus="isTyped = true"--}}
                    {{--                                    @keydown.escape.window="isTyped = false"--}}
                    {{--                                    @keydown.tab.window="isTyped = false"--}}
                    {{--                                    @keydown.enter.prevent="isTyped = false"--}}
                    {{--                                    wire:keydown.arrow-up="decrementSportsMaster"--}}
                    {{--                                    wire:keydown.arrow-down="incrementSportsMaster"--}}
                    {{--                                    wire:keydown.enter="enterSportsMaster"--}}
                    {{--                                    class="block w-full purple-textbox "--}}
                    {{--                                />--}}

                    {{--                                <!-- SportMaster Dropdown -------------------------------------------------------------------->--}}

                    {{--                                <div x-show="isTyped"--}}
                    {{--                                     x-transition:leave="transition ease-in duration-100"--}}
                    {{--                                     x-transition:leave-start="opacity-100"--}}
                    {{--                                     x-transition:leave-end="opacity-0"--}}
                    {{--                                     x-cloak--}}
                    {{--                                >--}}
                    {{--                                    <div class="absolute z-20 w-full mt-2">--}}
                    {{--                                        <div class="block py-1 shadow-md w-full--}}
                    {{--                rounded-lg border-transparent flex-1 appearance-none border--}}
                    {{--                                 bg-white text-gray-800 ring-1 ring-purple-600">--}}
                    {{--                                            <ul class="overflow-y-scroll h-96">--}}
                    {{--                                                @if($sportsMasterCollection)--}}
                    {{--                                                    @forelse ($sportsMasterCollection as $i => $sportsMaster)--}}

                    {{--                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8--}}
                    {{--                                                        {{ $highlightSportsMaster === $i ? 'bg-yellow-100' : '' }}"--}}
                    {{--                                                            wire:click.prevent="setSportsMaster('{{$sportsMaster->vname}}','{{$sportsMaster->id}}')"--}}
                    {{--                                                            x-on:click="isTyped = false">--}}
                    {{--                                                            {{ $sportsMaster->vname }}--}}
                    {{--                                                        </li>--}}
                    {{--                                                    @empty--}}
                    {{--                                                        <a href="{{route('sportsClub.masters')}}" role="button"--}}
                    {{--                                                           class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">--}}
                    {{--                                                            Not found , Want to create new--}}
                    {{--                                                        </a>--}}
                    {{--                                                    @endforelse--}}
                    {{--                                                @endif--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <x-input.model-text wire:model="experience" :label="'Experience'"/>

                    <!-- Image ---------------------------------------------------------------------------------------->
                    <div class="flex flex-row gap-6 mt-4">

                        <div class="flex">

                            <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Photo</label>

                            <div class="flex-shrink-0">

                                <div>
                                    @if($student_photo)
                                        <div class="flex-shrink-0 ">
                                            <img class="h-24 w-full" src="{{ $student_photo->temporaryUrl() }}"
                                                 alt="{{$student_photo?:''}}"/>
                                        </div>
                                    @endif

                                    @if(!$student_photo && isset($old_student_photo))
                                        <img class="h-24 w-full"
                                             src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_student_photo))}}"
                                             alt="">

                                    @else
                                        <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="relative">

                            <div>
                                <label for="student_photo"
                                       class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                    <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                    Upload file

                                    <input type="file" id='student_photo' wire:model="student_photo" class="hidden"/>
                                    <p class="text-xs font-light text-gray-400 mt-2">PNG, JPG SVG, WEBP, and GIF are
                                        Allowed.</p>
                                </label>
                            </div>

                            <div wire:loading wire:target="student_photo" class="z-10 absolute top-6 left-12">
                                <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.create-new>

    </x-forms.m-panel>

</div>
