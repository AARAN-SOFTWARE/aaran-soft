<div class="bg-[#F0F2F8]">
    <div class="w-full h-16 bg-[#081E40] flex-col flex justify-center items-center">
        <div class="text-white text-2xl w-9/12 mx-auto font-gab">Gallery</div>
    </div>
    <div class="w-9/12 mx-auto bg-white border border-gray-200 rounded-md mt-12 flex">
            <img src="../../../../images/profile/bg-1.jpg" alt="" class="h-[35rem] w-8/12 p-3 rounded-lg">
            <div class="w-4/12 p-3 text-justify text-sm">
                Write a brief summary of your athletic and sports qualifications
                Add compelling examples of your athletic and sports experience Add
                athletic and sports education and certifications Make a list of your
                athletic and sports-related skills and proficiencies
            </div>
    </div>
    <div class="w-9/12 grid grid-cols-4 gap-6 mx-auto py-6">
        @for($i=1; $i<=9; $i++)
        <div class=" h-72 bg-white border border-black rounded-md">
            <img src="../../../../images/profile/bg-1.jpg" alt="" class="h-4/5 rounded-md">
            <div class="h-1/5 flex items-center p-2 font-roboto">athletic and sports qualifications</div>
        </div>
        @endfor
    </div>
</div>
