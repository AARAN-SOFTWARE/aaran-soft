<div>
    <x-slot name="header">Spot Category</x-slot>

    <x-forms.m-panel>

        <div>
            <div x-data="{ currentVal:4 }" class="flex items-center gap-1">
                <label for="oneStar" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                    <span class="sr-only">one star</span>
                    <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating" value="1">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                         class="w-5 h-5"
                         :class="currentVal > 0 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                        <path fill-rule="evenodd"
                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                              clip-rule="evenodd"/>
                    </svg>
                </label>

                <label for="twoStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                    <span class="sr-only">two stars</span>
                    <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating" value="2">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                         class="w-5 h-5"
                         :class="currentVal > 1 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                        <path fill-rule="evenodd"
                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                              clip-rule="evenodd"/>
                    </svg>
                </label>

                <label for="threeStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                    <span class="sr-only">three stars</span>
                    <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating" value="3">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                         class="w-5 h-5"
                         :class="currentVal > 2 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                        <path fill-rule="evenodd"
                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                              clip-rule="evenodd"/>
                    </svg>
                </label>

                <label for="fourStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                    <span class="sr-only">four stars</span>
                    <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating" value="4">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                         class="w-5 h-5"
                         :class="currentVal > 3 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                        <path fill-rule="evenodd"
                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                              clip-rule="evenodd"/>
                    </svg>
                </label>

                <label for="fiveStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                    <button type="button" x-on:click="$wire(currentVal)">
                        <span class="sr-only">five stars</span>
                        <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating" value="5">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                             fill="currentColor" class="w-5 h-5"
                             :class="currentVal > 4 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                            <path fill-rule="evenodd"
                                  d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                </label>
                <div x-text="currentVal"></div>
            </div>

        </div>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <div class="relative">
            <x-forms.table :list="$list">
                <x-slot name="table_header">
                    <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Category</x-table.header-text>
                    <x-table.header-action/>
                </x-slot>

                <!-- Table Body --------------------------------------------------------------------------------------->
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <x-table.row>
                            <x-table.cell-text center>
                                {{ $index + 1 }}
                            </x-table.cell-text>

                            <x-table.cell-text>
                                {{\Aaran\SpotMyNumber\Models\SpotCategory::spotList($row->spot_category_id)}}
                            </x-table.cell-text>

                            <x-table.cell-action id="{{$row->id}}"/>
                        </x-table.row>

                    @empty
                        <x-table.empty/>
                    @endforelse
                </x-slot>

                <!-- Pagination/Loading-------------------------------------------------------------------------------->
                <x-slot name="table_pagination">
                    {{ $list->links() }}
                </x-slot>
            </x-forms.table>
        </div>

        <x-modal.delete/>


        <form wire:keydown.shift="getCategory">
            <div class="w-full">
                <x-jet.modal wire:model.defer="showEditModal" maxWidth="6xl">
                    <div class="px-6  pt-4">
                        <div class="text-lg">
                            {{$vid === "" ? 'New Entry' : 'Edit Entry'}}
                        </div>
                        <x-forms.section-border class="py-2"/>
                        <div class="h-[40rem] mt-3">
                            <div class=" w-full px-10">
                                <!-- component -->
                                <div class="relative">
                                    <input
                                        class="appearance-none border-2 pl-10 border-gray-300 hover:border-gray-400 transition-colors
                                        rounded-md w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-purple-600
                                        focus:border-purple-600 focus:shadow-outline"
                                        id="username"
                                        wire:model.live="searchCategory"
                                        wire:keydown.end="$set('searchCategory', '')"
                                        wire:keydown.end="$set('categoryList', '')"
                                        wire:keydown.shift="getCategory"
                                        wire:change="getCategory"
                                        type="text"
                                        placeholder="Search..."
                                    />

                                    <div class="absolute right-0 inset-y-0 flex items-center">
                                        <button wire:click="$set('searchCategory', '')"
                                                wire:keydown.escape="$set('categoryList', '')">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="-ml-1 mr-3 h-5 w-5 text-gray-400 hover:text-gray-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"
                                                />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="absolute left-0 inset-y-0 flex items-center">

                                        <svg wire:click="getCategory"
                                             xmlns="http://www.w3.org/2000/svg"
                                             class="h-6 w-6 ml-3 text-gray-400 hover:text-gray-500"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                            />
                                        </svg>

                                    </div>
                                </div>
                                <div class="text-xs text-gray-700 animate-pulse mt-2 ml-2">
                                    @if($searchCategory)
                                        Press End To Clear
                                    @else
                                        Press Shift To search
                                    @endif
                                </div>

                            </div>
                            <div class="mt-3 h-48 overflow-auto">
                                <div class="grid grid-cols-3 w-fit gap-3">
                                    @if($spot_category_id!='')
                                        @foreach($spot_category_id as $index=> $row)
                                            <div class="bg-gray-100 w-fit p-1.5 mb-3 flex gap-5 rounded-lg">
                                            <span
                                                class="ml-2">{{\Aaran\SpotMyNumber\Models\SpotCategory::spotList($row)}}</span>
                                                <button wire:click.prevent="removeCategory({{$index}})">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="-ml-1 mr-3 h-5 w-5 text-gray-400 hover:text-gray-500"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <x-forms.section-border class="py-2"/>
                            <div class="items-center justify-center w-1/2 ">
                                @if($categoryList!='')
                                    @foreach($categoryList as $row)
                                        <div class="bg-gray-100 w-fit p-1.5 mb-3">
                                            <button class="flex gap-3" wire:click.prevent="addCategory({{$row->id}})">
                                                <span> {{$row->vname}}</span>
                                                <span> <x-icons.icon :icon="'plus-slim'"
                                                                     class="block px-1.5 h-5 w-auto text-black"/></span>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-1">&nbsp;</div>
                    </div>
                    <div class="px-6 py-3 bg-gray-100 text-right">
                        <div class="w-full flex justify-between gap-3">
                            <div class="py-2">
                                <label for="active_id" class="inline-flex relative items-center cursor-pointer">
                                    <input type="checkbox" id="active_id" class="sr-only peer"
                                           wire:model="active_id">
                                    <div
                                        class="w-10 h-5 bg-gray-200 rounded-full peer peer-focus:ring-2
                                        peer-focus:ring-blue-300
                                         peer-checked:after:translate-x-full peer-checked:after:border-white
                                         after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300
                                         after:border after:rounded-full after:h-4 after:w-4 after:transition-all
                                         peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">Active</span>
                                </label>
                            </div>
                            <div class="flex gap-3">
                                <x-button.cancel/>
                                <x-button.save/>
                            </div>
                        </div>
                    </div>
                </x-jet.modal>
            </div>
        </form>


    </x-forms.m-panel>
</div>
