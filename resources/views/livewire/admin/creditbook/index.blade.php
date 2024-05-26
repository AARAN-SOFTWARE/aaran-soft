<div>
    <x-slot name="header">Credit Book</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table :list="$list">

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Name</x-table.header-text>
                <x-table.header-text center>Closing</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">
                @php
                    $totalBalance = 0;
                @endphp

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text>
                            <a href="{{route('creditbooks.items',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('creditbooks.items',[$row->id])}}">
                                    {{ $row->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('creditbooks.items',[$row->id])}}">
                                {{ $row->closing }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>

                    </x-table.row>

                    @php
                        $totalBalance +=  $row->closing
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

            <!-- Table Footer ----------------------------------------------------------------------------------------->

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <!-- Create --------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'Name'"/>
            <x-input.model-text wire:model="closing" :label="'Closing'"/>
            @error('closing')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
        </x-forms.create>

    </x-forms.m-panel>
</div>
