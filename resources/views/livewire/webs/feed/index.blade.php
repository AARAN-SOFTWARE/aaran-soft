<div>
    <x-slot name="header">Feeds</x-slot>
    <div class="flex rounded-xl">
        <div class="w-1/5 h-screen outline-2 outline-gray-400 rounded-l-lg ">
            <!-- profile -->
            <x-dashboard.welfare.profile />
            <!-- Highlights -->
            <x-dashboard.welfare.highlights />
            <!-- option -->
            <x-dashboard.welfare.option />
        </div>
        <div class="w-4/5 h-screen rounded-r-xl ">
            <div class="p-10 bg-gray-50 w-[98%] h-[98%] mx-auto rounded-xl overflow-y-auto">
                <!-- Top Panel -->
                <div class="flex justify-between">
                    <div>
                        <x-dashboard.welfare.search />
                    </div>
                    <div class="w-44 flex justify-between items-center">
                        <div><x-icons.icon icon="notification"  class="w-6 h-6 mt-2 hover:text-red-700"/></div>
                        <div>
                           <x-dashboard.welfare.create-new-red />
                        </div>
                    </div>
                </div>

                <!-- Stories -->
                <div>
                    <x-dashboard.welfare.stories />
                </div>
                <!-- Feed -->
                <div class="w-[98%] mx-auto text-xl mt-10 font-roboto font-semibold">Feed</div>
                <div class="grid grid-cols-3 mt-4 justify-items-center gap-6 font-roboto">
                    @for($i=1; $i<=9; $i++)
                        <a href="/feed/show">
                            <x-dashboard.welfare.feed-index />
                        </a>
                    @endfor
                </div>
            </div>

        </div>
    </div>
</div>
