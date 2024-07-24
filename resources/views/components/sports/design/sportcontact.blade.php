<div class="">
    <!-- header -->
    <div style="background-image: url('/../../../images/ui-pic/sample-1.png')"
         class="h-[25rem] w-full bg-[#F7FAF9] bg-contain bg-no-repeat bg-right flex-col flex justify-center items-center">

        <div class="w-8/12 mx-auto font-roboto grid gap-y-8">
            <div class="flex gap-6 text-7xl font-semibold">
                <span>Contact</span><span class="text-[#FFAF11]">Us</span>
            </div>

            <div class="text-gray-600 w-6/12 text-xl font-semibold my-2 tracking-wider justify-center leading-relaxed">
                Strong relationships start with strong interactions.
                Our customer service solution lets you personalise customer
                experiences, building loyalty and revenue.
            </div>

            <div class="flex flex-col gap-5">

                <div class="inline-flex gap-3">
                    <div>
                        <x-icons.icon-fill :iconfill="'phone-call'" :colour="'#3F8462'" class="w-6 h-6"/>
                    </div>
                    <div class="">+91 9655227738</div>
                </div>

                <div class="inline-flex gap-3">
                    <div>
                        <x-icons.icon-fill :iconfill="'mail1'" :colour="'#3F8462'" class="w-6 h-6"/>
                    </div>
                    <div class="">aaranassociates@email.com</div>
                </div>

            </div>
        </div>
    </div>

    <!-- contact  -->
    <div class="flex justify-between w-8/12 mx-auto my-32 pb-24 border-b border-gray-300">
        <div class="flex-col flex items-center text-center">
            <div class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center">
                <x-icons.icon-fill :iconfill="'mail1'" :colour="'#3F8462'" class="w-8 h-8"/>
            </div>
            <div class="my-3">
                <div class="font-semibold text-xl">Email</div>
                <div class="w-72 text-md tracking-wide my-2">Send us mail and an ambassador will respond</div>
            </div>
        </div>

        <div class="border-l border-gray-200"></div>
        <div class="flex-col flex items-center text-center ">
            <div class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center">
                <x-icons.icon-fill :iconfill="'location-3'" :colour="'#FFAF11'" class="w-8 h-8"/>
            </div>
            <div class="my-3">
                <div class="font-semibold text-xl">Address</div>
                <div class="w-72 text-md tracking-wide my-2 leading-relaxed">10-A Venkatappa Gounder Street,
                    Tiruppur-641654, TamilNadu,
                </div>
            </div>
        </div>

        <div class="border-l border-gray-200"></div>
        <div class="flex-col flex items-center text-center">
            <div class="h-14 w-14 rounded-xl border border-gray-300 shadow-xl flex justify-center items-center">
                <x-icons.icon-fill :iconfill="'phone-call'" :colour="'#3F8462'" class="w-8 h-8"/>
            </div>
            <div class="my-3">
                <div class="font-semibold text-xl">Phone</div>
                <div class="w-60 text-md tracking-wide my-2">Call us today and get your further information.</div>
            </div>
        </div>
    </div>


    <!-- Form -->
    <div class="z-10 w-8/12 h-[55rem] mx-auto rounded-[40px] p-24 bg-contain bg-no-repeat mt-24"
         style="background-image: url('/../../../images/ui-pic/sample-3.png')">
        <div class="w-full h-full rounded-[40px] bg-white p-20 grid gap-y-4 shadow-xl">
            <div class="grid">
                <div class="font-roboto text-2xl font-semibold">GET IN TOUCH</div>
                <div class="text-md text-gray-600">Want to get in touch? We'd love to hear from you. Here's how you can
                    reach us.
                </div>
            </div>

            <form action="" class="flex-col grid gap-y-6">
                <div>
                    <div class="grid grid-cols-2 justify-between gap-x-16 gap-y-4">
                        <input type="text" wire:model="vname"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='First Name'>
                        <input type="text" wire:model="vname_2"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='Last Name'>
                        <input type="text" wire:model="email"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='Email Address'>
                        <input type="text" wire:model="subject"
                               class=" h-16 border border-gray-300 rounded-full focus:border-gray-300 focus:ring-black placeholder-gray-300 text-sm px-5"
                               placeholder='Subject'>
                    </div>
                </div>
                <textarea name="" wire:model="message" id="" cols="30" rows="4" class="rounded-[30px] border border-gray-300
                 focus:border-gray-300 focus:ring-black p-5 placeholder-gray-300 text-sm"
                          placeholder='Comments/Questions'></textarea>
                <button wire:click="getSave"
                        class="bg-[#3F8462] w-1/5 h-[3.5rem] rounded-[30px] text-white font-roboto duration-300 hover:bg-[#F2A766] hover:scale-90 hover:duration-300 hover:shadow-lg hover:shadow-gray-200">
                    Send Message
                </button>
            </form>
        </div>
    </div>
    <div class="w-8/12 mx-auto border-b border-gray-300 mb-24"></div>

    <!-- Location -->
    <div class="w-8/12 mx-auto mt-10">
        <div class="w-10/12 mx-auto text-4xl font-roboto font-semibold flex gap-3"><span>CONNECT WITH</span>
            <span class="text-[#FFAF11]">OUR GLOBAL OFFICE </span></div>
    </div>

    <!-- Map -->

    <div class=" w-8/12 mx-auto my-16 h-[40rem]">
        <div class="w-10/12 mx-auto shadow-xl bg-alice-blue border border-gray-300 rounded-xl">
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
