<div>
    <x-slot name="header">
        Review
    </x-slot>
    <x-forms.m-panel>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center> Filename</x-table.header-text>
                <x-table.header-text center>Task</x-table.header-text>
                <x-table.header-text center>Completed</x-table.header-text>
            </x-slot>
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ Aaran\Developer\Models\ReviewList::reviewList($row->review_filename_id) }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ Aaran\Developer\Models\ReviewList::reviewTask($row->task_review_id)}}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            @if($row->completed)
                                <input wire:click="toggle({{ $row->id }})" type="checkbox"
                                       class="rounded size-4 mr-3" checked>
                            @else
                                <input wire:click="toggle({{ $row->id }})" type="checkbox"
                                       class="rounded size-4 mr-3">
                            @endif
                        </x-table.cell-text>

                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>
        </x-forms.table>
    </x-forms.m-panel>
    <div class=" mt-5 mr-5 w-52 float-right">
        <label for="changeStatus" class="w-[8rem] text-zinc-500 tracking-wide py-2 hidden">Under</label>
        <select wire:model="changeStatus" class="w-full purple-textbox" id="changeStatus">
            <option class="text-zinc-500 px-1">Status...</option>
            @foreach(\App\Enums\Status::cases() as $obj)
                <option value="{{$obj->value}}">{{ $obj->getName() }}</option>
            @endforeach
        </select>
        <div class="flex flex-row gap-10">
            @error('changeStatus')
            <span class="text-red-500">{{  'Choose any one and update' }}</span>
            @enderror

            <button wire:click.prevent="updateStatus" class="text-sm text-white bg-green-600 px-4 py-2 font-bold rounded  mt-5 ml-5">Update</button>

        </div>
    </div>
</div>
