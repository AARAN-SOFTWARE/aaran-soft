<div>
    <x-slot name="header">Share Trades</x-slot>


    <x-forms.m-panel>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Particulars</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Amount</x-table.header-text>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            @php
                $totalBalance = 0;
            @endphp

            <x-slot name="table_body">
                @forelse ($list as $row)

                    <x-table.row>
                        <x-table.cell-text>
                            Opening balance
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->opening_balance }}
                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.deposits')}}">
                                Deposit
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.deposits')}}">
                                {{ $row->deposit }}
                            </a>
                        </x-table.cell-text>

                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.deposits')}}">
                                Withdraw
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.deposits')}}">
                                {{ $row->withdraw }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.profits')}}">
                                Trade Profit
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.profits')}}">
                                {{ $row->profit }}
                            </a>

                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.profits')}}">
                                Trade Loose
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.profits')}}">
                                {{ $row->loosed }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>


                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.charges')}}">
                                Charges
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.charges')}}">
                                {{ $row->charges }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>

                    @php
                        $totalBalance = \App\Helper\ConvertTo::decimal2(($row->opening_balance+$row->deposit+$row->profit)-($row->loosed+$row->charges+$row->withdraw))
                    @endphp

                    <x-table.row>
                        <x-table.cell-text>
                            <div
                                class="tracking-wider font-semibold text-md {{$totalBalance > 0 ?'text-green-500':'text-red-500'}}">
                                Capitals
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <div
                                class="tracking-wider font-semibold text-md text-right {{$totalBalance > 0 ?'text-green-500':'text-red-500'}}">
                                {{$totalBalance}}
                            </div>
                        </x-table.cell-text>
                    </x-table.row>
                @empty
                    <x-table.empty/>
                @endforelse

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
