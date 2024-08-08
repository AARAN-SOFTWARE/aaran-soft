@props([
    "events"=>null,
    "upComingEvents"=>null,
    "blogs"=>null,
    "news"=>null,
    "moments"=>null
])
<!-- #DEFCE8-->
<!-- #EDFCF2-->
<!-- #19398A-->

<div class="h-24">&nbsp;</div>
<div class="md:h-[42rem] h-auto flex-col flex gap-y-6 animate__animated wow animate__fadeInUpBig"
     data-wow-duration="2s">
    <div class="w-11/12 mx-auto text-white font-Don text-2xl tracking-wider mt-16">Latest</div>
    <div class="w-11/12 grid md:grid-cols-3 grid-cols-1 mx-auto gap-6 mt-4">
        <x-sports.slider.slider-1 :list="$upComingEvents"/>
        <x-sports.slider.slider-1 :list="$blogs"/>
        <x-sports.slider.slider-1 :list="$events"/>
    </div>
    <div class="w-11/12 grid md:grid-cols-2 grid-cols-1 gap-6 mx-auto">
        <x-sports.slider.slider-1 :list="$news"/>
        <x-sports.slider.slider-1 :list="$moments"/>
    </div>
    <div class="w-11/12 grid md:grid-cols-3 grid-cols-1 mx-auto gap-6">
        <a href="/gallery">
            <div
                class=" h-44 bg-[#DEFCE8] rounded-lg flex-col flex justify-center items-center text-[#19398A] font-roboto text-xl">
                <x-icons.icon icon="photo" class="w-16 h-16"/>
                <div>Pics</div>
            </div>
        </a>
        <div class="w-h-44 bg-gradient-to-br from-[#DEFCE8] to-[#EDFCF2] rounded-lg
        flex-col flex justify-center items-center text-white ">
            <div class="font-bold font-gab text-xl tracking-wider bg-gradient-to-r from-red-600 via-yellow-500 to-cyan-500 inline-block text-transparent bg-clip-text">Interesting Facts</div>
            <div
                class="font-roboto tracking-wider text-[#19398A] text-sm p-5 text-center">{!! App\Helper\Slogan::getRandomQuote() !!}</div>
        </div>
        <a href="/news">
            <div
                class=" h-44 bg-[#DEFCE8] rounded-lg flex-col flex justify-center items-center text-[#19398A] font-roboto text-xl">
                <x-icons.icon icon="newspaper-outline" class="w-16 h-16"/>
                <div>News</div>
            </div>
        </a>
    </div>
</div>
<div class="h-48">&nbsp;</div>
