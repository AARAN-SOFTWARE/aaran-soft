<div>
    <x-slot name="header">Task - Reply</x-slot>
    <div class="w-full border-t-2 border-gray-400 rounded-md shadow-lg bg-opacity-5">
        <div class="p-6 pt-12 pb-6 bg-white rounded-md space-y-4">

            <!-- Top Controls ----------------------------------------------------------------------------------------->

            <div>
                <div class="lg:flex flex-col gap-3">
                    <div class="lg:flex border border-gray-300">

                        <!-- Table Content ---------------------------------------------------------------------------->
                        <div class="lg:grid w-full ">

                            <div class="w-full h-14 border flex flex-row justify-between ">
                                <a class="cursor-pointer text-3xl h-3/4 w-1/4 flex items-center justify-center">
                                    {{ $task_id }}
                                </a>

                                <div
                                    class="bg- w-full lg:flex items-center justify-center text-4xl {{  \App\Enums\Status::tryFrom($status)->getStyle() }}">
                                    {{  \App\Enums\Status::tryFrom($status)->getName() }}
                                </div>
                            </div>

                            <div class="w-full">
                                <div class="flex w-full mt-2">
                                    <div class="w-full">
                                        <div class="flex justify-between w-full py-1">
                                            <a class="cursor-pointer w-full text-2xl text-left px-3 hover:underline underline-offset-8">
                                                {{ $vname }}
                                            </a>

                                            <div class="p-1 ">
                                                <a class="cursor-pointer px-3 text-center rounded-full outline outline-1 outline-green-600 bg-green-100">{{ \App\Enums\Channels::tryFrom($channel)->getName() }}</a>
                                            </div>

                                            <div class="text-xs w-[15rem] lg:text-lg lg:text-right px-5">
                                                <a class="cursor-pointer">By : {{ $username }}</a>
                                            </div>
                                        </div>

                                        <div class="lg:flex w-2/3 gap-3 p-3 ml-5 text-zinc-500">
                                            {!! $body !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:flex flex-row justify-between">
                                    <div class="px-3 flex flex-row justify-between">
                                        <div class="flex flex-row gap-2">
                                            <span class=" text-sm py-0.5 text-gray-500">Assign To :</span>
                                            <span
                                                class=" text-md text-gray-600">{{\Aaran\Taskmanager\Models\Task::allocate($allocated) }}</span>
                                        </div>

                                        <a class="cursor-pointer flex flex-row px-20">
                                            <x-icons.icon :icon="'annotation'" class="h-7 w-auto block px-1.5"/>
                                            <span class="text-xl font-semibold pl-1 -mt-0.5">
                                    {{$commentsCount}}
                                    </span>
                                        </a>
                                    </div>


                                    <div class="px-3 py-1 flex flex-row gap-3 items-center ">
                                        {{date('d-m-Y -h:i a', strtotime($updated_at))}}

                                        <div
                                            class="text-center flex items-center w-4 h-4 mr-2 text-sm rounded-full {{\App\Enums\Active::tryFrom($actives)->getStyle()}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image  ------------------------------------------------------------------------------------------->

                <div class="flex w-full justify-between">
                    <div class="gap-3">
                        <div class="lg:grid grid-cols-5 ">
                            @forelse ($images as $row)
                                <div
                                    class=" h-40 w-40 lg:mr-8 mt-3 relative max-w-xs overflow-hidden bg-cover bg-no-repeat ">
                                    <button wire:click="fullview({{ $row->id }})">
                                        <img
                                            class="justify-items-start h-40 w-40 transition duration-500 max-w-xs ease-in-out hover:scale-110 "
                                            src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}"></button>
                                </div>
                            @empty

                            @endforelse
                        </div>
                    </div>

                    <!-- Replies  ------------------------------------------------------------------------------------->

                    <div class="w-2/4 mt-2 border-l-2 px-2">

                        @forelse ($replies as $row)

                            <div class="p-3 w-full lg:flex justify-between border-b border-gray-200  ">

                                <div class="px-5 w-2/3 ">
                                    {{$row->vname}}
                                </div>

                                <div class="text-sm text-gray-500 ">
                                    {{$row->user->name}}
                                    &nbsp;&nbsp;@&nbsp;&nbsp;{{date('d-m-Y h:i a', strtotime($row->updated_at))}}
                                </div>
                            </div>

                        @empty
                            <div class="flex justify-center items-center space-x-2">
                                <x-icons.inbox class="h-8 w-7 text-cool-gray-400"/>
                                <span class="font-medium py-8 text-cool-gray-400 text-xl">No Entry found...</span>
                            </div>
                        @endforelse


                        <div class="lg:flex justify-between">

                            <div class="flex gap-1.5 mt-2">
                                <div class="h-12">

                                    <x-button.primary wire:click="create">
                                        <div class="inline-flex gap-1.5">
                                            <x-icons.icon :icon="'u-turn-left2'" class="h-4 w-5 text-neutral-200 "/>
                                            Reply
                                        </div>
                                    </x-button.primary>
                                </div>

                                <div>
                                    <x-button.back/>
                                </div>
                            </div>


                            <!-- Status ------------------------------------------------------------------------------->

                            <div class="text-right">
                                <label for="changeStatus"
                                       class="w-[8rem] text-zinc-500 tracking-wide py-2 hidden ">Under</label>
                                <select wire:model="changeStatus" class="w-full purple-textbox mt-2" id="changeStatus">
                                    <option class="text-zinc-500 px-1">Status...</option>
                                    @foreach(\App\Enums\Status::cases() as $obj)
                                        <option value="{{$obj->value}}">{{ $obj->getName() }}</option>
                                    @endforeach
                                </select>


                                <div class="lg:flex flex-row gap-10">
                                    @error('changeStatus')
                                    <span class="text-red-500">{{  'Choose any one and update' }}</span>
                                    @enderror

                                    <button wire:click.prevent="updateStatus"

                                            class="relative inline-flex items-center h-6 w-5 mt-2 justify-center px-10 py-4 overflow-hidden font-mono font-medium tracking-tighter text-white bg-blue-900 rounded-lg group">
                                        <span
                                            class="absolute w-0 h-0 transition-all duration-500 ease-out bg-lime-700 rounded-full group-hover:w-56 group-hover:h-56"></span>
                                        <span class="relative">Update</span>

                                    </button>

                                    @admin
                                    <button wire:click.prevent="adminCloseTask"

                                            class="relative inline-flex items-center h-6 w-5 mt-2 justify-center px-10 py-4 overflow-hidden font-mono font-medium tracking-tighter text-white bg-neutral-500 rounded-lg group">
                                        <span
                                            class="absolute w-0 h-0 transition-all duration-500 ease-out bg-red-900 rounded-full group-hover:w-56 group-hover:h-56"></span>
                                        <span class="relative">Close</span>

                                    </button>
                                    @endadmin

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments ----------------------------------------------------------------------------------------->
            <form wire:submit.prevent="save">
                <div>
                    <x-modal.dialog wire:model.defer="showEditModal">
                        <x-slot name="title">
                        </x-slot>

                        <x-slot name="content">

                            <div class="flex flex-col gap-3 py-3">
                                <label for="reply"
                                       class="w-[8rem] font-bold text-zinc-700 tracking-wide py-2">Comments</label>
                                <textarea rows="5" id="reply" wire:model="reply" autocomplete="off" autofocus
                                          class="appearance-none rounded-lg
                                                  py-2 px-2 bg-white text-gray-800 w-full
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5 @error('reply')?rounded-lg border border-red-300 :border-red-500 border-opacity-100 hover:border-opacity-5 @enderror"></textarea>
                            </div>

                            @error('reply')
                            <div class="text-red-500">
                                Leave a reply !
                            </div>
                            @enderror

                            <x-input.model-text wire:model="verified" :label="'Verified'"/>
                            <x-input.model-date wire:model="verified_on" :label="'Verified On'"/>

                            <div class="pb-2">&nbsp;</div>

                        </x-slot>

                        <x-slot name="footer">
                            <div class="w-full flex justify-between gap-3">
                                <div class="flex gap-2">
                                    <x-button.primary type="submit" wire:click.prevent="save">Save
                                    </x-button.primary>
                                </div>

                            </div>

                        </x-slot>
                    </x-modal.dialog>
                </div>
            </form>

            <!-- Image view --------------------------------------------------------------------------------------->

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
    </div>
</div>
</div>
