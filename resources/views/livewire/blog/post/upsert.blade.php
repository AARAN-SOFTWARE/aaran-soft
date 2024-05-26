<div class="p-12 bg-neutral-200">
    <div class=" bg-white  rounded-lg sm:px-6 p-10 lg:px-8  space-y-4">
        @if($id==0)
            <h1 class="text-center font-extrabold text-4xl text-green-800">Create Your Blog</h1>
        @else
            <h1 class="text-center font-extrabold text-4xl text-blue-700">Edit Your Blog</h1>
        @endif

        <div class="gap-2 ">
            <label for="title">Title</label>
            <input wire:model="title" id="title" class="w-full purple-textbox">
        </div>

        <div class="gap-5">
            <label for="body">Body</label>
            <x-input.rich-text wire:model="body" :height="'h-96'" :placeholder="''"/>
        </div>

        <div class=" flex-items-center pt-2">
            <label class="w-[10rem] text-zinc-500 tracking-wide py-2">Image</label>
            <div class="flex-shrink-0 h-80 w-80 mr-4">
                @if($image)
                    Photo Preview:
                    <img
                        src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}"
                        width="250" height="250">
                @endif
            </div>

            <div>
                <input type="file" wire:model="image" class="">
                <button wire:click.prevent="save_image"></button>
            </div>
        </div>

        <div class="flex gap-2">
            <div class="text-end">
                <x-button.save wire:click.prevent="save" class=""/>
                <x-button.back/>
            </div>

            <div>
                @if($id!=0)
                    <button wire:click="set_delete({{$id}})" wire:confirm="Are you sure you want to delete this ?"
                            class='inline-flex items-center px-2 py-2 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest
                               focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150
                               focus:ring-red-500 bg-red-600 hover:bg-red-500 active:bg-red-700 border-red-600'>&nbsp;
                        <x-icons.icon :icon="'trash'"
                                      class="h-5 w-auto block px-1.5"/>&nbsp;Delete
                    </button>
                @endif</div>
        </div>
    </div>
</div>


