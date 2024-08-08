<div>
    <x-slot name="header">Testimony</x-slot>
    <x-forms.m-panel>
        <div class="flex flex-col-2 gap-3">
            <div class="lg:w-1/2 ml-2 px-8 flex flex-col gap-3">
                <x-input.model-text wire:model="vname" :label="'Heading'"/>
                <div class="flex flex-col sm:flex-row gap-1 sm:gap-3">
                    <label for="description"
                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Slogan</label>
                    <textarea id="description" autocomplete="off" wire:model.live="description"
                              class="w-full purple-textbox h-16"
                    ></textarea>
                </div>
                <hr class="my-2 border-gray-200 dark:border-gray-700">
                <div>
                    <div class="flex flex-col gap-3">
                        <x-input.model-text wire:model.live="itemList.{{0}}.title" :label="'Title'"/>

                        <div class="flex flex-col sm:flex-row gap-1 sm:gap-3">
                            <label for="description"
                                   class="w-[10rem] text-zinc-500 tracking-wide py-2">Description</label>
                            <textarea id="description" autocomplete="off" wire:model.live="itemList.{{0}}.description"
                                      class="w-full purple-textbox h-16 overflow-auto"
                            ></textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-1 sm:gap-3">
                            <label for="description" wire:model.live="itemList.{{0}}.icon"
                                   class="w-[10rem] text-zinc-500 tracking-wide py-2">Icon</label>
                            <textarea id="description" autocomplete="off" wire:model.live="itemList.{{0}}.icon"
                                      class="w-full purple-textbox h-16 overflow-auto"
                            ></textarea>
                        </div>

                    </div>

                    <button
                        class="text-white inline-block py-1 px-3 font-semibold bg-blue-500 hover:bg-blue-700 rounded-lg"
                        wire:click="addItem('{{$itemIncrement}}')">
                        + Add
                    </button>
                </div>
            </div>
            <div class="lg:w-1/2 ml-2 px-8 flex flex-col gap-3">
                <!-- Image ---------------------------------------------------------------------------------------->
                <div class="flex flex-row gap-6 mt-4">

                    <div class="flex">

                        <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Image</label>

                        <div class="flex-shrink-0">

                            <div>
                                @if($image)
                                    <div class="flex-shrink-0 h-80 w-full">
                                        <img class="h-full w-full" src="{{ $image->temporaryUrl() }}"
                                             alt="{{$image?:''}}"/>
                                    </div>
                                @endif

                                @if(!$image && isset($old_image))
                                    <div class="h-80 w-full">
                                        <img class="h-full w-full"
                                             src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
                                             alt="">
                                    </div>
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

                        <div wire:loading wire:target="image" class="z-10 absolute top-6 left-12">
                            <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-2 px-8 ">
            @foreach( $secondaryItem as $index => $row )
                <div class=" flex flex-col-4 gap-6 mb-3 w-full">
                    <div class="w-full">
                        <x-input.model-text wire:model.live="itemList.{{$row}}.title" :label="'Title'"/>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-3 w-full">
                        <label for="description"
                               class="w-[10rem] text-zinc-500 tracking-wide py-2">Description</label>
                        <textarea id="description" autocomplete="off"
                                  wire:model.live="itemList.{{$row}}.description"
                                  class="w-full purple-textbox h-16 overflow-auto"
                        ></textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-3 w-full">
                        <label for="description"
                               class="w-[10rem] text-zinc-500 tracking-wide py-2">Icon</label>
                        <textarea id="description" autocomplete="off" wire:model.live="itemList.{{$row}}.icon"
                                  class="w-full purple-textbox h-16 overflow-auto"
                        ></textarea>
                    </div>
                    <div class="w-1/4 flex items-center justify-center">
                        <button
                            class=" bg-red-500 hover:bg-red-700 inline-block py-1 px-3 text-white h-fit font-semibold flex-col gap-2 rounded-lg "
                            wire:click="deleteItem('{{$index}}','{{$row}}')">
                            <span>Delete</span>
                            <x-icons.icon :icon="'trash'" class="block h-4 w-4"/>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </x-forms.m-panel>
    <!-- Save Button area --------------------------------------------------------------------------------------------->
    <x-forms.m-panel-bottom-button save back active/>
</div>
