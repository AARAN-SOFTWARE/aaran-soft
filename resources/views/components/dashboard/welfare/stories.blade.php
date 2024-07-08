@props([
    'users'
])
<div class=" mx-auto mt-8 font-semibold font-roboto">
    <div class="text-xl">Stories</div>
</div>
<div class=" mx-auto mt-3 flex gap-6 font-roboto">

    <div class="flex-col justify-center text-center">
        <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-evenly">
            <button wire:click="create" class="flex justify-evenly"><x-icons.icon icon="plus-slim"  class="w-6 h-6 flex text-black" /></button>
        </div>
        <div>new</div>
    </div>
    @foreach($users as $user)
        <div class="flex-col justify-center text-center">
            <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-evenly">
                <img src="{{$user->profile_photo_url}}" alt="" class="outline outline-2 outline-offset-2 outline-gray-400 rounded-full">
            </div>
            <div>{{$user->name}}</div>
        </div>
    @endforeach
</div>
