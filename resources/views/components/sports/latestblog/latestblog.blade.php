<div>
    <div class="w-10/12 mx-auto">
        <div class="text-7xl font-roboto pt-24">
            LATEST BLOG
        </div>

        <div class="grid grid-cols-4 w-full my-8 gap-8">
            @foreach($list as $row)

                <div class="flex flex-col h-auto ">
                    <div class="">
                        <img src="{{ URL(\Illuminate\Support\Facades\Storage::url($row->image)) }}" alt="{{$image}}"
                             class="w-full h-56 hover:scale-95 duration-300 hover:opacity-75 ease-linear rounded-lg">
                    </div>

                    <div
                        class="text-[16px] text-gray-500 mt-5 tracking-wide font-semibold uppercase px-2">{{date('d | F', strtotime($row->updated_at))}}</div>

                    <div
                        class="uppercase font-roboto font-semibold text-xl my-1 px-2">{{\Illuminate\Support\Str::words($row->vname,10)}}</div>
                </div>

            @endforeach
        </div>
    </div>

    <div class="h-[70rem] bg- my-24 bg-[#F7FAF9] relative">
        <div class="z-10 w-full h-[45rem]  bg-cover bg-no-repeat"
             style="background-image: url('/../../../images/profile/wlp2.jpg')">
        </div>
        <div class="absolute left-52 bottom-12 w-9/12 grid grid-cols-4 gap-6 my-9">
            @foreach($list->take(4) as $row)
                <div class="h-[28rem] bg-white rounded-lg shadow shadow-black/25 duration-300 hover:shadow-lg hover:shadow-gray-500 hover:duration-300">
                    <img class="rounded-t-lg lg w-full h-60 border border-white"
                         src="{{ URL(\Illuminate\Support\Facades\Storage::url($row->image))}}"
                         alt="Img"/>
                    <div class="text-xl px-4 py-4 font-semibold text-[#FC4954]">PROGRAM</div>
                    <div class="text-xl px-4 font-semibold">{{\Illuminate\Support\Str::words($row->vname, 15)}}</div>
                </div>
            @endforeach
        </div>
    </div>

</div>
