<div>
    <div class="h-[40rem] w-full mx-auto">
        <div class="flex flex-col">

            <div style="background-image: url('/../../../images/index_assets/banner2.jpg');"
                 class="h-[40rem] w-full">

                <div class="mt-32 w-2/3 h-64 mx-auto">
                    <h5 class="text-7xl tracking-wider text-gray-800 ">Get In Touch</h5>
                    <h3 class="mt-8 text-8xl font-bold text-blue-950 hover:text-blue-600">Contact</h3>
                    <p class="text-2xl my-8 tracking-wider">Making your business vision come true with our deep <br>
                        operational & implementation expertise.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="h-[40rem] mt-48 w-3/4 mx-auto ">
        <div class="grid grid-cols-2 mt-24 mx-10">

            <div class="w-full border-r-2 border-gray-200">
                <div class="">
                    <h5 class="text-3xl my-5">Get in Touch</h5>
                    <h2 class="text-5xl">Contact Details</h2>

                </div>

                <div class="grid grid-cols-2 mt-8">

                    <div class="flex flex-row mt-10">
                        <div class="h-14 w-14 rounded-xl bg-purple-600">
                            <x-icons.icon :icon="'phone'"
                                          class="w-14 h-14 text-white"/>
                        </div>

                        <div class="">
                            <h4 class="text-2xl ml-5 tracking-wider mb-1"> Phone Numbers </h4>
                            <div class="text-lg ml-5 tracking-wider"> +91 9655227738<br> +91 9655227738
                            </div>
                        </div>
                    </div>

                    <div class="ml-5 ">
                        <div class="flex flex-row mt-10">
                            <div class="h-14 w-14 rounded-xl bg-purple-600">
                                <x-icons.icon :icon="'mail'"
                                              class="w-14 h-14 text-white"/>
                            </div>

                            <div class="">
                                <h4 class="text-2xl ml-5 tracking-wider mb-1"> EMail </h4>
                                <div class="text-sm font-bold ml-5 "> aaransoftware@gmail.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex flex-row mt-16">
                        <div class="h-14 w-14 rounded-xl bg-purple-600">
                            <x-icons.icon :icon="'location'"
                                          class="text-white ml-2 mt-2 w-14 h-14 "/>
                        </div>

                        <div class="ml-5">
                            <h4 class="text-2xl tracking-wider"> Location </h4>
                            <p class="tracking-wider mt-2">
                                10-A Venkatappa Gounder Street<br>
                                Tiruppur,641654.<br>
                                TamilNadu. <br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="text-4xl">
                        Follow Us
                    </div>

                    <div class="flex h-32 mt-3 gap-x-4">

                        <div class="rounded-3xl ">
                            <x-icons.icon-fill :iconfill="'facebook-fill'" :colour="'#8B5CF6'"/>
                        </div>

                        <div>
                            <x-icons.icon-fill :iconfill="'twitter1'" class="w-8 h-8" :colour="'#8B5CF6'"/>
                        </div>

                        <div>
                            <x-icons.icon-fill :iconfill="'git-hub'" class="w-8 h-8" :colour="'#8B5CF6'"/>
                        </div>

                        <div>
                            <x-icons.icon-fill :iconfill="'phone1'" class="w-9 h-9" :colour="'#8B5CF6'"/>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-full mx-32 rounded-2xl bg-zinc-100">
                <div class="mx-10">
                    <h5 class="text-3xl my-5">Free Estimation</h5>
                    <h2 class="text-5xl">Contact Us</h2>
                </div>

                <form>
                    <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                        <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>

                        <div>
                            <div class="flex w-[35rem]">
                                <div class="w-1/2 px-2 mb-5">
                                    <label for="" class="text-lg px-1">First name</label>
                                    <div class="flex">
                                        <div
                                            class="w-12 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text"
                                               class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                               placeholder="John">
                                    </div>
                                </div>

                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-lg px-1">Last name</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text"
                                               class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                               placeholder="Smith">
                                    </div>
                                </div>
                            </div>

                            <div class="flex w-[35rem]">
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-lg px-1">Email</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                        <input type="email"
                                               class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                               placeholder="johnsmith@example.com">
                                    </div>
                                </div>

                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-lg px-1">Subject</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-note-outline text-gray-400 text-lg"></i></div>
                                        <input type="text"
                                               class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                               placeholder="Purpose">
                                    </div>
                                </div>

                            </div>

                            <div class="flex  w-[35rem]">
                                <div class="w-2/3 px-3 mb-12">
                                    <label for="" class="text-lg px-1">Message</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        </div>
                                        <textarea
                                            class="w-full -ml-10 pl-2 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="flex mx-5 ">
                                <div class="w-full mb-5">
                                    <button
                                        class="block w-48 bg-purple-700 hover:bg-purple-800 focus:bg-purple-800 text-white rounded-lg px-3 py-3 font-semibold">
                                        REGISTER NOW
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="bg-alice-blue py-12 mt-16 h-[40rem]">
        <div class="container mx-auto px-4">


            <!-- Responsive Google Map -->
            <div class="relative h-0 overflow-hidden mb-6" style="padding-bottom: 56.25%;">

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

    <div class="bg-bubble flex max-w-7xl mx-auto h-[25rem] my-10">

        <div class="w-full">&nbsp;
            <div class="">
                <div>
                    <a href="{{route('home')}}" class="flex items-center">
                        <div class="p-1 lg:p-3 rounded py-3">
                            <x-assets.logo.cxlogo :icon="'light'" class="h-9 ml-4 mx-auto w-auto block"/>
                        </div>
                        <span
                            class="self-center text-3xl font-semibold whitespace-nowrap px-2 -mt-2 font-Don tracking-wider">CODEXSUN</span>
                    </a>
                </div>

                <div class="flex flex-row mt-2 ml-5">
                    <div>
                        <x-icons.icon :icon="'location'"
                                      class="text-gray-700 ml-2 mt-2 w-8 h-8"/>
                    </div>

                    <div>
                        <p class="tracking-wider mt-1 text-gray-700 text-lg font-Don">
                            10-A Venkatappa Gounder Street<br>
                            Tiruppur,641654.<br>
                            TamilNadu. <br>
                        </p>
                    </div>
                </div>

            </div>


            <div class="flex mt-4 gap-x-4 ml-14">
                <x-icons.icon-fill :iconfill="'twitter1'" class="w-5 h-5" :colour="'#8B5CF6'"/>
                <x-icons.icon-fill :iconfill="'facebook-fill'" class="w-5 h-5" :colour="'#8B5CF6'"/>
                <x-icons.icon-fill :iconfill="'git-hub'" class="w-5 h-5" :colour="'#8B5CF6'"/>
                <x-icons.icon-fill :iconfill="'phone1'" class="w-5 h-5" :colour="'#8B5CF6'"/>
            </div>
        </div>


        <div class="w-full ml-16 mt-2">&nbsp;
            <div>
                <h5 class="text-4xl text-blue-950">Quick Link
                </h5>
            </div>

            <div class="mt-3 flex flex-col gap-y-3 ml-2">
                <h2 class="tracking-wider">Home</h2>
                <h2 class="tracking-wider">About Us</h2>
                <h2 class="tracking-wider">Services</h2>
                <h2 class="tracking-wider">Privacy Policy</h2>
                <h2 class="tracking-wider">Blog</h2>
            </div>
        </div>

        <div class="w-full mt-2 pl-2 mr-28">&nbsp;
            <div>
                <h5 class="text-4xl">Services</h5>
            </div>

            <div class="mt-3 flex flex-col gap-y-3 ml-2">
                <h2 class="tracking-wider">Web Design</h2>
                <h2 class="tracking-wider">Web Development</h2>
                <h2 class="tracking-wider">Product Management</h2>
                <h2 class="tracking-wider">Marketing</h2>
            </div>
        </div>

        <div class="w-full mt-2 mr-24">&nbsp;
            <div class="text-2xl">
                <h6>Join Our Newsletter</h6>
            </div>

            <div>
                <form action="#">
                    <div class="mt-5 ml-1 relative">

                        <input type="email" placeholder="yourmail@example.com"
                               class="flex-1 appearance-none text-sm rounded shadow p-3 text-grey-dark mr-2 focus:outline-none">

                        <div class="absolute top-0 right-0 inline-flex items-center p-4 mr-2">
                            <x-icons.icon :icon="'mail'" class="w-4 h-4"/>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>


</div>
