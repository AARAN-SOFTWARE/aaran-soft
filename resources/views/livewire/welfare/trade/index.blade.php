<div>
    <x-slot name="header">Project Trade</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('no_of_shares')"/>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>User</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>Projects</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('no_of_shares')" center>No of Share</x-table.header-text>
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
                            {{ \Aaran\Welfare\Models\ProjectTrade::allocated($row->user_id)}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ \Aaran\Welfare\Models\ProjectTrade::projects($row->projects_id)}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->no_of_shares }}
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

            <x-input.model-select wire:model="user_id" :label="'User'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($user as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </x-input.model-select>
            <x-input.model-select wire:model="projects_id" :label="'Project'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->vname}}</option>
                @endforeach
            </x-input.model-select>
            <x-input.model-text wire:model="no_of_shares" :label="'No of Shares'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>

