@props([
    "clubImage"=>null,
])

<div class="w-full md:h-[28rem] h-auto bg-[#10172B] flex-col flex justify-center py-4">
    <div class="w-9/12 mx-auto flex-col mt-6">
        <div class="md:flex md:justify-between md:items-center grid grid-cols-1 gap-3">
            <div class="text-white font-Don md:text-xl text-md tracking-wider">CLUB GALLERY</div>
            <a href="{{route('gallery')}}" class="px-4 py-2 w-[100px] text-white font-roboto tracking-wider border border-white md:mr-24 mx-2">See More</a>
        </div>
        <div class="md:flex md:justify-between">
            <x-sports.slider-demo :clubImage="$clubImage"/>
        </div>
    </div>
</div>
