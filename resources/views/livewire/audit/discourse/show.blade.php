<div>
    <x-slot name="header">Discourse - Reply</x-slot>
    <div class="w-full border-t-2 border-gray-400 rounded-md shadow-lg bg-opacity-5">
        <div class="p-6 pt-12 pb-6 bg-white rounded-md space-y-4">

            <!-- Top Controls ----------------------------------------------------------------------------------------->

            <div>
                <div class="flex flex-col gap-3">
                    <div class="flex border border-gray-300">
                        <div class="flex w-full ">

                            <!-- Table Content ------------------------------------------------------------------------>

                            <div class="w-[8rem] border flex flex-col justify-between">
                                <a class="cursor-pointer text-2xl h-3/4 flex items-center justify-center">
                                    {{ $discourse_id }}
                                </a>

                                <div
                                    class="h-1/4 flex items-center justify-center bg-blue-300  {{  \App\Enums\Status::tryFrom($status)->getStyle() }}">
                                    {{  \App\Enums\Status::tryFrom($status)->getName() }}
                                </div>
                            </div>

                            <div class="w-full">
                                <div class="flex w-full ">
                                    <div class="w-full">
                                        <div class="flex justify-between w-full py-1">
                                            <a class="cursor-pointer w-full text-2xl text-left px-3 hover:underline underline-offset-8">
                                                {{ $title }}
                                            </a>

                                            <div class="p-1">
                                                <a class="cursor-pointer px-3 text-center rounded-full outline outline-1 outline-green-600 bg-green-100">{{ \App\Enums\Channels::tryFrom($channel)->getName() }}</a>
                                            </div>

                                            <div class="w-[15rem] text-lg text-right px-5">
                                                <a class="cursor-pointer">By : {{ $username }}</a>
                                            </div>
                                        </div>

                                        <div class="flex w-full px-3 py-1 text-zinc-500">
                                            {!! $body !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-row justify-between">

                                    <div class="px-3 flex flex-row justify-between">

                                        <div class="flex flex-row gap-2">
                                            <span class=" text-sm py-0.5 text-gray-500">Assign To :</span>
                                            <span
                                                class=" text-md text-gray-600">{{\Aaran\Audit\Models\Discourse::allocate($allocated) }}</span>
                                        </div>

                                        <a class="cursor-pointer flex flex-row px-20">
                                            <x-icons.icon :icon="'annotation'" class="h-7 w-auto block px-1.5"/>
                                            <span class="text-xl font-semibold pl-1 -mt-0.5">
                                    {{$commentsCount}}
                                    </span>
                                        </a>
                                    </div>


                                    <div class="px-3 py-1 flex flex-row gap-3 items-center">
                                        {{date('d-m-Y -h:i a', strtotime($updated_at))}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-40 w-40 lg:mr-8 overflow-hidden bg-cover bg-no-repeat">
                <button wire:click="fullView">
                    <img
                        class="rounded-xl justify-items-start h-40 w-40 transition duration-500 ease-in-out hover:scale-110"
                        src="{{ \Illuminate\Support\Facades\Storage::url($image) }}"></button>
            </div>

            <!-- Replies  --------------------------------------------------------------------------------------------->

            @forelse ($replies as $row)

                <div class="p-1 flex flex-row justify-between border-b border-gray-200  ">
                    <div class="px-5 ">
                        {{$row->vname}}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$row->user->name}}
                        &nbsp;&nbsp;@&nbsp;&nbsp;{{date('d-m-Y h:i a', strtotime($row->updated_at))}}
                    </div>
                </div>

            @empty
                <div class="flex justify-center items-center space-x-2">
                    <x-icons.inbox class="h-8 w-8 text-cool-gray-400"/>
                    <span class="font-medium py-8 text-cool-gray-400 text-xl">No Entry found...</span>
                </div>
            @endforelse


            <div class="flex justify-between">

                <div class="flex gap-3">
                    <div class="h-12">
                        <x-button.primary wire:click="create">
                            Reply
                        </x-button.primary>
                    </div>
                    <div>
                        <x-button.back/>
                    </div>
                </div>

                <div>
                    <label for="changeStatus" class="w-[8rem] text-zinc-500 tracking-wide py-2 hidden">Under</label>
                    <select wire:model="changeStatus" class="w-full purple-textbox" id="changeStatus">
                        <option class="text-zinc-500 px-1">Status...</option>
                        @foreach(\App\Enums\Status::cases() as $obj)
                            <option value="{{$obj->value}}">{{ $obj->getName() }}</option>
                        @endforeach
                    </select>

                    <div class="flex flex-row gap-10">
                        @error('changeStatus')
                        <span class="text-red-500">{{  'Choose any one and update' }}</span>
                        @enderror

                        <button wire:click.prevent="updateStatus" class="text-sm text-gray-400">Update</button>

                        @admin
                        <button wire:click.prevent="adminCloseTask" class="text-sm text-red-500">Close</button>
                        @endadmin

                    </div>
                </div>
            </div>

            <!-- Comments --------------------------------------------------------------------------------------------->
            <form wire:submit.prevent="save">
                <div>
                    <x-modal.dialog wire:model.defer="showEditModal">
                        <x-slot name="title">
                        </x-slot>

                        <x-slot name="content">

                            <div class="flex flex-col gap-3 py-3">
                                <label for="vname" class="w-[8rem] text-zinc-500 tracking-wide py-2">Comments</label>
                                <textarea rows="5" id="vname" wire:model="discourse_replies" autocomplete="off"
                                          autofocus
                                          class="rounded-lg appearance-none border
                                                 border-gray-300 py-2 px-2 bg-white text-gray-800 w-full
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5"></textarea>
                            </div>

                            <x-input.model-text wire:model="verified" :label="'Verified'"/>
                            <x-input.model-date wire:model="verified_on" :label="'Verified On'"/>

                            <div class="pb-2">&nbsp;</div>

                        </x-slot>

                        <x-slot name="footer">
                            <div class="w-full flex justify-between gap-3">
                                <div class="flex gap-2">
                                    <x-button.primary type="submit" wire:click.prevent="save">Save</x-button.primary>
                                </div>
                            </div>

                        </x-slot>
                    </x-modal.dialog>
                </div>
            </form>

            <!-- Image View ------------------------------------------------------------------------------------------->

            <x-jet.modal :maxWidth="'6xl'" wire:model.defer="showEditModal_1">
                <div class="px-6  pt-4">
                    <img class="rounded-xl justify-items-start h-full w-full"
                         src="{{ url(\Illuminate\Support\Facades\Storage::url($image))}}">
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

