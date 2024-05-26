<div>
    <x-slot name="header">Payment Entry</x-slot>

    <x-forms.m-panel>
        <div class="md:grid grid-cols-2 gap-2 ">

            <!-- Left Area ---------------------------------------------------------------------------------------------->
            <div class="px-4">

                <!-- Party Name ------------------------------------------------------------------------------------>
                <div class="xl:flex w-full gap-2 pt-3">
                    <label for="size_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Party Name</label>
                    <div x-data="{isTyped: @entangle('contactTyped')}" @click.away="isTyped = false" class="w-full">
                        <div class="relative ">
                            <input
                                id="contact_name"
                                type="search"
                                wire:model.live="contact_name"
                                autocomplete="off"
                                placeholder="Party Name.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementContact"
                                wire:keydown.arrow-down="incrementContact"
                                wire:keydown.enter="enterContact"
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
                                            @if($contactCollection)
                                                @forelse ($contactCollection as $i => $contact)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightContact === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setContact('{{$contact->vname}}','{{$contact->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $contact->vname }}
                                                    </li>

                                                @empty
                                                    <a href="{{route('contacts.upsert',['0'])}}" role="button"
                                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                                        Not found , Want to create new
                                                    </a>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-input.model-date wire:model="vdate" :label="'Date'"/>
                <x-input.model-text wire:model="payment_amount" :label="'Payment Amount'"/>
            </div>

            <!-- Right Area ----------------------------------------------------------------------------------------->
            <div class="px-4">

                <!-- Payment-Model ---------------------------------------------------------------------------------->
                <div class="xl:flex w-full gap-2 pt-3">
                    <label for="receipttype_name"
                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Payment-Model</label>
                    <div x-data="{isTyped: @entangle('recepittypeTyped')}" @click.away="isTyped = false" class="w-full">
                        <div class="relative">
                            <input
                                id="receipttype_name"
                                type="search"
                                wire:model.live="receipttype_name"
                                autocomplete="off"
                                placeholder="Receipt-type Name.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementReceipttype"
                                wire:keydown.arrow-down="incrementReceipttype"
                                wire:keydown.enter="enterReceipttype"
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
                                            @if($receipttypeCollection)
                                                @forelse ($receipttypeCollection as $i => $receipttype)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightReceipttype === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setReceipttype('{{$receipttype->vname}}','{{$receipttype->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $receipttype->vname }}
                                                    </li>

                                                @empty
                                                    @livewire('controls.model.common.receipttype-model',[$receipttype_name])
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-input.model-text wire:model="chq_no" :label="'Cheque No'"/>
                <x-input.model-date wire:model="chq_date" :label="'Cheque Date'"/>

                <!-- Bank Name -------------------------------------------------------------------------------------->
                <div class="md:flex w-full gap-2 pt-3">
                    <label for="bank_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Bank Name</label>
                    <div x-data="{isTyped: @entangle('bankTyped')}" @click.away="isTyped = false" class="w-full">
                        <div class="relative">
                            <input
                                id="bank_name"
                                type="search"
                                wire:model.live="bank_name"
                                autocomplete="off"
                                placeholder="Bank Name.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementBank"
                                wire:keydown.arrow-down="incrementBank"
                                wire:keydown.enter="enterBank"
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
                                            @if($bankCollection)
                                                @forelse ($bankCollection as $i => $bank)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightBank === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setBank('{{$bank->vname}}','{{$bank->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $bank->vname }}
                                                    </li>

                                                @empty
                                                    @livewire('controls.model.common.bank-model',[$bank_name])
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
    </x-forms.m-panel>

    <!-- Footer ----------------------------------------------------------------------------------------------------->
    <div class="px-8 border border-gray-400 border-t-0 bg-gray-100 rounded-b-md shadow-lg w-full">

        <div class="flex flex-row justify-between py-4">
            <div class="flex gap-3">
                <x-button.save/>
                <x-button.back/>
            </div>
        </div>
    </div>
</div>
