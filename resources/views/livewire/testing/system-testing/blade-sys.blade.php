<div>
    <x-slot name="header">Livewire Blade</x-slot>

    <div class="flex text-gray-400 text-xs ml-6">
        <div class="flex"><a href="/module"  class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 m-1.5" /></div><div>Module</div></a></div>
        <div class="flex ml-3"><a href={{route('module.model', $this->module_id)}} class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 m-1.5" /></div><div>Model</div></a></div>
        <div class="flex ml-3"><a href={{route('model.db', $backToDataBase)}} class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 m-1.5" /></div><div>Database</div></a></div>
        <div class="flex ml-3"><a href={{route('db.admin', $backToMigrate)}} class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 m-1.5" /></div><div>Migration</div></a></div>
        <div class="flex ml-3"><a href={{route('admin.livewire-class', $previous)}} class="flex"><div><x-icons.icon icon="double-arrow-right" class="w-3 h-3 m-1.5" /></div><div>Livewire Class</div></a></div>
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
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="8%">Folder</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="8%">Blade File</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Header</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Top Panel</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Search</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Filter</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Pagination</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">New</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Table Header</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Table Body</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Action</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Table Pagination</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Create / Edit</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Route</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center width="5%">Other</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Remarks</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{ route('livewire-blade.menu', $row->id) }}">
                            {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('livewire-blade.menu', $row->id) }}">
                                {{ $row->blade_file}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('livewire-blade.menu', $row->id) }}">
                            {{ $row->vname}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked1({{$row->id}})" type="checkbox"
                                       @if($row->checked_1) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_1 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked2({{$row->id}})" type="checkbox"
                                       @if($row->checked_2) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_2 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked3({{$row->id}})" type="checkbox"
                                       @if($row->checked_3) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_3 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked4({{$row->id}})" type="checkbox"
                                       @if($row->checked_4) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_4 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked5({{$row->id}})" type="checkbox"
                                       @if($row->checked_5) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_5 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked6({{$row->id}})" type="checkbox"
                                       @if($row->checked_6) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_6 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked7({{$row->id}})" type="checkbox"
                                       @if($row->checked_7) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_7 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked8({{$row->id}})" type="checkbox"
                                       @if($row->checked_8) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_8 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked9({{$row->id}})" type="checkbox"
                                       @if($row->checked_9) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_9 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked10({{$row->id}})" type="checkbox"
                                       @if($row->checked_10) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_10 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked11({{$row->id}})" type="checkbox"
                                       @if($row->checked_11) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_11 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked12({{$row->id}})" type="checkbox"
                                       @if($row->checked_12) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_12 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <label>
                                <input wire:click="isChecked13({{$row->id}})" type="checkbox"
                                       @if($row->checked_13) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_13 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('livewire-blade.menu', $row->id) }}">
                            {{ $row->description}}
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
                            <input type="text" wire:model="blade_file" class="border-0 w-full h-full purple-textbox "/>
                            @error('action')
                            <span class="text-red-500">{{  $message }}</span>
                            @enderror
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="vname" class="border-0 w-full h-full purple-textbox "/>
                            @error('action')
                            <span class="text-red-500">{{  $message }}</span>
                            @enderror
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_1" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_2" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_3" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_4" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_5" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_6" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_7" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_8" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_9" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_10" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_11" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_12" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked_13" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="description" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <button type="submit" wire:click.prevent="save" class="bg-green-600 text-white flex items-center justify-evenly px-2 py-1 rounded-md">
                                <div><x-icons.icon :icon="'save'" class="h-5 w-auto block px-1.5 mt-1"/></div><div>Save</div>
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
{{--            <x-input.model-text wire:model="vname" :label="'Livewire Blade'"/>--}}
{{--            <x-input.model-text wire:model="description" :label="'Description'"/>--}}
{{--            <x-input.checkbox wire:model="checked_1" :label="'Header'"/>--}}
{{--            <x-input.checkbox wire:model="checked_2" :label="'Top Panel'"/>--}}
{{--            <x-input.checkbox wire:model="checked_3" :label="'Search'"/>--}}
{{--            <x-input.checkbox wire:model="checked_4" :label="'Filter'"/>--}}
{{--            <x-input.checkbox wire:model="checked_5" :label="'Pagination'"/>--}}
{{--            <x-input.checkbox wire:model="checked_6" :label="'New Button'"/>--}}
{{--            <x-input.checkbox wire:model="checked_7" :label="'Table Header'"/>--}}
{{--            <x-input.checkbox wire:model="checked_8" :label="'Table Body'"/>--}}
{{--            <x-input.checkbox wire:model="checked_9" :label="'Action'"/>--}}
{{--            <x-input.checkbox wire:model="checked_10" :label="'table Pagination'"/>--}}
{{--            <x-input.checkbox wire:model="checked_11" :label="'Create / edit'"/>--}}
{{--            <x-input.checkbox wire:model="checked_12" :label="'Route'"/>--}}
{{--            <x-input.model-text wire:model="comment" :label="'Comment'"/>--}}
{{--        </x-forms.create>--}}

    </x-forms.m-panel>
</div>

