@props([
'label'=>''

])

<div class="flex flex-col sm:flex-row gap-1 sm:gap-3">
    <label for="{{$label}}"
           class="w-[10rem] text-zinc-500 tracking-wide py-2">{{ Str::replace('_',' ',Str::ucfirst($label))}}</label>
    <input id="{{$label}}" autocomplete="off" {{ $attributes }} type="date"
    value="{{ old('label') }}" class="w-full purple-textbox"
    />
</div>
