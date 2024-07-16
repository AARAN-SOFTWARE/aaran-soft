@props([
    'clubImage'=>null
])
@foreach($clubImage as $row)
    <div class="w-72 h-80 bg-white rounded-xl flex-col">
        <img src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->club_image))}}" alt="" class="w-full h-3/5 rounded-xl">
        <div class="w-full h=1/5 text-justify text-sm p-2.5 font-semibold border-b border-gray-300">{{$row->title}}</div>
        <div class="h-1/5 text-xs text-gray-400 flex items-center p-2 ">{{$row->created_at}}</div>
    </div>
@endforeach

