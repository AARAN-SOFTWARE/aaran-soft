<div>
    {{--    <div class="w-full h-44 bg-[#081E40] text-2xl text-white font-gab flex-col flex justify-center">--}}
    {{--        <div class=" md:w-7/12 w-11/12 mx-auto pl-2 text-4xl ">News</div>--}}
    {{--    </div>--}}

    <div class="w-9/12 text-6xl mx-auto font-semibold my-10 animate__animated wow slideInLeft duration-700">Trending
        News
    </div>
    <div class="w-9/12 flex justify-between mx-auto font-roboto gap-6 my-16">

        <div class="w-4/12">
            <div class="text-2xl font-semibold hover:underline animate__animated wow bounceInDown"
                 data-wow-duration="2s">WHAT'S HAPPENING
            </div>
            @foreach($news->take(4)->skip(1) as $row)
                <div class="my-4 animate__animated wow slideInLeft duration-700 shadow-md  shadow-gray-400 rounded-md">
                    <a href="{{route('news-view',[$row->id])}}">
                        <img src="{{URL(\Illuminate\Support\Facades\Storage::url($row->image ?: ''))}}" alt=""
                             class="w-full h-44 rounded-t-md">
                        <div class="text-sm text-gray-600 my-1 px-2">June 7, 2022</div>
                        <div class="text-md py-2.5  uppercase font-semibold px-2">{{\Illuminate\Support\Str::words($row->vname,8)}}</div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="5/12">
            @foreach($news->take(1) as $row)
                <div class="animate__animated wow bounceInDown" data-wow-duration="2s">
                    <a href="{{route('news-view',[$row->id])}}">
                    <div class="text-4xl font-semibold my-2">{{$row->vname}}</div>
                    <div class="inline-flex items-center gap-2"><span
                            class="text-sm text-red-700 my-2">Published - </span><span
                            class="text-gray-400 text-xs md:pr-6"> {{$row->created_at}} </span> <span
                            class="text-sm border-l border-gray-300 pl-6 text-red-700">Updated - </span><span
                            class="text-gray-400 text-xs"> {{$row->updated_at}} </span></div>
                        <img src="{{URL(\Illuminate\Support\Facades\Storage::url($row->image))}}" alt=""
                             class="w-full rounded-md h-[45rem] shadow-md  shadow-gray-400 duration-300 hover:overflow-hidden">
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <div class=" w-9/12 mx-auto grid grid-cols-4 gap-6 font-roboto">
        @foreach($news->skip(4) as $row)
                <!-- CARD 1 -->
                <section class="wow slideInDown" data-wow-duration="2s">
                    <div
                        class="rounded overflow-hidden shadow-lg flex flex-col relative top-0 hover:-top-2 transition-all duration-300">

                        <div class="relative">

                            <a href="{{route('news-view',[$row->id])}}">
                                <img class="w-full h-64 object-fill"
                                     src="{{ URL(\Illuminate\Support\Facades\Storage::url($row->image))}}"
                                     alt="{{$row->image}}">
                                <div
                                    class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                                </div>
                            </a>

{{--                            <a href="{{route('news-view',[$row->id])}}">--}}
{{--                                <div--}}
{{--                                    class="text-xs absolute top-0 right-0 bg-green-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">--}}
{{--                                    Trending--}}
{{--                                </div>--}}
{{--                            </a>--}}

                        </div>

                        <div class="px-6 py-4 mb-auto">
                            <a href="{{route('news-view',[$row->id])}}"
                               class="font-medium text-lg hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">
                                {{ \Illuminate\Support\Str::words($row->vname, 5)}}
                            </a>

                            <div class="text-gray-400 text-xs">
                                {!! \Illuminate\Support\Str::words($row->description, 12) !!}
                            </div>

                        </div>

                        <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">

                            <span href="#"
                                  class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                                <svg height="13px" width="13px" viewBox="0 0 512 512">
                                    <path
                                        d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                    </path>
                                </svg>
                                <span class="ml-1">
                                    {{$row->updated_at->diffForHumans()}}
                                </span>
                            </span>

                            <span href="#"
                                  class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                                <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>

                                    <span class="ml-1">{{$row->feedReply->count()}} <a href="{{route('news-view',[$row->id])}}">Comments </a></span>

                            </span>
                        </div>
                    </div>
                </section>
        @endforeach
    </div>


    <div class="pt-24"></div>
</div>
