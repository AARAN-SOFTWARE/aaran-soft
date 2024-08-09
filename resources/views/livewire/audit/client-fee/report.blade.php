<div class="p-5">
    <x-slot name="header">Client Fees Report</x-slot>

    <!-- Top Control ------------------------------------------------------------------------------------------->
    <div class="flex flex-row gap-8 pb-8">
        <div class="w-full ">
            <div
                class="text-3xl font-extrabold tracking-wider w-full text-center">{{\Aaran\Audit\Models\Client::getName($clientId)}}</div>
        </div>

        <div class="w-1/2">
            <x-input.model-select wire:model="year" wire:change="reRender" :label="'year'">
                <option class="text-zinc-500 px-1">Choose Year...</option>
                @foreach(\App\Enums\Years::cases() as $row)
                    <option value="{{$row->value}}">{{$row->getName()}}</option>
                @endforeach
            </x-input.model-select>
        </div>

        <div class="w-11/12">
            <x-input.model-select wire:model="clientId" wire:change="reRender" :label="'Client'">
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->vname}}</option>
                @endforeach
            </x-input.model-select>
        </div>


            <a href="{{route('clientFees.print',[$clientId, $year])}}"
               class="px-5 py-2 bg-purple-200 hover:bg-purple-100 hover:text-purple-600 text-purple-600 rounded-lg text-md tracking-wide font-semibold">
                Print
            </a>

    </div>

    <!-- Table Header ------------------------------------------------------------------------------------------->
    <x-forms.table :list="$list">
        <x-slot name="table_header">
            <x-table.header-serial/>
            <x-table.header-text center>Month</x-table.header-text>
            <x-table.header-text right>Amount</x-table.header-text>
            <x-table.header-text right>Receipt</x-table.header-text>
            <x-table.header-text center>Status</x-table.header-text>
            <x-table.header-action/>
        </x-slot>

        <!-- Table Body ------------------------------------------------------------------------------------------->
        <x-slot name="table_body">

            @php
                $invoice_total = 0;
                $received_total = 0;
                 $diff=0;
            @endphp

            @forelse ($list as $index =>  $row)
                <x-table.row>

                    <x-table.cell-text>
                        {{ $index + 1 }}
                    </x-table.cell-text>

                    <x-table.cell-text>
                        {{ \App\Enums\Months::tryFrom($row->month)->getName() }}
                    </x-table.cell-text>

                    <x-table.cell-text>
                        <div class="flex px-3 justify-between gap-3">
                            <p class="text-gray-600 truncate text-xl text-left">
                                {{ $row->amount }}
                            </p>
                            <p class="text-gray-400 truncate text-sm flex items-center  px-3 text-left">
                                {{ $row->taxable }} + {{ $row->gst }}
                            </p>
                        </div>
                    </x-table.cell-text>

                    <x-table.cell-text>
                        <div class="flex px-3 justify-between gap-3">
                            <p class="text-gray-600 truncate text-xl text-left">
                                {{ $row->receipt }}
                            </p>
                            <p class="text-gray-400 truncate text-sm flex items-center  px-3 text-left">
                                {{$row->receipt_date ?  date('d-m-Y',strtotime($row->receipt_date)) : '' }}
                            </p>
                        </div>
                    </x-table.cell-text>

                    <x-table.cell>
                        <div
                            class="flex w-full text-xl text-center  items-center justify-center p-1 {{  \App\Enums\Status::tryFrom($row->status_id)->getStyle()}}">
                            {{ \App\Enums\Status::tryFrom($row->status_id)->getName()}}
                        </div>
                    </x-table.cell>

                    <x-table.cell-action :id='$row->id'/>


                </x-table.row>

                @php
                    $invoice_total += floatval($row->amount);
                    $received_total += floatval($row->receipt);
                    $diff = $invoice_total - $received_total;
                @endphp

            @empty
                <x-table.empty/>
            @endforelse

            <x-table.row>
                <td colspan="5">&nbsp;</td>
            </x-table.row>

            <x-table.row>
                <x-table.header-text>&nbsp;</x-table.header-text>
                <x-table.header-text>&nbsp;</x-table.header-text>
                <x-table.header-text>Total Amount</x-table.header-text>
                <x-table.header-text>Total Receipt</x-table.header-text>
                <x-table.header-text>Difference</x-table.header-text>
                <x-table.header-text>Status</x-table.header-text>
            </x-table.row>

            <x-table.row>
                <td colspan="2" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</td>
                <td class="px-2 text-right  text-xl border text-blue-500 border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($invoice_total)}}</td>
                <td class="px-2 text-right  text-xl border text-blue-500 border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($received_total)}}</td>
                <td class="px-2 text-right  text-xl border  {{$diff ==  0 ? 'text-green-500' : 'text-red-500'}} border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($diff)}}</td>
                <td class="px-2 text-center font-semibold border {{$diff ==  0 ? 'text-green-500' : 'text-red-500'}} border-gray-300">{{$diff ==  0 ? 'collected' : 'not Completed'}}</td>
            </x-table.row>
        </x-slot>

        <x-slot name="table_pagination">
            {{ $list->links() }}
        </x-slot>

    </x-forms.table>

    <x-forms.create :id="$vid">
        <div class="flex flex-col gap-5">
            <x-input.model-text wire:model="invoice_no" autofocus :label="'invoice_no'"/>
            <x-input.model-text wire:model="invoice_date" type="date" :label="'invoice_date'"/>
            <x-input.model-text wire:model="taxable" :label="'taxable'"/>
            <x-input.model-text wire:model="gst" :label="'gst'"/>
            <x-input.model-text wire:model="receipt" :label="'receipt'"/>
            <x-input.model-text wire:model="receipt_date" type="date" :label="'receipt_date'"/>
            <x-input.model-text wire:model="receipt_ref" :label="'receipt_ref'"/>
        </div>
    </x-forms.create>
</div>
