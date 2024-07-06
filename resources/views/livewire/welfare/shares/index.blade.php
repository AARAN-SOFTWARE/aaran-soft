<div>
    <x-slot name="header">Project Share</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('no_of_shares')"/>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>Projects</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>estimated</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>Face value</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>Volume</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>Current value</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>Margin</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>Dividend</x-table.header-text>
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
                            {{ \Aaran\Welfare\Models\ProjectShare::projects($row->project_id)}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->estimated }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->face_value }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->volume }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->current_value }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->margin }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->dividend }}
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

            <x-input.model-select wire:model="project_id" :label="'Project'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->vname}}</option>
                @endforeach
            </x-input.model-select>
            <x-input.model-text wire:model="estimated" :label="'Estimated'"/>
            <x-input.model-text wire:model="face_value" :label="'Face value'"/>
            <x-input.model-text wire:model="volume" :label="'Volume'"/>
            <x-input.model-text wire:model="current_value" :label="'Current Value'"/>
            <x-input.model-text wire:model="margin" :label="'Margin'"/>
            <x-input.model-text wire:model="dividend" :label="'Dividend'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>

