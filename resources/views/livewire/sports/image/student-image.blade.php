<div>
    <x-slot name="header">Student Image</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('title')"/>
                <x-table.header-text class="w-20" center>Student Image</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('title')" left>Title</x-table.header-text>
                <x-table.header-text center>Desc</x-table.header-text>
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
                            <img
                                src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->student_image))}}"
                                alt="logo"/>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->title}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {!! $row->desc !!}
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

        <x-forms.create :id="$vid" :max-width="'xl'">

            <div class="flex flex-col gap-7 w-full">

                <x-input.model-text wire:model="title" :label="'Title'"/>
                <x-input.rich-text wire:model="desc" :label="'Description'" :placeholder="''"/>

                <!-- Image -------------------------------------------------------------------------------------------->
                <div class="flex flex-row gap-6 mt-4">

                    <div class="flex">

                        <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Image</label>

                        <div class="flex-shrink-0">

                            <div>
                                @if($student_image)
                                    <div class="flex-shrink-0 ">
                                        <img class="h-24 w-full" src="{{ $student_image->temporaryUrl() }}"
                                             alt="{{$student_image?:''}}"/>
                                    </div>
                                @endif

                                @if(!$student_image && isset($old_student_image))
                                    <img class="h-24 w-full"
                                         src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_student_image))}}"
                                         alt="">

                                @else
                                    <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="relative">

                        <div>
                            <label for="student_image"
                                   class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                Upload file

                                <input type="file" id='student_image' wire:model="student_image" class="hidden"/>
                                <p class="text-xs font-light text-gray-400 mt-2">PNG, JPG SVG, WEBP, and GIF are
                                    Allowed.</p>
                            </label>
                        </div>

                        <div wire:loading wire:target="student_image" class="z-10 absolute top-6 left-12">
                            <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                        </div>
                    </div>
                </div>

            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
