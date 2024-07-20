{{--<div>--}}
{{--    <div class="h-[17rem]] w-full mx-auto">--}}
{{--        <div class="flex flex-col">--}}
{{--            <div class="h-16 w-full flex-col flex justify-center items-center bg-[#081E40]">--}}
{{--                <div class="text-2xl w-9/12 text-white font-gab tracking-wider">Contact Us</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="w-6/12 mx-auto flex justify-between my-6">--}}

{{--        <!---- address --------------------------------------------------------------------------------------------->--}}

{{--        <div class="w-1/3 h-[22rem] flex-col  flex justify-center">--}}
{{--            <div class="my-2 font-roboto tracking-wider text-[12px] leading-loose">--}}
{{--                <div class="font-gab mb-2 text-[14px] font-semibold">SPORTS CLUB</div>--}}
{{--                <div class="inline-flex items-center"><span class="text-gray-600">Reg.No.</span> <span--}}
{{--                        class="text-black">82/1996</span></div>--}}
{{--                <div class=""><span class="text-gray-600">Address:</span><span class=""> S.F.No. 652/2 E,</span></div>--}}
{{--                <div>Kulathupalayam,Veerapandi Post</div>--}}
{{--                <div>Tirupur – 641 605.</div>--}}
{{--            </div>--}}

{{--            <!---- contact --------------------------------------------------------------------------------------------->--}}
{{--            <div class="flex-col my-2 font-roboto tracking-wider text-[12px] leading-loose">--}}
{{--                <div class="font-gab mb-2 text-[14px] font-semibold">Contact :</div>--}}
{{--                <div class=""><span class="text-gray-600">Manager:</span><span class=""> 86438 13508</span></div>--}}
{{--                <div class=""><span class="text-gray-600">Secretary:</span><span class=""> 93455 41369</span></div>--}}
{{--                <div class=""><span class="text-gray-600">Joint Secretary:</span><span class=""> 94886 60000</span>--}}
{{--                </div>--}}
{{--                <div class=""><span class="text-gray-600">Treasurer:</span><span class=""> 94898 80088</span></div>--}}
{{--                <div class=""><span class="text-gray-600">Email:</span><span class=""> sportsclub@gmail.com</span></div>--}}
{{--                <div class=""><span class="text-gray-600">Visit us:</span><span class=""> www.sportsclub.com</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="w-2/3 h-[22rem] items-center">--}}
{{--            <!-- Responsive Google Map ------------------------------------------------------------------------------->--}}
{{--            <div class="relative h-full  overflow-hidden" style="padding-bottom: 56.25%;">--}}

