<div>
    <x-slot name="header">File</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="20%">File </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Description</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="10%">Check</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('file.model', $row->id) }}">
                                {{ $row->vname}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('file.model', $row->id) }}">
                                {{ $row->description}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isCheked({{$row->id}})" type="checkbox"
                                       @if($row->checked) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
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
            <x-input.model-text wire:model="vname" :label="'File Name'"/>
            @error('vname')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
            <x-input.model-text wire:model="description" :label="'Description'"/>
            <x-input.checkbox wire:model="checked" :label="'File Check'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>


