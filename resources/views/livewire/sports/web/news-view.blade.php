<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <div class="md:w-7/12 w-11/12 flex-col mx-auto pt-24 ">
            <div class="text-5xl font-semibold font-bebas uppercase tracking-wide hover:underline">{{$vname}}
            </div>
            <div class="inline-flex items-center gap-2"><span class="text-sm text-red-700 my-2">Published - </span><span
                    class="text-gray-400 text-xs md:pr-6"> {{$created_at}} </span> <span
                    class="text-sm border-l border-gray-300 pl-6 text-red-700 my-2">Updated - </span><span
                    class="text-gray-400 text-xs"> {{$updated_at}} </span></div>
            <img src="{{ URL(\Illuminate\Support\Facades\Storage::url($image)) }}" alt="alt="{{$image}}"
                 class="w-full my-6 md:h-[30rem] h-96 rounded-md shadow-md shadow-gray-400">
            <div class="w-10/12 text-lg font-roboto tracking-wider mx-auto text-justify my-4">{!! $description !!}
            </div>
        </div>


    <div class="w-4/6 mx-auto h-screen bg-white rounded-r-xl static">
        <div class="w-[93%] mx-auto my-10">
            <div class="w-[90%] mx-auto">COMMENTS</div>
            @if(auth()->id())
                <!-- Comment Section -->
                <div class="w-[90%] mx-auto flex-col">
                    <div class="text-xs pt-2 pb-1 text-gray-500 ">
                        # Write your Comments on <span class="text-blue-500"><a
                                href="{{ route('feed') }}">{{\Illuminate\Support\Str::words($vname, 8)}}</a></span>
                    </div>
                    @error('user_id')
                    <div class="text-xs text-red-400">Need Login To Comment</div>
                    @enderror
                </div>

                <!-- Create Comments -->
                <div class="w-[90%] mx-auto flex relative">

                    <textarea wire:model="reply" name="" id="" cols="30" rows="10"
                              class="w-96 h-16 rounded-md"></textarea>
                    <div class="mx-4  h-16 flex-col flex justify-between items-center">
                        <label class="h-8 px-1 text-white flex items-center rounded-md">
                            <input type="file" wire:model="reply_image" class="hidden">
                            <div class="flex gap-x-2 bg-blue-600 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6 text-white ml-1.5 mt-0.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                                </svg>
                                <span
                                    class="bg-white border font-roboto border-blue-600 text-blue-600 px-2 rounded-r-md">Add </span>
                            </div>
                        </label>
                        <button class="px-7 bg-blue-600 text-white rounded-md ring-0 border-0" type="submit"
                                wire:click.prevent="save"
                                wire:keydown.enter="save">Post
                        </button>
                    </div>
                    <div class="mx-auto items-center absolute -bottom-1 right-[22rem]">
                        @if($reply_image!='')
                            <img
                                src="{{$reply_image->temporaryUrl()}}"
                                alt="Image"
                                class="h-16 w-28 mb-1 rounded-md outline outline-2 outline-gray-300 shadow-md shadow-gray-100">
                        @endif
                        @if($reply_image=='')
                            @if($reply_old_image!="")
                                <img
                                    src="{{ \Illuminate\Support\Facades\Storage::url($reply_old_image)}}"
                                    alt="Image"
                                    class="h-16 w-28 mb-1 rounded-md outline outline-2 outline-gray-300 shadow-lg shadow-gray-400">
                            @endif
                        @endif
                    </div>
                    <div wire:loading wire:target="reply_image" class="z-6 absolute bottom-6 right-[25rem]">
                        <div class="w-6 h-6 rounded-full animate-spin
                    border-y-4 border-dashed border-blue-400 border-t-transparent"></div>
                    </div>

                </div>
            @else
                <div class="w-[90%] mx-auto text-xs tracking-wider font-bold animate-pulse">
                    <a href="{{route('login')}}">
                        Login to Comment...
                    </a>
                </div>
            @endif

            <!-- Comments -->
            <div class="w-[92%] mx-auto h-[40rem]  mt-4 overflow-y-auto">
                @foreach($list as $row)
                    <div class="border-b border-gray-300 flex mt-3 pb-5 mr-3">
                        <img src="{{ $row->user->profile_photo_url }}" alt="" class="w-8 h-8 ml-2  rounded-full">
                        <div class="flex-col ">
                            <div class="flex-col items-center">
                                <div class="w-[30rem] pl-3 text-sm text-justify"><span
                                        class="text-gray-500 pr-3">@ {{$row->user->name}}</span>{{$row->reply}}
                                </div>
                                <div class="w-[6rem] flex justify-between ">
                                    <div
                                        class="pl-3 mt-2 text-gray-500 text-[8px]">{{$row->created_at->diffForHumans()}}</div>
                                    <x-dashboard.welfare.dot-dropdown :row="$row"/>
                                </div>
                            </div>
                            @if($row->reply_image!='empty')
                                <div class="rounded-lg">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($row->reply_image)}}"
                                         alt=""
                                         class="w-auto h-40 rounded-lg">
                                </div>
                            @endif
                        </div>
                    </div>
                    {{--                        <div class="w-2/6 border-b border-gray-300"></div>--}}
                @endforeach
            </div>
        </div>
    </div>
</div>
{{--<div class="w-[50%] mx-auto text-center text-xs">Comments Section Ends Here! Have a Good Conversation</div>--}}

