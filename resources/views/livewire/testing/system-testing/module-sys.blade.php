<div>
    <x-slot name="header">Module</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="20%">Module</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Description</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="10%">Status</x-table.header-text>
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
                            <a href="{{ route('module.model', $row->id) }}">
                            {{ $row->vname}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('module.model', $row->id) }}">
                            {{ $row->description}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <div {{  \App\Enums\Status::tryFrom($row->status)->getStyle() }}>
                            {{  \App\Enums\Status::tryFrom($row->status)->getName() }}
                            </div>
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
            <x-input.model-text wire:model="vname" :label="'Module'"/>
            @error('vname')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
            <x-input.model-text wire:model="description" :label="'Description'"/>
            <select wire:model="status" class="w-full purple-textbox mt-2" id="changeStatus">
                <option class="text-zinc-500 px-1">Status...</option>
                @foreach(\App\Enums\Status::cases() as $obj)
                    <option value="{{$obj->value}}">{{ $obj->getName() }}</option>
                @endforeach
            </select>
        </x-forms.create>

    </x-forms.m-panel>
</div>

