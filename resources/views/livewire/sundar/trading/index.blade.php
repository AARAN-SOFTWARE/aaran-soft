<div>
    <x-slot name="header">Share Trades</x-slot>


    <x-forms.m-panel>

        <div class="flex justify-between items-center">
            <select wire:model.live="search_user_id" :label="'User'" class="w-[30rem] purple-textbox">
                <option class="text-gray-400"> choose ..</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

            <div>{{ \App\Models\User::getName($search_user_id)}}</div>
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
                            <a href="{{route('shareTrades.openingBalance')}}">
                                Opening balance
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.openingBalance')}}">
                                {{ $row->opening_balance }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.deposits')}}">
                                Trade Deposit
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
                                Trade Withdraw
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.deposits')}}">
                                {{ $row->withdraw }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text
                            class="tracking-wider font-semibold text-md {{$row->share_profit-$row->share_loosed > 0 ?'text-green-500':'text-red-500'}}">
                            <a href="{{route('shareTrades.shares')}}">
                                In Shares P&L
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right
                                           class="tracking-wider font-semibold text-md {{$row->share_profit-$row->share_loosed > 0 ?'text-green-500':'text-red-500'}}">
                            <a href="{{route('shareTrades.shares')}}">
                                {{ $row->share_profit-$row->share_loosed }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text
                            class="tracking-wider font-semibold text-md {{$row->option_profit-$row->option_loosed > 0 ?'text-green-500':'text-red-500'}}">
                            <a href="{{route('shareTrades.options')}}">
                                In Options P&L
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right
                                           class="tracking-wider font-semibold text-md {{$row->option_profit-$row->option_loosed > 0 ?'text-green-500':'text-red-500'}}">
                            <a href="{{route('shareTrades.options')}}">
                                {{ $row->option_profit-$row->option_loosed }}
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
                        $totalBalance = \App\Helper\ConvertTo::decimal2(($row->opening_balance+$row->deposit+$row->share_profit+$row->option_profit)-($row->share_loosed+$row->option_loosed+$row->charges+$row->withdraw))
                    @endphp

                    <x-table.row>
                        <x-table.cell-text>
                            <div
                                class="tracking-wider font-semibold text-md {{$totalBalance > 0 ?'text-green-500':'text-red-500'}}">
                                Trade P&L
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <div
                                class="tracking-wider font-semibold text-md text-right {{$totalBalance > 0 ?'text-green-500':'text-red-500'}}">
                                {{$totalBalance}}
                            </div>
                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text>
                            &nbsp;
                        </x-table.cell-text>

                        <x-table.cell-text>
                            &nbsp;
                        </x-table.cell-text>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.investing')}}">
                                Invested
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.investing')}}">
                                {{ $row->invested }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>




                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('shareTrades.investing')}}" class="text-blue-500">
                                Drawings
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('shareTrades.investing')}}" class="text-blue-500">
                                {{ $row->drawings }}
                            </a>
                        </x-table.cell-text>
                    </x-table.row>


                    @php
                        $totalInvesting = \App\Helper\ConvertTo::decimal2(($row->drawings-$row->invested))
                    @endphp

                    <x-table.row>
                        <x-table.cell-text>
                            <div
                                class="tracking-wider font-semibold text-md {{$totalInvesting > 0 ?'text-green-500':'text-red-500'}}">
                                Capitals
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <div
                                class="tracking-wider font-semibold text-md text-right {{$totalInvesting > 0 ?'text-green-500':'text-red-500'}}">
                                {{$totalInvesting}}
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
