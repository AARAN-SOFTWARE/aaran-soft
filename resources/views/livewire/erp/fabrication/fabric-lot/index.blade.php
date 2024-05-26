<div>
    <x-slot name="header">Fabric Lot Details</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table :list="$list">

        <!-- Header --------------------------------------------------------------------------------------------------->
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Lot No</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Description</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text>
                            <a href="{{route('orders.style',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('orders.style',[$row->id])}}">
                                    {{ $row->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('orders.style',[$row->id])}}">
                                {{ $row->desc }}
                            </a>
                        </x-table.cell-text>


                        <x-table.action :id="$row->id"/>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>

            <!-- Footer ----------------------------------------------------------------------------------------------->
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <!-- Create --------------------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'Lot No'"/>
            <x-input.model-text wire:model="desc" :label="'Description'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
