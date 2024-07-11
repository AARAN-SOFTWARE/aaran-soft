<div>
    <x-slot name="header">UI-Task</x-slot>

    <!-- Top Controls ------------------------------------------------------------------------------------------------->
    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        @forelse ($list as $row)

            <div class="shadow-secondary-1 dark:bg-surface-dark text-surface block rounded-lg dark:text-white  ">

                <div class="p-3 py-2 border border-e-emerald-200 rounded-lg mx-auto w-[65rem] my-10 ">
                    <div class="inline-flex h-[25rem] gap-3">

                        <!-- Image ------------------------------------------------------------------------------------>

                        <div class="h-92 w-[25rem]  bg-blue-100">
                            <a href="{{ route('ui-task.show',[$row->id]) }}">
                                <img
                                    src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->ui_pic)) }}"
                                    alt="" class=" h-full w-full rounded-xl ">
                            </a>
                        </div>

                        <div class="h-92 w-[38rem]">

                            <!-- Header ------------------------------------------------------------------------------->

                            <div class=" flex justify-between gap-2 mt-5 ">

                                <div class="w-full h-9 overflow-hidden">
                                    <a href="{{ route('ui-task.show',[$row->id]) }}"
                                       class="font-serif text-lg hover:underline underline-offset-4 overflow-hidden"> {{ $row->vname }}
                                    </a>
                                </div>

                                <div
                                    class="rounded-lg outline outline-1 h-6 px-2 outline-blue-400 bg-blue-100 w-40 text-center">
                                    <a href="{{ route('ui-task.show',[$row->id]) }}"
                                       class="cursor-pointer ">
                                        {{ \App\Enums\Priority::tryFrom($row->priority)->getName() }}
                                    </a>
                                </div>

                            </div>

                            <div class="h-36 w-[38rem]">
                                <a href="{{ route('ui-task.show',[$row->id]) }}">
                                    <div class="ml-2 mt-4 text-base h-36  overflow-hidden">{!! $row->body !!}</div>
                                </a>
                            </div>


                            <!-- Footer ------------------------------------------------------------------------------->


                            <div class="px-5 my-32 ">

                                <div class=" flex justify-end">
                                    <button wire:click="edit({{ $row->id }})"
                                            class=" px-1.5 rounded-md  ">
                                        <x-icons.icon :icon="'pencil'"
                                                      class="h-5 w-auto block text-blue-500 hover:scale-110"/>
                                    </button>

                                    <a href="{{ route('ui-task.show',[$row->id]) }}">
                                        <x-icons.icon :icon="'chat'"
                                                      class="h-5 w-auto block text-blue-500 hover:scale-110"/>
                                    </a>
                                </div>

                                <div class="flex pt-2 justify-between rounded-md border-t border-gray-200 ">

                                    <div class="flex gap-3">

                                        <div class="ml-2 mt-1.5 text-gray-400 text-xs">
                                            <time>{{ $row->created_at->diffForHumans() }}</time>
                                        </div>

                                        <div class="">
                                            <a href="{{ route('ui-task.show',[$row->id]) }}"
                                               class=" text-sm text-gray-800 px-4 rounded-br-lg bg-gray-200 ">
                                                {{ \Aaran\Developer\Models\UiTask::allocated($row->allocated) }}
                                            </a>
                                        </div>
                                    </div>


                                    <div class="flex">

                                        <div class="flex">
                                            <x-icons.icon :icon="'logo'"
                                                          class="h-6 w-auto "/>
                                            <div class=" px-2">By : {{ $row->user->name }}</div>
                                        </div>

                                        <div
                                            class=" rounded-lg outline-1 px-2 {{ \App\Enums\Status::tryFrom($row->status)->getStyle() }}">
                                            <a href="{{ route('ui-task.show',[$row->id]) }}">
                                                {{ \App\Enums\Status::tryFrom($row->status)->getName() }}
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div>&nbsp;</div>
        @endforelse

        <!-- Create Record -------------------------------------------------------------------------------------------->

        <x-forms.create-new :id="$vid">
            <div class="lg:flex space-x-5">

                <div>
                    <x-input.model-text wire:model="vname" :label="'Title'"/>

                    <div class="px-1 py-4">
                        <x-input.rich-text wire:model="body" :placeholder="'Assign task here'"/>
                        {{--                        <x-editor.simpleMDE wire:model="body"/>--}}


                    </div>
                    <x-input.model-select wire:model="allocated" :label="'Assign To'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </x-input.model-select>

                </div>

                <div>
                    <x-input.model-select wire:model="status" :label="'Status'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach(\App\Enums\Status::cases() as $status)
                            <option value="{{$status->value}}">{{$status->getName()}}</option>
                        @endforeach
                    </x-input.model-select>

                    <x-input.model-select wire:model="priority" :label="'Priority'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach(\App\Enums\Priority::cases() as $priority)
                            <option value="{{$priority->value}}">{{$priority->getName()}}</option>
                        @endforeach
                    </x-input.model-select>

                    @admin
                    <x-input.model-text wire:model="verify" :label="'Verified'"/>
                    @endadmin

                    <!-- Image  --------------------------------------------------------------------------------------->

                    <label class="w-[10rem] text-zinc-500 tracking-wide py-2"></label>

                    <div class="grid grid-cols-2 flex-shrink-0 h-60 w-80 py-5 mr-4">
                        <div>
                            @if($ui_pic)
                                <img class="h-48 w-full" src="{{ $ui_pic->temporaryUrl() }}"
                                     alt="{{$ui_pic?:''}}"/>
                            @endif

                            @if(!$ui_pic && isset($old_ui_pic))
                                <img class="h-48 w-full"
                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_ui_pic))}}"
                                     alt="">
                            @else
                                <div class="h-48 w-full justify-center flex items-center">
                                    Select image
                                </div>

                            @endif
                        </div>
                    </div>

                    <div>
                        <input type="file" wire:model="ui_pic">
                        <button wire:click.prevent="save_image"></button>
                    </div>
                </div>

            </div>
        </x-forms.create-new>

    </x-forms.m-panel>
</div>
