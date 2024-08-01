<div>
    @if(auth()->id())
        <x-slot name="header">Blog ✨</x-slot>
    @endif
    <div class="flex rounded-xl">
        <div class="md:w-1/5 h-screen outline-2 outline-gray-400 rounded-l-lg">
            <div class="relative h-screen bg-gray-50 rounded-xl overflow-y-auto"
                 x-data="{ isOpenCategory: false, isOpenTag:false}">
                <!-- Category List -->
                <div class="mt-2 px-5 text-md font-semibold font-roboto">
                    @if($categoryFilter)
                        #
                    @endif{{\Aaran\Web\Models\Feed::type($categoryFilter)}}
                </div>
                <!-- tag list -->
                @if($tagFilter!='')
                    <div class="w-full mx-auto grid md:grid-cols-3 grid-cols-1 gap-2 pl-5 mt-5">
                        @foreach($tagFilter as $index=> $row)
                            <div class="w-20 flex bg-gray-100 p-1.5 rounded-lg text-xs font-roboto justify-between">
                                <div>{{\Aaran\Web\Models\Feed::tagName($row)}}</div>
                                <button wire:click="removeFilter({{$index}})" class="pl-1 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                         class="size-3">
                                        <path fill-rule="evenodd"
                                              d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Category Dropdown -->

                <div class=" flex justify-between items-center mt-8 px-3 bg-gray-200 rounded-md mx-2">
                    <div class="w-[90%] mx-auto font-roboto text-md">Select Category</div>
                    <button @click="isOpenCategory = !isOpenCategory"
                            @keydown.escape="isOpenCategory = false">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-4 mt-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                </div>
                <div class="w-[95%] absolute overflow-y-auto mt-2 mx-2 px-3 bg-white rounded-md" x-show="isOpenCategory"
                     @click.away="isOpenCategory = false">
                    <button @click="isOpenCategory = !isOpenCategory" class=" flex mb-2" wire:click="clearCategory">
                        <div class=" flex ml-2 mt-2 bg-white">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-4 mt-0.5 ">
                                    <path fill-rule="evenodd"
                                          d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="pl-4 text-sm font-roboto">Clear</div>
                        </div>
                    </button>
                    @foreach($categories as $category)
                        <button @click="isOpenCategory = !isOpenCategory,isOpenTag = !isOpenTag" class="flex mb-2"
                                wire:click="categoryType({{$category->id}})">
                            <div class="flex items-center ml-2 mt-2">
                                <input type="radio" class="" wire:model="categoryFilter" value="{{$category->id}}">
                                <div class="pl-4 text-sm font-roboto">{{$category->vname}}</div>
                            </div>
                        </button>
                    @endforeach
                </div>

                <!-- Tag Dropdown -->
                <div class=" flex justify-between items-center mt-8 mx-2 px-3 bg-gray-200 rounded-md">
                    <div class="w-[90%] mx-auto font-roboto text-md ">Tag</div>
                    <button @click="isOpenTag = !isOpenTag"
                            @keydown.escape="isOpenTag = false">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                </div>
                <div class="w-[95%] absolute overflow-y-auto mt-2 mx-2 px-3 bg-white rounded-md" x-show="isOpenTag"
                     @click.away="isOpenTag = false">
                    <button class=" flex mb-2" wire:click="clearFilter">
                        <div class=" flex ml-2 mt-2 bg-whit">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-4 mt-0.5 ">
                                    <path fill-rule="evenodd"
                                          d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="pl-4 text-sm font-roboto">All</div>
                        </div>
                    </button>
                    @if(isset($tags))
                        @foreach($tags as $tag)
                            <button class="flex mb-2" wire:click="filterType({{$tag->id}})">
                                <div class="flex ml-2 mt-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                             fill="currentColor" class="size-4 mt-0.5 ">
                                            <path fill-rule="evenodd"
                                                  d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="pl-4 text-sm font-roboto">{{$tag->vname}}</div>
                                </div>
                            </button>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>


        <div class="w-4/5 h-screen rounded-r-xl ">
            <div class="p-10 bg-gray-50 w-[98%] h-[98%] mx-auto rounded-xl overflow-y-auto">
                <!-- Top Panel -->
                @if(auth()->id())
                    <div class="md:flex md:justify-between grid gap-y-6">
                        <div>
                            <x-dashboard.welfare.search/>
                        </div>
                        <div class="md:w-44 flex justify-between  items-center  relative">
                            <x-dashboard.welfare.notification/>
                            <div
                                class="absolute bottom-6 left-3 text-[10px] bg-red-500 text-white w-4 h-4 rounded-full text-center
                                font-semibold">{{$list->count()}}</div>
                            <div>
                                <x-dashboard.welfare.create-new-red/>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Stories -->
                <div>
                    {{--                    <x-dashboard.welfare.stories :users="$users" />--}}
                </div>
                <!-- Feed -->
                <div
                    class="mx-auto text-xl mt-10 font-roboto uppercase font-semibold">{{ \Aaran\Web\Models\Feed::tagName($tag_id) ?: 'Feeds'}}</div>
                <x-dashboard.welfare.feed-index :list="$list"/>
            </div>
        </div>
    </div>


    <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
    <x-forms.create :id="$vid" :max-width="'6xl'">
        <div class="w-full flex gap-6">
            <div class="w-1/2 flex-col flex gap-6">
                <x-input.model-text wire:model="vname" :label="'Caption'"/>
                @error('vname')
                <span class="text-red-500">{{  $message }}</span>
                @enderror
                <x-input.rich-text wire:model="description" :placeholder="''"/>
            </div>
            <div class="w-1/2">
                <!-- Category ----------------------------------------------------------------------------------------------------->
                <div class="flex flex-row py-3 gap-3">
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
                                            <ul class="overflow-y-scroll h-44">
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
                <div class="flex flex-row py-3 gap-3">
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
                                            <ul class="overflow-y-scroll h-44">
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
                <!-- create Image -->
                <div class="flex flex-row gap-6 mt-4">

                    <div class="flex">

                        <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Logo</label>

                        <div class="flex-shrink-0">

                            <div>
                                @if($image)
                                    <img
                                        src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}"
                                        alt="Image"
                                        class="h-24 w-auto mb-1 rounded-md outline outline-2 outline-gray-300 shadow-md shadow-gray-400">
                                @else
                                    <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="relative">

                        <div>
                            <label for="club_photo"
                                   class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                Upload file

                                <input type="file" id='club_photo' wire:model="image" class="hidden"/>
                                <p class="text-xs font-light text-gray-400 mt-2">PNG, JPG SVG, WEBP, and GIF are
                                    Allowed.</p>
                            </label>
                        </div>

                        <div wire:loading wire:target="image" class="z-10 absolute top-6 left-[107px]">
                            <div class="w-14 h-14 rounded-full animate-spin
                    border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-forms.create>
</div>

