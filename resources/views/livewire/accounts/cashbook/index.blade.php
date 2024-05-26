<div>
    <x-slot name="header">Cash Book</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <div class="flex flex-row gap-2 py-2 justify-end">
            <button wire:click="create_receipt" class="w-20  bg-green-600 hover:bg-green-700
                border-green-700 hover:border-green-700 focus:outline-none text-white uppercase shadow-lg rounded-lg py-1">
                Receipt
            </button>

            <button wire:click="create" class="w-20 bg-red-600 hover:bg-red-700 border-red-700
                hover:border-red-700 focus:outline-none text-white  uppercase  shadow-lg rounded-lg  py-1">Payment
            </button>
        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Date</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Order No</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Purpose</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Person</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Receipt</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Payment</x-table.header-text>
                <x-table.header-text center>Balance</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">

                @forelse($list as $index=> $row)
                    <tr class="hover:bg-yellow-100">

                        <x-table.cell-text center>{{ $index+1 }}</x-table.cell-text>

                        <x-table.cell-text center>{{date('d-m-Y', strtotime($row->vdate))}}</x-table.cell-text>

                        @if($row->order_id)
                            <x-table.cell-text center>{{$row->order->vname}}</x-table.cell-text>
                        @else
                            <x-table.cell-text center>&nbsp;-
                            </x-table.cell-text>
                        @endif

                        <x-table.cell-text center>&nbsp;{{$row->remarks}}
                        </x-table.cell-text>

                        <x-table.cell-text center>{{$row->paidby}}</x-table.cell-text>

                        <x-table.cell-text center>

                            @if( $row->receipt == '0.00')
                                {{'-'}}
                            @else
                                {{$row->receipt}}
                            @endif

                        </x-table.cell-text>

                        <x-table.cell-text center>

                            @if( $row->payment == '0.00')
                                {{'-'}}
                            @else
                                {{$row->payment}}
                            @endif

                        </x-table.cell-text>

                        <x-table.cell-text center>{{$row->balance}}</x-table.cell-text>

                        <x-table.cell>
                            <div class="w-full flex justify-center gap-3">
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                    <div class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                        <div class="flex flex-col justify-start items-center -translate-y-full">
                                            <div class="bg-blue-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                Edit
                                            </div>
                                            <div class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-blue-500 -mt-[1px]"></div>
                                        </div>
                                    </div>
                                <x-button.link wire:click="edit({{$row->id}})">&nbsp;
                                    <x-icons.icon :icon="'pencil'"
                                                  class="text-blue-500 h-5 w-auto block"/>
                                </x-button.link>
                                </div>
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                    <div class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                        <div class="flex flex-col justify-start items-center -translate-y-full">
                                            <div class="bg-red-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                delete
                                            </div>
                                            <div class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-red-500 -mt-[1px]"></div>
                                        </div>
                                    </div>
                                <x-button.link wire:click="getDelete({{$row->id}})">&nbsp;
                                    <x-icons.icon :icon="'trash'"
                                                  class="text-red-600 h-5 w-auto block"/>
                                </x-button.link>
                                </div>
                            </div>
                        </x-table.cell>
                    <tr/>

                @empty
                    <x-table.empty/>
                @endforelse

            </x-slot>

            <!-- Footer ----------------------------------------------------------------------------------------------->
            <x-slot name="table_pagination">

                {{$list->links()}}

            </x-slot>

        </x-forms.table>
    </x-forms.m-panel>
    <!-- Delete Model -------------------------------------------------------------------------------------------->
    <x-modal.confirmation wire:model.defer="showDeleteModal">
        <x-slot name="title">Delete Entry</x-slot>
        <x-slot name="content">
            <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
        </x-slot>
        <x-slot name="footer">
            <x-button.secondary wire:click.prevent="$set('showDeleteModal', false)">Cancel</x-button.secondary>
            @if($list->count()!=null)
            <x-button.primary wire:click.prevent="delete({{$row->id}})">Delete</x-button.primary>
            @endif
        </x-slot>
    </x-modal.confirmation>

    <!-- Payment & Receipt -------------------------------------------------------------------------------------------->

    <x-jet.modal wire:model.defer="showEditModal">
        <div class="px-6 pt-4">
            <label class="text-lg font-extrabold">{{$vmode}}</label>
            <x-forms.section-border class="py-2"/>
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            @if($vmode=='Payment')
                <div class="md:flex md:flex-col mb-2">
                    <div class="md:flex">
                        <label for="order_no" class="gray-label mr-5 md:flex">Order No</label>
                        <div x-data="{isTyped: @entangle('orderTyped')}" @click.away="isTyped = false" class="w-3/4">
                            <div class="relative">
                                <input
                                    id="order_no"
                                    type="search"
                                    wire:model.live="order_no"
                                    autocomplete="off"
                                    placeholder="Order No.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementOrder"
                                    wire:keydown.arrow-down="incrementOrder"
                                    wire:keydown.enter="enterOrder"
                                    class="md:ml-5 block w-96 purple-textbox"
                                />

                                <div x-show="isTyped"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     x-cloak
                                >
                                    <div class="absolute z-20 w-full mt-2 ">
                                        <div class="ml-16 block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                            <ul class="overflow-y-scroll h-96">
                                                @if($orderCollection)
                                                    @forelse ($orderCollection as $i => $order)

                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightOrder === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setOrder('{{$order->vname}}','{{$order->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $order->vname }}
                                                        </li>

                                                    @empty
                                                        @livewire('controls.model.order.order-model',[$order_no])
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

                <x-input.model-text wire:model="payment" :label="'Payment'"/>
            @else
                <x-input.model-text wire:model="receipt" :label="'Receipt'"/>
            @endif
            <x-input.model-text wire:model="paidby" :label="'Person'"/>
            <x-input.model-text wire:model="remarks" :label="'Purpose'"/>

            <!-- Save & Cancel ---------------------------------------------------------------------------------------->
            <div class="px-6 py-3 text-right">
                <div class="flex flex-col md:flex-row justify-between gap-3 ">
                    <div
                    ></div>
                    <div class="flex gap-3">
                        <button wire:click.prevent="$set('showEditModal', false)"
                                class='inline-flex items-center px-4 py-2 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest
                               focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150
                               focus:ring-gray-500 bg-gray-600 hover:bg-gray-500 active:bg-gray-700 border-gray-600'>
                            <x-icons.icon :icon="'chevrons-left'" class="h-5 w-auto block px-1.5"/>
                            Cancel
                        </button>
                        <button type="submit" wire:click.prevent="goSubmit"
                                class="
                                                        inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                                        transition-all shadow-xs
                                                        bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                                                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                                                        shadow-blue-200 hover:shadow-2xl hover:shadow-blue-200 hover:-tranneutral-y-px">
                            <x-icons.icon :icon="'save'" class="h-5 w-auto block px-1.5"/>
                            SAVE
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-jet.modal>

    <!-- Re-total ------------------------------------------------------------------------------------------------------>

    <div class="px-5 py-3">
        <button wire:click.prevent="reTotal"
                class="bg-blue-500 px-3 py-2 block text-white hover:bg-blue-400 rounded-md shadow-md">Re-total
        </button>
    </div>
</div>
