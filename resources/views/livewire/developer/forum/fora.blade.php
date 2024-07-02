<div>
    <x-slot name="header">Fora</x-slot>

    <div style="background:url('../../../../images/ui-pic/ui-banner5.jpg')  no-repeat center;background-size:cover"
         class="h-60 pt-24 px-1  md:px-8 text-center relative text-white font-bold text-2xl md:text-3xl  opacity-65">
        <div class="w-11/12 md:w-3/4 mx-auto lg:max-w-3xl">
            <div class="relative text-base text-black">
                <input type="text" wire:model.live="searches" value="" placeholder="Find easily !"
                       class=" shadow-md focus:outline-none ring-1 focus:ring-teal-700 rounded-2xl py-3 px-6 block w-full">
                <button type="submit">
                    <svg class="text-teal-400 h-5 w-5 absolute top-3.5 right-8 fill-current dark:text-teal-300"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" viewBox="0 0 56.966 56.966"
                         xml:space="preserve">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                            </path>
                            </svg>
                </button>
                {{--                <div--}}
                {{--                    class="text-left absolute top-10 rounded-t-none rounded-b-2xl shadow bg-white divide-y w-full max-h-40 overflow-auto">--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

    <div class="h-16 bg-gray-50 flex  justify-center ">

        <div class="flex items-center text-teal-700">
            <div class=" " >
                <a href="{{ route('fora',[$firstFora->id]) }}">
                    Home
                </a>
            </div>
            <div class="h-4 border-2 border-gray-300 mx-4">

            </div>

            <div>
                <a href="{{ route('ui-task.show',[$firstFora->id]) }}">
                    UI-Show
                </a>
            </div>

        </div>
    </div>

    <section>
        <div class="py-12 mx-auto w-9/12 sm:px-6 md:px-12 lg:px-24 lg:py-24 ">
            <div class="flex justify-end w-full">
                <x-button.new/>
            </div>

            <div class="flex rounded-lg border border-gray-100 hover:shadow-xl hover:shadow-gray-200 ">

                <div
                    class="flex flex-col items-start mt-8 mb-10 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0 ">

                    <div class="flex gap-3 tracking-widest font-bold text-cyan-700 uppercase mb-5 mt-8">
                        <div>
                            <a href="{{ route('ui-task.show',[$firstFora->id]) }}"
                               class="cursor-pointer text-xs">
                                {{ \App\Enums\Priority::tryFrom($firstFora->priority)->getName() }}
                            </a>
                        </div>

                        <div class="border-l-2">
                            <a href="{{ route('ui-task.show',[$firstFora->id]) }}"
                               class="ml-2 text-xs ">
                                {{ \Aaran\Developer\Models\UiTask::allocated($firstFora->allocated) }}
                            </a>
                        </div>
                    </div>

                    <div class="w-full h-20 overflow-hidden mb-2 ">
                        <a href="{{ route('ui-task.show',[$firstFora->id]) }}"
                           class="font-Ram text-2xl capitalize leading-none  text-neutral-900 md:text-7xl lg:text-3xl overflow-hidden"> {{ $firstFora->vname }}
                        </a>
                    </div>

                    <div>
                        <div class="h-32 w-[25rem]">
                            <a href="{{ route('ui-task.show',[$firstFora->id]) }}">
                                <div
                                    class="mb-5 font-gab  text-lg tracking-wider leading-relaxed text-left text-gray-800 h-20 overflow-hidden">{!! $firstFora->body !!}</div>
                            </a>
                        </div>
                        <a href="{{ route('ui-task.show',[$firstFora->id]) }}">
                            <div class="flex hover:text-blue-500 font-serif tracking-wider">

                                <div>continue reading</div>&nbsp;&nbsp;<div>
                                    <x-icons.icon icon="right-long-arrow" class="w-6 h-6 pt-1"/>
                                </div>
                            </div>
                        </a>

                    </div>


                    <div class="lg:flex gap-3 justify-between w-full lg:my-auto max-w-7xl  ">


                        <div class="flex">
                            <div class="text-xl text-gray-700 tracking-wide ">
                                <img class="h-16 w-16 p-1 rounded-full border border-gray-200 object-cover"
                                     src="{{ $firstFora->user->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                            </div>

                            <div class="mt-2 ml-3">
                                <div class=" px-2 uppercase text-lg ">{{ $firstFora->user->name }}</div>

                                <div class=" text-gray-400 text-xs px-2">
                                    <time>{{ $firstFora->created_at->diffForHumans() }}</time>
                                </div>
                            </div>
                        </div>


                        <div class="w-12 mr-12 mt-6">
                            <button wire:click="edit({{ $firstFora->id }})"
                                    class=" px-1.5 rounded-md   ">
                                <x-icons.icon :icon="'pencil'"
                                              class="h-5 w-auto block text-cyan-700 hover:scale-110"/>
                            </button>
                        </div>


                    </div>
                </div>

                <div class="">
                    <img class="rounded-r-lg bg-cover object-cover  h-[30rem]" alt="{{$firstFora->ui_pic}}"
                         src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$firstFora->ui_pic))}}">
                </div>
            </div>
        </div>
    </section>

    <div class="py-12 mx-auto w-9/12 sm:px-6 md:px-12 lg:px-24 lg:py-24 ">

        <div class="lg:grid grid-cols-3 gap-3 gap-y-8 h-auto ">

            @foreach($list->skip(1) as $row)

                <div
                    class="rounded-lg border mt-10 flex-col border-gray-100 hover:shadow-xl hover:shadow-gray-200 duration-200 bg-zinc-50 hover:bg-white">

                    <div>
                        <img class="bg-cover rounded-t-lg h-64 w-full" alt="{{$row->ui_pic}}"
                             src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$row->ui_pic))}}">
                    </div>

                    <div class="flex-col justify-evenly p-5">

                        <div class="flex gap-3 text-cyan-700 uppercase mb-5">
                            <div>
                                <a href="{{ route('ui-task.show',[$row->id]) }}"
                                   class="cursor-pointer text-sm ">
                                    {{ \App\Enums\Priority::tryFrom($row->priority)->getName() }}
                                </a>
                            </div>

                            <div class="border-l-2">
                                <a href="{{ route('ui-task.show',[$row->id]) }}"
                                   class="ml-2 text-sm ">
                                    {{ \Aaran\Developer\Models\UiTask::allocated($row->allocated) }}
                                </a>
                            </div>
                        </div>

                        <div class="w-full h-16 my-auto overflow-hidden mb-6">
                            <a href="{{ route('ui-task.show',[$row->id]) }}"
                               class="font-Ram text-lg hover:text-cyan-700 capitalize
                               text-neutral-900 lg:text-2xl overflow-hidden"> {{ $row->vname }}
                            </a>
                        </div>

                        <div class="w-full my-auto overflow-hidden ">
                            <a href="{{ route('ui-task.show',[$row->id]) }}">
                                <div class="font-gab mb-8 text-lg tracking-wider leading-relaxed text-left
                                 text-gray-800 h-20 overflow-hidden">{!! $row->body !!}&nbsp;
                                </div>
                            </a>
                        </div>

                        <div class="lg:flex gap-3 mb-0 mt-0 lg:my-auto max-w-7xl justify-between sm:flex">


                            <div class="flex">
                                <div class="text-xl text-gray-700 tracking-wide ">
                                    <img class="h-12 w-12 p-1 rounded-full border border-gray-200 object-cover"
                                         src="{{ $row->user->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                                </div>

                                <div class="ml-3">
                                    <div class=" px-2 uppercase tracking-tight text-lg ">{{ $row->user->name }}</div>

                                    <div class=" text-gray-400 text-xs px-2">
                                        <time>{{ $row->created_at->diffForHumans() }}</time>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button wire:click="edit({{ $firstFora->id }})"
                                        class=" px-1.5 rounded-md   ">
                                    <x-icons.icon :icon="'pencil'"
                                                  class="h-5 w-auto block text-cyan-700 hover:scale-110"/>
                                </button>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

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

</div>
