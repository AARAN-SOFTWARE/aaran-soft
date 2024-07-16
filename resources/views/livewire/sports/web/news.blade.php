<div>
    <div class="w-full h-16 bg-[#10172B] text-2xl text-white font-gab flex-col flex justify-center">
        <div class="w-9/12 mx-auto pl-2">News</div>
    </div>
    <div class="w-9/12 mx-auto flex my-12">
        <div class="w-3/12 ">
            <div class="text-4xl text-[#19398A] font-serif font-semibold ml-2">Latest</div>
            <div class="flex-col h-[60rem] overflow-y-auto mt-3">
            @for($i=1; $i<=10; $i++)
                <div class="border-b py-3 mx-3 hover:underline">

                    <div class="w-full text-justify"> <a href="{{route('showNews')}}">Delhi Excise policy case: Supreme Court Judge Sanjay Kumar recuses himself from hearing businessman's plea</a></div>
                    <div>24 JUNE, 2024</div>

                </div>
            @endfor
            </div>
        </div>

        <div class="w-6/12 border-x border-gray-300 flex-col px-3">
            <div class="flex-col border-b border-gray-300 pb-2">
                <a href="{{route('showNews')}}">
                    <div class="font-semibold font-serif text-5xl hover:underline "><a href="{{route('showNews')}}">Doda encounter: J&K L-G Manoj Sinha pays tributes to slain soldiers, vows to thwart designs of terrorists </a></div>
                <div class="font-serif text-lg my-5 text-black hover-underline text-justify"><a href="{{route('showNews')}}">Jammu and Kashmir L-G Manoj Sinha vows to avenge soldiers’ deaths in Doda encounter with terrorists</a></div>
                    <a href="{{route('showNews')}}"><img src="../../../../images/profile/bg-1.jpg" alt="" class="w-full h-96"></a>
                </a>
            </div>
            <div class="flex gap-4 pb-2">
                <div class="w-1/2">
                    <div class="font-serif text-xl my-5 hover-underline text-justify"><a href="{{route('showNews')}}">Jammu and Kashmir L-G Manoj Sinha vows to avenge soldiers’...</a></div>
                    <a href="{{route('showNews')}}"><img src="../../../../images/profile/bg-1.jpg" alt="" class="w-full h-44"></a>
                </div>
                <div class="w-1/2">
                    <div class="font-serif text-xl my-5 hover-underline text-justify"><a href="{{route('showNews')}}">Jammu and Kashmir L-G Manoj Sinha vows to avenge soldiers’...</a></div>
                    <a href="{{route('showNews')}}"><img src="../../../../images/profile/bg-1.jpg" alt="" class="w-full h-44"></a>
                </div>
            </div>
        </div>
        <div class="w-3/12 h-[63rem] overflow-y-auto">
            @for($i=1; $i<=10; $i++)
                <div class="border-b py-3 mx-3 hover:underline text-justify">
                    <div class="w-full text-justify"> <a href="{{route('showNews')}}">Delhi Excise policy case: Supreme Court Judge Sanjay Kumar recuses himself from hearing businessman's plea</a></div>
                    <div>24 JUNE, 2024</div>
                </div>
            @endfor
        </div>
    </div>
</div>
