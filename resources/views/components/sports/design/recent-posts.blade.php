@props([
    "list" => null
])
<div class="bg-white font-[sans-serif] my-12">
    <div class="max-w-7xl mx-auto">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1
                        after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-pink-400 after:rounded-full animate__animated wow animate__lightSpeedInRight"
                data-wow-duration="1s" data-wow-delay="3s">
                LATEST BLOGS
            </h2>
        </div>

        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16 max-md:max-w-lg mx-auto animate__animated wow animate__slideInLeft"
            data-wow-duration="4s">
            @foreach($list as $row)
                <div
                    class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]
                relative top-0 hover:-top-2 transition-all duration-300">
                    <a href="{{route('feed',['category_id'=>$row->feed_category_id,'tag_id'=>$row->tag_id])}}">
                        <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                             class="w-full h-60 object-cover"/>
                        <div class="p-6">
                            <span class="text-sm block text-gray-400 mb-2"> {{$row->updated_at->diffForHumans()}}</span>
                            <h3 class="text-xl font-bold text-[#333]">{{$row->vname}}</h3>
                            <hr class="my-6"/>
                            <p class="text-gray-400 text-sm">{{ \Illuminate\Support\Str::words($row->description,16)}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>


    </div>
</div>
