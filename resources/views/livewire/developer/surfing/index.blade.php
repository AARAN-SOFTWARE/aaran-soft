<div>
    <x-slot name="header">Surfing</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Title</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Web Url</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Category</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Comments</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
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
                            <a href="
                            {{ $row->webpage }}" target="_blank"> {{ $row->webpage }}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ Aaran\Developer\Models\surfing::surfingCategory($row->surfing_category_id)}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('surfing.comments',[$row->id])}}">
                                <div class="inline-flex gap-3">
                                    <x-icons.icon :icon="'chat'" class="text-blue-400 h-6 px-0.5 py-0.5"/>
                                    Comments
                                </div>
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
            <x-input.model-text wire:model="vname" :label="'Title'"/>
            <x-input.model-text wire:model="webpage" :label="'Web Url'"/>
            <!-- surfing-Category------------------------------------------------------------------------------------------>
            <div class="flex flex-row gap-3 py-3">
                <div class="xl:flex gap-2 w-full">
                    <label for="hsncode_no" class="w-[10rem] text-zinc-500 tracking-wide py-2">Category</label>
                    <div x-data="{isTyped: @entangle('surfing_category_Typed ')}" @click.away="isTyped = false"
                         class="w-full">
                        <div class="relative">
                            <input
                                id="surfing_category_name"
                                type="search"
                                wire:model.live="surfing_category_name"
                                autocomplete="off"
                                placeholder="Category.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementSurfing_category"
                                wire:keydown.arrow-down="incrementSurfing_category"
                                wire:keydown.enter="enterSurfing_category"
                                class="block purple-textbox w-full"
                            />

                            <!-- Hsn-Code Dropdown------------------------------------------------------------->

                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($surfing_category_Collection)
                                                @forelse ($surfing_category_Collection as $i => $category)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightSurfing_category === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setSurfing_category('{{$category->vname}}','{{$category->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $category->vname }}
                                                    </li>

                                                @empty
                                                    <button
                                                        wire:click.prevent="surfing_category_Save('{{$surfing_category_name }}')"
                                                        class="text-white bg-green-500 text-center w-full">
                                                        create
                                                    </button>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
