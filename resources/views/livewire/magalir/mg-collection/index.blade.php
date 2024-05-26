<div>
    <x-slot name="header">Collection Book</x-slot>

    <x-forms.m-panel>

        <div class="flex flex-row justify-between">
            <div>
                Latest
                @if($dates)
                    @foreach ($dates as $row)
                        <div>
                            {{$row->cdate ?  date('d-m-Y',strtotime($row->cdate)) : '' }}
                        </div>
                    @endforeach
                @endif
            </div>
            <div>
                <label>
                    <input wire:model="cdate" wire:change.debounce="reRender" type="date"
                           class="purple-textbox w-[12rem]"/>
                </label>
            </div>
            <div></div>
        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths wire:click.prevent="sortBy('vname')">Company Name</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('vname')">Balance</x-table.ths>
            </x-slot>
            <x-slot name="table_body">

                @php
                    $totalBalance = 0;
                @endphp

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('clients.show',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('clients.show',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->mg_member_id }}
                                </div>
                            </a>

                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('clients.show',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->mg_loan_id                                                                                                                                                                                                                                                                                                                                                                   }}
                                </div>
                            </a>

                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('clients.show',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->balance }}
                            </a>
                        </x-table.cell>

                        <x-table.action :id="$row->id"/>
                    </x-table.row>

                    @php
                        $totalBalance += floatval($row->balance);
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse
                <x-table.row>
                    <td colspan="2" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="px-2 text-right  text-xl border text-red-500 border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($totalBalance)}}</td>
                    <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>
            </x-slot>
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <x-forms.create :id="$vid">

            <x-input.model-select wire:model="client_bank_id" :label="'client'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $row)
                    <option value="{{$row->id}}">{{$row->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-text type="date" wire:model="cdate" :label="'Date'"/>

            <x-input.model-text wire:model="balance" :label="'Balance'"/>

        </x-forms.create>


        <div class="space-x-2 flex items-center justify-end w-full ">
            <x-button.secondary wire:click="generate">
                Generate
            </x-button.secondary>
        </div>

    </x-forms.m-panel>
</div>
