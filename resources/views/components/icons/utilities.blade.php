@props([
'icon' => 'wifi'
])

<div>
    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"
            onclick="copyToClipboard('{{$icon}}')">
        <x-icons.icon :icon="$icon" class="block w-16 h-auto  grid-rows-1  ml-5 mt-6"/>
        <h5 class="mt-6">{{$icon}}</h5>
    </button>
</div>
