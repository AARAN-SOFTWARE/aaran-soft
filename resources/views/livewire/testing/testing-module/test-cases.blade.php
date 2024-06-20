@props([
'showFilters'=>false
])
<div>
    <x-slot name="header">Test Case</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
    <div class="md:flex md:justify-between md:items-center md:pb-5">
        <div class="w-full h-20 md:w-2/4 md:items-center flex md:space-x-2">

            <x-input.search-box/>
            <x-input.toggle-filter :show-filters="$showFilters"/>

        </div>
        <div class="flex justify-between md:mb-5 md:space-x-2 md:flex md:items-center">
            <x-forms.per-page/>
            <x-button.new/>
        </div>
    </div>
    <x-input.advance-search :show-filters="$showFilters" />

    <div class="w-full h-20 bg-white">
        <div class="capitalize font-semibold text-2xl">Title&nbsp;:&nbsp;{{$models->title}}</div>
        <div class="capitalize font-semibold text-2xl">Description&nbsp;:&nbsp;{{$models->description}}</div>
    </div>
    <div>
        <table>

        </table>
    </div>

{{--    <x-forms.m-panel>--}}
        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('action')"/>
                <x-table.header-text center><x-icons.icon icon="check-circle" class="h-5 w-5 mt-1"/></x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('action')" center>Action</x-table.header-text>
                <x-table.header-text center>Functional Type</x-table.header-text>
                <x-table.header-text center>Test Cases</x-table.header-text>
{{--                <x-table.header-text center>Steps </x-table.header-text>--}}
                <x-table.header-text center>Test Data </x-table.header-text>
                <x-table.header-text center>Prerequisite </x-table.header-text>
                <x-table.header-text center>Expected Output</x-table.header-text>
                <x-table.header-text center>Actual Output </x-table.header-text>
                <x-table.header-text center>Test Browser </x-table.header-text>
                <x-table.header-text center>Comment </x-table.header-text>
{{--                <x-table.header-text center>Feature </x-table.header-text>--}}
                <x-table.header-text center>Status </x-table.header-text>
                <x-table.header-text center>Image </x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text class="flex justify-center">
                            <label>
                                <input wire:click="isChecked({{$row->id}})" type="checkbox"
                                       @if($row->checked) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                                   {{ $row->checked ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->action}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->type}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->test_case}}
                        </x-table.cell-text>

{{--                        <x-table.cell-text>--}}
{{--                            {{ $row->steps}}--}}
{{--                        </x-table.cell-text>--}}

                        <x-table.cell-text>
                            {{ $row->test_data}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->input}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->expected_output}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->actual_output}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <div class="flex justify-center">
                            @if($row->browser === 'Chrome')
                                <x-browser.chrome />
                            @elseif($row->browser === 'Firefox')
                                <x-browser.firefox />
                            @elseif($row->browser === 'Microsoft Edge')
                                <x-browser.edge />
                            @elseif($row->browser === 'Brave')
                                <x-browser.brave />
                            @elseif($row->browser === 'Safari')
                                <x-browser.safari />
                            @else
                                <x-browser.opera />
                            @endif
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text>
                                {{ $row->comment}}
                        </x-table.cell-text>

