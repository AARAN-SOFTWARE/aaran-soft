@props([
    "image"=>null,
])
<div class="w-9/12 h-[31rem] mx-auto flex-col flex justify-center gap-y-5">
    <div class="font-gab text-3xl font-semibold">Achievements</div>
    <div class="flex justify-between">
        @foreach($image as $row)
            <div style="background-image: url('/../../../storage/images/{{$row->image}}')"
                 class="w-96 h-96 bg-no-repeat bg-cover bg-center rounded-xl flex-col flex justify-end">
                <div class=" bg-gradient-to-t from-black to-gray-400/25 text-white flex-col p-5 rounded-b-lg">
                    <div class="font-bebas text-2xl tracking-wider">{{$row->vname}}</div>
                    <div class="font-roboto">{{ \Illuminate\Support\Str::words( $row->desc,15)}}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
