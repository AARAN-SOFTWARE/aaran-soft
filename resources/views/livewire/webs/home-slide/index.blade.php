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

                                <img src="{{ asset('images/'.$row->bg_image)}}" alt=""/>
{{--                                <img src="{{ \Illuminate\Support\Facades\Storage::url('public/images/'.$row->bg_image)}}" alt=""/>--}}
{{--                                {{\Illuminate\Support\Facades\Storage::url('public/images/'.$row->bg_image)}}--}}

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

                <x-forms.create-new :id="$vid">
                    <div class="lg:flex">
                        <div>
                            <x-input.model-text wire:model="vname" :label="'Title'"/>
                            @error('vname')
                            <div class="text-red-500 w-2/3 mx-auto mb-3 text-center">
                                max words 50 !
                            </div>
                            @enderror

                            <div class="py-4 w-2/3">
                                <x-input.rich-text wire:model="description" :placeholder="'Description'"/>
                            </div>

                            @error('description')
                            <div class="text-red-500 w-2/3 mx-auto mb-3 text-center">
                                max words 300 !
                            </div>
                            @enderror

                            <x-input.model-text wire:model="link" :label="'Button'"/>

                        </div>

                        <!-- Bg Image --------------------------------------------------------------------------------->
                        <div>

                            <div class="h-36 w-full py-5 ml-5">
                                <div>
                                    @if($bg_image)
                                        <img class="h-36 w-full" src="{{ $bg_image->temporaryUrl() }}"
                                             alt="{{$bg_image}}"/>
                                    @endif

                                    @if(!$bg_image && isset($old_bg_image))
                                        <img class="h-36 w-full"
                                             src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_bg_image))}}"
                                             alt="">
                                    @else
                                        <div class="h-36 w-full justify-center flex items-center">
                                            Select Image
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-8 ml-5">
                                <input type="file" wire:model="bg_image">
                                <button wire:click.prevent="save_image"></button>
                            </div>

                            <!-- Content Image------------------------------------------------------------------------->

                            <div class="h-36 w-full py-5 ml-5">
                                <div>
                                    @if($cont_image)
                                        <img class="h-36 w-full" src="{{ $cont_image->temporaryUrl() }}"
                                             alt="{{$cont_image}}"/>
                                    @endif

                                    @if(!$cont_image && isset($old_cont_image))
                                        <img class="h-36 w-full"
                                             src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_cont_image))}}"
                                             alt="">
                                    @else
                                        <div class="h-36 w-full justify-center flex items-center">
                                            Select Image
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-8 ml-5">
                                <input type="file" wire:model="cont_image">
                                <button wire:click.prevent="save_image"></button>
                            </div>
                        </div>

                    </div>
                </x-forms.create-new>
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

    </x-forms.m-panel>
</div>
