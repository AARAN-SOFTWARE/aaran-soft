@props([
    "list" => null
])
<div>
    <div class="w-full md:h-64 h-auto flex bg-[#1a1a1a] overflow-x-hidden">

        <div class="md:flex md:flex-row my-4 w-full justify-between hidden animate-marquee whitespace-nowrap">
            <div
                class="text-white text-sm border-r border-white tracking-wider w-2/12 flex-col flex justify-evenly items-center">
                <div>TITLE SPONSOR</div>
                @foreach($list->take(1) as $row)
                    <div>{!!  $row->logo !!}</div>
                @endforeach
            </div>
            <div
                class="text-white text-sm border-r border-white tracking-wider w-3/12 flex-col flex justify-evenly items-center">
                <div>ASSOCIATE PARTNER</div>
                <div class="w-full flex justify-evenly items-center ">
                    @foreach($list->take(3)->skip(2) as $row)
                        {!! $row->logo !!}
                    @endforeach
                </div>
            </div>

            <div class=" border-r border-white w-5/12 flex-col flex justify-evenly items-center">

                <div class="text-white text-sm tracking-wider flex justify-center">OFFICIAL UMPIRE PARTNER</div>

                <div class="w-full flex justify-evenly items-center">
                    @foreach($list->take(6)->skip(3) as $row)
                        <div>{!! $row->logo !!}</div>
                    @endforeach
                </div>
            </div>

            <div class="text-white text-sm tracking-wider w-2/12 flex-col flex justify-evenly items-center">
                <div>OFFICIAL BROADCASTER</div>
                    @foreach($list->take(7)->skip(6) as $row)
                        <div>{!! $row->logo !!}</div>
                    @endforeach
            </div>
        </div>
        <!-- Mobile view -->
        <div class="md:hidden flex-col justify-center w-11/12 mx-auto font-roboto text-white tracking-wider text-xs">
            <div class="grid grid-cols-3 items-center">
                <!-- Title sponsor -->
                <div class="flex-col flex justify-center items-center">
                    <div>TITLE SPONSOR</div>
                    @foreach($list->take(1) as $row)
                        <div>{!!  $row->logo !!}</div>
                    @endforeach
                </div>
                <!-- Associate sponsor -->
                <div class="flex-col flex justify-center items-center my-6">
                    <div>ASSOCIATE PARTNER</div>
                    @foreach($list->take(3)->skip(1) as $row)
                        {!! $row->logo !!}
                    @endforeach
                </div>
                <!-- Official Broadcast -->
                <div class="flex-col flex justify-center items-center">
                    <div>OFFICIAL BROADCASTER</div>
                    @foreach($list->take(6)->skip(3) as $row)
                        {!! $row->logo !!}
                    @endforeach
                </div>
            </div>
            <!-- Official Umpire Partner -->
            <div class="flex-col flex justify-center items-center my-6">
                <div>OFFICIAL UMPIRE PARTNER</div>
                <div class="grid grid-cols-3 gap-20">
                    @foreach($list->take(7)->skip(6) as $row)
                        {!! $row->logo !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div>
        {{--        @foreach($list as $index => $row)--}}
        {{--            <div class="inline-flex">--}}
        {{--                <div>{!! $row->logo !!}</div>--}}
        {{--            </div>--}}
        {{--        @endforeach--}}
    </div>
</div>
