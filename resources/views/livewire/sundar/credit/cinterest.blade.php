<div>
    <x-slot name="header">Interest Book</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table :list="$list">

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text center>Interest</x-table.header-text>
                <x-table.header-text center>Received</x-table.header-text>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text center>Remarks</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text>
                                {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                                {{date('d-m-Y', strtotime($row->vdate))}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                                {{ $row->intrest + 0 }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                                {{ $row->received + 0 }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{date('d-m-Y', strtotime($row->received_date))}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                                {{ $row->remarks }}
                        </x-table.cell-text>


                        <x-table.cell-action id="{{$row->id}}"/>

                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse

            </x-slot>

            <!-- Table Footer ----------------------------------------------------------------------------------------->

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <!-- Create --------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="serial" :label="'serial'"/>
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-text wire:model="interest" :label="'Interest'"/>
            <x-input.model-text wire:model="received" :label="'received'"/>
            <x-input.model-date wire:model="received_date" :label="'received_date'"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
