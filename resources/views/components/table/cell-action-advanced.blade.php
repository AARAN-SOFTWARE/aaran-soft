@props([
    'id'=>null,
    'routes'

])
<div>
<td class='px-2 py-2 border border-gray-200 whitespace-no-wrap text-sm leading-2 text-gray-900'>
    <div class="w-full flex justify-center gap-3">
        <a href="{{ route($routes,$id) }}">
            <div
                class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                <div class="flex flex-col justify-start items-center -translate-y-full">
                    <div
                        class="bg-blue-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                        Edit
                    </div>
                    <div
                        class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-blue-500 -mt-[1px]"></div>
                </div>
            </div>
            <x-button.link>&nbsp;
                <x-icons.icon :icon="'pencil'"
                              class="text-blue-500 hover:text-white  hover:rounded-sm hover:bg-blue-500 h-5 w-auto block"/>
            </x-button.link>
        </a>
        <x-table.delete wire:click="getDelete({{ $id }})"/>
    </div>
</td>
</div>
