<div>
    <x-slot name="header">Sport Achievement</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text center>Photo</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>title</x-table.header-text>
                <x-table.header-text center>category</x-table.header-text>
                <x-table.header-text center>date</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('sportsClub.students',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('sportsClub.students',[$row->id])}}">
                                <div class="flex-shrink-0 h-10 w-10 mr-4 rounded-xl">
                                    <img
                                        src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->image))}}"
                                        alt="logo"/>
                                </div>
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->category}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->date}}
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

        <x-forms.create max-width="6xl" :id="$vid">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-7 w-full">

                <div class="flex flex-row gap-0 sm:gap-3">

                    <div class="flex flex-col gap-3">
                        <x-input.model-text wire:model="vname" :label="'Title'"/>
                        <x-input.model-text wire:model="desc" :label="'Description'" :placeholder="''"/>
                        <x-input.model-text wire:model="category" :label="'Category'"/>
                    </div>

                    <div class="flex flex-col gap-3">
                        <x-input.model-date wire:model="date" :label="'date'"/>
                        <x-input.model-text wire:model="location" :label="'Location'"/>

                        <div class="flex flex-row gap-6 mt-4">

                            <div class="flex">

                                <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Photo</label>

                                <div class="flex-shrink-0">

                                    <div>
                                        @if($image)
                                            <div class="flex-shrink-0 ">
                                                <img class="h-24 w-full" src="{{ $image->temporaryUrl() }}"
                                                     alt="{{$image?:''}}"/>
                                            </div>
                                        @endif

                                        @if(!$image && isset($image))
                                            <img class="h-24 w-full"
                                                 src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
                                                 alt="">

                                        @else
                                            <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="relative">

                                <div>
                                    <label for="image"
                                           class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                        <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                        Upload Photo

                                        <input type="file" id='image' wire:model="image" class="hidden"/>
                                        <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are Allowed.</p>
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
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
