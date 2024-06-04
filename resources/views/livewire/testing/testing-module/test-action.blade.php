<div>
    <x-slot name="header">Testing Actions</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <div class="inline-flex justify-end gap-3 w-full">
            <div>
            <button wire:click="generate" class="mb-5  mt-4 bg-blue-500 p-1.5 rounded-md  text-white ">Generate</button>
            </div>
            <div>
                <button wire:click="create"
                    class = 'md:flex  mt-4 md:mb-5 inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                                transition-all shadow-xs bg-gradient-to-r from-green-600 to-green-500 hover:bg-gradient-to-b dark:shadow-green-900
                                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500
                                                shadow-green-200 hover:shadow-2xl hover:shadow-green-300 hover:-tranneutral-y-px print:hidden'>
                    <x-icons.icon :icon="'plus-slim'" class="h-5 w-auto block px-1.5"/>
                    NEW
                </button>
            </div>
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
