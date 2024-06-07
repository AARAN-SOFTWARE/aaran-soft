<div>
    <x-slot name="header">Test - Review</x-slot>



    <div class="lg:w-3/5 h-auto grid grid-cols-1 gap-8 bg-zinc-50 mx-auto pt-10 pb-10 mb-10 sm:w-full">
        <div class="w-11/12  h-auto mx-auto bg-white rounded">
            <div class="flex justify-between">
                <div class="ml-5">
                    <div class="text-lg font-sans font-semibold">
                        {{ $vname }}
                    </div>
                    <div class="w-36 flex justify-between">
                        <div class="text-xs text-gray-600 font-semibold">
                            {{date('d-m-Y -h:i a', strtotime($updated_at))}}
                        </div>
                        <div
                            class="w-3 h-3 mt-1 rounded-full {{\App\Enums\Active::tryFrom($actives)->getStyle()}}">
                        </div>
                    </div>
                </div>
                <div class="w-[15rem] flex">
                    <div class="font-sans text-sm text-gray-600 mt-6 mr-5 font-semibold flex"><div class=""> <x-icons.icon icon="user" class="w-6 h-6 pt-0.5" /> </div> <div> {{ $username }}</div></div>
                    <div
                        class="w-28 h-6 text-center font-serif rounded  mt-6 mr-5 {{  \App\Enums\Status::tryFrom($status)->getStyle() }}">
                        {{  \App\Enums\Status::tryFrom($status)->getName() }}
                    </div>
                </div>

            </div>

            <div class="flex-col justify-center w-5/6 h-96 pt-2 mx-auto">
                <div class="flex">
                    <div class="flex w-3/4 h-[22rem] mx-auto overflow-x-auto">
                        @forelse ($images as $row)
                            <div class="w-[40rem] mr-1.5">
                                <button class="w-[40rem]" wire:click="fullview({{ $row->id }})">
                                    <img
                                        class="w-[40rem] h-80  rounded-md"
                                        src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" alt=""></button>
                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>

                <div class="flex gap-2 w-[40rem] h-10 justify-end mx-auto">
                    <span class=" text-xs py-0.5 text-gray-500 font-semibold">Assign To :</span>
                    <span class=" text-sm text-gray-500 font-semibold">{{ \Aaran\Testing\Models\TestOperation::assign($assignee)}}</span>
                </div>
            </div>

        </div>
        <div class="w-11/12 h-auto mx-auto flex justify-center rounded-xl">
            <div class="w-full  h-auto overflow-y-auto p-5 border-2 border-white rounded-xl bg-white text-gray-600 font-serif">{!! $body !!}</div>

        </div>
       <!-- Status  -->
        <div class="w-11/12 mx-auto flex justify-end">
            <div class="w-1/5 ">
                <div>
                    <label for="changeStatus"
                           class="w-[8rem] text-zinc-500 tracking-wide py-2 hidden ">Under</label>
                    <select wire:model="changeStatus" class="w-full purple-textbox mt-2" id="changeStatus">
                        <option class="text-zinc-500 px-1">Status...</option>
                        @foreach(\App\Enums\Status::cases() as $obj)
                            <option value="{{$obj->value}}">{{ $obj->getName() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="lg:flex flex-row gap-10 float-right">
                    @error('changeStatus')
                    <span class="text-red-500">{{  'Choose any one and update' }}</span>
                    @enderror

                    <button wire:click.prevent="updateStatus"

                            class="relative inline-flex items-center h-6 w-5 mt-2 justify-center px-10 py-4 overflow-hidden
                            font-mono font-medium tracking-tighter text-white bg-blue-900 rounded-lg group">
                        <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-lime-700 rounded-full group-hover:w-56 group-hover:h-56"></span>
                        <span class="relative">Update</span>

                    </button>

                    @admin
                    <button wire:click.prevent="adminCloseTask"

                            class="relative inline-flex items-center h-6 w-5 mt-2 justify-center px-10 py-4 overflow-hidden
                            font-mono font-medium tracking-tighter text-white bg-neutral-500 rounded-lg group">
                        <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-red-900 rounded-full group-hover:w-56 group-hover:h-56"></span>
                        <span class="relative">Close</span>

                    </button>
                    @endadmin

                </div>
            </div>
        </div>



        <!-- Replies -->

        <div class="w-11/12 mx-auto h-auto bg-white rounded-xl flex-col border-t-2">
            <div class="w-2/3 bg-stone-50 mx-auto mt-5 mb-5">

                <div class="flex flex-col gap-3 py-3 ">
                    <div class="w-2/3 mx-auto">
                        <div class=" w-36 flex justify-between">
                            <div class="flex ">
                                <label for="reply"
                                       class="font-semibold">Discussions </label>
                            </div>
                            <div>
                                <div class="flex"><span class=""><x-icons.icon icon="chat" class="w-4 h-4 mt-1" /></span> <span class="text-sm mt-0.5 font-semibold">&nbsp;&nbsp;({{$commentsCount}})</span></div>
                            </div>
                        </div>
                    </div>
                    <textarea rows="5" id="reply" wire:model="reply" autocomplete="off" autofocus
                              class="appearance-none rounded-lg
                                                  py-2 px-2 bg-white text-gray-800 w-2/3 mx-auto
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5 @error('reply')?rounded-lg border border-gray-300 :border-red-500 border-opacity-100
                                                 hover:border-opacity-5 rounded-xl @enderror"></textarea>
                </div>

                @error('reply')
                <div class="text-red-500 w-2/3 mx-auto mb-3 text-center">
                    Leave a reply !
                </div>
                @enderror
                <div class="w-2/3 mx-auto flex justify-between gap-3">
                    <div class="flex gap-2">
                        <button type="submit" wire:click.prevent="save"
                                class="bg-gradient-to-r from-purple-400 to-purple-600  text-white h-10 px-6 rounded-xl
                                hover:bg-gradient-to-r hover:from-purple-600 hover:to-purple-400 hover:text-white
                                hover:shadow-md hover:shadow-gray-400">Send</button>
                    </div>

                </div>

                <div class="mt-10">
                    @forelse ($replies as $row)
                        <div class="w-2/3  h-auto mx-auto flex-col border-b border-gray-200">
                            <div class="flex justify-between">
                                <div class="flex mt-2">
                                    <div class="w-6 h-6 bg-zinc-100 rounded-full flex justify-center">
                                        <img src="../../../../images/logo.png"
                                             alt="" class="w-5 h-5"/>
                                    </div>
                                    <div class="text-sm text-gray-500 ml-1">
                                        <span class="font-semibold">{{$row->user->name}}</span>
                                        &nbsp;&nbsp;@&nbsp;&nbsp;<span class="text-xs">{{date('d-m-Y h:i a', strtotime($row->updated_at))}}</span>
                                    </div>
                                </div>

                                <!-- icon trigger for edit and delete -->
                                <div class="flex justify-center">
                                    <div
                                        x-data="{
                                        open: false,
                                        toggle() {
                                            if (this.open) {
                                                return this.close()
                                            }

                                            this.$refs.button.focus()

                                            this.open = true
                                        },
                                        close(focusAfter) {
                                            if (! this.open) return

                                            this.open = false

                                            focusAfter && focusAfter.focus()
                                        }
                                    }"
                                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                        x-id="['dropdown-button']"
                                        class="relative"
                                    >
                                        <!-- Button -->
                                        <button
                                            x-ref="button"
                                            x-on:click="toggle()"
                                            :aria-expanded="open"
                                            :aria-controls="$id('dropdown-button')"
                                            type="button"
                                            class=""
                                        >

                                            <!-- Heroicon: chevron-down -->
                                            <div class="w-5 h-4 hover:bg-white flex justify-evenly rounded-md mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 ">
                                                    <path d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
                                                </svg>
                                            </div>
                                        </button>

                                        <!-- Panel -->
                                        <div
                                            x-ref="panel"
                                            x-show="open"
                                            x-transition.origin.top.left
                                            x-on:click.outside="close($refs.button)"
                                            :id="$id('dropdown-button')"
                                            style="display: none;"
                                            class="absolute left-6 w-30 rounded-md bg-white shadow-md"
                                        >
                                            <a   wire:click="edit({{ $row->id }})" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                                <x-icons.icon :icon="'pencil'"
                                                              class="h-4 w-auto block text-blue-600"/>edit
                                            </a>
                                            <a  wire:click="getDelete({{ $row->id }})" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                                <x-icons.icon :icon="'trash'"
                                                              class="h-4 w-auto block text-red-600"/>delete
                                            </a>

                                            <x-modal.delete/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class=" mt-2 mb-4 font-serif">
                                {{$row->vname}}
                            </div>

                        </div>

                    @empty
                        <div class="flex justify-center items-center space-x-2">
                            <x-icons.inbox class="h-8 w-7 text-cool-gray-400"/>
                            <span class="font-medium py-8 text-cool-gray-400 text-xl">No Entry found...</span>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Image Full view -->

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

        </div>

    </div>

    <div>


    </div>
</div>

