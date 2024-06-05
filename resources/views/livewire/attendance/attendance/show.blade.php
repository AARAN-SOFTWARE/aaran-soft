<div>
    <x-slot name="header">Attendance</x-slot>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        {{--        <x-forms.top-controls :show-filters="$showFilters"/>--}}

        @admin
        <div class="ml-3">
            <x-input.model-select wire:model.live="user" :label="'Name'">
                <option>choose</option>
                @foreach($data as $i)
                    <option value="{{$i->id}}">   {{$i->name}}</option>
                @endforeach
            </x-input.model-select>
        </div>

        @endadmin
        <div class="inline-flex w-full justify-between ">
            <div class="text-xl uppercase font-bold text-center w-full">
                @if($user)
                    {{ Aaran\Attendance\Models\Attendance::allocated($user)}}
                @else
                {{\Illuminate\Support\Facades\Auth::user()->name  }}
                @endif
                    {{' - '. \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d').' - '.
                    \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d') }}
            </div>

            <div class="w-1/4 text-right">
                {{ 'No of Days Present : '.$list->count() }}
            </div>
        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text center>IN Time</x-table.header-text>
                <x-table.header-text center>OUT Time</x-table.header-text>
            </x-slot>

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ date('d-m-Y', strtotime( $row->vdate)) }}-{{$row->user_id}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->in_time}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->out_time}}
                        </x-table.cell-text>

                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>

        </x-forms.table>
    </x-forms.m-panel>
</div>
