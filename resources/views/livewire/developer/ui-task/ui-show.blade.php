<div>

    <x-slot name="header">UiTask -{{$title}} </x-slot>
    <div class="max-w-6xl mx-auto  border-gray-400 rounded-md  ">
        <div class=" p-6 pt-12 pb-6  rounded-md space-y-4">

            <!-- Top Controls ----------------------------------------------------------------------------------------->

            <div>
                <div class="lg:flex flex-col gap-3">
                    <div class=" ">

                        <div class="flex justify-between mt-5">

                            <div class="h-32">
                                <a class="cursor-pointer capitalize font-serif text-3xl  hover:underline underline-offset-8">
                                   {{$title}}
                                </a>
                            </div>

                            <div
                                class="w-40 h-8 lg:flex rounded-xl items-center justify-center text-lg {{  \App\Enums\Status::tryFrom($status)->getStyle() }}">
                                {{  \App\Enums\Status::tryFrom($status)->getName() }}
                            </div>
                        </div>

                        <div class="w-full mt-1.5">
                            <div class="text-center h-80 ">
                                <div>
                                    <button wire:click="fullImage()">
                                        <img
                                                class="w-[35rem] h-80 transition duration-300 ease-in-out bg-no-repeat hover:scale-110"
                                                src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$ui_pic)) }}"
                                                alt="">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between gap-2">
                            <div></div>
                            <div>
                                <span class=" text-sm py-0.5 text-gray-500">Assign To :</span>
                                <span
                                    class=" text-md text-gray-600">{{\Aaran\Developer\Models\UiTask::allocated($allocated) }}</span>
                            </div>
                        </div>

                        <div class="mt-6 text-zinc-500  ">
                            {!! $body !!}
                        </div>
                    </div>


                    <!-- Replies  ----------------------------------------------------------------------------------------->


                    <div class="text-left text-xl font-serif border-t border-gray-200 h-4 py-5">Comments</div>

                    <div class="ml-24 px-2 border-b border-gray-200 ">

                        @forelse ($ui_replies as $row)

                            <div class="border-b border-gray-200 p-5 flex hover:bg-gray-100 rounded-lg  group relative">

                                <div class="h-20 w-20 mt-0.5 relative overflow-hidden bg-cover bg-no-repeat">
                                    @if($row->image !='empty')
                                        <button wire:click="fullView('{{$row->id}}')">
                                            <img
                                                class=" h-20 w-20 transition duration-300 ease-in-out hover:scale-110 "
                                                src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->image)) }}"
                                                alt="">
                                        </button>
                                    @endif
                                </div>

                                <div class="w-3/4 flex justify-between">
                                    <div class="px-5 overflow-auto w-full text-wrap">
                                        &nbsp; {{$row->vname}}
                                        <div class="text-sm text-gray-500 mt-0.5 ml-2 ">
                                            {{$row->user->name}}
                                            &nbsp; @&nbsp;{{date('d-m-Y h:i a', strtotime($row->updated_at))}}
                                        </div>
                                    </div>

                                </div>

                                <div class="inline-flex gap-3 ">
                                    <button wire:click="edit({{ $row->id }})"
                                            class=" px-1.5 rounded-md  ">
                                        <x-icons.icon :icon="'pencil'"
                                                      class="h-5 w-auto block text-blue-500 hover:scale-110 invisible group-hover:visible"/>
                                    </button>
                                    <button wire:click="getDelete({{ $row->id }})"
                                            class=" px-1.5 rounded-md  ">
                                        <x-icons.icon :icon="'trash'"
                                                      class="h-5 w-auto block text-red-500 hover:scale-110 invisible group-hover:visible"/>
                                    </button>
                                </div>
                            </div>

                        @empty
                            <div>&nbsp;</div>
                        @endforelse
                    </div>
                </div>
                <x-modal.delete/>


                <!-- Comments ------------------------------------------------------------------------------------------------->

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

                <x-jet.modal :maxWidth="'6xl'" wire:model.defer="showEditModal_1">
                    <div class="px-6 pt-4">
                        <img class="rounded-xl justify-items-start h-full w-full"
                             src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/'.$full_image)) }}" alt="">
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
