<div class="w-10/12 h-screen mx-auto">
    <div class="text-7xl font-roboto pt-24">
        LATEST BLOG
    </div>

    <div class="grid grid-cols-4 gap-x-8 my-8 w-full ">
        @foreach($list as $row)

            <div class="flex flex-col h-[35rem]">

                <img src="{{ URL(\Illuminate\Support\Facades\Storage::url($row->image)) }}" alt="{{$image}}"
                     class="rounded-2xl h-56">

                <div class="text-[20px] text-gray-500 mt-8">{{date('d | F', strtotime($row->updated_at))}}</div>
                <div class="mx-auto uppercase font-roboto font-semibold tracking-wider text-3xl my-4 text-justify">{{$row->vname}}</div>
            </div>

        @endforeach
    </div>

</div>
