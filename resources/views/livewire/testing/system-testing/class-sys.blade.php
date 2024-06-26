<div>
    <x-slot name="header">Livewire Class</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <div class="md:flex md:justify-between md:items-center md:pb-5">
            <div class="w-full h-20 md:w-2/4 md:items-center flex md:space-x-2">

                <x-input.search-box/>
                <x-input.toggle-filter :show-filters="$showFilters"/>

            </div>

            <div class="flex justify-between md:mb-5 md:space-x-2 md:flex md:items-center">
                <x-forms.per-page/>
{{--                <button  type="button" wire:click="generate" class="bg-blue-600 text-white px-2 py-1.5 rounded-md mb-1">Generate</button>--}}
                <x-button.new/>
            </div>
        </div>

        <x-input.advance-search :show-filters="$showFilters" />

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Livewire Class</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Common Trait</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Properties</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Mount</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>GetSave</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>GetList</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>GetObj</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>ClearFields</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Description</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Comment</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{ route('livewire-class.livewire-blade', $row->id) }}">
                            {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('livewire-class.livewire-blade', $row->id) }}">
                            {{ $row->vname}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked1({{$row->id}})" type="checkbox"
                                       @if($row->checked_1) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_1 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked2({{$row->id}})" type="checkbox"
                                       @if($row->checked_2) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_2 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked3({{$row->id}})" type="checkbox"
                                       @if($row->checked_3) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_3 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked4({{$row->id}})" type="checkbox"
                                       @if($row->checked_4) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_4 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked5({{$row->id}})" type="checkbox"
                                       @if($row->checked_5) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_5 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked6({{$row->id}})" type="checkbox"
                                       @if($row->checked_6) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_6 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked7({{$row->id}})" type="checkbox"
                                       @if($row->checked_7) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked_7 ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>


                        <x-table.cell-text>
                            <a href="{{ route('livewire-class.livewire-blade', $row->id) }}">
                            {{ $row->description}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('livewire-class.livewire-blade', $row->id) }}">
                            {{ $row->comment}}
                            </a>
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
            <x-input.model-text wire:model="vname" :label="'Livewire Class'"/>
            <x-input.checkbox wire:model="checked_1" :label="'Class check'"/>
            <x-input.checkbox wire:model="checked_2" :label="'Class check'"/>
            <x-input.checkbox wire:model="checked_3" :label="'Class check'"/>
            <x-input.checkbox wire:model="checked_4" :label="'Class check'"/>
            <x-input.checkbox wire:model="checked_5" :label="'Class check'"/>
            <x-input.checkbox wire:model="checked_6" :label="'Class check'"/>
            <x-input.checkbox wire:model="checked_7" :label="'Class check'"/>
            <x-input.model-text wire:model="description" :label="'Description'"/>
            <x-input.model-text wire:model="comment" :label="'Comment'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>

