<div class="">
    <!-- header -->
    <div style="background-image: url('/../../../images/profile/b1.jpg')"
         class="h-[25rem] w-full bg-contain bg-no-repeat bg-right flex-col flex justify-center items-center">
        <div class="w-2/6 mx-auto font-roboto ">
            <div class=" text-7xl font-bold inline-flex gap-5 font-semibold">
                <span>Contact</span>
                <span class="text-[#FFAF11]">Us</span></div>
            <div class="text-sm text-gray-600 my-8 tracking-wider">Making your business vision come true with our deep
                <br>
                operational & implementation expertise.
            </div>
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
    <div class="z-10 max-w-6xl h-[55rem] mx-auto rounded-[40px] bg-gradient-to-t from-white via-white to-teal-500 p-24">
        <div class="w-full h-full rounded-[40px] bg-white p-20 grid gap-y-4 shadow-xl">
            <div class="grid">
                <div class="font-roboto text-2xl font-semibold">GET IN TOUCH</div>
                <div class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                    tellus, luctus nec ullamcorper mattis,
                    pulvinar dapibus leo.
                </div>
            </div>
            <form action="" class="flex-col grid gap-y-6">
                <div>
                    <div class="grid grid-cols-2 justify-between gap-x-16 gap-y-4">
                        <input type="text"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='First Name'>
                        <input type="text"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='Last Name'>
                        <input type="text"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='Email Address'>
                        <input type="text"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='Subject'>
                    </div>
                </div>
                <textarea name="" id="" cols="30" rows="4" class="rounded-[30px] border border-gray-300
                 focus:border-gray-300 focus:ring-black p-5 placeholder-gray-300 text-sm"
                          placeholder='Comments/Questions'></textarea>
                <button
                    class="bg-[#3F8462] w-1/5 h-[3.5rem] rounded-[30px] text-white font-roboto duration-300 hover:bg-[#F2A766] hover:scale-90 hover:duration-300 hover:shadow-lg hover:shadow-gray-200">
                    Send Message
                </button>
            </form>
        </div>
    </div>

    <div class="border-b-2 border-gray-200 w-11/12 mx-auto"></div>

    <div class="max-w-7xl mx-auto mt-10">
        <span class="text-5xl font-gab font-semibold">STAY CONNECTED</span>
    </div>

    <!-- Contact -->

    <div class="flex justify-between max-w-7xl mx-auto my-16 h-[40rem]">
        <div class="flex-col flex w-6/12 border border-lg justify-center items-center bg-pink-50 rounded-lg mr-8">

            <div class="text-4xl font-semibold my-5 flex-col flex gap-5 mx-10">
                <span class="font-roboto text-[#081E40]">Get Connected</span>
                <span class="text-lg tracking-wider text-teal-700">We've got the solutions to take your business to the next level.</span>
            </div>


            <!-- Email -->

            <div class="my-3 inline-flex mx-auto w-full">
                <div
                    class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center mx-10">
                    <x-icons.icon-fill :iconfill="'mail1'" :colour="'#3F8462'" class="w-8 h-8"/>
                </div>
                <div class="my-3 bg-alice-blue">
                    <div class="text-md text-teal-600 tracking-wider font-nunito">aaranassociates@email.com</div>
                </div>
            </div>

            <!-- Phone -->

            <div class="my-3 inline-flex mx-auto w-full">
                <div
                    class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center mx-10">
                    <x-icons.icon-fill :iconfill="'phone-call'" :colour="'#3F8462'" class="w-8 h-8"/>
                </div>
                <div class="my-3">
                    <div class="w-72 text-md text-teal-600 font-nunito">+91 9655227738</div>
                </div>
            </div>

            <!-- Address -->
            <div class="my-3 inline-flex mx-auto w-full">
                <div
                    class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center mx-10">
                    <x-icons.icon-fill :iconfill="'location-3'" :colour="'#3F8462'" class="w-8 h-8"/>
                </div>
                <div class="">
                    <div class="w-72 leading-loose text-md tracking-wider text-teal-600 font-nunito">10-A Venkatappa
                        Gounder Street,Tiruppur-641654, TamilNadu,
                    </div>
                </div>
            </div>

            <!-- Icon -->
            <div class="inline-flex gap-5 my-4 mx-auto w-10/12">
                <span class="h-10 w-10 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center"><x-icons.icon-fill
                        :iconfill="'twitter1'" :colour="'#081E40'"/></span>
                <span class="h-10 w-10 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center"><x-icons.icon-fill
                        :iconfill="'facebook-fill'" :colour="'#081E40'"/></span>
                <span class="h-10 w-10 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center"><x-icons.icon-fill
                        :iconfill="'git-hub'" :colour="'#081E40'"/></span>
                <span class="h-10 w-10 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center"><x-icons.icon-fill
                        :iconfill="'phone1'" :colour="'#081E40'"/></span>
            </div>
        </div>

        <!-- Google Map -->

        <div class="border-l-2 border-gray-200"></div>

        <div class="w-6/12 shadow-xl mx-8 bg-alice-blue border border-gray-300 rounded-xl">
            <section class="h-[35rem] my-5">
                <div class="container mx-auto px-4">


                    <!-- Responsive Google Map -->
                    <div class="relative h-[35rem] overflow-hidden mb-6" style="padding-bottom: 56.25%;">

                        <iframe
                            class="absolute top-0 left-0 w-full h-[35rem]"
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d978.7001772786659!2d77.34018426961973!3d11.128215315204342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTHCsDA3JzQxLjYiTiA3N8KwMjAnMjcuMCJF!5e0!3m2!1sen!2sus!4v1719294872012!5m2!1sen!2sus"
                            frameborder="0"
                            style="border:0;"
                            allowfullscreen=""
                            aria-hidden="false"
                            tabindex="0"
                        ></iframe>
                    </div>

                    <!-- Additional contact details or a contact form can be added here -->
                </div>
            </section>
        </div>


    </div>
</div>
