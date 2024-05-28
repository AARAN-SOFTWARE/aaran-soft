<div>
    <x-slot name="header">Sales Month</x-slot>
    <x-forms.m-panel>

        <div class="text-right w-full ">
            <div class=" gap-3 inline-flex">

                <x-input.model-select wire:model="year" wire:change="getList" :label="'Year'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach(\App\Enums\Years::cases() as $year)
                        <option value="{{$year->getName()}}">{{$year->getName()}}</option>
                    @endforeach
                </x-input.model-select>

                <button wire:click="generate" class="text-white bg-red-500 p-2 my-4 rounded-md">Generate</button>
                <x-button.new/>
            </div>
        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Month</x-table.header-text>
                <x-table.header-text center>Year</x-table.header-text>
                <x-table.header-action/>
            </x-slot>
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            {{ \App\Enums\Months::tryFrom($row->month)->getName() }}
                        </x-table.cell-text>
                        <x-table.cell-text center>
                            {{ $row->year }}
                        </x-table.cell-text>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>

        </x-forms.table>

        <x-forms.create :id="$vid">
            <x-input.model-select wire:model="month" :label="'Month'">
                <option class="text-gray-400"> choose ..</option>
                @foreach(\App\Enums\Months::cases() as $month)
                    <option value="{{$month->value}}">{{$month->getName()}}</option>
                @endforeach
            </x-input.model-select>
            <x-input.model-text wire:model="year" :label="'Year'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
