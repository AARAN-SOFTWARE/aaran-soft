<div class=" h-48 bg-gray-50 flex items-center">
    <div class="w-8/12 h-7/8 py-5 flex-col mx-auto justify-between">
        <div class="text-center font-gab md:text-3xl text-xl">What are You Looking For?</div>
        <div class="md:grid md:grid-cols-4 md:gap-24 mt-5 grid grid-cols-2 gap-6 font-roboto">
            <a href="{{route('feed',['category_id'=>1,'tag_id'=>7])}}">
            <div class="flex items-center border-t-2 border-r-2 hover:border-t-0 tracking-wider
                hover:border-r-0 hover:border-b-2 hover:border-l-2 hover:bg-[#19398A] hover:text-white rounded-lg px-7 text-md
                scale-100 hover:scale-110 hover:skew-x-3 duration-300  py-1"><x-icons.icon icon="gift-top" class="w-6 h-6" /><div class="pl-2">Moment</div></div></a>
            <a href="{{route('feed',['category_id'=>1,'tag_id'=>4])}}">
            <div class="flex items-center text-md border-t-2 border-r-2 hover:border-t-0 tracking-wider
                hover:border-r-0 hover:border-b-2 hover:border-l-2  hover:bg-[#19398A] hover:text-white rounded-lg px-7
                scale-100 hover:scale-110 hover:skew-x-3 duration-300  py-1"><x-icons.icon icon="newspaper-outline" class="w-6 h-6" /><div class="pl-2">News</div></div></a>
            <a href="{{route('feed',['category_id'=>1,'tag_id'=>2])}}">
            <div class="flex items-center text-md border-t-2 border-r-2 hover:border-t-0 tracking-wider
                hover:border-r-0 hover:border-b-2 hover:border-l-2 hover:bg-[#19398A] hover:text-white rounded-lg px-7
                scale-100 hover:scale-110 hover:skew-x-3 duration-300 py-1"><x-icons.icon icon="event" class="w-6 h-6" /><div class="pl-2">Events</div></div></a>
            <a href="{{route('sportAbout')}}">
            <div class="flex items-center text-md border-t-2 border-r-2 hover:border-t-0 tracking-wider
                hover:border-r-0 hover:border-b-2 hover:border-l-2 hover:bg-[#19398A] hover:text-white rounded-lg px-7
                scale-100 hover:scale-110 hover:skew-x-3 duration-300 py-1"><x-icons.icon icon="member-group" class="w-6 h-6 " /><div class="pl-2">Members</div></div></a>
        </div>
    </div>
</div>
