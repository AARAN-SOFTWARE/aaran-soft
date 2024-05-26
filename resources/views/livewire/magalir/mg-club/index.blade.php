<div>
    <x-slot name="header">Magalir Clubs</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Club No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Name</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Desc</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Action</x-table.ths-center>
            </x-slot>
            <x-slot name="table_body">

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('mgClubs.members',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->vno }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.members',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->vname }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.members',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-left">
                                {{ $row->desc }}
                            </a>
                        </x-table.cell>

                        <x-table.action :id="$row->id"/>
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

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vno" :label="'No'"/>
            <x-input.model-text wire:model="vname" :label="'Name'"/>
            <x-input.model-text wire:model="desc" :label="'Desc'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
