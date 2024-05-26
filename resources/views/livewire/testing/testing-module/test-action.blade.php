<div>
    <x-slot name="header">Testing Actions</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <div class="text-right ">
            <button wire:click="generate" class="bg-blue-500 rounded-md px-2 py-2 text-white inline-flex">Generate</button>
        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <div class="relative">
            <x-forms.table :list="$list">
                <x-slot name="table_header">
                    <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Actions</x-table.header-text>
                    <x-table.header-action/>
                </x-slot>

                <!-- Table Body --------------------------------------------------------------------------------------->
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <x-table.row>

                                <x-table.cell-text center>
                                    <a href="{{route('action.operation',['id'=>$row->id,'modals_id'=>$row->modals_id])}}">
                                    {{ $index + 1 }}
                                    </a>
                                </x-table.cell-text>


                                <x-table.cell-text>
                                    <a href="{{route('action.operation',['id'=>$row->id,'modals_id'=>$row->modals_id])}}">
                                    {{ $row->testFile->vname}}
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
            <x-input.model-text wire:model="vname" :label="'Actions'"/>
            @error('vname')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
        </x-forms.create>

    </x-forms.m-panel>
</div>
