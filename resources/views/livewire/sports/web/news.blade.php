<div>
    <div class="w-full h-44 bg-[#081E40] text-2xl text-white font-gab flex-col flex justify-center">
        <div class=" w-7/12 mx-auto pl-2 text-4xl ">News</div>
    </div>
    @foreach($news as $row)
    <div class="w-7/12 flex-col mx-auto pt-24 ">
        <div class="text-5xl font-semibold font-bebas uppercase tracking-wide hover:underline">{{$row->vname}}
        </div>
        <div class="inline-flex items-center gap-2"><span class="text-sm text-red-700 my-2">Published - </span><span
                class="text-gray-400 text-xs pr-6"> {{$row->created_at}} </span> <span class="text-sm border-l border-gray-300 pl-6 text-red-700 my-2">Updated - </span><span
                class="text-gray-400 text-xs"> {{$row->updated_at}} </span></div>
        <img src="{{URL(\Illuminate\Support\Facades\Storage::url($row->image))}}" alt="" class="w-full my-6 h-[30rem] rounded-md shadow-md shadow-gray-400">
        <div class="w-10/12 text-lg font-roboto tracking-wider mx-auto text-justify my-4">{!! $row->description !!}
        </div>
    </div>
    @endforeach
    <div class="pt-24"></div>
</div>
