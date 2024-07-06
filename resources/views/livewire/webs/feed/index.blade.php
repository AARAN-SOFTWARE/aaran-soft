<div>
    <x-slot name="header">Feeds</x-slot>
    <div class="flex rounded-xl">
        <div class="w-1/5 h-screen outline-2 outline-gray-400 rounded-l-lg">
            <!-- profile -->
            <x-dashboard.welfare.profile />
            <!-- Highlights -->
            <x-dashboard.welfare.highlights />
            <!-- option -->
            <x-dashboard.welfare.option />
        </div>
        <div class="w-4/5 h-screen rounded-r-xl ">
            <div class="p-10 bg-gray-50 w-[98%] h-[98%] mx-auto rounded-xl">
                <div class="flex justify-between">
                    <div>
                        <x-dashboard.welfare.search />
                    </div>
                    <div class="w-1/6 flex justify-between items-center">
                        <div><x-icons.icon icon="notification"  class="w-6 h-6 mt-2 hover:text-red-700"/></div>
                        <div>
                            <button class="flex justify-evenly px-3 rounded-full
                            bg-gradient-to-r from-orange-500 to-red-600 text-white
                            hover:bg-gradient-to-r hover:from-red-500 hover:to-orange-600 font-semibold font-roboto items-center
                            hover:shadow-md hover:shadow-orange-200">
                                <div><x-icons.icon icon="plus-slim" class="w-5 h-5 mt-2 mr-2"/></div>
                                <div>Create New</div>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
