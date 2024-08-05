<div>
    <x-slot name="header">HomeSlide</x-slot>

    <!-- Table Header ------------------------------------------------------------------------------------------------->

    <x-forms.m-panel>

        <div class="md:flex md:justify-between md:pb-5">
            <div class="w-full h-20 md:w-2/4 flex md:space-x-2">

                <x-input.search-box/>
                <x-input.toggle-filter :show-filters="$showFilters"/>
            </div>

            <div class="flex justify-between md:mb-5 md:space-x-2 md:flex md:items-center">
                <x-forms.per-page/>
                @admin
                <x-button.new/>
                @endadmin
            </div>
        </div>

        <!-- Table Header --------------------------------------------------------------------------------------------->

        <x-forms.table>
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Title</x-table.header-text>
                <x-table.header-text center>Desc</x-table.header-text>
                <x-table.header-text center>Link</x-table.header-text>
                <x-table.header-text center>bg_image</x-table.header-text>
                <x-table.header-text center>cont_image</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index => $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{  $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {!! $row->description !!}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->link}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <div class="flex-shrink-0 h-12 w-12 rounded-xl mx-auto mt-2">

                                <img src="{{ \Illuminate\Support\Facades\Storage::url('/images/'.$row->bg_image) }}"
                                     alt=""/>
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <div class="flex-shrink-0 h-12 w-12 rounded-xl mx-auto mt-2">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url('/images/'.$row->cont_image)}}"
                                     alt="{{$row->cont_image}}"/>
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse

                <!-- Create Record ------------------------------------------------------------------------------------>

                <x-forms.create :max-width="'6xl'" :id="$vid">
                    <div class="lg:flex gap-6">
                        <div class="flex flex-col gap-3 w-1/2">
                            <x-input.model-text wire:model="vname" :label="'Title'"/>
                            @error('vname')
                            <div class="text-red-500 w-2/3 mx-auto mb-3 text-center">
                                max words 50 !
                            </div>
                            @enderror

                            <div class="py-4 w-full">
                                <x-input.rich-text wire:model="description" :placeholder="'Description'"/>
                            </div>

                            @error('description')
                            <div class="text-red-500 w-2/3 mx-auto mb-3 text-center">
                                max words 300 !
                            </div>
                            @enderror


                        </div>

                        <!-- Bg Image --------------------------------------------------------------------------------->
                        <div class="flex flex-col gap-7">

                            <x-input.model-text wire:model="link" :label="'Button'"/>

                            <div class="flex flex-row gap-6">
                                <div class="flex">

                                    <label for="bg_image"
                                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Bg_image</label>

                                    <div class="flex-shrink-0">

                                        <div>
                                            @if($bg_image)
                                                <div class="flex-shrink-0 ">
                                                    <img class="h-24 w-full" src="{{ $bg_image->temporaryUrl() }}"
                                                         alt="{{$bg_image?:''}}"/>
                                                </div>
                                            @endif

                                            @if(!$bg_image && isset($bg_image))
                                                <img class="h-24 w-full"
                                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_bg_image))}}"
                                                     alt="">

                                            @else
                                                <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">

                                    <div>
                                        <label for="bg_image"
                                               class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                            <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                            Upload Photo

                                            <input type="file" id='bg_image' wire:model="bg_image" class="hidden"/>
                                            <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                                Allowed.</p>
                                        </label>
                                    </div>

                                    <div wire:loading wire:target="bg_image" class="z-10 absolute top-6 left-12">
                                        <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                                    </div>
                                </div>
                            </div>


                            <!-- Content Image------------------------------------------------------------------------->

                            <div class="flex flex-row gap-6">
                                <div class="flex">

                                    <label for="bg_image"
                                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Image</label>

                                    <div class="flex-shrink-0">

                                        <div>
                                            @if($cont_image)
                                                <div class="flex-shrink-0 ">
                                                    <img class="h-24 w-full" src="{{ $cont_image->temporaryUrl() }}"
                                                         alt="{{$cont_image?:''}}"/>
                                                </div>
                                            @endif

                                            @if(!$cont_image && isset($cont_image))
                                                <img class="h-24 w-full"
                                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_cont_image))}}"
                                                     alt="">

                                            @else
                                                <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">

                                    <div>
                                        <label for="cont_image"
                                               class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                            <x-icons.icon icon="cloud-upload"
                                                          class="w-8 h-auto block text-gray-400"/>
                                            Upload Photo

                                            <input type="file" id='cont_image' wire:model="cont_image" class="hidden"/>
                                            <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                                Allowed.</p>
                                        </label>
                                    </div>

                                    <div wire:loading wire:target="cont_image" class="z-10 absolute top-6 left-12">
                                        <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </x-forms.create>
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

    </x-forms.m-panel>
</div>
