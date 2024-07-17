<div>
    <div class="w-full h-16 bg-[#10172B] text-2xl text-white font-gab flex-col flex justify-center">
        <div class="w-9/12 mx-auto pl-2">News</div>
    </div>
    <div class="w-9/12 mx-auto flex my-12">
        <div class="w-3/12 ">
            <div class="text-4xl text-[#19398A] font-serif font-semibold ml-2">Latest</div>
            <div class="flex-col h-[50rem] overflow-y-auto mt-3">
            @foreach($news->skip(3)->take(10) as $row)

                <div class="border-b py-3 mx-3 hover:underline">
                    <div class="w-full text-justify"> <a href="{{route('showNews')}}">
                            {{$row->headline}}</a></div>
                    <div>{{$row->created_at}}</div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="w-6/12 border-x border-gray-300 flex-col px-3">
            <div class="flex-col border-b border-gray-300 pb-2">
                @foreach($news->take(1) as $row )
                <a href="{{route('showNews')}}">
                    <div class="font-semibold font-serif text-5xl hover:underline "><a href="{{route('showNews')}}">
                            {{$row->headline}} </a></div>
                <div class="font-serif text-lg my-5 text-black hover-underline text-justify"><a href="{{route('showNews')}}">
                        {{$row->subject}}</a></div>
                    <a href="{{route('showNews')}}"><img src="{{ \Illuminate\Support\Facades\Storage::url($row->image)}}" alt="" class="w-full h-96"></a>
                </a>
                @endforeach
            </div>
            <div class="flex gap-4 pb-2">
                @foreach($news->skip(1)->take(2) as $row )
                <div class="w-1/2">
                    <div class="font-serif text-xl my-5 hover-underline text-justify"><a href="{{route('showNews')}}">
                        {{\Illuminate\Support\Str::words($row->subject, 13)}}</a></div>
                    <a href="{{route('showNews')}}"><img src="{{\Illuminate\Support\Facades\Storage::url($row->image)}}" alt="" class="w-full h-44"></a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-3/12 h-[40rem] overflow-y-auto">
            @foreach($news->skip(13) as $row)

                <div class="border-b py-3 mx-3 hover:underline">
                    <div class="w-full text-justify"> <a href="{{route('showNews')}}">
                            {{$row->headline}}</a></div>
                    <div>{{$row->created_at}}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
