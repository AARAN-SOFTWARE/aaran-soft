<div>
    <div class="h-[17rem]] w-full mx-auto">
        <div class="flex flex-col">
            <div class="h-16 w-full flex-col flex justify-center items-center bg-[#081E40]">
                <div class="text-2xl w-9/12 text-white font-gab tracking-wider">Contact Us</div>
            </div>
        </div>
    </div>

    <div class="w-6/12 mx-auto flex justify-between my-6">

        <!---- address --------------------------------------------------------------------------------------------->

        <div class="w-1/3 h-[22rem] flex-col  flex justify-center">
            <div class="my-2 font-roboto tracking-wider text-[12px] leading-loose">
                <div class="font-gab mb-2 text-[14px] font-semibold">SPORTS CLUB</div>
                <div class="inline-flex items-center"><span class="text-gray-600">Reg.No.</span> <span
                        class="text-black">82/1996</span></div>
                <div class=""><span class="text-gray-600">Address:</span><span class=""> S.F.No. 652/2 E,</span></div>
                <div>Kulathupalayam,Veerapandi Post</div>
                <div>Tirupur – 641 605.</div>
            </div>

            <!---- contact --------------------------------------------------------------------------------------------->
            <div class="flex-col my-2 font-roboto tracking-wider text-[12px] leading-loose">
                <div class="font-gab mb-2 text-[14px] font-semibold">Contact :</div>
                <div class=""><span class="text-gray-600">Manager:</span><span class=""> 86438 13508</span></div>
                <div class=""><span class="text-gray-600">Secretary:</span><span class=""> 93455 41369</span></div>
                <div class=""><span class="text-gray-600">Joint Secretary:</span><span class=""> 94886 60000</span>
                </div>
                <div class=""><span class="text-gray-600">Treasurer:</span><span class=""> 94898 80088</span></div>
                <div class=""><span class="text-gray-600">Email:</span><span class=""> sportsclub@gmail.com</span></div>
                <div class=""><span class="text-gray-600">Visit us:</span><span class=""> www.sportsclub.com</span>
                </div>
            </div>
        </div>

        <div class="w-2/3 h-[22rem] items-center">
            <!-- Responsive Google Map ------------------------------------------------------------------------------->
            <div class="relative h-full  overflow-hidden" style="padding-bottom: 56.25%;">

                <iframe
                    class="absolute w-full h-full p-4"
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
    </div>

    <!---- subscription --------------------------------------------------------------------------------------------->

    <div class="w-6/12 mx-auto flex flex-col items-center py-4 mb-4">
        <div class="font-roboto text-2xl font-semibold my-2">GET IN TOUCH</div>
        <div class="my-2 text-sm font-semibold mb-6 font-nunito tracking-wider">Through this form send us message if you
            have another query.
        </div>

        <div class="w-full flex gap-5 justify-between">
            <input type="text" wire:model="vname" class="w-2/6 border-gray-200" placeholder="Your Name">
            <input type="text" wire:model="email" class="w-2/6 border-gray-200" placeholder="Your Email">
            <input type="text" wire:model="phone" class="w-2/6 border-gray-200" placeholder="Your Phone Number">
        </div>

        <div class="my-5 w-full  ">
            <textarea name="" wire:model="message" class="border-gray-200" id="" cols="80" rows="8" placeholder="Your Message"></textarea>
        </div>

        <div class="w-32 h-10 bg-[#19398A] mt-8">
            <button wire:click="getSave" class="w-full font-lexanddeca font-semibold tracking-wider text-white text-center p-2">SEND</button>
        </div>
    </div>
</div>
