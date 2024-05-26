<div>
    <button {{ $attributes}} type='button'>
        <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
            <div class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                <div class="flex flex-col justify-start items-center -translate-y-full">
                    <div class="bg-red-500  shadow-md text-white rounded-lg py-0.5 px-2 cursor-default text-xs">
                        delete
                    </div>
                    <div class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-red-500 -mt-[1px]"></div>
                </div>
            </div>
            <span>
             <x-icons.icon :icon="'trash'"
                           class="text-red-500 h-6 px-0.5 py-0.5 "/>
            </span>
        </div>
    </button>
</div>
