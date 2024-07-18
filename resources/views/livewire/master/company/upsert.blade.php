<div>
    <x-slot name="header">Company Entry</x-slot>

    <!-- Input Model --------------------------------------------------------------------------------------------------->
    <x-forms.m-panel>
        <x-input.model-text wire:model="vname" :label="'Name'"/>
        <x-input.model-text wire:model="display_name" :label="'Display-name'"/>
        <x-input.model-text wire:model="address_1" :label="'Address'"/>
        <x-input.model-text wire:model="address_2" :label="'Area-Road'"/>
        <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
        <x-input.model-text wire:model="landline" :label="'Landline'"/>
        <x-input.model-text wire:model="gstin" :label="'GSTin'"/>
        <x-input.model-text wire:model="pan" :label="'Pan'"/>
        <x-input.model-text wire:model="msme_no" :label="'MSME No'"/>
        <x-input.model-text wire:model="msme_type" :label="'MSME Type'"/>
        <x-input.model-text wire:model="email" :label="'Email'"/>
        <x-input.model-text wire:model="website" :label="'Website'"/>

        <!-- City ----------------------------------------------------------------------------------------------------->
        <div class="flex flex-row py-3 gap-3">
            <div class="xl:flex w-full gap-2">
                <label for="city_name" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">City</label>
                <div x-data="{isTyped: @entangle('cityTyped')}" @click.away="isTyped = false" class="w-full">
                    <div>
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

                        <!--City Dropdown ----------------------------------------------------------------------------->
                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                    <ul class="overflow-y-scroll h-96">
                                        @if($cityCollection)
                                            @forelse ($cityCollection as $i => $city)
                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightCity === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setCity('{{  $city->vname }}','{{$city->id}}')"
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


        <!-- State --------------------------------------------------------------------------------------------------->
        <div class="flex flex-col gap-2">
            <div class="xl:flex w-full gap-2">
                <label for="state_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                <div x-data="{isTyped: @entangle('stateTyped')}" @click.away="isTyped = false" class="w-full">
                    <div>
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
                            wire:keydown.arrow-up="decrementState"
                            wire:keydown.arrow-down="incrementState"
                            wire:keydown.enter="enterState"
                            class="block w-full purple-textbox"
                        />

                        <!--State Dropdown ---------------------------------------------------------------------------->
                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
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
        <div class="flex flex-col gap-2">
            <div class="xl:flex w-full gap-2">
                <label for="pincode_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                <div x-data="{isTyped: @entangle('pincodeTyped')}" @click.away="isTyped = false" class="w-full">
                    <div>
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
                            <!--Pin-code Dropdown --------------------------------------------------------------------->
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
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

        <!-- Sundar ---------------------------------------------------------------------------------------------------->
        @admin
        <div>
            <x-input.model-select wire:model="tenant_id" :label="'Tenant'">
                <option>Choose...</option>
                @foreach($tenants as $i)
                    <option value="{{ $i->id }}">{{ $i->t_name }}</option>
                @endforeach
            </x-input.model-select>
        </div>
        @endadmin

        <!-- Bank Details --------------------------------------------------------------------------------------------->
        <x-input.model-text wire:model="acc_no" :label="'Account No'"/>
        <x-input.model-text wire:model="ifsc_code" :label="'IFSC Code'"/>
        <x-input.model-text wire:model="bank" :label="'Bank'"/>
        <x-input.model-text wire:model="branch" :label="'Branch'"/>

        <!-- Image ---------------------------------------------------------------------------------------------------->
        <div class="flex flex-items-center pt-2">
            <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">Logo</label>
            <div class="flex-shrink-0 h-20 w-20 mr-4">
                @if($logo)
                    <div class="flex-shrink-0 h-20 w-20 mr-4">
                        <img
                            src="{{$isUploaded? $logo->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($logo)) }}" alt="logo">
                    </div>
                @else

                    <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>

                    {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">--}}
{{--                        <path fill-rule="evenodd"--}}
{{--                              d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"--}}
{{--                              clip-rule="evenodd"/>--}}
{{--                    </svg>--}}
                @endif
            </div>

            <div>
                <input type="file" wire:model="logo" class="">
                <button wire:click.prevent="save_logo" class="m-4">Save photo</button>
            </div>
        </div>

    </x-forms.m-panel>

    <!--Save Button Area ------------------------------------------------------------------------------------------------------>
    <x-forms.m-panel-bottom-button save back active/>
</div>

