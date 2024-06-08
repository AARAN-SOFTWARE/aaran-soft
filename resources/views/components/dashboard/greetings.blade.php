<div class="">
    <div style="background-image: url('/../../../images/index_assets/banner2.jpg');"
         class="w-full h-32 mt-5 bg-no-repeat bg-cover flex text-3xl  tracking-widest ">
        <div class="my-auto">
            <div class=" ml-5 font-semibold text-black">
                <span class="w-full">{{ App\Helper\Core::greetings() }}, </span>&nbsp;<span>{{Auth::user()->name}}</span>&nbsp;&nbsp;<span>👋</span>
            </div>
            <div>
                <span class="text-base font-sans text-gray-500 ml-5">{!! App\Helper\Slogan::getRandomQuote() !!}</span>
            </div>
        </div>

    </div>
</div>
