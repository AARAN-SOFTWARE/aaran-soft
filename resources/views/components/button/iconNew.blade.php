<button wire:click="create" class="h-5 w-5 mt-0.5 rounded-full bg-green-600">
    <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
        <div class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
            <div class="flex flex-col justify-start items-center -translate-y-full">
                <div class="bg-green-600  shadow-md text-white rounded-lg py-0.5 px-2 cursor-default text-xs">
                    new
                </div>
                <div class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-green-600 -mt-[1px]"></div>
            </div>
        </div>
        <span>
             <x-icons.icon :icon="'plus-slim'" class="text-white w-5 h-5 px-0.5 py-0.5"/>
        </span>
    </div>
</button>
