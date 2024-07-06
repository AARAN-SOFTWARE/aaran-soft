<div class=" mx-auto mt-8 font-semibold font-roboto">
    <div class="text-xl">Stories</div>
</div>
<div class=" mx-auto mt-3 flex justify-between font-roboto">

    <div class="flex-col justify-center text-center">
        <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-evenly">
            <button class="flex justify-evenly"><x-icons.icon icon="plus-slim"  class="w-6 h-6 flex text-black" /></button>
        </div>
        <div>new</div>
    </div>
    @for($i=0; $i<=2; $i++)
    <div class="flex-col justify-center text-center">
        <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-evenly">
            <img src="../../../../images/profile/dp_1.jpg" alt="" class="bg-gray-500 outline outline-2 outline-red-400 rounded-full">
        </div>
        <div>Jeremy</div>
    </div>
    <div class="flex-col justify-center text-center">
        <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-evenly">
            <img src="../../../../images/profile/fedex.png" alt="" class="bg-gray-500 outline outline-2 outline-red-400 rounded-full">

        </div>
        <div>Fedex</div>
    </div>
    <div class="flex-col justify-center text-center">
        <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-evenly">
            <img src="../../../../images/profile/channel.png" alt="" class="bg-gray-500 outline outline-2 outline-red-400 rounded-full">
        </div>
        <div >Chanel</div>
    </div>
        <div class="flex-col justify-center text-center">
            <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-evenly">
                <img src="../../../../images/profile/channel.png" alt="" class="bg-gray-500 outline outline-2 outline-red-400 rounded-full">
            </div>
            <div >Chanel</div>
        </div>
    @endfor
</div>
