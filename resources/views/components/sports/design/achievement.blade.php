@props([
    "image"=>null,
])
<div class="w-11/12 h-auto mx-auto flex-col flex justify-center my-6">
    <div class="font-gab text-3xl font-semibold mb-3">Achievements</div>
    <div class="grid md:grid-cols-3 md:gap-y-9 grid-cols-1 gap-y-3">
        @foreach($image as $row)
            <div style="background-image: url('/../../../storage/{{$row->image}}')"
                 class="md:w-96 md:h-96 w-auto h-80 bg-no-repeat bg-cover bg-center rounded-xl flex-col flex justify-end">
                <a href="{{route('feed',['category_id'=>$row->feed_category_id,'tag_id'=>$row->tag_id])}}">
                    <div class=" bg-gradient-to-t from-black to-gray-400/25 text-white flex-col p-5 rounded-b-lg">
                        <div class="font-bebas text-2xl tracking-wider">{{$row->vname}}</div>
                        <div class="font-roboto">{{ \Illuminate\Support\Str::words( $row->desc,15)}}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
