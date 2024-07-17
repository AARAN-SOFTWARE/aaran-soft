@props([
    "clubImage"=>null,
])

<div class="w-full h-[28rem] bg-[#10172B] flex-col flex justify-center py-4">
    <div class="w-9/12 mx-auto flex-col mt-6">
        <div class="flex justify-between items-center ">
            <div class="text-white font-Don text-xl tracking-wider">CLUB GALLERY</div>
            <a href="{{route('gallery')}}" class="px-4 py-2 text-white font-roboto tracking-wider border border-white mr-24">See More</a>
        </div>
        <div class="flex justify-between ">
            <x-SportsClub.slider-demo :clubImage="$clubImage"/>
        </div>
    </div>
</div>
