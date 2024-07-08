@props([
    'users'
])
<div>
    <div class="w-[90%] mx-auto mt-8 font-semibold font-roboto">
        <div>Highlights</div>
    </div>
    <div class="w-[90%] mx-auto mt-3 flex justify-between font-roboto">
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
</div>


