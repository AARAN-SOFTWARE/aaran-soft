<div class="bg-[#F0F2F8]">
    <div class="w-full h-16 bg-[#081E40] flex-col flex justify-center items-center">
        <div class="text-white text-2xl w-9/12 mx-auto font-gab">Gallery</div>
    </div>
    <div class="w-9/12 grid grid-cols-4 gap-3 mx-auto my-12">
        @for($i=1; $i<=9; $i++)
        <div class="w-80 h-72 border border-gray-400 bg-cover bg-center bg-no-repeat bg-black rounded-md flex-col flex items-center justify-evenly group hover:opacity-75 hover:bg-black" style="background-image: url('/../../../images/profile/bg-1.jpg')">
            <div class="w-[96%] h-[96%] rounded-md hidden flex-col items-center justify-center
            border border-white group-hover:flex group-hover:bg-opacity-25 gap-3">
                <div class="text-white text-md font-roboto bg-black/25 px-1">athletic and sports qualifications</div>
               <button class="bg-[#081E40] flex items-center px-4 rounded-md"><x-icons.icon icon="view" class="w-6 h-6 text-white mt-2 ml-1"  /></button>
            </div>
        </div>
        @endfor
    </div>
</div>
