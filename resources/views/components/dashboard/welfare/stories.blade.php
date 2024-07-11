@props([
    'users'
])
<div class=" mx-auto mt-8 font-semibold font-roboto">
    <div class="text-xl">Stories</div>
</div>
<div class=" mx-auto mt-3 flex font-roboto">

    <div class="flex-col justify-center text-center">
        <div class="w-12 h-12 bg-gray-200 rounded-full flex justify-evenly mb-1 outline outline-4 outline-offset-4 outline-gray-300">
            <button wire:click="create" class="flex justify-evenly">
                <x-icons.icon icon="plus-slim" class="w-6 h-6 flex text-black"/>
            </button>
        </div>
        <div class="text-center text-xs mt-3">new</div>
    </div>
    @foreach($users as $user)
        <button wire:click="filterUser({{$user->id}})" class="text-center pl-8">
            <div class="flex-col flex justify-items-center text-center ">
                <div class="w-12 h-12 bg-gray-200 rounded-full flex justify-evenly mb-1">
                    <img src="{{$user->profile_photo_url}}" alt=""
                         class="outline outline-4 outline-offset-4 outline-gray-300 rounded-full">
                </div>
                <div class="text-center text-xs mt-2">{{$user->name}}</div>
            </div>
        </button>
    @endforeach
</div>
