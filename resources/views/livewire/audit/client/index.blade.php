<div>
    <x-slot name="header">Client</x-slot>

    <x-forms.m-panel>
        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" left>Client Name</x-table.header-text>
                <x-table.header-text center>Active</x-table.header-text>
                <x-table.header-text center>Payable</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('clients.show',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text >
                            <a href="{{route('clients.show',[$row->id])}}">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->vname }}
                                </div>
                                    &nbsp;&nbsp;&nbsp;-&nbsp;{{ $row->group }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('clients.show',[$row->id])}}">
                                {{$row->active_id == '1' ? 'Active' : 'Not Active'}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('clients.show',[$row->id])}}">
                                {{$row->payable == '1' ? 'yes' : 'No'}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-action :id='$row->id'/>

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

        <!-- Create --------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'company'"/>
            <x-input.model-text wire:model="group" :label="'group'"/>
            <x-input.model-select wire:model="payable" :label="'payable'">
                <option>Choose</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </x-input.model-select>
        </x-forms.create>

    </x-forms.m-panel>
</div>
