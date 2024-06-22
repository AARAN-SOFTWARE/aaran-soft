@props([
'showFilters'=>false
])
<div>
    <x-slot name="header">Test Case</x-slot>

    <div class="w-full border-t-2 border-purple-500 rounded-md shadow-lg">
        <div class="p-6 pt-8 pb-6 bg-white rounded-t-sm space-y-4 border border-gray-400">


            <div class="w-full h-auto text-center pt-5 pb-5 justify-center">
                <div class="capitalize font-semibold text-purple-700 text-xl">{{$models->title}}</div>
                <div class="capitalize font-semibold mt-5 text-4xl">{{$models->description}}</div>
            </div>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
    <div class="md:flex md:justify-between md:items-center md:pb-5">
        <div class="w-full h-20 md:w-2/4 md:items-center flex md:space-x-2 mx-auto">
            <x-input.search-box/>
            <x-input.toggle-filter :show-filters="$showFilters"/>

        </div>
        <div class="">
            <x-forms.per-page/>
        </div>
    </div>
    <x-input.advance-search :show-filters="$showFilters" />


        <!--  Title -->


        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list" >
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('created_at')"/>
                <x-table.header-text center width="3%"><x-icons.icon icon="check-circle" class="h-5 w-5 mt-1"/></x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('created_at')" center width="5%">Action</x-table.header-text>
                <x-table.header-text center width="6%">Functional Type</x-table.header-text>
                <x-table.header-text center width="11%">Test Cases</x-table.header-text>
                <x-table.header-text center width="5%">Test Data </x-table.header-text>
                <x-table.header-text center width="9%">Prerequisite </x-table.header-text>
                <x-table.header-text center width="11%">Expected Output</x-table.header-text>
                <x-table.header-text center width="11%">Actual Output </x-table.header-text>
                <x-table.header-text center width="7%">Test Browser </x-table.header-text>
                <x-table.header-text center width="10%">Comment </x-table.header-text>
                <x-table.header-text center width="7%">Status </x-table.header-text>
                <x-table.header-text center width="5%">Image </x-table.header-text>
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
                        <x-table.cell-text>{{ $row->action}}</x-table.cell-text>
                        <x-table.cell-text>{{ $row->type}}</x-table.cell-text>
                        <x-table.cell-text>{{ $row->test_case}}</x-table.cell-text>
                        <x-table.cell-text>{{ $row->test_data}}</x-table.cell-text>
                        <x-table.cell-text>{{ $row->input}}</x-table.cell-text>
                        <x-table.cell-text>{{ $row->expected_output}}</x-table.cell-text>
                        <x-table.cell-text>{{ $row->actual_output}}</x-table.cell-text>
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
                        <x-table.cell-text>{{ $row->comment}}</x-table.cell-text>
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
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image)}}" alt="Test Image" class="h-9 w-16 rounded-md"/>
                            </button>
                        </x-table.cell-text>
                        <x-table.cell-text id="{{$row->id}}">
                            <div class="w-full flex justify-center gap-3">
                                <x-table.edit wire:click="edit({{ $row->id }})"/>
                                <x-table.delete wire:click="getDelete({{ $row->id }})"/>
                            </div>
                        </x-table.cell-text>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse

                <!---     INLINE CREATE/EDIT   --->
                    <x-table.row class="border-0" :id="$vid">
                        <x-table.cell center>
                            {{$list->count()+1}}
                        </x-table.cell>
                        <x-table.cell-text colspan="2">
                            <input type="text" wire:model="action" class="border-0 w-full h-full purple-textbox"/>
                            @error('action')
                            <span class="text-red-500">{{  $message }}</span>
                            @enderror
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="type" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="test_case" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="test_data" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="input" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="expected_output" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <input type="text" wire:model="actual_output" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text >
                            <select  wire:model="browser" name="browser" class="w-full h-auto border-0 purple-textbox" style="font-size: 11px ">
                                <option selected>choose..</option>
                                <option>Chrome</option>
                                <option>Firefox</option>
                                <option>Microsoft Edge</option>
                                <option>Brave</option>
                                <option>Safari</option>
                                <option>Opera</option>
                            </select>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <input type="text" wire:model="comment" class="border-0 w-full h-full purple-textbox"/>
                        </x-table.cell-text>
                        <x-table.cell-text >
                            <select  wire:model="status" name="browser" class="w-full h-auto border-0 purple-textbox" style="font-size: 11px ">
                                <option selected class="text-xs">choose..</option>
                                <option class="text-xs">Pass</option>
                                <option class="text-xs">Fail</option>
                                <option class="text-xs">Undefined</option>
                            </select>
                        </x-table.cell-text>
                        <x-table.cell-text colspan="2" center class="">
                            <div class="relative">
                                <div class="flex justify-evenly items-center ">
                                    <div class="flex justify-evenly items-center">
{{--                                        <div class="mx-auto items-center mt-3 mr-1">--}}
{{--                                            @if($image)--}}
{{--                                                <img src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}" alt="Image" class="h-9 w-12 pb-1 mb-1 rounded-md">--}}
{{--                                            @else--}}
{{--                                                <x-icons.icon :icon="'logo'" class=""/>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                        <div class="text-center mx-auto items-center">
                                            <label>
                                                <input type="file" wire:model="image" class="hidden">
                                                <img src="../../../../images/upload-file.svg" alt="" class="h-5 w-5 text-gray-500">
                                            </label>
                                        </div>
                                    </div>
                                    {{--                                <x-button.save class="h-9" />--}}
                                    <button type="submit" wire:click.prevent="save" class="bg-purple-600 text-white flex items-center justify-evenly px-2 py-1 rounded-md">
                                        <div><x-icons.icon :icon="'save'" class="h-5 w-auto block px-1.5 mt-1"/></div><div>Save</div>
                                    </button>
                                </div>
                                <div class="absolute bottom-11 -left-6">
                                    <div class="mx-auto items-center mt-3 mr-1 ">
                                        @if($image)
                                            <img src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}" alt="Image" class="h-16 w-28 mb-1 rounded-md outline outline-2 outline-gray-300 shadow-lg shadow-gray-400">
                                        @else
                                            <x-icons.icon :icon="'logo'" class=""/>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </x-table.cell-text>
                    </x-table.row>
            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
        <x-modal.delete/>



        <!-- full Image --------------------------------------------------------------------------------------->
        <div class="w-1/3 bg-stone-100">
            <x-jet.modal :maxWidth="'4xl'" wire:model.defer="showEditModal_1">
                <div class="px-6  pt-4">
                    <img class="rounded-xl justify-items-start h-full w-full"
                         src="{{ \Illuminate\Support\Facades\Storage::url($full_image) }}">
                </div>
                <div class="px-6 py-3 bg-gray-100 text-right">
                    <div class="w-full flex justify-end gap-3">
                        <div class="flex gap-3">
                            <button wire:click.prevent="$set('showEditModal_1', false)"
                                    class='bg-gray-500 text-white py-1 px-2 rounded-md'>
                                <div class="flex">
                                    <div><x-icons.icon :icon="'chevrons-left'" class="h-5 w-auto block px-1 mt-1"/></div>
                                    <div>Cancel</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </x-jet.modal>
        </div>

        </div>
    </div>
</div>

