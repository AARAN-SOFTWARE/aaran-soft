<div>
    <x-slot name="header">Sport News</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('headline')"/>
                <x-table.header-text wire:click.prevent="sortBy('headline')" center width="20%">Headline</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('headline')" center width="15%">Subject</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('headline')" center width="10%">Credits</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('headline')" center width="10%">Image</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('headline')" center width="15%">Image Description</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('headline')" center width="30%">Content</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->headline}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->subject}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->credits}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image)}}" alt="image"/>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->image_desc}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->content}}
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
        <x-forms.create :id="$vid" max-width="6xl">
            <div class="flex gap-4">
                <div class="w-1/2 flex-col gap-3">
                    <x-input.model-text wire:model="headline" :label="'Headline'" />
                    @error('headline')
                    <span class="text-red-500">{{  $message }}</span>
                    @enderror
                    <x-input.model-text wire:model="subject" :label="'Subject'" />
                    @error('subject')
                    <span class="text-red-500">{{  $message }}</span>
                    @enderror
                    <x-input.model-text wire:model="content" :label="'Content'" />
                    @error('comtent')
                    <span class="text-red-500">{{  $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <x-input.model-text wire:model="credits" :label="'Credits'"/>
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
                    @error('image')
                    <span class="text-red-500">{{  $message }}</span>
                    @enderror
                    <x-input.model-text wire:model="image_desc" :label="'Image Description'"/>
                </div>
            </div>


        </x-forms.create>

    </x-forms.m-panel>
</div>
