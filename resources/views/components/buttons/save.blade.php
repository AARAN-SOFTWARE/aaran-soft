@props(['vid'])
<div>
    <button wire:click="goSubmit" class='w-36 font-extrabold
            bg-green-600 hover:bg-green-500  border-b-4 border-green-700 hover:border-green-700
            focus:outline-none text-white  uppercase shadow-md rounded-lg p-2'>
        <div class="flex gap-4  justify-center">
            <x-icons.icon icon="save" class="h-7 w-auto block"/>
            <div class="pt-1.5">
                @if($vid)
                    UPDATE
                @else
                    SAVE
                @endif

            </div>
        </div>
    </button>
</div>
