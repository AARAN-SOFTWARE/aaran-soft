<div>
    <x-slot name="header">Customer</x-slot>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <section class="bg-white relative overflow-hidden">
        <div class="w-full mx-auto lg:max-w-7xl flex flex-col justify-center py-2 relative p-8">
            <div class="w-full mx-auto">
                <div class="pt-1 w-full h-[50rem]">
                    <div x-data="{ step: 1}"
                         class="rounded-3xl bg-white p-8 lg:p-10 h-[50rem] relative">
                        <!-- Step 1 -->
                        <div x-show="step === 1" class="h-[45rem]">
                            <h2 class="text-lg font-medium text-gray-500">
                                Step 1: Business Location
                            </h2>
                            <div class="flex items-center justify-center p-12">
                                <!-- Author: FormBold Team -->
                                <!-- Learn More: https://formbold.com -->
                                <div class="mx-auto w-full max-w-[550px]">
                                    <form>
                                        <div class="mb-5">
                                            <label
                                                for="fName"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Business Name
                                            </label>
                                            <input
                                                type="text"
                                                name="fName"
                                                id="fName"
                                                placeholder="Business Name" wire:model="vname"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>

                                        <div class="mb-5">
                                            <label
                                                for="guest"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Address - 1
                                            </label>
                                            <input
                                                type="text"
                                                name="fName"
                                                id="fName"
                                                placeholder="Address-1" wire:model="address_1"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <label
                                                        for="guest"
                                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                        Address - 2
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="fName"
                                                        id="fName"
                                                        placeholder="Address-2" wire:model="address_2"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                    />
                                                </div>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <label
                                                        for="guest"
                                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                        Landmark
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="fName"
                                                        id="fName"
                                                        placeholder="Landmark" wire:model="landmark"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <!-- City ----------------------------------------------------------------------------------------------------->
                                                    <div class="flex flex-row  gap-3">
                                                        <div class="w-full gap-2">
                                                            <label for="city_name"
                                                                   class="mb-3 block text-base font-medium text-[#07074D]">City</label>
                                                            <div x-data="{isTyped: @entangle('cityTyped')}"
                                                                 @click.away="isTyped = false" class="w-full ">
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
                                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
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
                                                                                <ul class="overflow-y-scroll h-52">
                                                                                    @if($cityCollection)
                                                                                        @forelse ($cityCollection as $i => $city)

                                                                                            <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                                                               {{ $highlightCity === $i ? 'bg-yellow-100' : '' }}"
                                                                                                wire:click.prevent="setCity('{{$city->vname}}','{{$city->id}}')"
                                                                                                x-on:click="isTyped = false">
                                                                                                {{ $city->vname }}
                                                                                            </li>
                                                                                        @empty
                                                                                            <button
                                                                                                wire:click.prevent="citySave('{{$city_name}}')"
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
                                                </div>
                                            </div>


                                            <div class="w-full px-3 sm:w-1/2">

                                                <div class="mb-5">

                                                    <div class="flex flex-col w-full gap-3">
                                                        <div class=" w-full gap-2">
                                                            <label for="state_name"
                                                                   class="mb-3 block text-base font-medium text-[#07074D]">State</label>
                                                            <div x-data="{isTyped: @entangle('stateTyped')}"
                                                                 @click.away="isTyped = false" class="w-full">
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
                                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
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
                                                                                <ul class="overflow-y-scroll h-52">
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
                                                </div>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <div class="flex flex-col gap-2">
                                                        <div class=" w-full gap-2">
                                                            <label for="pincode_name"
                                                                   class="mb-3 block text-base font-medium text-[#07074D]">Pincode</label>
                                                            <div x-data="{isTyped: @entangle('pincodeTyped')}"
                                                                 @click.away="isTyped = false" class="w-full">
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
                                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
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
                                                                                <ul class="overflow-y-scroll max-h-36">
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
                                                </div>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <div class="flex flex-col gap-2">
                                                        <div class=" w-full gap-2">
                                                            <label for="country_name"
                                                                   class="mb-3 block text-base font-medium text-[#07074D]">Country</label>
                                                            <div x-data="{isTyped: @entangle('countryTyped')}"
                                                                 @click.away="isTyped = false" class="w-full">
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
                                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
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
                                                                                <ul class="overflow-y-scroll max-h-36">
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
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="mt-4 w-full text-right absolute bottom-14 right-10">
                                <button
                                    class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white
                                    hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-fit"
                                    @click="step++">
                                    Next
                                </button>
                            </div>
                        </div> <!-- Step 2 -->
                        <div x-show="step === 2" style="display: none;" class="h-[45rem] relative">
                            <h2 class="text-lg font-medium text-gray-500 mb-4">
                                Step 2: Contact Information
                            </h2>
                            <div class="flex items-center justify-center p-12">
                                <!-- Author: FormBold Team -->
                                <!-- Learn More: https://formbold.com -->
                                <div class="mx-auto w-full max-w-[550px]">
                                    <form>
                                        <div class="mb-5">
                                            <label
                                                for="lName"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Company Name
                                            </label>
                                            <input
                                                type="text"
                                                name="lName"
                                                id="lName"
                                                placeholder="Company Name" wire:model="contact_person"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                        <div class="mb-5">
                                            <label
                                                for="fName"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Phone Number
                                            </label>
                                            <input
                                                type="text"
                                                name="fName"
                                                id="fName"
                                                placeholder="Phone Number"  wire:model="mobile"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                        <div class="mb-5">
                                            <label
                                                for="lName"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Whatsapp Number
                                            </label>
                                            <input
                                                type="text"
                                                name="lName"
                                                id="lName"
                                                placeholder="Whatsapp Number" wire:model="whatsapp"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                        <div class="mb-5">
                                            <label
                                                for="guest"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Email
                                            </label>
                                            <input
                                                type="email"
                                                name="fName"
                                                id="fName"
                                                placeholder="Email" wire:model="email"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-4 flex  w-full justify-evenly absolute bottom-6">
                                <div class="w-full">
                                    <button
                                        class="rounded-full bg-blue-50 px-8 py-2 h-12 text-sm font-semibold text-blue-600
                                    hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-fit"
                                        @click="step--">Previous
                                    </button>
                                </div>
                                <div class="w-full text-right">
                                    <button
                                        class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white
                                     hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-fit"
                                        @click="step++">Next
                                    </button>
                                </div>
                            </div>
                        </div> <!-- Step 3 -->
                        <div x-show="step === 3" style="display: none;" class="h-[45rem] relative">
                            <h2 class="text-lg font-medium text-gray-500 mb-4">
                                Step 3: Business Information
                            </h2>
                            <div class="flex items-center justify-center p-12">
                                <!-- Author: FormBold Team -->
                                <!-- Learn More: https://formbold.com -->
                                <div class="mx-auto w-full max-w-[550px]">
                                    <form>

                                        <div class="mb-5">
                                            <label
                                                for="time"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Working Days
                                            </label>
                                            <select
                                                name="time"
                                                id="time" wire:model="working_days"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            >
                                                <option>Choose...</option>
                                                <option value="MONDAY-FRIDAY">MONDAY-FRIDAY</option>
                                                <option value="MONDAY-SATURDAY">MONDAY-SATURDAY</option>
                                                <option value="MONDAY-SUNDAY">MONDAY-SUNDAY</option>
                                            </select>
                                        </div>

                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <label
                                                        for="time"
                                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                        Open Time
                                                    </label>
                                                    <input
                                                        type="time"
                                                        name="time"
                                                        id="time" wire:model="business_open_timing"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                    />
                                                </div>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <label
                                                        for="time"
                                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                        Close Time
                                                    </label>
                                                    <input
                                                        type="time"
                                                        name="time"
                                                        id="time" wire:model="business_close_timing"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label
                                                for="time"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                GeoLocation
                                            </label>
                                            <input
                                                type="text"
                                                name="time"
                                                id="time" wire:model="geoLocation"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                        <div class="mb-5">
                                            <label
                                                for="time"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                WebSite
                                            </label>
                                            <input
                                                type="text"
                                                name="time"
                                                id="time" wire:model="website"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                        <div class="mb-5">
                                            <label
                                                for="time"
                                                class="mb-3 block text-base font-medium text-[#07074D]"
                                            >
                                                Gst NO
                                            </label>
                                            <input
                                                type="text"
                                                name="time"
                                                id="time" wire:model="gstin"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-4 flex  w-full justify-evenly absolute bottom-6">
                                <div class="w-full">
                                    <button
                                        class="rounded-full bg-blue-50 px-8 py-2 h-12 text-sm font-semibold text-blue-600
                                    hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-fit"
                                        @click="step--">Previous
                                    </button>
                                </div>
                                <div class="w-full text-right">
                                    <button
                                        class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white
                                     hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-fit"
                                        @click="step++">Next
                                    </button>
                                </div>
                            </div>
                        </div> <!-- Step 4 -->
                        <div x-show="step === 4" style="display: none;" class="h-[45rem] relative">
                            <h2 class="text-lg font-medium text-gray-500">
                                Step 3: Confirmation
                            </h2>
                            <div class="mt-5 space-y-4 font-medium text-sm text-gray-500 bg-amber-500">
                                <!-- component -->
                                <div class="p-8 flex justify-center  bg-white">
                                    <div
                                        class="w-full md:w-full relative grid grid-cols-1 md:grid-cols-3 border border-gray-300 bg-gray-100 rounded-lg">
                                        <div
                                            class="rounded-l-lg p-4 bg-gray-200 flex flex-col justify-center items-center border-0 border-r border-gray-300 ">
                                            <label class="cursor-pointer hover:opacity-80 inline-flex items-center shadow-md my-2 px-2 py-2 bg-gray-900 text-gray-50 border border-transparent
                                            rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                                            focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                                   for="restaurantImage">

                                                Select image
                                                <input id="restaurantImage" wire:model="images"
                                                       class="text-sm cursor-pointer w-36 hidden" multiple
                                                       type="file">
                                            </label>
                                            <button
                                                class='inline-flex items-center shadow-md my-2 px-2 py-2 bg-gray-900 text-gray-50 border border-transparent
                                                rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                                                focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                                remove image
                                            </button>
                                        </div>
                                        @if($showEditModal)
                                            <div
                                                class="relative order-first md:order-last h-28 md:h-auto flex justify-center items-center border border-dashed border-gray-400 col-span-2 m-2 rounded-lg bg-no-repeat bg-center bg-origin-padding bg-cover">
                                                <span class="text-gray-400 opacity-75">
                                            <svg class="w-14 h-14" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke-width="0.7" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                              </svg>
                                                 </span>
                                            </div>
                                        @else
                                            <div
                                                class="relative order-first md:order-last h-28 md:h-auto flex justify-center items-center border border-dashed border-gray-400 col-span-2 m-2 rounded-lg bg-no-repeat bg-center bg-origin-padding bg-cover">
                                                @if(isset($images))
                                                    @foreach($images as $image)
                                                        <div class="mt-2 p-5">
                                                            <img class="h-48 w-full" src="{{ $image->temporaryUrl() }}"
                                                                 alt="{{$image?:''}}"/>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{--                                                <img class="h-48 w-full"--}}
                                                {{--                                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_ui_pic))}}"--}}
                                                {{--                                                     alt="">--}}

                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div> <!-- Add more fields as needed -->
                            <div class="mt-4 flex  w-full justify-evenly absolute bottom-6">
                                <div class="w-full">
                                    <button
                                        class="rounded-full bg-blue-50 px-8 py-2 h-12 text-sm font-semibold text-blue-600
                                    hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-fit"
                                        @click="step--">Previous
                                    </button>
                                </div>
                                <div class="w-full text-right">
                                    <button
                                        class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white
                                     hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-fit" wire:click="save"
                                    >Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Ends component -->
            </div>
        </div>
    </section>


</div>
