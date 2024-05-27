<div>
    <x-slot name="header">Project</x-slot>


    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        @forelse ($list as $row)
            <div class="flex flex-col gap-3">
                <div class="flex border border-gray-300">

                    <div class="w-[8rem] border flex flex-col justify-between">
                        <a href="{{ route('project-task.show',[$row->id]) }}"
                           class="cursor-pointer text-2xl h-3/4 flex items-center justify-center">
                            {{ $row->id }}
                        </a>

                        <div
                            class="h-1/4 flex items-center justify-center bg-blue-300
                            {{ \App\Enums\Status::tryFrom($row->status?:'1')->getStyle() }}"
                        >
                            {{ \App\Enums\Status::tryFrom($row->status?:'1')->getName() }}
                        </div>
                    </div>

                    <div class="w-full p-5">
                        <div class="flex justify-between w-full py-1">
                            <a href="{{ route('project-task.show',[$row->id]) }}"
                               class="cursor-pointer w-full text-2xl text-left px-2 hover:underline underline-offset-8">
                                {{$row->title}}
                            </a>

                            <div class="text-lg text-right px-2 flex flex-row gap-3 flex-shrink-0">
                                <a class="cursor-pointer">By : {{ $row->user->name }}</a>
                                <button wire:click="edit({{ $row->id }})"
                                        class="px-1.5 rounded-md text-gray-500">

                                    <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                        <div
                                            class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                            <div class="flex flex-col justify-start items-center -translate-y-full">
                                                <div
                                                    class="bg-blue-500  shadow-md text-white text-xs rounded-lg py-0.5 px-2 cursor-default">
                                                    Edit
                                                </div>
                                                <div
                                                    class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-blue-500 -mt-[1px]"></div>
                                            </div>
                                        </div>
                                        <span>
                                            <x-icons.icon :icon="'pencil'"
                                                          class="text-blue-400 h-6 px-0.5 py-0.5"/>
                                        </span>
                                    </div>

                                </button>

                                <button wire:click="getDelete({{ $row->id }})"
                                        class="px-1.5 rounded-md  text-white">

                                    <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                        <div
                                            class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                            <div class="flex flex-col justify-start items-center -translate-y-full">
                                                <div
                                                    class="bg-red-500  shadow-md text-white rounded-lg py-0.5 px-2 cursor-default text-xs">
                                                    delete
                                                </div>
                                                <div
                                                    class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-red-500 -mt-[1px]"></div>
                                            </div>
                                        </div>
                                        <span>
             <x-icons.icon :icon="'trash'"
                           class="text-red-500 h-6 px-0.5 py-0.5 "/>
            </span>
                                    </div>

                                </button>
                            </div>
                        </div>

                        <div class="flex flex-row justify-between">

                            <div class="px-3 flex flex-row justify-between">
                                <div class="flex flex-row gap-2">
                                    <span class=" text-sm py-0.5 text-gray-500">Assign To :</span>
                                    <span
                                        class=" text-md text-gray-600">
                                        {{ \Aaran\Developer\Models\ProjectTask::allocated($row->allocated) }}
                                    </span>
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
        @empty
            <div class="flex justify-center items-center space-x-2">
                <x-table.empty/>
            </div>
        @endforelse

        <x-forms.create-new :id="$vid">
            <div class="flex space-x-5">

                <div class="flex flex-col gap-3">
                    <x-input.model-text wire:model="title" :label="'Title'"/>

                    <x-input.rich-text wire:model="body" :placeholder="'write your code'"/>
{{--                    <x-input.mde wire:model="body" :placeholder="'write your code'"/>--}}

                    <x-input.model-select wire:model="channel" :label="'Channel'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach(\App\Enums\Channels::cases() as $channel)
                        <option value="{{$channel->value}}">{{$channel->name}}</option>
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

                    <x-input.model-select wire:model="priority" :label="'Priority'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach(\App\Enums\Priority::cases() as $priority)
                            <option value="{{$priority->value}}">{{$priority->name}}</option>
                        @endforeach
                    </x-input.model-select>

                    @admin
                    <x-input.model-text wire:model="verified" :label="'Verified'"/>

                    <x-input.model-date wire:model="verified_on" :label="'Verified On'"/>
                    @endadmin

                    <label class="w-[10rem] text-zinc-500 tracking-wide py-2"></label>
                    <div class="grid grid-cols-2 flex-shrink-0 h-80 w-80 mr-4">
                        <div>
                            @if($task_pic)
                                <img class="h-48 w-full" src="{{ $task_pic->temporaryUrl() }}" alt="{{$task_pic?:''}}"/>
                            @endif

                            @if(!$task_pic && isset($old_task_pic))
                                <img class="h-48 w-full"
                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_task_pic))}}"
                                     alt="">
                            @else
                                <div class="h-48 w-full justify-center flex items-center">
                                    Select image
                                </div>

                            @endif
                        </div>
                    </div>

                    <div>
                        <input type="file" wire:model="task_pic">
                        <button wire:click.prevent="save_image"></button>
                    </div>
                </div>
            </div>
        </x-forms.create-new>
        <x-modal.delete/>
    </x-forms.m-panel>
</div>
