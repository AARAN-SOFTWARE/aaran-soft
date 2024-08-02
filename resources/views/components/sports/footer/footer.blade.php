<div class=" flex-col flex justify-center md:h-96 h-auto bg-[#10172B]">
    <div class="md:flex md:mx-auto md:w-9/12 md:justify-between hidden">

        <div class="flex flex-col mt-10 w-4/12">
            <!-- address, socialmedia-->
            <div class="text-white text-xl">AARAN
            </div>

            <div class="mt-3">
                <div class="text-sm font-roboto text-white leading-relaxed tracking-wider">
                    10-A Venkatappa Gounder Street,<br>
                    Tiruppur,641654 <br>
                    Tamilnadu <br>
                </div>

                <div class="flex flex-row gap-4 mt-3">
                    <x-icons.icon-fill :iconfill="'twitter1'" :colour="'#E6E6FA'"/>
                    <x-icons.icon-fill :iconfill="'facebook-fill'" :colour="'#E6E6FA'"/>
                    <x-icons.icon-fill :iconfill="'git-hub'" :colour="'#E6E6FA'"/>
                    <x-icons.icon-fill :iconfill="'phone1'" :colour="'#E6E6FA'"/>
                </div>

                <div class="mt-4 w-3/5">
                    <div class="text-white">
                        NewsLetter
                    </div>

                    <div class="bg-[#11141C] border border-white rounded-sm mt-3">
                        <div class="p-1 rounded-sm">
                            <input type="text" class="w-44 rounded-sm white  border-0 focus:ring-0 bg-white">
                            <button class="text-white text-sm hover:text-cyan-200">Subscribe</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="flex flex-row my-4 w-8/12 justify-between">
            <!-- link -->
            <div class="my-3">
                <div class="text-white text-2xl font-nunito my-2">Team</div>
                <div class="text-white text-sm tracking-widest my-4">Blue Team</div>
                <div class="text-white text-sm tracking-widest my-4">Red Team</div>
                <div class="text-white text-sm tracking-widest my-4">Green Team</div>
                <div class="text-white text-sm tracking-widest my-4">Yellow Team</div>
            </div>

            <div class="my-3 ">
                <div class="text-white text-2xl font-nunito my-2">About</div>
                <div class="text-white text-sm tracking-widest my-4">About Us</div>
                <div class="text-white text-sm tracking-widest my-4">Anti Corruption Policy</div>
                <div class="text-white text-sm tracking-widest my-4">Anti Doping Policy</div>
                <div class="text-white text-sm tracking-widest my-4">News Access Regulation</div>
                <div class="text-white text-sm tracking-widest my-4">Image Use Terms</div>
            </div>

            <div class="my-3">
                <div class="text-white text-2xl font-nunito my-2">Stories</div>
                <div class="text-white text-sm tracking-widest my-4">Recent Blog</div>
                <div class="text-white text-sm tracking-widest my-4">Club Story</div>
                <div class="text-white text-sm tracking-widest my-4">Master Story</div>
                <div class="text-white text-sm tracking-widest my-4">Student Story</div>
            </div>

            <div class="my-3">
                <div class="text-white text-2xl font-nunito my-2">Contact</div>
                <div class="text-white text-sm tracking-widest my-4">Contact Us</div>
                <div class="text-white text-sm tracking-widest my-4">Sponsorship</div>
                <div class="text-white text-sm tracking-widest my-4">Privacy Policy</div>
            </div>
        </div>
    </div>


    <!-- mobile view -->
    <div class="md:hidden w-11/12 mx-auto text-white font-roboto tracking-wider pt-3 flex">
        <div class="w-5/12 mx-auto flex-col flex justify-center items-center">
            <div class="py-1">AARAN</div>
            <div class="text-[10px] w-5/6 mx-auto text-center">
                10-A Venkatappa Gounder Street,
                Tiruppur,641654,<br>
                Tamil Nadu.
            </div>
            <div class="py-1 flex gap-2">
                <x-icons.icon-fill :iconfill="'twitter1'" :colour="'#E6E6FA'" class="w-4 h-4"/>
                <x-icons.icon-fill :iconfill="'facebook-fill'" :colour="'#E6E6FA'" class="w-4 h-4"/>
                <x-icons.icon-fill :iconfill="'git-hub'" :colour="'#E6E6FA'" class="w-4 h-4"/>
                <x-icons.icon-fill :iconfill="'phone1'" :colour="'#E6E6FA'" class="w-4 h-4"/>
            </div>
            <div class="w-5/6 bg-[#11141C] border border-white rounded-sm">
                <div class="flex-col p-1 rounded-sm text-center">
                    <input type="text" class="w-full rounded-sm white  border-0 focus:ring-0 bg-white">
                    <button class="text-white  text-xs hover:text-cyan-200">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="w-7/12 text-white font-roboto tracking-wider grid grid-cols-2 gap-6 text-[10px] py-3">
            <div>
                <div class="text-[16px]">Team</div>
                <div>Blue Team</div>
                <div>Red Team</div>
                <div>Green Team</div>
                <div>Yellow Team</div>
            </div>
            <div>
                <div class="text-[16px]">About</div>
                <div>About Us</div>
                <div>Anti Corruption Policy</div>
                <div>Anti Doping Policy</div>
                <div>News Access Regulation</div>
                <div>Image Use Terms</div>
            </div>
            <div>
                <div class="text-[16px]">Stories</div>
                <div>Recent Blog</div>
                <div>Club Story</div>
                <div>Club Story</div>
                <div>Student Story</div>
            </div>
            <div>
                <div class="text-[16px]">Contact</div>
                <div>Contact Us</div>
                <div>Sponsorship</div>
                <div>Privacy Policy</div>
            </div>
        </div>
    </div>
0</div>
