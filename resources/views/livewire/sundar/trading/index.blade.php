<div>
    <x-slot name="header">Share Trades</x-slot>


    <x-forms.m-panel>

        <div class="flex justify-between items-center">
            <select wire:model.live="k_id" :label="'User'" class="w-[30rem] purple-textbox">
                <option class="text-gray-400"> choose ..</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

            <div>{{ \App\Models\User::getName($k_id?: auth()->id())}}</div>
            <div>&nbsp;</div>

        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table>
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
                        <x-table.cell-text class="tracking-wider font-semibold text-md {{$row->profit - $row->loosed > 0 ?'text-green-500':'text-red-500'}}">
                            <a href="{{route('shareTrades.profits')}}">
                                Trade P&L
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right class="tracking-wider font-semibold text-md {{$row->profit - $row->loosed > 0 ?'text-green-500':'text-red-500'}}">
                            <a href="{{route('shareTrades.profits')}}">
                                {{ $row->profit - $row->loosed }}
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
    </x-forms.m-panel>

</div>
