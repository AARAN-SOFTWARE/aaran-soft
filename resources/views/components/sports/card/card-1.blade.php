@props([
    'clubImage'=>null
])
@foreach($clubImage as $row)
    <div class="w-72 h-80 bg-white rounded-xl flex-col">
        <img src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->club_image))}}" alt="" class="w-full h-4/6 rounded-xl">
        <div class="w-full h-1/6 text-justify text-sm font-semibold border-b border-gray-300 p-2">{{\Illuminate\Support\Str::words($row->title, 15)}}</div>
        <div class="h-1/6 text-xs text-gray-400 flex items-center p-2">{{$row->created_at}}</div>
    </div>
@endforeach

