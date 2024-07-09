<div>
    <x-slot name="header">Customer Bios</x-slot>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <div class="relative">
            <x-forms.table :list="$list">
                <x-slot name="table_header">
                    <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Title</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Slogan</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Body-1</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Body-2</x-table.header-text>
                    <x-table.header-text wire:click.prevent="sortBy('vname')" center>Picks</x-table.header-text>
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
                                    {{ $row->title}}
                            </x-table.cell-text>

                            <x-table.cell-text>
                                    {{ $row->slogan}}
                            </x-table.cell-text>

                            <x-table.cell-text>
                                {{ $row->body_1}}
                            </x-table.cell-text>

                            <x-table.cell-text>
                                {{ $row->body_2}}
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                    <div class="items-center justify-center flex">
                                        <img class="h-10 w-10"
                                             src="{{URL(\Illuminate\Support\Facades\Storage::url($row->pic))}}"
                                             alt=""></div>
                            </x-table.cell-text>

                            <x-table.cell-action id="{{$row->id}}"/>
                        </x-table.row>

                    @empty
                        <x-table.empty/>
                    @endforelse
                </x-slot>

                <!-- Pagination/Loading-------------------------------------------------------------------------------->
            </x-forms.table>
        </div>

        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="title" :label="'Title'"/>
            @error('vname')
            <span class="text-red-500">{{  $message }}</span>
            @enderror
            <x-input.model-text wire:model="slogan" :label="'Slogan'"/>
            <x-input.model-text wire:model="body_1" :label="'Body'"/>
            <x-input.model-text wire:model="body_2" :label="'Body'"/>

            <div class="flex flex-row gap-6 mt-4">

                <div class="flex">

                    <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Photo</label>

                    <div class="flex-shrink-0">

                        <div>
                            @if($pic!='')
                                <div class="flex-shrink-0 ">
                                    <img class="h-24 w-full" src="{{ $pic->temporaryUrl() }}"
                                         alt="{{$pic?:''}}"/>
                                </div>
                            @endif

                            @if(isset($old_pic))
                                <img class="h-24 w-full"
                                     src="{{URL(\Illuminate\Support\Facades\Storage::url($old_pic))}}"
                                     alt="">

                            @else
                                <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="relative">

                    <div>
                        <label for="master_photo"
                               class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                            <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                            Upload Photo

                            <input type="file" id='master_photo' wire:model="pic" class="hidden"/>
                            <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are Allowed.</p>
                        </label>
                    </div>

                    <div wire:loading wire:target="pic" class="z-10 absolute top-6 left-12">
                        <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                    </div>
                </div>
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
