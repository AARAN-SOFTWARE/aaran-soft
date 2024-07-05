<div>
    <x-slot name="header">Project Estimation</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters">
            <x-input.model-select wire:model.live="byProject" wire:keydown.escape="$set('byProject', '')" :label="'Project'">
                <option class="text-gray-400" value=""> choose ..</option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->vname}}</option>
                @endforeach
            </x-input.model-select>
        </x-forms.top-controls>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Project</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Product</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Qty</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Rate</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Total</x-table.header-text>
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
                            {{ \Aaran\Welfare\Models\ProjectEstimation::project_name($row->projects_id)}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ \Aaran\Welfare\Models\ProjectEstimation::product_name($row->project_product_id)}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->qty+0 }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->rate }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->amount }}
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
            <x-input.model-select wire:model="projects_id" :label="'Project'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-select wire:model="project_product_id" :label="'Product'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($project_product as $product)
                    <option value="{{$product->id}}">{{$product->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-text wire:model="qty" :label="'Qty'"/>

            <x-input.model-text wire:model="rate" wire:change="calculate" :label="'Rate'"/>
            <x-input.model-text wire:model="amount" :label="'Amount'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
