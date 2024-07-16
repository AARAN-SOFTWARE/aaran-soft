<div class="bg-[#10172B] h-[42rem] flex-col flex gap-y-6">
    <div class="w-9/12 mx-auto text-white font-Don text-2xl tracking-wider">Latest</div>
    <div class="w-9/12 flex justify-between mx-auto gap-12">
        <x-SportsClub.slider.slider-1/>
        <x-SportsClub.slider.slider-2/>
        <x-SportsClub.slider.slider-3/>
    </div>
    <div class="w-9/12 flex justify-between mx-auto gap-12">
        <x-SportsClub.slider.slider-4/>
        <x-SportsClub.slider.slider-5/>
    </div>
    <div class="w-9/12 flex justify-between mx-auto gap-12">
        <div class="w-3/12 h-44 bg-[#19398A] rounded-lg flex-col flex justify-center items-center text-white font-roboto text-xl">
            <x-icons.icon icon="photo" class="w-16 h-16"/>
            <div>Pics</div>
        </div>
        <div class="w-6/12 h-44 bg-gradient-to-br from-[#19398A] to-orange-500 rounded-lg
        flex-col flex justify-center items-center text-white ">
            <div class="font-gab tracking-wider text-2xl">Interesting Facts</div>
            <div class="font-roboto tracking-wider text-sm p-5 text-center">{!! App\Helper\Slogan::getRandomQuote() !!}</div>
        </div>
        <div class="w-3/12 h-44 bg-[#19398A] rounded-lg flex-col flex justify-center items-center text-white font-roboto text-xl">
            <x-icons.icon icon="clipboard-document-list" class="w-16 h-16"/>
            <div>Reports</div>
        </div>
        <div class="w-3/12 h-44 bg-[#19398A] rounded-lg flex-col flex justify-center items-center text-white font-roboto text-xl">
            <x-icons.icon icon="newspaper-outline" class="w-16 h-16"/>
            <div>News</div>
        </div>
    </div>
</div>
