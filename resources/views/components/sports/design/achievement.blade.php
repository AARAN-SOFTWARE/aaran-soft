@props([
    "image"=>null,
])

<div class="h-16">&nbsp;</div>
<div class="w-11/12 h-auto mx-auto flex-col flex justify-center my-6">
    <div class="font-gab text-5xl font-semibold mb-6 animate__animated wow animate__backInLeft" data-wow-duration="2s"
         data-wow-delay="1s">
        Achievements
    </div>
    <div class="grid md:grid-cols-3 gap-6  grid-cols-1 ">
        @foreach($image as $row)

            <a href="{{route('feed',['category_id'=>$row->feed_category_id,'tag_id'=>$row->tag_id])}}"
               class="hover:scale-105 hover:duration-300 ">
                <div class="animate__animated wow animate__backInRight"
                     data-wow-duration="2s" data-wow-delay="1s">
                    <div style="background-image: url('/../../../storage/{{$row->image}}')"
                         class="md:h-96 w-auto h-80 bg-no-repeat bg-cover bg-center rounded-xl flex-col flex justify-end p-3">

                        <div class=" bg-gradient-to-t from-black to-gray-400/25 text-white flex-col p-5 rounded-b-lg">
                            <div class="font-bebas text-2xl tracking-wider">{{$row->vname}}</div>
                            <div class="font-roboto">{{ \Illuminate\Support\Str::words( $row->desc,15)}}</div>
                        </div>
                    </div>
                </div>
            </a>

        @endforeach
    </div>
</div>
