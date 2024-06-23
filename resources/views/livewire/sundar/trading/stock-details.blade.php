<div>
    <x-slot name="header">Stock Details</x-slot>
    <x-forms.m-panel>

        <div class="flex justify-between items-center">
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <x-button.new/>
        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vdate')"/>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" class="w-[10rem]" center>Serial
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" class="w-[10rem]" center>Date
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Trade Type</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Stock Name</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Option Type</x-table.header-text>
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
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->serial }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                                {{date('d-m-Y', strtotime($row->vdate))}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->trade_type }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->stock_name }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->option_type }}
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
                    <x-table.cell-text :colspan="10" :class="'text-blue-600 font-semibold'" right>&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</x-table.cell-text>

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

{{--            <x-input.model-select wire:model="user_id" :label="'User'">--}}
{{--                <option class="text-gray-400"> choose ..</option>--}}
{{--                @foreach($users as $user)--}}
{{--                    <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                @endforeach--}}
{{--            </x-input.model-select>--}}

            <x-input.model-text wire:model="serial" :label="'Serial'"/>
{{--            <x-input.model-date wire:model="vdate" :label="'Date'"/>--}}

            <x-input.model-select wire:model="trade_type" :label="'Trade Type'">
                <option class="text-gray-400"> choose ..</option>
                    <option value="Delivery">Cash</option>
                    <option value="Options">MTF-Pay later</option>
            </x-input.model-select>

            <x-input.model-text wire:model="stock_name" :label="'Stock Name'"/>

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
