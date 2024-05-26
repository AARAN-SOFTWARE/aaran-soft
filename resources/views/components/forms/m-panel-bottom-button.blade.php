@props([
    'save'=>false,
    'back'=>false,
    'print'=>false,
    'active'=>false

])
<div class="px-8 border border-gray-400 border-t-0 bg-gray-100 rounded-b-md shadow-lg w-full">
    <div class="flex flex-row justify-between py-4">
        <div class="flex gap-3">
            @if($save)

                <x-button.save/>
            @endif
            @if($back)

                <x-button.back/>
            @endif
        </div>
        <div>
            @if($print)
                <x-button.print/>
            @endif
        </div>
        <div>
            @if($active)
                <x-button.active/>
            @endif
        </div>
    </div>
</div>
