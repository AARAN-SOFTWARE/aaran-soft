<div>
    <x-slot name="header">Menu</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <div class="md:flex md:justify-between md:items-center md:pb-5">
            <div class="w-full h-20 md:w-2/4 md:items-center flex md:space-x-2">

                <x-input.search-box/>
                <x-input.toggle-filter :show-filters="$showFilters"/>

            </div>

            <div class="flex justify-between md:mb-5 md:space-x-2 md:flex md:items-center">
                <x-forms.per-page/>
                {{--                <x-button.new/>--}}
            </div>
        </div>
        <x-input.advance-search :show-filters="$showFilters" />

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Menu</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Sub Menu</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Menu check</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Description</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Comment</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center >
                            <div>
                            {{ \App\Enums\Menu::tryFrom($row->menu)->getName() }}
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <label>
                                <input wire:click="isChecked({{$row->id}})" type="checkbox"
                                       @if($row->checked) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                       {{ $row->checked ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->description}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->comment}}
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse

                    <x-table.row class="border-0 " :id="$vid">
                        <x-table.cell-text class="text-center">
                            {{$list->count()+1}}
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <select wire:model="menu" class="w-full h-auto border-0 purple-textbox" style="font-size: 11px ">
                                <option class="text-gray-400"> choose ..</option>
                                @foreach(\App\Enums\Menu::cases() as $menu )
                                    <option value="{{$menu->value}}">{{$menu->getName()}}</option>
                                @endforeach
                            </select>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="vname" class="border-0 w-full h-full purple-textbox "/>
                            @error('action')
                            <span class="text-red-500">{{  $message }}</span>
                            @enderror
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <input type="checkbox" wire:model="checked" class="h-5 w-5 hover:cursor-pointer mt-2 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out text-green-400 focus:ring-green-500'">
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="description" class="border-0 w-full h-full purple-textbox "/>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <input type="text" wire:model="comment" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            <button type="submit" wire:click.prevent="save" class="bg-blue-600 text-white flex items-center justify-evenly px-2 py-1 rounded-md">
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

{{--            <x-input.model-text wire:model="vname" :label="'Sub Menu'"/>--}}
{{--            <x-input.checkbox wire:model="checked" :label="'Menu Check'"/>--}}
{{--            <x-input.model-text wire:model="description" :label="'Description'"/>--}}
{{--            <x-input.model-text wire:model="comment" :label="'Comment'"/>--}}
{{--            <select wire:model="menu" class="w-full h-auto border-0 purple-textbox" style="font-size: 11px ">--}}
{{--                <option class="text-gray-400"> choose ..</option>--}}
{{--                @foreach(\App\Enums\Menu::cases() as $menu )--}}
{{--                    <option value="{{$menu->value}}">{{$menu->getName()}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </x-forms.create>--}}

    </x-forms.m-panel>
</div>

