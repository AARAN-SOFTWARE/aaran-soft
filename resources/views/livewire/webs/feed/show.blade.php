<div>
    <x-slot name="header">Feeds 🤩</x-slot>

    <div class="flex rounded-xl font-roboto">
        <!-- Content slide -->
        <div class="w-4/6 h-screen bg-slate-50 rounded-xl flex items-center">
            <div class="h-[45rem] flex items-center">
                <!-- Content Image -->
                <div class="flex-col">
                    <img src="{{ URL(\Illuminate\Support\Facades\Storage::url($image)) }}" alt="{{$image}}"
                         class=" w-3/5 mx-auto mt-5 rounded-3xl shadow shadow-gray-500 hover:shadow-lg hover:shadow-gray-400 ">

                    <div class="w-3/5 mt-5 mx-auto">
                        <div class="flex justify-between">
                            <div class="w-2/5 flex-col text-center">
                                <div class="text-center">
                                    <img src="{{$users->profile_photo_url}}" alt=""
                                         class="w-16 h-16 rounded-full mx-auto">
                                    <div
                                        class="font-gab text-sm">{{\Aaran\Web\Models\Feed::allocated($users->id)}}</div>
                                    <div class="text-xs text-gray-500">{{ $created_at->diffForHumans() }}</div>
                                </div>
                                <div class="mt-2 text-md flex justify-center">{{$vname}}</div>
                            </div>
                            <div class="w-3/5 border-l-2 h-auto flex items-center pl-6">
                                <div class="text-sm text-gray-600 text-justify">&nbsp;&nbsp;&nbsp;&nbsp;{{$description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comment Section -->
        <div class="w-2/6 h-screen bg-white rounded-r-xl static">
            <!-- profile -->
            <div class="border-b-2 pb-4">
                <div class="flex items-center w-[90%] mx-auto mt-3">
                    <img src="{{$users->profile_photo_url}}" alt=""
                         class="w-10 h-10 rounded-full outline outline-2 outline-offset-4 outline-slate-400">
                    <div class="flex-col pl-3 ">
                        <div>{{\Aaran\Web\Models\Feed::allocated($users->id)}}</div>
                        <div class="text-[10px] text-gray-500">{{ $created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>

            <!-- Comment Section -->
            <div class="w-[90%] mx-auto flex-col">
                <div class="text-xs pt-2 text-gray-500 ">
                    # Write your Comments on <span class="text-blue-500"><a
                            href="{{ route('feed') }}">{{$vname}}</a></span>
                </div>
            </div>
            <div class="w-[95%] mx-auto h-[38rem] mt-2 overflow-y-auto">
                @foreach($list as $row)
                    <div class="flex mt-3 pb-5">
                        <img src="{{ $row->user->profile_photo_url }}" alt="" class="w-8 h-8 ml-2  rounded-full">
                        <div class="flex-col ">
                            <div class="flex-col items-center">
                                <div class="w-[30rem] pl-3 text-sm text-justify"><span
                                        class="text-gray-500 pr-3">@ {{$row->user->name}}</span>{{$row->reply}}</div>
                                <div class="w-[6rem] flex justify-between ">
                                    <div
                                        class="pl-3 mt-2 text-gray-500 text-[8px]">{{$row->created_at->diffForHumans()}}</div>
                                    <x-dashboard.welfare.dot-dropdown :row="$row"/>
                                </div>
                            </div>
                            @if($row->reply_image!='empty')
                                <div class="rounded-lg">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($row->reply_image)}}" alt=""
                                         class="w-auto h-40 rounded-lg">
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Create Comments -->
            <div class="flex mx-auto pt-4 mt-3 border-t-2 items-center relative">
                <label class="px-6 ">
                    <input type="file" wire:model="reply_image" class="hidden" >
                    <img src="../../../../images/attachment.svg" alt="" class="h-6 w-6 text-gray-500">
                </label>
                <input type="text" wire:model="reply"
                       class="w-[30rem] h-12 overflow-y-scroll border-0 focus:ring-0  mx-auto hover:bg-slate-50 text-xs" placeholder="Add Comments">
                <button class="px-6  h-10 text-blue-700 ring-0    border-0" type="submit" wire:click.prevent="save"
                        wire:keydown.enter="save">Post
                </button>
                <div class="mx-auto items-center absolute bottom-16 -left-6">
                    @if($reply_image!='')
                        <img
                            src="{{$reply_image->temporaryUrl()}}"
                            alt="Image"
                            class="h-16 w-28 mb-1 rounded-md outline outline-2 outline-gray-300 shadow-lg shadow-gray-400">
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
                <div wire:loading wire:target="reply_image" class="z-6 absolute bottom-20 left-6">
                    <div class="w-6 h-6 rounded-full animate-spin
                    border-y-4 border-dashed border-blue-400 border-t-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const Comment = document.getElementById('comment')
</script>
