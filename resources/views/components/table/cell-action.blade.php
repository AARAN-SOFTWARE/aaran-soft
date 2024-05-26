@props([
    'id'=>null
])
<div>
<td class='px-2 py-2 border border-gray-200 whitespace-no-wrap text-sm leading-2 text-gray-900'>
    <div class="w-full flex justify-center gap-3">
        <x-table.edit wire:click="edit({{ $id }})"/>
        <x-table.delete wire:click="getDelete({{ $id }})"/>
    </div>
</td>
</div>
