<div>
    <x-slot name="header">Share Profit & Lose</x-slot>

    <x-forms.m-panel>

        <div class="flex justify-between items-center">
            <select wire:model.live="search_user_id" :label="'User'" class="w-[30rem] purple-textbox">
                <option class="text-gray-400"> choose ..</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

            <div>{{ \App\Models\User::getName($search_user_id) }}</div>
            <div>&nbsp;</div>


            <x-button.new/>

        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vdate')"/>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" class="w-[10rem]" center>Date
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Profit</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Loosed</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Difference</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Remarks</x-table.header-text>
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
                                <a href="{{ route('shareTrades.stockDetails',[$row->id]) }}">
                                {{date('d-m-Y', strtotime($row->vdate))}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text right>
                                {{ $row->share_profit }}
                            </x-table.cell-text>

                            <x-table.cell-text right>
                                {{ $row->share_loosed }}
                            </x-table.cell-text>

                            <x-table.cell-text right class="font-semibold {{$row->share_profit-$row->share_loosed > 0 ?'text-green-500':'text-red-500'}}">
                                {{ $row->share_profit-$row->share_loosed }}
                            </x-table.cell-text>

                            <x-table.cell-text>
                                {{ $row->remarks }}
                            </x-table.cell-text>

                            <x-table.cell-action id="{{$row->id}}"/>
                        </x-table.row>
                    @php
                        $totalProfit  += floatval($row->share_profit);
                        $totalLoosed  += floatval($row->share_loosed);
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <x-table.cell-text :colspan="2" :class="'text-blue-600 font-semibold'" right>&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalProfit)}}</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalLoosed)}}</x-table.cell-text>

                    <x-table.cell-text right
                                       class="font-semibold {{$totalProfit-$totalLoosed > 0 ?'text-green-500':'text-red-500'}}">
                        {{ \App\Helper\ConvertTo::decimal2($totalProfit-$totalLoosed)}}</x-table.cell-text>


                </x-table.row>

            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-select wire:model="user_id" :label="'User'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </x-input.model-select>
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-text wire:model="share_profit" :label="'Profit'"/>
            <x-input.model-text wire:model="share_loosed" :label="'Loosed'"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

        <div>
            <x-button.back/>
        </div>
    </x-forms.m-panel>
</div>
