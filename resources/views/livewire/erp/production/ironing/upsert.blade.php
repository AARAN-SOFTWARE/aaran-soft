<div>
    <x-slot name="header">IRONING Details</x-slot>
    <x-forms.m-panel>
        <section>
            <div class="grid grid-cols-2 gap-12">

                <!-- Top Left Area ------------------------------------------------------------------------------------>
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-2">

                        <!-- Order No --------------------------------------------------------------------------------->
                        <label for="order_no" class="gray-label">Order No</label>
                        <div x-data="{isTyped: @entangle('orderTyped')}" @click.away="isTyped = false">
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

                    <!-- Style Name ----------------------------------------------------------------------------------->
                    <div class="flex flex-col gap-2">
                        <label for="style_name" class="gray-label">Style Name</label>
                        <div x-data="{isTyped: @entangle('styleTyped')}" @click.away="isTyped = false">
                            <div class="relative">
                                <input
                                    id="style_name"
                                    type="search"
                                    wire:model.live="style_name"
                                    autocomplete="off"
                                    placeholder="Style Name.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementStyle"
                                    wire:keydown.arrow-down="incrementStyle"
                                    wire:keydown.enter="enterStyle"
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
                                                @if($styleCollection)
                                                    @forelse ($styleCollection as $i => $style)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightStyle === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setStyle('{{$style->vname}}','{{$style->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $style->vname }}
                                                        </li>
                                                    @empty
                                                        @livewire('controls.model.order.style-model',[$style_name])
                                                    @endforelse
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job No --------------------------------------------------------------------------------------->

                    <div class="flex flex-col gap-2">
                        <label for="jobcard_no" class="gray-label">Job No</label>
                        <div x-data="{isTyped: @entangle('jobcardTyped')}" @click.away="isTyped = false">
                            <div class="relative">
                                <input
                                    id="jobcard_no"
                                    type="search"
                                    wire:model.live="jobcard_no"
                                    autocomplete="off"
                                    placeholder="Job No.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementJobcard"
                                    wire:keydown.arrow-down="incrementJobcard"
                                    wire:keydown.enter="enterJobcard"
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
                                                @if($jobcardCollection)
                                                    @forelse ($jobcardCollection as $i => $jobcard)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightJobcard === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setJobcard('{{$jobcard->vno}}','{{$jobcard->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $jobcard->vno }}
                                                        </li>
                                                    @empty
                                                        <a href="{{route('jobcards.upsert',['0'])}}" role="button"
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

                </div>

                <!-- Top Right Area ----------------------------------------------------------------------------------->
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="vno" class="gray-label">Challan No</label>
                        <input id="vno" wire:model="vno" class="purple-textbox">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="date" class="gray-label">Date</label>
                        <input id="date" wire:model="vdate" type="date" class="purple-textbox">
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="cutting_master" class="gray-label">Ironing Master</label>
                            <input id="cutting_master" wire:model="iron_master" class="purple-textbox">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            Add Items
        </section>

        <!-- Add Items ------------------------------------------------------------------------------------------------>
        <section class="flex flex-row w-full">

            <div class="w-full">
                <label for="section_inward_no"></label>
                <div x-data="{isTyped: @entangle('sectionTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="section_inward_item_no"
                            type="search"
                            wire:model.live="section_inward_no"
                            autocomplete="off"
                            placeholder="Section Inward Ref.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementSection_inwardItem"
                            wire:keydown.arrow-down="incrementSection_inwardItem"
                            wire:keydown.enter="enterSection_inwardItem"
                            class="block w-full purple-textbox-no-rounded"
                        />

                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">

                                    <div class="overflow-y-scroll h-96">

                                        <table class="w-full">
                                            <thead>
                                            <tr class="h-8 text-xs bg-gray-100 border border-gray-300">
                                                <th class="px-2 text-center border border-gray-300">Inward No</th>
                                                <th class="px-2 text-center border border-gray-300">COLOUR</th>
                                                <th class="px-2 text-center border border-gray-300">SIZE</th>
                                                <th class="px-2 text-center border border-gray-300">QTY</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(isset($sectionInwardCollection))
                                                @forelse ($sectionInwardCollection as $i => $sectionInward)
                                                    <div hidden="hidden"
                                                         wire:key="{{ $sectionInward['section_inward_item_id'] }}"></div>
                                                    <tr class="cursor-pointer px-3 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightJobcard=== $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click="setSectionInwardItem(
                                                                                '{{$sectionInward['jobcard_item_id']}}',
                                                                                '{{$sectionInward['section_inward_item_id']}}','{{$sectionInward['section_inward_no']}}',
                                                                                '{{$sectionInward['colour_id']}}','{{$sectionInward['colour_name']}}',
                                                                                '{{$sectionInward['size_id']}}','{{$sectionInward['size_name']}}',
                                                                                '{{$sectionInward['qty']}}')"
                                                        x-on:click="isTyped = false">

                                                        <td class="px-2 text-center border border-gray-300">{{$sectionInward['section_inward_no']}}</td>
                                                        <td class="px-2 text-center border border-gray-300">{{$sectionInward['colour_name']}}</td>
                                                        <td class="px-2 text-center border border-gray-300">{{$sectionInward['size_name']}}</td>
                                                        <td class="px-2 text-center border border-gray-300">{{$sectionInward['qty']}}</td>
                                                    </tr>

                                                @empty
                                                    <tr>
                                                        <td>&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <a href="{{route('sectioninwards.upsert',['0'])}}"
                                                               role="button"
                                                               class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                                                Not found , Want to create new
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <label for="Ironing_qty"></label>
                <input id="ironing_qty" wire:model="qty" class="w-full border-gray-200" placeholder="Qty">
            </div>

            <button wire:click="addItems" class="px-3 bg-green-500 text-white font-semibold tracking-wider ">Add
            </button>
        </section>

        <!--Display Table---------------------------------------------------------------------------------------------->

        <section>

            <div class="py-2 mt-5">

                <table class="w-full">

                    <!--Table Header ---------------------------------------------------------------------------------->

                    <thead>
                    <tr class="h-8 text-xs bg-gray-100 border border-gray-300">
                        <th class="w-12 px-2 text-center border border-gray-300">#</th>
                        <th class="px-2 text-center border border-gray-300">Inward Dc No</th>
                        <th class="px-2 text-center border border-gray-300">COLOUR</th>
                        <th class="px-2 text-center border border-gray-300">SIZE</th>
                        <th class="px-2 text-center border border-gray-300">QTY</th>
                        <th class="w-12 px-1 text-center border border-gray-300">ACTION</th>
                    </tr>
                    </thead>

                    <!--Table Items ----------------------------------------------------------------------------------->

                    <tbody>
                    @php
                        $totalQty =0;
                    @endphp

                    @foreach($itemList as $index => $row)
                        <tr class="border border-gray-400">
                            <td class="text-center border border-gray-300 bg-gray-100">
                                <button class="w-full h-full cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">
                                    {{$index+1}}
                                </button>
                            </td>
                            <td class="px-2 text-left border border-gray-300"
                                wire:click.prevent="changeItems({{$index}})">{{$row['section_inward_no']}}</td>
                            <td class="px-2 text-center border border-gray-300"
                                wire:click.prevent="changeItems({{$index}})">{{$row['colour_name']}}</td>
                            <td class="px-2 text-center border border-gray-300"
                                wire:click.prevent="changeItems({{$index}})">{{$row['size_name']}}</td>
                            <td class="px-2 text-center border border-gray-300"
                                wire:click.prevent="changeItems({{$index}})">{{floatval($row['qty'])}}</td>
                            <td class="text-center border border-gray-300">
                                <button wire:click.prevent="removeItems({{$index}})"
                                        class="py-1.5 w-full text-red-500 items-center ">
                                    <x-icons.icon icon="trash" class="block w-auto h-6"/>
                                </button>
                            </td>
                        </tr>

                        @php
                            $totalQty += $row['qty']+0
                        @endphp
                    @endforeach

                    </tbody>

                    <!--Table Footer ---------------------------------------------------------------------------------->

                    <tfoot class="mt-2">
                    <tr class="h-8 text-sm border border-gray-400 bg-gray-50">
                        <td colspan="4" class="px-2 text-xs text-right border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</td>
                        <td class="px-2 text-center border border-gray-300">{{$totalQty}}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-5 flex gap-3">
                <label for="receiver_details" class="gray-label">Receiver Details</label>
                <input id="receiver_details" wire:model="receiver_details" class="purple-textbox w-[32rem]"/>
            </div>
        </section>

    </x-forms.m-panel>

    <!--Save & Back --------------------------------------------------------------------------------------------------->
    <section>
        <div class="px-8 py-6 gap-4 bg-gray-100 rounded-b-md shadow-lg w-full ">
            <div class="flex flex-col md:flex-row justify-between gap-3">
                <div class="flex gap-3">
                    <x-button.save/>
                    <x-button.back/>
                </div>

            </div>
        </div>
    </section>
</div>
