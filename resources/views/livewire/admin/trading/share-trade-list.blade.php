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
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Loosed</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Withdraw</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Charges</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Balance</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Remarks</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->vdate }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->opening_balance }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->deposit }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->loosed }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->withdraw }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->charges }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->balance }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->remarks }}
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse
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
            <x-input.model-text wire:model="loosed" :label="'Loosed'"/>
            <x-input.model-text wire:model="withdraw" :label="'Withdraw'"/>
            <x-input.model-text wire:model="charges" :label="'Charges'"/>
            <x-input.model-text wire:model="balance" :label="'Balance'"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
