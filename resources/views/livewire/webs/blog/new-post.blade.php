<div>
    <h class="text-2xl font-extrabold mt-8">Create Blog</h>
    <x-input.model-text wire:model="title" :label="'Title'"/>
    <x-input.model-text wire:model="body"  :label="'Content'"/>
    <div class="px-5 py-2 gap-4 bg-gray-100 rounded-b-md shadow-lg w-full ">

        <div class="flex flex-col md:flex-row justify-between gap-3 mt-5 mb-0">

            <div class="flex gap-3">
                <x-button.save/>
                <x-button.back/>
            </div>
</div>
