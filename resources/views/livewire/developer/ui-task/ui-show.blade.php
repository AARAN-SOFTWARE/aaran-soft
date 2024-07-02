<div>
    <!--header section ------------------------------------------------------------------------------------------------>
    <x-slot name="header">UiTask -{{$title}} </x-slot>

    <div class=" mx-auto my-auto bg-teal-100 ">

        <div class=" mx-auto max-w-7xl ">

            <div class="py-20">
                <div class="text-center mr-20 ">

                    <a class="capitalize font-serif text-6xl ">
                        {{$title}}
                    </a>

                </div>
            </div>
        </div>

    </div>

    <!--home & show --------------------------------------------------------------------------------------------------->

    <div class="h-16 bg-gray-50 flex  justify-center ">

        <div class="flex items-center text-teal-700">
            <div class=" ">
                <a href="{{ route('fora',[$this->vid]) }}">
                    Home
                </a>
            </div>
            <div class="h-4 border-2 border-gray-300 mx-4">

            </div>

            <div>
                <a href="#">
                    UI-Show
                </a>
            </div>

        </div>
    </div>

    <!--image & body show --------------------------------------------------------------------------------------------->

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

            <div class="mt-6 w-3/4  mx-auto text-xl text-left text-zinc-800 mb-5">
                {!! $body !!}
            </div>

            <!--comment input ----------------------------------------------------------------------------------------->

            <div class="w-11/12 mx-auto h-auto bg-white rounded-xl flex-col border-t-2">
                <div class="w-3/4 bg-stone-50 mx-auto mt-5 mb-5">

                    <div class="flex flex-col gap-3 py-3 ">
                        <div class="w-2/3 mx-auto">

                            <div class=" w-36 flex justify-between">
                                <div class="flex ">
                                    <label for="reply"
                                           class="font-semibold">Discussions </label>
                                </div>

                                <div>
                                    <div class="flex"><span class=""><x-icons.icon icon="chat"
                                                                                   class="w-4 h-4 mt-1"/></span> <span
                                            class="text-sm mt-0.5 font-semibold">&nbsp;&nbsp;({{$commentsCount}})</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <textarea rows="5" id="reply" wire:model="ui_reply" autocomplete="off" autofocus
                                  class="appearance-none rounded-lg
                                                  py-2 px-2 bg-white text-gray-800 w-2/3 mx-auto
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5 @error('ui_reply')?rounded-lg border border-gray-300 :border-red-500 border-opacity-100
                                                 hover:border-opacity-5 @enderror"></textarea>
                    </div>

                    <!--error message & input image  ------------------------------------------------------------------>

                    @error('ui_reply')
                    <div class="text-red-500 w-2/3 mx-auto mb-3 text-center">
                        Leave a reply !
                    </div>
                    @enderror

                    <div class="w-2/3 mx-auto flex justify-between gap-3">

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

                        <!--select file & save  ----------------------------------------------------------------------->

                        <div class="flex mt-2 justify-between">

                            <div>
                                <input type="file" wire:model="image">
                                <button wire:click.prevent="save_image"></button>
                            </div>

                            <div class="w-full flex justify-between gap-1">
                                <div class="flex gap-1 h-6">
                                    <x-button.primary type="submit" wire:click.prevent="save">Save
                                    </x-button.primary>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!--replies --------------------------------------------------------------------------------------->

                    <div class="mt-10">
                        @forelse ($ui_replies as $row)

                            <div class="w-2/3  h-auto mx-auto flex-col border-b border-gray-200">
                                <div class="flex flex-col justify-between">

                                    <div class="flex justify-between mt-2">

                                        <!--profile & time ------------------------------------------------------------->

                                        <div class="flex flex-row">
                                            <div class="w-6 h-6 bg-zinc-100 rounded-full flex justify-center">
                                                <img
                                                    class="h-6 w-6 p-1 rounded-full border border-gray-200 object-cover"
                                                    src="{{ $row->user->profile_photo_url }}"
                                                    alt="{{ Auth::user()->name }}"/>
                                            </div>

                                            <div class="text-sm text-gray-500 ml-1">
                                                <span class="font-semibold">{{$row->user->name}}</span>
                                                &nbsp;&nbsp;@&nbsp;&nbsp;<span
                                                    class="text-xs">{{date('d-m-Y h:i a', strtotime($row->updated_at))}}</span>
                                            </div>

                                        </div>

                                        <!--reply edit & delete ------------------------------------------------------->

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

                                                    <!-- Heroicon: chevron-down --------------------------------------->
                                                    <div
                                                        class="w-5 h-4 hover:bg-white flex justify-evenly rounded-md mt-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                             fill="currentColor" class="size-4 ">
                                                            <path
                                                                d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/>
                                                        </svg>
                                                    </div>
                                                </button>

                                                <!-- Panel ------------------------------------------------------------->
                                                <div
                                                    x-ref="panel"
                                                    x-show="open"
                                                    x-transition.origin.top.left
                                                    x-on:click.outside="close($refs.button)"
                                                    :id="$id('dropdown-button')"
                                                    style="display: none;"
                                                    class="absolute left-6 w-30 rounded-md bg-white shadow-md"
                                                >
                                                    <a wire:click="edit({{ $row->id }})"
                                                       class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                                        <x-icons.icon :icon="'pencil'"
                                                                      class="h-4 w-auto block text-blue-600"/>
                                                        edit
                                                    </a>
                                                    <a wire:click="getDelete({{ $row->id }})"
                                                       class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                                        <x-icons.icon :icon="'trash'"
                                                                      class="h-4 w-auto block text-red-600"/>
                                                        delete
                                                    </a>

                                                    <x-modal.delete/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- reply image ------------------------------------------------------------------->

                                    <div class="flex flex-row mb-4">
                                        <div class="h-20 w-20 overflow-hidden bg-cover bg-no-repeat mt-3">
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

                                        <div class=" mt-2 mb-4 font-serif ml-5 w-3/4 overflow-auto text-left">
                                            {{$row->vname}}
                                        </div>
                                    </div>
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

                <!-- Image Full view ---------------------------------------------------------------------------------->

                <div class="w-1/3 bg-stone-100">
                    <x-jet.modal :maxWidth="'6xl'" wire:model.defer="showEditModal_1">
                        <div class="px-6  pt-4">
                            <img class="rounded-xl justify-items-start h-full w-full"
                                 src="{{ \Illuminate\Support\Facades\Storage::url('images/'.$full_image) }}">
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
</div>


