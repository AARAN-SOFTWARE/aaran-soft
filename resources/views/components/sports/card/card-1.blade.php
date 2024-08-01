@props([
    'clubImage'=>null
])
@foreach($clubImage as $row)
    <div class=" md:h-80 h-56 bg-white rounded-xl flex-col">
        <img src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->club_image))}}" alt="" class="w-full h-4/6 rounded-t-xl">
        <div class="w-full h-1/6 capitalize text-justify text-sm font-semibold border-b border-gray-300 p-2">{{\Illuminate\Support\Str::words($row->title, 15)}}</div>
        <div class="h-1/6 md:text-xs text-[10px] text-gray-400 flex items-center p-2">{{$row->created_at}}</div>
    </div>
@endforeach

