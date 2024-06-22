<div>
    <x-slot name="header">Modals</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <div class="relative">
            <x-forms.table :list="$list">
                <x-slot name="table_header">
                    <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Modals</x-table.header-text>
                    <x-table.header-text center>Title</x-table.header-text>
                    <x-table.header-text center>Description</x-table.header-text>
                    <x-table.header-action/>
                </x-slot>

                <!-- Table Body --------------------------------------------------------------------------------------->
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <x-table.row>
                            <x-table.cell-text center>
                                <a href="{{ route('sub.test-case', [$row->id]) }}">
                                    {{ $index + 1 }}
                                </a>
                            </x-table.cell-text>
                            <x-table.cell-text>
                                <a href="{{ route('sub.test-case', [$row->id]) }}">
                                    {{ $row->vname}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text>
                                <a href="{{ route('sub.test-case', [$row->id]) }}">
                                    {{ $row->title}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-text>
                                <a href="{{ route('sub.test-case', [$row->id]) }}">
                                    {{ $row->description}}
                                </a>
                            </x-table.cell-text>

                            <x-table.cell-action id="{{$row->id}}"/>
                        </x-table.row>

                    @empty
                        <x-table.empty/>
                    @endforelse
                </x-slot>

                <!-- Pagination/Loading-------------------------------------------------------------------------------->
            </x-forms.table>
        </div>

        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'Modals'"/>
            @error('vname')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
            <x-input.model-text wire:model="title" :label="'Title'"/>
            @error('title')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
            <x-input.model-text wire:model="description" :label="'Description'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
