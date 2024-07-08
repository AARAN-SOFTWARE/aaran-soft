<div>
    <x-slot name="header">Feeds</x-slot>
    <div class="flex rounded-xl">
        <div class="w-1/5 h-screen outline-2 outline-gray-400 rounded-l-lg ">
            <!-- profile -->
            <x-dashboard.welfare.profile />
            <!-- Highlights -->
            <x-dashboard.welfare.highlights />
            <!-- option -->
            <x-dashboard.welfare.option />
        </div>
        <div class="w-4/5 h-screen rounded-r-xl ">
            <div class="p-10 bg-gray-50 w-[98%] h-[98%] mx-auto rounded-xl overflow-y-auto">
                <!-- Top Panel -->
                <div class="flex justify-between">
                    <div>
                        <x-dashboard.welfare.search />
                    </div>
                    <div class="w-44 flex justify-between items-center">
                        <x-dashboard.welfare.notification />

                        <div>
                           <x-dashboard.welfare.create-new-red />
                        </div>
                    </div>
                </div>

                <!-- Stories -->
                <div>
                    <x-dashboard.welfare.stories />
                </div>
                <!-- Feed -->
                <div class="w-[98%] mx-auto text-xl mt-10 font-roboto font-semibold">Feed</div>
                <div class="grid grid-cols-3 mt-4 justify-items-center gap-6 font-roboto ">
{{--                        <a href="/feed/show">--}}
                    <x-dashboard.welfare.feed-index :list="$list" />
{{--                        </a>--}}
                </div>
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
        <x-input.model-text wire:model="bookmark" :label="'BookMark'"/>
        <div class="relative mt-5 w-44 h-16 ml-[30rem]">
            <div class="text-center mx-auto items-center">
                <label>
                    <input type="file" wire:model="image" class="hidden">
                    <img src="../../../../images/upload-file.svg" alt="" class="h-5 w-5 text-gray-500">
                </label>
            </div>
            <div class="absolute bottom-5 left-6">
                <div class="mx-auto items-center mt-3 mr-1 ">
                    @if($image)
                        <img src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}" alt="Image" class="h-16 w-28 mb-1 rounded-md outline outline-2 outline-gray-300 shadow-lg shadow-gray-400">
                    @else
                        <x-icons.icon :icon="'logo'" class=""/>
                    @endif
                </div>
            </div>
        </div>
    </x-forms.create>
</div>
