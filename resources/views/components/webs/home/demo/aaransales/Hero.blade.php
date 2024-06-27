<div>
    <div class="flex flex-row h-screen max-w-7xl mx-auto">
        <div class="w-full h-screen flex items-center ">

            <div class="flex flex-col mx-auto gap-y-8 ">

                <div>
                    <p class="text-3xl tracking-wider text-gray-500 font-bold mb-4">GST Billing Software</p>

                    <p class="text-5xl font-Don leading-snug font-bold tracking-wider">
                        Simplifying Billing for Your business
                    </p>
                </div>

                <div class="flex flex-col gap-y-3">
                    <div class="flex flex-row">
                        <x-icons.icon :icon="'right-long-arrow'" class="w-4 h-4" />
                        <p class="ml-3 tracking-wider font-bold text-lg text-gray-500">Make professional GST invoices </p>
                    </div>

                    <div class="flex flex-row">
                        <x-icons.icon :icon="'right-long-arrow'" class="w-4 h-4" />
                        <p class="ml-3 tracking-wider font-bold text-lg text-gray-500">Create invoices anywhere on mobile app or computer</p>
                    </div>

                    <div class="flex flex-row">
                        <x-icons.icon :icon="'right-long-arrow'" class="w-4 h-4" />
                        <p class="ml-3 tracking-wider font-bold text-lg text-gray-500">Generate e-way bills and e-invoices with 1-click</p>
                    </div>

                </div>

                <button class="bg-purple-700 w-[15rem] rounded-xl px-3 py-3 text-xl tracking-wider text-white">
                    Get Started
                </button>

            </div>
        </div>

        <div class="w-full  p-5 h-screen flex items-center">
            <x-storyset.data-extraction-rafiki/>
        </div>
    </div>
</div>
