@props([
    "list" => null
])
<div class="mt-8">&nbsp;</div>
<div class="h-64 font-roboto">
    <div class="w-11/12 h-5/6 mx-auto py-5 flex-col ">
        <div class="text-6xl">Latest News</div>
        <div class="inline-flex h-10 items-center">
        <a href="{{ route('sportNews') }}" class="pt-1 text-md text-gray-300 hover:text-amber-600 hover:text-xl">Read All News ->
        </a>
        </div>

        <div class="pt-4 md:grid md:grid-cols-8 gap-6 md:h-auto h-44 overflow-y-auto grid grid-cols-2 p-2">
            @foreach($list as $row)
                <div class="flex-col">

                    <a href="{{route('feed',['category_id'=>$row->feed_category_id?:'','tag_id'=>$row->tag_id?:''])}}">
                        <div
                            class="h-32 border border-white  hover:border-dashed hover:border-red-700 rounded-lg ">
                            <img class="rounded-lg hover:scale-95 hover:duration-300 w-full h-full"
                                 src="{{ URL(\Illuminate\Support\Facades\Storage::url($row->image))}}"
                                 alt="Img"/>
                        </div>
                        <div class="w-28 text-center pt-1 text-sm text-white">{{ \Illuminate\Support\Str::words($row->vname, 5)}}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
