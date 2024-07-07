<div>
    <x-slot name="header">Feeds 🤩</x-slot>

    <div class="flex rounded-xl font-roboto">
        <div class="w-4/6 h-screen bg-slate-50 rounded-xl">
                <div class="w-[98%] mx-auto flex-col">
                    <!-- Content Image -->
                    <img src="../../../../images/profile/bg-1.jpg" alt="" class=" w-3/5 mx-auto mt-5 rounded-3xl">

                    <div class="w-3/5 mx-auto mt-5">
                        <div class="flex justify-between">
                            <div class="w-2/5 flex-col text-center">
                                <div class="text-center">
                                    <img src="../../../../images/profile/dp_2.jpg" alt="" class="w-16 h-16 rounded-full mx-auto">
                                    <div class="font-gab text-sm">Jagadeesh</div>
                                    <div class="text-xs text-gray-500">jaga_117804</div>
                                </div>
                                <div class="mt-2 text-md flex justify-items-center">This is a Title Area. looks only short though.</div>
                            </div>
                            <div class="w-3/5 border-l-2 h-auto flex items-center pl-6">
                                <div class="text-sm text-gray-600">Meggings portland fingerstache lyft, post-ironic fixie man bun banh mi
                                    umami everyday carry hexagon locavore direct trade art party. Locavore small batch
                                    listicle gastropub farm-to-table lumbersexual salvia messenger bag.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="w-2/6 h-screen bg-white-200 rounded-r-xl static">
            <div class="w-full mx-auto flex items-center border-b-2">
                <!-- profile -->
                <div class="w-[90%] mx-auto flex justify-between  pb-2">
                    <div class="flex">
                        <img src="../../../../images/profile/dp_2.jpg" alt="" class="w-10 h-10">
                        <div class="pl-3">
                            <div class="font-gab text-xs">Jagadeesh</div>
                            <div class="text-xs text-gray-500">jaga_117804</div>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </div>
                </div>
            </div>
{{--            <div class="w-[90%] mx-auto   absolute bottom-0">--}}
{{--                <div class="static">--}}
{{--                    <div class="w-[90%] border-t-2">--}}
{{--                        <input id="comment" type="text" placeholder="Add Comments" class="text-sm border-0 focus:ring-0">--}}
{{--                    </div>--}}
{{--                    <div class="w-full absolute -right-[33rem]  top-2">--}}
{{--                        <button class="text-blue-600 px-2 hover:bg-gray-100">Post</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<script>
    const Comment = document.getElementById('comment')
</script>
