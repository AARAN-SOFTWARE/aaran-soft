<div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 p-3">
        <div class="py-5">
            <x-assets.logo.cxlogo :icon="'light'" class="h-20 ml-4 mx-auto w-auto  block"/>
        </div>
        <div class="px-6 py-8 bg-white shadow-md rounded-xl w-full sm:max-w-2xl">

            <form type="submit">
                <x-input.model-text wire:model="company_name" :label="'Company Name'"/>
                @error('company_name')<span class="text-red-500">{{$message}}</span>@enderror
                <x-input.model-text wire:model="contact_person" :label="'Contact Person'"/>
                @error('contact_person')<span class="text-red-500">{{$message}}</span>@enderror
                <x-input.model-text wire:model="email" :label="'Email'"/>
                <x-input.model-text wire:model="mobile" :label="'Mobile No'"/>

                <div class="flex items-center justify-end mt-4">
                    <button wire:click.prevent="getSave" class="inline-block text-white transition-all rounded-md shadow-md
                bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                shadow-blue-200 hover:shadow-2xl hover:shadow-blue-400 hover:-tranneutral-y-px p-2">Book Demo
                    </button>
                </div>

            </form>

            @session('message')
            <p class="text-green-600 text-lg font-bold italic tracking-wide mt-2 rounded-xl text-justify py-5 bg-green-50 px-3 animate__animated animate__bounce">
                Hi {{$contact_person}}, Thank you for requesting a demo of CODEXSUN! We're excited to show you how our
                solution can support your business goals. We look forward to
                demonstrating to our team and answering any questions you may have.
            </p>
            @endsession
        </div>



    </div>
</div>

