<div>
    <x-slot name="header">Share Trades</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vdate')"/>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Date</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Opening Balance</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Deposit</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Profit</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Loosed</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Withdraw</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Charges</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Balance</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Remarks</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            @php
                $totalOpening = 0;
                $totalDeposit = 0;
                $totalProfit = 0;
                $totalLoosed = 0;
                $totalWithdraw = 0;
                $totalCharges = 0;
                $totalBalance = 0;

            @endphp

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{date('d-m-Y', strtotime($row->vdate))}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->opening_balance }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->deposit }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->profit }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->loosed }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->withdraw }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->charges }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->balance }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->remarks }}
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>

                    @php
                        $totalOpening  += floatval($row->opening_balance + 0);
                        $totalDeposit  += floatval($row->deposit);
                        $totalProfit  += floatval($row->profit);
                        $totalLoosed  += floatval($row->loosed);
                        $totalWithdraw  += floatval($row->withdraw);
                        $totalCharges  += floatval($row->charges);

                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <x-table.cell-text :colspan="2" :class="'text-blue-600 font-semibold'" right>&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</x-table.cell-text>

                    <x-table.cell-text center :class="'text-blue-600 font-semibold'">
                        {{ $totalOpening}}</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalDeposit)}}</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalProfit)}}</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalLoosed)}}</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalWithdraw)}}</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalCharges)}}</x-table.cell-text>

                </x-table.row>

                @php
                    $totalBalance = \App\Helper\ConvertTo::decimal2(($totalOpening+$totalDeposit)-($totalLoosed+$totalCharges))
                @endphp

                <x-table.row>

                    <td colspan="7"
                        class='px-2 py-2 border border-gray-200 whitespace-no-wrap text-sm leading-2 text-gray-900'>
                        <div
                            class="tracking-wider font-semibold text-md text-right {{$totalBalance > 0 ?'text-green-500':'text-red-500'}}">
                            Capitals
                        </div>
                    </td>

                    <td class='px-2 py-2 border border-gray-200 whitespace-no-wrap text-sm leading-2 text-gray-900'>
                        <div
                            class="tracking-wider font-semibold text-md text-right {{$totalBalance > 0 ?'text-green-500':'text-red-500'}}">
                            {{$totalBalance}}
                        </div>
                    </td>
                </x-table.row>

            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-text wire:model="opening_balance" :label="'Opening Balance'"/>
            <x-input.model-text wire:model="deposit" :label="'Deposit'"/>
            <x-input.model-text wire:model="profit" :label="'Profit'"/>
            <x-input.model-text wire:model="loosed" :label="'Loosed'"/>
            <x-input.model-text wire:model="withdraw" :label="'Withdraw'"/>
            <x-input.model-text wire:model="charges" :label="'Charges'"/>
            <x-input.model-text wire:model="balance" :label="'Balance'"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
