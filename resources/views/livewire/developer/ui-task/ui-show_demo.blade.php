<div>

    <x-slot name="header">UiTask -{{$title}} </x-slot>
    <div class=" mx-auto bg-zinc-100">

        <div class=" mx-auto max-w-7xl ">

            <div class="pt-20 ">
                <div class="text-center mr-20 ">

                    <a class="capitalize font-serif text-6xl ">
                        {{$title}}
                    </a>

                    <div class="mt-10 ml-14 inline-flex pb-4 gap-3 sm:flex ">

                        <img class="h-14 w-14 p-1 rounded-full border border-gray-200 object-cover"
                             src="{{ $uiShowData->user->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>

                        <div class="mt-3 inline-flex">

                            <div
                                class="text-left text-lg font-gab tracking-wider text-gray-600">{{\Aaran\Developer\Models\UiTask::allocated($allocated) }}</div>

                            <div class=" text-gray-400 text-sm mt-0.5 ml-5 tracking-wide border-l h-8 pl-3">
                                <time>{{ $uiShowData->created_at->diffForHumans() }}</time>
                            </div>

                            <div class="ml-3 text-sm font-Don mt-1 border-l pl-3 h-8 tracking-wider">
                                {{  \App\Enums\Status::tryFrom($status)->getName() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="w-full mt-10">
        <div class="text-center mx-auto h-[40rem] w-3/4 ">

            <div class="w-full">
                <button class="w-3/4" wire:click="fullImage()">
                    <img
                        class="w-full h-[40rem] "
                        src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$ui_pic)) }}"
                        alt="">
                </button>
            </div>

            <div class="mt-6 w-3/4  mx-auto text-xl text-left text-zinc-800   ">
                {!! $body !!}
            </div>

            <div>
                <div>
                    <div class="flex flex-col gap-3 py-3">
                <textarea rows="5" id="reply" wire:model="ui_reply" autocomplete="off" autofocus
                          placeholder="Add Your Comments here"
                          class="appearance-none rounded-lg
                          py-2 px-2 bg-white text-gray-800 w-2/4
                            placeholder-gray-400 shadow-md text-base focus:outline-none
                            focus:ring-2 focus:ring-purple-500 focus:border-transparent
                            form-textarea block transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 @error('ui_reply')?rounded-lg border border-red-300 :border-red-500 border-opacity-100 hover:border-opacity-5 @enderror"></textarea>
                    </div>

                </div>

                @error('ui_reply')
                <div class="text-red-500">
                    Leave a reply !
                </div>
                @enderror

                <div class="h-20 w-20 mt-2 relative overflow-hidden bg-cover bg-no-repeat">
                    @if($image)
                        <img class="h-48 w-full" src="{{ $image->temporaryUrl() }}"
                             alt="{{$image?:''}}"/>
                    @endif

                    @if(!$image && isset($old_image))
                        <img class="h-48 w-full"
                             src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
                             alt="">
                    @else


                    @endif
                </div>

                <div class="flex mt-2 justify-between">

                    <div>
                        <input type="file" wire:model="image">
                        <button wire:click.prevent="save_image"></button>
                    </div>

                    <div class="w-full flex justify-between gap-1">
                        <div class="flex gap-1">
                            <x-button.primary type="submit" wire:click.prevent="save">Save
                            </x-button.primary>
                        </div>
                    </div>

                </div>
            </div>



            <div>


                <div class="text-left text-xl font-serif border-t border-gray-200 h-4 py-5">Comments</div>

                <div class="ml-24 px-2 border-b border-gray-200 ">

                    @forelse ($ui_replies as $ro



 w)

                        <div
                            class=" border-b border-gray-200 p-5 flex ">

                            <div class=" flex flex-col gap-2 rounded-lg">

                                <div class="items-center justify-between">

                                    <div class="h-20 w-20 mt-0.5 overflow-hidden bg-cover bg-no-repeat">
                                        <div
                                            class="h-auto max-h-0 items-center ">

                                            @if($row->image !='empty')
                                                <button wire:click="fullView('{{$row->id}}')">
                                                    <img
                                                        class=" h-20 w-20 transition duration-300 ease-in-out hover:scale-110 "
                                                        src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->image)) }}"
                                                        alt="">
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="w-3/4 flex justify-between">

                                        <div class="px-5 overflow-hidden w-full text-wrap">

                                            <div class=" h-auto max-h-0 items-center opacity-0">


                                                &nbsp; {{$row->vname}}

                                                <div class="text-sm text-gray-500 mt-0.5 ml-2 ">
                                                    {{$row->user->name}}
                                                    &nbsp; @&nbsp;{{date('d-m-Y h:i a', strtotime($row->updated_at))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="inline-flex gap-3 ">
                                        <button wire:click="edit({{ $row->id }})"
                                                class=" px-1.5 rounded-md  ">
                                            <x-icons.icon :icon="'pencil'"
                                                          class="h-5 w-auto block text-blue-500 hover:scale-110  "/>
                                        </button>
                                        <button wire:click="getDelete({{ $row->id }})"
                                                class=" px-1.5 rounded-md  ">
                                            <x-icons.icon :icon="'trash'"
                                                          class="h-5 w-auto block text-red-500 hover:scale-110 "/>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @empty
                                <div>&nbsp;</div>
                            @endforelse
                        </div>
                </div>
                <x-modal.delete/>
            </div>
        </div>
    </div>
</div>








{{--    <div class="max-w-6xl mx-auto border-gray-400 rounded-md  ">--}}
{{--        <div class=" p-6 pt-12 pb-6  rounded-md space-y-4">--}}

{{--            <!-- Top Controls ----------------------------------------------------------------------------------------->--}}

{{--            <div>--}}
{{--                <div class="lg:flex flex-col gap-3">--}}
{{--                    <div class=" ">--}}

{{--                        <div class="flex justify-between mt-5">--}}

{{--                            <div class="h-32">--}}
{{--                                <a class="cursor-pointer capitalize font-serif text-3xl  hover:underline underline-offset-8">--}}
{{--                                    {{$title}}--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div--}}
{{--                                class="w-40 h-8 lg:flex rounded-xl items-center justify-center text-lg {{  \App\Enums\Status::tryFrom($status)->getStyle() }}">--}}
{{--                                {{  \App\Enums\Status::tryFrom($status)->getName() }}--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="w-full mt-1.5">--}}
{{--                            <div class="text-center h-80 ">--}}
{{--                                <div>--}}
{{--                                    <button wire:click="fullImage()">--}}
{{--                                        <img--}}
{{--                                            class="w-[35rem] h-80 transition duration-300 ease-in-out bg-no-repeat hover:scale-110"--}}
{{--                                            src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$ui_pic)) }}"--}}
{{--                                            alt="">--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="flex justify-between gap-2">--}}
{{--                            <div></div>--}}
{{--                            <div>--}}
{{--                                <span class=" text-sm py-0.5 text-gray-500">Assign To :</span>--}}
{{--                                <span--}}
{{--                                    class=" text-md text-gray-600">{{\Aaran\Developer\Models\UiTask::allocated($allocated) }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-6 text-zinc-500  ">--}}
{{--                            {!! $body !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <!-- Replies  ----------------------------------------------------------------------------------------->--}}



{{--                    <!-- Comments ------------------------------------------------------------------------------------------------->--}}

{{--                    <div>--}}
{{--                        <div class="flex flex-col gap-3 py-3">--}}
{{--                        <textarea rows="5" id="reply" wire:model="ui_reply" autocomplete="off" autofocus--}}
{{--                                  placeholder="Add Your Comments here"--}}
{{--                                  class="appearance-none rounded-lg--}}
{{--                                                  py-2 px-2 bg-white text-gray-800 w-2/4--}}
{{--                                                 placeholder-gray-400 shadow-md text-base focus:outline-none--}}
{{--                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent--}}
{{--                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm--}}
{{--                                                 sm:leading-5 @error('ui_reply')?rounded-lg border border-red-300 :border-red-500 border-opacity-100 hover:border-opacity-5 @enderror"></textarea>--}}
{{--                        </div>--}}

{{--                        @error('ui_reply')--}}
{{--                        <div class="text-red-500">--}}
{{--                            Leave a reply !--}}
{{--                        </div>--}}
{{--                        @enderror--}}

{{--                        <div class="h-20 w-20 mt-2 relative overflow-hidden bg-cover bg-no-repeat">--}}
{{--                            @if($image)--}}
{{--                                <img class="h-48 w-full" src="{{ $image->temporaryUrl() }}"--}}
{{--                                     alt="{{$image?:''}}"/>--}}
{{--                            @endif--}}

{{--                            @if(!$image && isset($old_image))--}}
{{--                                <img class="h-48 w-full"--}}
{{--                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"--}}
{{--                                     alt="">--}}
{{--                            @else--}}


{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <div class="flex mt-2 justify-between">--}}

{{--                            <div>--}}
{{--                                <input type="file" wire:model="image">--}}
{{--                                <button wire:click.prevent="save_image"></button>--}}
{{--                            </div>--}}

{{--                            <div class="w-full flex justify-between gap-1">--}}
{{--                                <div class="flex gap-1">--}}
{{--                                    <x-button.primary type="submit" wire:click.prevent="save">Save--}}
{{--                                    </x-button.primary>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <x-jet.modal :maxWidth="'6xl'" wire:model.defer="showEditModal_1">--}}
{{--                        <div class="px-6 pt-4">--}}
{{--                            <img class="rounded-xl justify-items-start h-full w-full"--}}
{{--                                 src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$full_image)) }}"--}}
{{--                                 alt="">--}}
{{--                        </div>--}}
{{--                        <div class="px-6 py-3 bg-gray-100 text-right">--}}
{{--                            <div class="w-full flex justify-end gap-3">--}}
{{--                                <div class="flex gap-3">--}}
{{--                                    <button wire:click.prevent="$set('showEditModal_1', false)"--}}
{{--                                            class='inline-flex items-center px-4 py-2 border border-transparent--}}
{{--                               rounded-md font-semibold text-xs text-white uppercase tracking-widest--}}
{{--                               focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150--}}
{{--                               focus:ring-gray-500 bg-gray-600 hover:bg-gray-500 active:bg-gray-700 border-gray-600'>--}}
{{--                                        <x-icons.icon :icon="'chevrons-left'" class="h-5 w-auto block px-1.5"/>--}}
{{--                                        Cancel--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-jet.modal>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

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
            @forelse ($ui_replies as $row)
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
{{--    </div>--}}
