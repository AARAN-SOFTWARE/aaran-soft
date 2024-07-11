<div>
    <x-slot name="header">Feeds</x-slot>
    <div class="flex rounded-xl">
        <div class="w-1/5 h-screen outline-2 outline-gray-400 rounded-l-lg ">
            <!-- profile -->
            <x-dashboard.welfare.profile/>
            <!-- Highlights -->
{{--            <x-dashboard.welfare.highlights :users="$users"/>--}}
            <!-- option -->
            <x-dashboard.welfare.option/>
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
                    <x-dashboard.welfare.stories :users="$users" />
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
        <x-input.model-text wire:model="description" :label="'Description'"/>
        <x-input.model-select wire:model="feed_category_id" :label="'Category'">
            <option class="text-gray-400"> choose ..</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->vname}}</option>
            @endforeach
        </x-input.model-select>
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
                                class="h-24 w-32 mb-1 rounded-md outline outline-2 outline-gray-300 shadow-lg shadow-gray-400">
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