{{--                <iframe--}}
{{--                    class="absolute w-full h-full p-4"--}}
{{--                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d978.7001772786659!2d77.34018426961973!3d11.128215315204342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTHCsDA3JzQxLjYiTiA3N8KwMjAnMjcuMCJF!5e0!3m2!1sen!2sus!4v1719294872012!5m2!1sen!2sus"--}}
{{--                    frameborder="0"--}}
{{--                    style="border:0;"--}}
{{--                    allowfullscreen=""--}}
{{--                    aria-hidden="false"--}}
{{--                    tabindex="0"--}}
{{--                ></iframe>--}}
{{--            </div>--}}
{{--            <!-- Additional contact details or a contact form can be added here -->--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!---- subscription --------------------------------------------------------------------------------------------->--}}

{{--    <div class="w-6/12 mx-auto flex flex-col items-center py-4 mb-4">--}}
{{--        <div class="font-roboto text-2xl font-semibold my-2">GET IN TOUCH</div>--}}
{{--        <div class="my-2 text-sm font-semibold mb-6 font-nunito tracking-wider">Through this form send us message if you--}}
{{--            have another query.--}}
{{--        </div>--}}

{{--        <div class="w-full flex gap-5 justify-between">--}}
{{--            <input type="text" wire:model="vname" class="w-2/6 border-gray-200" placeholder="Your Name">--}}
{{--            <input type="text" wire:model="email" class="w-2/6 border-gray-200" placeholder="Your Email">--}}
{{--            <input type="text" wire:model="phone" class="w-2/6 border-gray-200" placeholder="Your Phone Number">--}}
{{--        </div>--}}

{{--        <div class="my-5 w-full  ">--}}
{{--            <textarea name="" wire:model="message" class="border-gray-200" id="" cols="80" rows="8" placeholder="Your Message"></textarea>--}}
{{--        </div>--}}

{{--        <div class="w-32 h-10 bg-[#19398A] mt-8">--}}
{{--            <button wire:click="getSave" class="w-full font-lexanddeca font-semibold tracking-wider text-white text-center p-2">SEND</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="h-screen">
    <!-- header -->
    <div class="h-[25rem] w-full bg-cover bg-gradient-to-r from-white to-[#ccfbf1] flex-col flex justify-center items-center">
        <div class="w-2/3 mx-auto font-roboto ">
            <div class=" text-7xl font-bold inline-flex gap-5 font-semibold">
                <span>Contact</span>
                <span class="text-[#FFAF11]">Us</span></div>
            <div class="text-sm text-gray-600 my-8 tracking-wider">Making your business vision come true with our deep <br>
                operational & implementation expertise.</div>
        </div>
    </div>
<!-- contact  -->
    <div class="flex justify-between max-w-6xl mx-auto my-16">
        <div class="flex-col flex items-center text-center">
            <div class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center">
            <x-icons.icon-fill :iconfill="'mail1'" :colour="'#3F8462'" class="w-8 h-8"/>
            </div>
            <div class="my-3">
                <div class="font-semibold text-xl">Email</div>
                <div class="w-60 text-md">Send us mail and an ambassador will respond</div>
            </div>
        </div>
        <div class="border-l border-gray-200"></div>
        <div class="flex-col flex items-center text-center ">
            <div class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center">
                <x-icons.icon-fill :iconfill="'location-3'" :colour="'#FFAF11'" class="w-8 h-8"/>
            </div>
            <div class="my-3">
                <div class="font-semibold text-xl">Address</div>
                <div class="w-60 text-md">321 Car World, 2nd Breaking Str, New York, USA 10002</div>
            </div>
        </div>
        <div class="border-l border-gray-200"></div>
        <div class="flex-col flex items-center text-center">
            <div class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center">
                <x-icons.icon-fill :iconfill="'phone-call'" :colour="'#3F8462'" class="w-8 h-8"/>
            </div>
            <div class="my-3">
                <div class="font-semibold text-xl">Phone</div>
                <div class="w-60 text-md">Call us today and get your further information.</div>
            </div>
        </div>
    </div>

<!-- Form -->
    <div class="max-w-6xl mx-auto rounded-3xl">
        <div style="background-image: url('/../../../images/bg-1.jpg');"
             class="h-[25rem] w-full bg-cover rounded-3xl">
            <div>
            <div class="text-2xl font-roboto font-semibold w-5/6 mx-auto py-5">GET IN TOUCH</div>
            <div class="text-sm text-gray-600 w-5/6 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</div>
            <div
                class="w-5/6 h-[40rem] bg-alice-blue border border-alice-blue mx-auto mt-5 rounded-lg shadow-xl mb-5">

                <div class="grid grid-cols-2 w-full mt-10 mx-12">
                    <div class="flex flex-col gap-3">
                        <label>First Name</label>
                        <input type="text" wire:model="vname" class="w-5/6 h-14 rounded-lg border-teal-600"
                               placeholder="First Name"></div>

                    <div class="flex flex-col gap-3">
                        <label>Last Name</label>
                        <input type="text" wire:model="vname" class="w-5/6 h-14 rounded-lg border-teal-600"
                               placeholder="Last Name"></div>
                </div>

                <div class="grid grid-cols-2 w-full mt-10 mx-12">

                    <div class="flex flex-col gap-3">
                        <label>Email</label>
                        <input type="text" wire:model="vname" class="w-5/6 h-14 rounded-lg border-teal-600"
                               placeholder="Email Address"></div>

                    <div class="flex flex-col gap-3">
                        <label>Phone No</label>
                        <input type="text" wire:model="vname" class="w-5/6 h-14 rounded-lg border-teal-600"
                               placeholder="phone number"></div>
                </div>

                <div class="mt-14 w-full ml-12">
                    <textarea name="" wire:model="message" class="border-teal-600 rounded-lg" id="" cols="80" rows="8"
                              placeholder="Your Message"></textarea>
                </div>

                <div class="w-full flex justify-end items-end">
                    <button wire:click="getSave"
                            class="w-28 mr-10 mt-4 font-lexanddeca font-semibold tracking-wider rounded-lg text-white p-2 bg-blue-900">
                        SEND
                    </button>
                </div>

            </div>
            </div>
        </div>
    </div>

    {{--    <section class="bg-alice-blue py-28 mt-32 h-[40rem]">--}}
    {{--        <div class="container mx-auto px-4">--}}


    {{--            <!-- Responsive Google Map -->--}}
    {{--            <div class="relative h-0 overflow-hidden mb-6" style="padding-bottom: 56.25%;">--}}

    {{--                <iframe--}}
    {{--                    class="absolute top-0 left-0 w-full h-[35rem]"--}}
    {{--                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d978.7001772786659!2d77.34018426961973!3d11.128215315204342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTHCsDA3JzQxLjYiTiA3N8KwMjAnMjcuMCJF!5e0!3m2!1sen!2sus!4v1719294872012!5m2!1sen!2sus"--}}
    {{--                    frameborder="0"--}}
    {{--                    style="border:0;"--}}
    {{--                    allowfullscreen=""--}}
    {{--                    aria-hidden="false"--}}
    {{--                    tabindex="0"--}}
    {{--                ></iframe>--}}
    {{--            </div>--}}

    {{--            <!-- Additional contact details or a contact form can be added here -->--}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--    <div class="bg-bubble flex max-w-7xl mx-auto h-[25rem] my-10">--}}

    {{--        <div class="w-full">&nbsp;--}}
    {{--            <div class="">--}}
    {{--                <div>--}}
    {{--                    <a href="{{route('home')}}" class="flex items-center">--}}
    {{--                        <div class="p-1 lg:p-3 rounded py-3">--}}
    {{--                            <x-assets.logo.cxlogo :icon="'light'" class="h-9 ml-4 mx-auto w-auto block"/>--}}
    {{--                        </div>--}}
    {{--                        <span--}}
    {{--                            class="self-center text-3xl font-semibold whitespace-nowrap px-2 -mt-2 font-Don tracking-wider">CODEXSUN</span>--}}
    {{--                    </a>--}}
    {{--                </div>--}}

    {{--                <div class="flex flex-row mt-2 ml-5">--}}
    {{--                    <div>--}}
    {{--                        <x-icons.icon :icon="'location'"--}}
    {{--                                      class="text-gray-700 ml-2 mt-2 w-8 h-8"/>--}}
    {{--                    </div>--}}

    {{--                    <div>--}}
    {{--                        <p class="tracking-wider mt-1 text-gray-700 text-lg font-Don">--}}
    {{--                            10-A Venkatappa Gounder Street<br>--}}
    {{--                            Tiruppur,641654.<br>--}}
    {{--                            TamilNadu. <br>--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}


    {{--            <div class="flex mt-4 gap-x-4 ml-14">--}}
    {{--                <x-icons.icon-fill :iconfill="'twitter1'" class="w-5 h-5" :colour="'#8B5CF6'"/>--}}
    {{--                <x-icons.icon-fill :iconfill="'facebook-fill'" class="w-5 h-5" :colour="'#8B5CF6'"/>--}}
    {{--                <x-icons.icon-fill :iconfill="'git-hub'" class="w-5 h-5" :colour="'#8B5CF6'"/>--}}
    {{--                <x-icons.icon-fill :iconfill="'phone1'" class="w-5 h-5" :colour="'#8B5CF6'"/>--}}
    {{--            </div>--}}
    {{--        </div>--}}


    {{--        <div class="w-full ml-16 mt-2">&nbsp;--}}
    {{--            <div>--}}
    {{--                <h5 class="text-4xl text-blue-950">Quick Link--}}
    {{--                </h5>--}}
    {{--            </div>--}}

    {{--            <div class="mt-3 flex flex-col gap-y-3 ml-2">--}}
    {{--                <h2 class="tracking-wider">Home</h2>--}}
    {{--                <h2 class="tracking-wider">About Us</h2>--}}
    {{--                <h2 class="tracking-wider">Services</h2>--}}
    {{--                <h2 class="tracking-wider">Privacy Policy</h2>--}}
    {{--                <h2 class="tracking-wider">Blog</h2>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="w-full mt-2 pl-2 mr-28">&nbsp;--}}
    {{--            <div>--}}
    {{--                <h5 class="text-4xl">Services</h5>--}}
    {{--            </div>--}}

    {{--            <div class="mt-3 flex flex-col gap-y-3 ml-2">--}}
    {{--                <h2 class="tracking-wider">Web Design</h2>--}}
    {{--                <h2 class="tracking-wider">Web Development</h2>--}}
    {{--                <h2 class="tracking-wider">Product Management</h2>--}}
    {{--                <h2 class="tracking-wider">Marketing</h2>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="w-full mt-2 mr-24">&nbsp;--}}
    {{--            <div class="text-2xl">--}}
    {{--                <h6>Join Our Newsletter</h6>--}}
    {{--            </div>--}}

    {{--            <div>--}}
    {{--                <form action="#">--}}
    {{--                    <div class="mt-5 ml-1 relative">--}}

    {{--                        <input type="email" placeholder="yourmail@example.com"--}}
    {{--                               class="flex-1 appearance-none text-sm rounded shadow p-3 text-grey-dark mr-2 focus:outline-none">--}}

    {{--                        <div class="absolute top-0 right-0 inline-flex items-center p-4 mr-2">--}}
    {{--                            <x-icons.icon :icon="'mail'" class="w-4 h-4"/>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </div>--}}

</div>