{{--                        <x-table.cell-text>--}}
{{--                            {{ $row->feature}}--}}
{{--                        </x-table.cell-text>--}}

                        <x-table.cell-text>
                            @if($row->status === 'Pass')
                                <div class="bg-green-700 text-white text-center rounded-md">{{$row->status}}</div>
                            @elseif($row->status === 'Fail')
                                <div class="bg-red-700 text-white text-center rounded-md">{{$row->status}}</div>
                            @else
                                <div class="bg-gray-700 text-white text-center rounded-md">{{$row->status}}</div>
                            @endif
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <button wire:click="fullview({{$row->id}})">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image)}}" alt="Test Image" class="h-10 w-10"/>
                            </button>

                        </x-table.cell-text>


                        <x-table.cell-text id="{{$row->id}}">
                            <div class="w-full flex justify-center gap-3">
                                <x-table.edit wire:click="edit({{ $row->id }})"/>
                                <x-table.delete wire:click="getDelete({{ $row->id }})"/>
                                <button wire:click="create" class="h-5 w-5 mt-0.5 rounded-full bg-green-600">
                                    <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                        <div class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                            <div class="flex flex-col justify-start items-center -translate-y-full">
                                                <div class="bg-green-600  shadow-md text-white rounded-lg py-0.5 px-2 cursor-default text-xs">
                                                    new
                                                </div>
                                                <div class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-green-600 -mt-[1px]"></div>
                                            </div>
                                        </div>
                                        <span>
                                         <x-icons.icon :icon="'plus-slim'"
                                                       class="text-white w-5 h-5 px-0.5 py-0.5"/>
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </x-table.cell-text>

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
        <x-forms.create :id="$vid" class="w-[40rem]">

                    <x-input.model-text wire:model="action" :label="'Action'"/>
                    @error('vname')
                    <span class="text-red-500">{{  $message }}</span>
                    @enderror
                    <x-input.model-text wire:model="type" :label="'Functional type'"/>
                    <x-input.model-text wire:model="test_case" :label="'Test Case'"/>
{{--                    <x-input.model-text wire:model="steps" :label="'Steps'"/>--}}
                    <x-input.model-text wire:model="test_data" :label="'Test Data'"/>
                    <x-input.model-text wire:model="input" :label="'Input'"/>
                    <x-input.model-text wire:model="expected_output" :label="'Expected Output'"/>
                    <x-input.model-text wire:model="actual_output" :label="'Actual Output'"/>
                    <x-input.model-select wire:model="browser" :label="'Browser'">
                        <option selected>choose..</option>
                        <option>Chrome</option>
                        <option>Firefox</option>
                        <option>Microsoft Edge</option>
                        <option>Brave</option>
                        <option>Safari</option>
                        <option>Opera</option>
                    </x-input.model-select>
                    <x-input.model-text wire:model="comment" :label="'Comment'"/>
                    {{--                    <x-input.model-text wire:model="feature" :label="'Feature'"/>--}}
                    <x-input.model-select wire:model="status" :label="'status'">
                        <option selected>choose..</option>
                        <option>Pass</option>
                        <option>Fail</option>
                        <option>Undefined</option>
                    </x-input.model-select>
                        <div class="flex flex-items-center pt-2">
                            <label for="image_in" class="w-[10rem] text-zinc-500 tracking-wide py-2 ">Image</label>
                            <div class="flex-shrink-0 h-20 w-20 mr-4">
                                @if($image)
                                    <div class="flex-shrink-0 h-20 w-20 mr-4">
                                        <img
                                            src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}" alt="Image">
                                    </div>
                                @else
                                    <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                @endif
                            </div>

                            <div>
                                <input type="file" wire:model="image" class="">
                                <button wire:click.prevent="save_image" class="m-4">Save photo</button>
                            </div>
                        </div>
        </x-forms.create>

        <!-- Image Full View -->
        <div class="w-1/3 bg-stone-100">
            <x-jet.modal :maxWidth="'6xl'" wire:model.defer="showEditModal_1">
                <div class="px-6  pt-4">
                    <img class="rounded-xl justify-items-start h-full w-full"
                         src="{{ \Illuminate\Support\Facades\Storage::url($full_image) }}">
                </div>
                <div class="px-6 py-3 bg-gray-100 text-right">
                    <div class="w-full flex justify-end gap-3">
                        <div class="flex gap-3">
                            <button wire:click.prevent="$set('showEditModal_1', false)"
                                    class='inline-flex items-center px-4 py-2 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest
                               focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150
                               focus:ring-gray-500 bg-gray-600 hover:bg-gray-500 active:bg-gray-700 border-gray-600'>
                                <x-icons.icon :icon="'chevrons-left'" class="h-5 w-auto block px-1.5"/>
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </x-jet.modal>
        </div>
    </x-forms.m-panel>

    <div>






    </div>
</div>

