<div>
    <x-slot name="header">My Task</x-slot>

    <!-- Top Controls ------------------------------------------------------------------------------------------------->

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>


        @forelse ($list as $index=> $row)

            <div class="border border-gray-400 w-full flex h-44">

                <!------ Id and Status -------------------------------------------------------------------------------->
                <div class="w-1/12 lg:flex-col">

                    <div class="h-3/4 border border-gray-400 ">
                        <a href="{{ route('tasks.show',[$row->id]) }}"
                           class="cursor-pointer text-2xl h-3/4 flex items-center justify-center ">
                            {{ $row->id }}
                        </a>
                    </div>

                    <div
                        class="lg:flex items-center justify-center h-1/4 border border-gray-400  {{ \App\Enums\Status::tryFrom($row->status)->getStyle() }}">
                        {{ \App\Enums\Status::tryFrom($row->status)->getName() }}
                    </div>
                </div>

                <!------ content -------------------------------------------------------------------------------------->

                <div class="lg:flex-col w-full p-5">

                    <div class="h-1/4 lg:flex justify-between ">
                        <div class="w-full">
                            <a href="{{ route('tasks.show',[$row->id]) }}"
                               class="cursor-pointer w-full text-2xl text-left px-2 hover:underline underline-offset-8">
                                {{ $row->title }}&nbsp;&nbsp;-&nbsp;&nbsp;{{ $row->client->vname }}
                            </a>
                        </div>

                        <div class="w-full lg:flex gap-3 items-end justify-end my-auto ">

                            <a class="cursor-pointer px-3 text-center rounded-full outline outline-1 outline-blue-400 bg-blue-100 lg:flex flex-shrink-0">
                                {{ \App\Enums\Channels::tryFrom($row->channel)->getName() }}</a>

                            <a class="cursor-pointer">By : {{ $row->user->name }}</a>

                            <button wire:click="edit({{ $row->id }})"
                                    class=" px-1 rounded-md inline-flex gap-3">
                                <x-icons.icon :icon="'pencil'" class="h-5 w-auto block text-blue-500 hover:scale-110"/>

                            </button>

                        </div>
                    </div>

                    <div class="h-2/4 p-3 ml-5 overflow-hidden w-3/4 text-gray-600 ">
                        {!! $row->body !!}
                    </div>

                    <div class="h-1/4 ">
                        <div class="lg:flex flex-row justify-between ">

                            <div class="px-3 flex flex-row justify-between ">

                                <div class="flex flex-row gap-2 mt-2 ">
                                    <span class=" text-sm py-0.5 text-gray-500">Assign To :</span>
                                    <span
                                        class=" text-md text-gray-600">{{ \Aaran\Taskmanager\Models\Task::allocate($row->allocated) }}</span>
                                </div>
                            </div>


                            <div class="px-3 py-1 flex flex-row gap-3 items-center">
                                {{ \App\Helper\ConvertTo::dateTime($row->updated_at)}}
                                <div
                                    class="text-center flex items-center w-4 h-4 mr-2 text-sm rounded-full {{\App\Enums\Active::tryFrom($row->active_id)->getStyle()}}">
                                    &nbsp;
                                </div>
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
                <div>

                    <x-input.model-select wire:model="client_id" :label="'Client'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->vname}}</option>
                        @endforeach
                    </x-input.model-select>

                    <x-input.model-text wire:model="vname" :label="'Title'"/>

                    <div class="px-1 py-4">
                        <x-input.rich-text wire:model.lazy="body" id="body" :placeholder="''"/>
                    </div>


                    <x-input.model-select wire:model="channel" :label="'Channel'">
                        <option class="text-gray-400"> choose ..</option>

                        @foreach(\App\Enums\Channels::cases() as $channel)
                            <option value="{{$channel->value}}">{{$channel->getName()}}</option>
                        @endforeach
                    </x-input.model-select>
                </div>

                <div>
                    <x-input.model-select wire:model="allocated" :label="'Assign To'">
                        <option class="text-gray-400"> choose ..</option>

                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </x-input.model-select>

                    @admin
                    <x-input.model-text wire:model="verified" :label="'Verified'"/>
                    <x-input.model-date wire:model="verified_on" :label="'Verified On'"/>
                    @endadmin

                    <!-- Image  ----------------------------------------------------------------------------------------------->

                    <label class="w-[10rem] text-zinc-500 tracking-wide py-2">Image</label>

                    <div class="mr-4">
                        Photo Preview:
                        <div class="grid grid-cols-2 gap-2">
                            @if($photos)
                                @foreach($photos as $index => $image)
                                    <div class="gap-1 mt-2">
                                        <img class="max-h-32 w-auto justify-items-start"
                                             src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}"
                                             width="60" height="60" alt="{{$image}}">
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div>
                            <input type="file" wire:model="photos" multiple wire:change.debounce="taskImage()">
                            <button wire:click.prevent="save_image"></button>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.create-new>
    </x-forms.m-panel>
</div>
