<div>
    <x-slot name="header">Migration </x-slot>

    <div class="flex text-gray-400 text-xs ml-6 ">
        <div class="flex"><a href="/module"  class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 mt-1.5" /></div><div>Module</div></a></div>
        <div class="flex ml-3"><a href={{route('module.model', $this->module_id)}} class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 mt-1.5" /></div><div>Model</div></a></div>
        <div class="flex ml-3"><a href={{route('model.db', $previous)}} class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 mt-1.5" /></div><div>Database</div></a></div>
    </div>


    <x-forms.m-panel>


        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <div class="md:flex md:justify-between md:items-center md:pb-5">
            <div class="w-full h-20 md:w-2/4 md:items-center flex md:space-x-2">

                <x-input.search-box/>
                <x-input.toggle-filter :show-filters="$showFilters"/>

            </div>

            <div class="flex justify-between md:mb-5 md:space-x-2 md:flex md:items-center">
                <x-forms.per-page/>
                <button  type="button" wire:click="generate" class="bg-blue-600 text-white px-2 py-1.5 rounded-md mb-1">Generate</button>
                {{--                <x-button.new/>--}}
            </div>
        </div>
        <x-input.advance-search :show-filters="$showFilters" />

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="15%">Migration Table</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="25%">Description</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="10%">Migration condition</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="10%">DbMigration</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="10%">Migration Seeder</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Comment</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{ route('admin.livewire-class', $row->id) }}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('admin.livewire-class', $row->id) }}">
                                {{ $row->vname}}
                            </a>

                        </x-table.cell-text>


                        <x-table.cell-text>
                            <a href="{{ route('admin.livewire-class', $row->id) }}">
                            {{ $row->description }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked1({{$row->id}})" type="checkbox"
                                       @if($row->checked_1) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_2 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center wire:model="db_mig">
                            {{ \App\Enums\DbMigration::tryFrom($row->db_mig)->getName() }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked2({{$row->id}})" type="checkbox"
                                       @if($row->checked_2) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_2 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('admin.livewire-class', $row->id) }}">
                                {{ $row->comment}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse


                    <!-- Create / Edit -->
                    <x-table.row class="border-0 " :id="$vid">
                        <x-table.cell-text class="text-center">
                            {{$list->count()+1}}
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="vname" class="border-0 w-full h-full purple-textbox "/>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="description" class="border-0 w-full h-full purple-textbox "/>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_1" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <select wire:model="db_mig" class="w-full h-auto border-0 purple-textbox" style="font-size: 12px ">
                                <option class="text-gray-400"> choose ..</option>
                                @foreach(\App\Enums\DbMigration::cases() as $dbData )
                                    <option value="{{$dbData->value}}">{{$dbData->getName()}}</option>
                                @endforeach
                            </select>
                            @error('db_mig')
                            <span class="text-red-500">{{  $message }}</span>
                            @enderror
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_2" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="comment" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text center>
                                <button type="submit" wire:click.prevent="save" class="bg-green-600 text-white flex items-center justify-evenly px-2 py-1 rounded-md">
                                    <div><x-icons.icon :icon="'save'" class="h-4 w-auto block px-1.5 mt-1"/></div><div>Save</div>
                                </button>
                        </x-table.cell-text>
                    </x-table.row>
            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
{{--        <x-forms.create :id="$vid">--}}
{{--            <x-input.model-text wire:model="vname" :label="'Migration Table'"/>--}}
{{--            @error('vname')--}}
{{--            <span class="text-red-500">{{  $message }}</span>--}}
{{--            @enderror--}}
{{--            <x-input.checkbox wire:model="checked_1" :label="'Migration Condition'"/>--}}
{{--            <x-input.checkbox wire:model="checked_2" :label="'Db Migration'"/>--}}
{{--            <x-input.checkbox wire:model="checked_3" :label="'Migration Seeder'"/>--}}
{{--            <x-input.model-text wire:model="description" :label="'Description'"/>--}}
{{--            <x-input.model-text wire:model="comment" :label="'Comment'"/>--}}
{{--        </x-forms.create>--}}

    </x-forms.m-panel>
</div>

