<div>
    <select wire:model="acyear" wire:change="changeAcyear" class="purple-textbox w-[10rem]">
        <option class="text-gray-400"> choose ..</option>
        @foreach(\App\Enums\AcYear::cases() as $year)
            <option value="{{$year->value}}">{{$year->getName()}}</option>
        @endforeach
    </select>
</div>
