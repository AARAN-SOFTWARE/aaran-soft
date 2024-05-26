<div>
    <x-slot name="header">Receivables</x-slot>

    <x-forms.m-panel>
        <div class="flex w-full gap-3">

            <div class="w-[40rem]">
                <x-input.model-select wire:model.live="byParty" :label="'Party Name'">
                    <option value="">choose</option>
                    @foreach($contacts as $contact)
                        <option value="{{$contact->id}}">{{$contact->vname}}</option>
                    @endforeach
                </x-input.model-select>
            </div>

            <x-input.model-date wire:model.live="start_date" :label="'From Date'"/>

            <x-input.model-date wire:model.live="end_date" :label="'To Date'"/>


            <div class="pt-4">
                <button class="bg-cyan-700 rounded-lg shadow-2xl px-2 py-1 text-white" wire:click="print">Print
                </button>
            </div>

        </div>

        <x-forms.table>
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Type</x-table.header-text>
                <x-table.header-text left>Particulars</x-table.header-text>
                <x-table.header-text>Invoice Amount</x-table.header-text>
                <x-table.header-text>Receipt Amount</x-table.header-text>
            </x-slot>


            <x-slot name="table_body">

                @php
                    $totalSales = 0;
                    $totalReceipt = 0;
                @endphp
                <x-table.row>
                    @if($byParty !=null)

                        <x-table.cell colspan="3">
                            <div class="text-right font-bold">
                                Opening Balance
                            </div>
                        </x-table.cell>

                        <x-table.cell colspan="1">
                            <div class="text-right font-bold">
                                {{ $opening_balance }}
                            </div>
                        </x-table.cell>
                    @endif
                </x-table.row>

                @forelse ($list as $index =>  $row)
                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->mode }}
                        </x-table.cell-text>

                        <x-table.cell-text left>
                            {{ $row->vno}}&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;{{date('d-m-Y', strtotime($row->vdate))}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->grand_total }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->receipt_amount }}
                        </x-table.cell-text>
                    </x-table.row>

                    @php
                        $totalSales += floatval($row->grand_total);
                        $totalReceipt += floatval($row->receipt_amount);
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <td colspan="3" class="px-2 text-md text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="px-2 text-right  text-md border text-zinc-500 border-gray-300">{{ \App\Helper\ConvertTo::decimal2($totalSales+$opening_balance)}}</td>
                    <td class="px-2 text-right  text-md border text-zinc-500 border-gray-300">{{ \App\Helper\ConvertTo::decimal2($totalReceipt)}}</td>
                </x-table.row>

                <x-table.row>
                    <td colspan="3" class="px-2 text-md text-right text-gray-400 border border-gray-300">&nbsp;Balance&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="px-2 text-right  text-md border text-blue-500 border-gray-300">{{ \App\Helper\ConvertTo::decimal2($totalSales+$opening_balance-$totalReceipt)}}</td>
                    <td class="px-2 text-right  text-md border text-blue-500 border-gray-300"></td>
                </x-table.row>

            </x-slot>
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
    </x-forms.m-panel>
</div>
