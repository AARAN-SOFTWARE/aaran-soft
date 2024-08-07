<div>
    <x-slot name="header">Sports Sponsor</x-slot>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <div class="relative">
            <x-forms.table :list="$list">
                <x-slot name="table_header">
                    <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Slogan</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Logo</x-table.header-text>
                    <x-table.header-action/>
                </x-slot>

                <!-- Table Body --------------------------------------------------------------------------------------->
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <x-table.row>
                            <x-table.cell-text center>
                                {{ $index + 1 }}
                            </x-table.cell-text>

                            <x-table.cell-text>
                                {{ $row->vname}}
                            </x-table.cell-text>

                            <x-table.cell-text>
                                {!!   $row->logo !!}
                            </x-table.cell-text>


                            <x-table.cell-action id="{{$row->id}}"/>
                        </x-table.row>

                    @empty
                        <x-table.empty/>
                    @endforelse
                </x-slot>

                <!-- Pagination/Loading-------------------------------------------------------------------------------->
                <x-slot name="table_pagination">
                    {{ $list->links() }}
                </x-slot>
            </x-forms.table>
        </div>

        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'Slogan'"/>
            @error('vname')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
            <div class="w-full mx-auto flex justify-between">
                <label for="logo" class="w-[21.5%] gray-label">Logo</label>
                <textarea wire:model="logo" name="logo" id="" cols="30" rows="5" class="w-[78.5%] my-4 placeholder-gray-300 rounded-md purple-textbox" placeholder="Enter svg...."></textarea>
            </div>
        </x-forms.create>
    </x-forms.m-panel>
</div>
