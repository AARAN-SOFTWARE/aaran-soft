<div class="w-full h-[28rem] bg-[#10172B] flex-col flex justify-center">
    <div class="w-9/12 mx-auto flex-col">
        <div class="flex justify-between items-center">
            <div class="text-white font-Don text-xl tracking-wider">CLUB GALLERY</div>
            <button class="px-4 py-2 text-white font-roboto tracking-wider border border-white">See More</button>
        </div>
        <div class="flex justify-between mt-3">
            @for($i=1; $i<=4; $i++)
                <x-SportsClub.card-1 />
            @endfor
        </div>
    </div>
</div>
