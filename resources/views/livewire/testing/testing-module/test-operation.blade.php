<div>
    <x-slot name="header">Test Operations</x-slot>

    <!-- Top Controls ------------------------------------------------------------------------------------------------->

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        @forelse ($list as $row)
{{--            {{dd($list)}}--}}
            <div class="w-full flex justify-center">
                <div class="w-3/4 bg-zinc-50 rounded-xl mt-10">
                    <div class="flex justify-between p-5">
                        <div class="flex-col">
                            <div>
                                <a class="overflow-y-auto text-wrap  " href="{{route('operation.reply',[$row->id])}}">
                                    <div class="text-lg font-sans font-semibold">{{ $row->actions->vname ?: " "}} - {{ $row->vname }}</div>
                                </a>
                            </div>
                            <div class="flex">
                                <div class="text-gray-500 pt-2 text-xs font-bold"> <time>{{ $row->created_at->diffForHumans() }}</time></div> &nbsp;
{{--                                <div class="text-gray-500 text-xs pt-2 font-semibold">{{ $row->vdate }}</div>--}}
                            </div>

                        </div>

                        <div class="w-[15rem] h-6 flex justify-between">
                            <div class="font-sans text-sm text-gray-600 font-semibold flex"><div class=""> <x-icons.icon icon="user" class="w-6 h-6 pt-0.5" /> </div> <div>  {{ $row->user->name }}</div></div>
                            <div class="w-28 text-center font-serif rounded {{ \App\Enums\Status::tryFrom($row->status)->getStyle() }}">{{ \App\Enums\Status::tryFrom($row->status)->getName() }}</div>
                        </div>
                    </div>
                    <div class="flex px-5">
                        <div class="flex w-1/3 h-80 p-3 rounded bg-white ">
                            <a class="overflow-y-auto text-wrap  " href="{{route('operation.reply',[$row->id])}}">
                            <div class="flex w-[26rem] justify-center overflow-x-auto">
                                @foreach($images as $img)
                                    @if($img->vname==$row->vname)
                                                <img src="{{ URL(\Illuminate\Support\Facades\Storage::url($img->image)) }}" alt="" class="w-[30rem] h-[17rem] rounded-xl mt-1 mr-1">
                                    @endif
                                @endforeach
                            </div>
                            </a>
                        </div>

                        <div class="w-2/3 h-80 bg-stone-100 text-gray-500 font-serif rounded p-4">
                            <div class=" h-72 grid grid-cols-1 gap-2 ">
                                <a class="overflow-y-auto text-wrap  " href="{{route('operation.reply',[$row->id])}}">

                                {!! $row->body !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="  w-[25rem] text-sm ml-10 pt-2 text-end"><span class="font-sans">Assignee  :  </span><span class="font-sans font-semibold">{{ \Aaran\Testing\Models\TestOperation::assign($row->assignee) }}</span></div>
                        <div class="flex-col">
                            <div class=" mr-5 pt-2">
                                <button wire:click="edit({{ $row->id }})"
                                        class="">
                                    <x-icons.icon :icon="'pencil'" class="h-4 w-auto block text-blue-500 hover:scale-110"/>
                                </button>
                                <x-button.link wire:click="getDelete({{$row->id}})">&nbsp;
                                    <x-icons.icon :icon="'trash'"
                                                  class="text-red-600 h-4 w-auto block"/>
                                </x-button.link>
                                <x-modal.delete/>
                            </div>
                            <div class="flex">
                                <div class="w-4 h-4 {{\App\Enums\Active::tryFrom($row->active_id)->getName()}}"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Create Record ---------------------------------------------------------------------------------------->

        @empty
            <div class="flex justify-center items-center space-x-2">
                <x-table.empty/>
            </div>
        @endforelse

        <x-forms.create-new :id="$vid">
            <div class="flex space-x-5">
                <div class="">
                    <div class="xl:flex flex-row gap-3 py-3">
                    <label class="w-[10rem] text-zinc-500 tracking-wide ">Action</label>
                    <label class="text-lg font-bold">{{Aaran\Testing\Models\TestOperation::action($actions_id)}}</label></div>
                    <x-input.model-date wire:model="vdate" :label="'Date'"/>
                    <x-input.model-text wire:model="vname" :label="'Title'"/>

                    <div class="px-1 py-4">
                        <x-input.rich-text wire:model="body" :placeholder="''"/>
                    </div>
                </div>

                <div>
                    <x-input.model-select wire:model="assignee" :label="'Assign To'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </x-input.model-select>

                    @admin
                    <x-input.model-text wire:model="verified" :label="'Verified'"/>
                    @endadmin

                    <!-- Image  ---------------------------------------------------------------------------------------->

                    <label class="w-[10rem] text-zinc-500 tracking-wide py-2"></label>

                    <div class="grid grid-cols-2 flex-shrink-0 h-80 w-80 mr-4">
                        Photo Preview:
                        @if($photos)
                            @foreach($photos as $index => $image)
                                <div class="flex gap-1">
                                    <img class="max-h-32 w-auto"
                                         src="{{ $image->temporaryUrl()}}"
                                         alt="{{$image}}">
                                </div>
                            @endforeach
                        @endif
                        @if($old_photos)
                            @foreach($old_photos as $index => $image)
                                <div class="flex gap-1">
                                    <img class="max-h-32 w-auto"
                                         src="{{url(\Illuminate\Support\Facades\Storage::url($image)) }}"
                                         alt="{{$image}}">
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div>
                        <input type="file" wire:model="photos" multiple>
                        <button wire:click.prevent="save_image"></button>
                    </div>
                </div>
            </div>
        </x-forms.create-new>
    </x-forms.m-panel>

    <script>
    </script>
</div>

