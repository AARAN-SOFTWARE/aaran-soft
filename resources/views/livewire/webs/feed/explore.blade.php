<div>
    <x-slot name="header">Explore ✨</x-slot>
    <div class="flex rounded-xl">
        <div class="w-1/5  h-screen outline-2 outline-gray-400 rounded-l-lg ">
            <div class="flex  h-screen pb-5">
                <x-dashboard.welfare.sideNav/>

                <div class="w-4/5 bg-gray-50 rounded-xl overflow-y-auto">
                    <div class="w-[90%] mx-auto mt-5 font-roboto text-md ">Categories</div>
                        <div class="w-[90%]  mx-auto overflow-y-auto mt-2">
                        @if($categoryFilter!='')
                            <div class=" grid grid-cols-3 gap-2">
                                @foreach($categoryFilter as $index=> $row)
                                    <div class="w-20 flex bg-gray-100 p-1.5 rounded-lg text-xs font-roboto justify-between">
                                        <div>{{\Aaran\Web\Models\Feed::type($row)}}</div>
                                        <button wire:click="removeFilter({{$index}})" class="pl-1 hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-3">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <button class=" flex" wire:click="clearFilter">
                            <div class=" flex ml-2 mt-2 bg-whit">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mt-0.5 ">
                                        <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="pl-4 text-sm font-roboto">All</div>
                            </div>
                        </button>
                        @foreach($categories as $category)
                            <button class="flex" wire:click="filterType({{$category->id}})">
                                <div class="flex ml-2 mt-2">
                                    <div> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mt-0.5 ">
                                            <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                                        </svg></div>
                                    <div class="pl-4 text-sm font-roboto">{{$category->vname}}</div>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="w-4/5 h-screen rounded-r-xl ">
            <div class="p-10 bg-gray-50 w-[98%] h-[98%] mx-auto rounded-xl overflow-y-auto">
                <!-- Top Panel -->
                <div class="flex justify-between">
                    <div>
                        <x-dashboard.welfare.search/>
                    </div>
                    <div class="w-44 flex justify-between items-center relative">
                        <x-dashboard.welfare.notification/>

                        <div class="absolute bottom-6 left-3 text-[10px] bg-red-500 text-white w-4 h-4 rounded-full text-center font-semibold">{{$list->count()}}</div>

                        <div>
                            <x-dashboard.welfare.create-new-red/>
                        </div>
                    </div>
                </div>

                <!-- Stories -->
                <div>
                    {{--                    <x-dashboard.welfare.stories :users="$users" />--}}
                </div>
                <!-- Feed -->
                <div class="mx-auto text-xl mt-10 font-roboto font-semibold">Feed</div>
                <x-dashboard.welfare.feed-index :list="$list"/>
            </div>
        </div>
    </div>


    <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
    <x-forms.create :id="$vid">
        <x-input.model-text wire:model="vname" :label="'Caption'"/>
        @error('vname')
        <span class="text-red-500">{{  $message }}</span>
        @enderror
        <x-input.model-select wire:model="feed_category_id" :label="'Category'">
            <option class="text-gray-400"> choose ..</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->vname}}</option>
            @endforeach
        </x-input.model-select>
        <x-input.model-text wire:model="description" :label="'Description'"/>
        <x-input.model-text wire:model="bookmark" :label="'BookMark'"/>
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
    </x-forms.create>
</div>
