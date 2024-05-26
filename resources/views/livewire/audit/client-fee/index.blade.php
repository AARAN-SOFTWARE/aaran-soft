<div>
    <x-slot name="header">Fee</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <div class="flex flex-row gap-3 py-3">

            <div class="flex flex-row gap-3 py-3 w-full">
                <label for="month" class="w-[8rem] text-zinc-500 tracking-wide py-2">Month</label>
                <select wire:model="month" wire:change="reRender" class="w-full purple-textbox" id="month">
                    <option class="text-zinc-500 px-1">Choose Month...</option>
                    @foreach(\App\Enums\Months::cases() as $month)
                        <option value="{{$month->value}}">{{$month->getName()}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-row gap-3 py-3 w-full">
                <label for="year" class="w-[8rem] text-zinc-500 tracking-wide px-3 py-2">Year</label>
                <select wire:model="year" wire:change="reRender" class="w-full purple-textbox" id="year">
                    <option class="text-zinc-500 px-1">Choose Year...</option>
                    @foreach(\App\Enums\Years::cases() as $year)
                        <option value="{{$year->value}}">{{$year->getName()}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Table Header --------------------------------------------------------------------------------------------->

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text left wire:click.prevent="sortBy('client_id')">Client</x-table.header-text>
                <x-table.header-text center>Invoice</x-table.header-text>
                <x-table.header-text right>Amount</x-table.header-text>
                <x-table.header-text right>Receipt</x-table.header-text>
                <x-table.header-text center>Reference</x-table.header-text>
                <x-table.header-text center>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">

                @php
                    $invoice_total = 0;
                    $received_total = 0;
                @endphp

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->client->vname }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->invoice_no }}
                            -{{$row->invoice_date ?  date('d-m-Y',strtotime($row->invoice_date )) : '' }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <div class="flex px-3 justify-between gap-3">
                                <p class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->amount }}
                                </p>
                                <p class="text-gray-400 truncate text-sm flex items-center  px-3 text-left">
                                    {{ $row->taxable }} - {{ $row->gst }}
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

                        <x-table.cell-text>
                            {{$row->receipt_ref}}
                        </x-table.cell-text>

                        <x-table.cell>
                            <div
                                class="flex w-full text-xl text-center  items-center justify-center p-1 {{  \App\Enums\Status::tryFrom($row->status_id)->getStyle()}}">
                                {{ \App\Enums\Status::tryFrom($row->status_id)->getName()}}
                            </div>
                        </x-table.cell>

                        <x-table.cell-action :id="$row->id"/>
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
                    <td colspan="3" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</td>
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

        <x-modal.delete/>

        <!-- Create Form ---------------------------------------------------------------------------------------------->

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="invoice_no" autofocus :label="'invoice_no'"/>
            <x-input.model-text wire:model="invoice_date" type="date" :label="'invoice_date'"/>
            <x-input.model-text wire:model="taxable" :label="'taxable'"/>
            <x-input.model-text wire:model="gst" :label="'gst'"/>
            <x-input.model-text wire:model="receipt" :label="'receipt'"/>
            <x-input.model-text wire:model="receipt_date" type="date" :label="'receipt_date'"/>
            <x-input.model-text wire:model="receipt_ref" :label="'receipt_ref'"/>
        </x-forms.create>

        <x-button.primary wire:click="generate">Generate</x-button.primary>

    </x-forms.m-panel>
</div>
