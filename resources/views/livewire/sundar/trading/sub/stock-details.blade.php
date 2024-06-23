<div>
    <x-slot name="header">Stock Details</x-slot>
    <x-forms.m-panel>

        <div class="flex justify-between items-center">
            <div>{{}}</div>
            <div>&nbsp;</div>
            <x-button.new/>
        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vdate')"/>
{{--                <x-table.header-text wire:click.prevent="sortBy('vdate')" class="w-[10rem]" center>Date--}}
{{--                </x-table.header-text>--}}
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Stock Name</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Trade Type</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Buy</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Sell</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Spread</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Share</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Profit</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Loosed</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Commission</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            @php
                $totalProfit = 0;
                $totalLoosed = 0;
            @endphp

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        {{--                        <x-table.cell-text center>--}}
                        {{--                            {{ $index + 1 }}--}}
                        {{--                        </x-table.cell-text>--}}

                        <x-table.cell-text center>
                            {{ $row->serial }}
                        </x-table.cell-text>

{{--                        <x-table.cell-text center>--}}
{{--                            {{date('d-m-Y', strtotime($row->vdate))}}--}}
{{--                        </x-table.cell-text>--}}


                        <x-table.cell-text center>
                            {{ $row->stockName->vname }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->trade_type }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->buy }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->sell }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->spread }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->shares+0 }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->profit }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->loosed }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->commission }}
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                    @php
                        $totalProfit  += floatval($row->profit);
                        $totalLoosed  += floatval($row->loosed);
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <x-table.cell-text :colspan="7" :class="'text-blue-600 font-semibold'" right>&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalProfit)}}</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalLoosed)}}</x-table.cell-text>

                </x-table.row>

            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">

            <x-input.model-text wire:model="serial" :label="'Serial'"/>
            <x-input.model-select wire:model="trade_type" :label="'Trade Type'">
                <option class="text-gray-400"> choose ..</option>
                <option value="Cash">Cash</option>
                <option value="MTF-Pay Later">MTF-Pay Later</option>
            </x-input.model-select>

{{--            <x-input.model-text wire:model="stock_name_id" :label="'Stock Name'"/>--}}



            <div class="xl:flex w-full gap-2">

                <!-- Party Name --------------------------------------------------------------------------------------->
                <label for="stock_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Stock Name</label>

                <div x-data="{isTyped: @entangle('stockNameTyped')}" @click.away="isTyped = false" class="w-full">
                    <div class="relative ">
                        <input
                            id="stock_name"
                            type="search"
                            wire:model.live="stock_name"
                            autocomplete="off"
                            placeholder="Stock Name.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementStockName"
                            wire:keydown.arrow-down="incrementStockName"
                            wire:keydown.enter="enterStockName"
                            class="block w-full purple-textbox "
                        />
{{--                        @error('stock_name_id')--}}
{{--                        <span class="text-red-500">{{'The Stock Name is Required.'}}</span>--}}
{{--                        @enderror--}}

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
                                        @if($stockNameCollection)
                                            @forelse ($stockNameCollection as $i => $stock)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightStockName === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setStockName('{{$stock->vname}}','{{$stock->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $stock->vname }}
                                                </li>

                                            @empty
                                                <button wire:click.prevent="stockSave('{{$stock_name}}')" class="text-white bg-green-500 text-center w-full">
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

            <x-input.model-text wire:model="buy" :label="'Buy'"/>
            <x-input.model-text wire:model="sell" wire:change="spreadCalculation" :label="'Sell'"/>
            <x-input.model-text wire:model="spread" :label="'Spread'"/>
            <x-input.model-text wire:model="shares" :label="'Shares'"/>
            <x-input.model-text wire:model="profit" :label="'profit'"/>
            <x-input.model-text wire:model="loosed" :label="'Loosed'"/>
            <x-input.model-text wire:model="commission" :label="'Commission'"/>
        </x-forms.create>

        <div>
            <x-button.back/>
        </div>
    </x-forms.m-panel>
</div>
