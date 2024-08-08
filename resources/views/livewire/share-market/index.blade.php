<div>
    <x-slot name="header">Stocks</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Stock</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Symbol</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Category</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Tag</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('shares.details',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('shares.details',[$row->id])}}">
                                {{ $row->vname}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('shares.details',[$row->id])}}">
                                {{ $row->symbol}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('shares.details',[$row->id])}}">
                                {{ \Aaran\ShareMarket\Models\Stock::type($row->category_id) }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('shares.details',[$row->id])}}">
                                {{ \Aaran\ShareMarket\Models\Stock::tagName($row->tag_id)}}
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
        <x-forms.create :id="$vid" :max-width="'4xl'">
            <div class="flex flex-col gap-3 mb-5">
                <x-input.model-text wire:model="vname" :label="'Stock name'"/>
                @error('vname')
                <span class="text-red-500">{{  $message }}</span>
                @enderror
                <x-input.model-text wire:model="symbol" :label="'Symbol'"/>
                <!-- Category ----------------------------------------------------------------------------------------------------->
                <div class="flex flex-row">
                    <div class="xl:flex w-full gap-2">
                        <label for="city_name" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">Category</label>
                        <div x-data="{isTyped: @entangle('feed_category_typed')}" @click.away="isTyped = false"
                             class="w-full">
                            <div class="relative">
                                <input
                                    id="feed_category_name"
                                    type="search"
                                    wire:model.live="feed_category_name"
                                    autocomplete="off"
                                    placeholder="Category Name.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementCategory"
                                    wire:keydown.arrow-down="incrementCategory"
                                    wire:keydown.enter="enterCategory"
                                    class="block w-full purple-textbox "
                                />

                                <!--City Dropdown ----------------------------------------------------------------------------->
                                <div x-show="isTyped"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     x-cloak
                                >
                                    <div class="absolute z-20 w-full mt-2">
                                        <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                            <ul class="overflow-y-scroll h-24">
                                                @if($feed_category_collection)
                                                    @forelse ($feed_category_collection as $i => $category)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlight_feed_category === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setCategory('{{$category->vname}}','{{$category->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $category->vname }}
                                                        </li>
                                                    @empty
                                                        <button
                                                            wire:click.prevent="categorySave('{{$feed_category_name}}')"
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
                <!-- TagSeeder ----------------------------------------------------------------------------------------------------->
                <div class="flex flex-row">
                    <div class="xl:flex w-full gap-2">
                        <label for="tag_name" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">Tag</label>
                        <div x-data="{isTyped: @entangle('tagTyped')}" @click.away="isTyped = false" class="w-full">
                            <div class="relative">
                                <input
                                    id="tag_name"
                                    type="search"
                                    wire:model.live="tag_name"
                                    autocomplete="off"
                                    placeholder="Tag Name.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementTag"
                                    wire:keydown.arrow-down="incrementTag"
                                    wire:keydown.enter="enterTag"
                                    class="block w-full purple-textbox "
                                />

                                <!--City Dropdown ----------------------------------------------------------------------------->
                                <div x-show="isTyped"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     x-cloak
                                >
                                    <div class="absolute z-20 w-full mt-2">
                                        <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                            <ul class="overflow-y-scroll h-20">
                                                @if($tagCollection)
                                                    @forelse ($tagCollection as $i => $tag)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightTag === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setTag('{{$tag->vname}}','{{$tag->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $tag->vname }}
                                                        </li>
                                                    @empty
                                                        <button wire:click.prevent="tagSave('{{$tag_name}}')"
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
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
