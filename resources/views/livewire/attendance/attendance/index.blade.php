<div class="relative h-72">
    <div class="mt-2 bg-white rounded-lg mr-3 h-full">
        <table class="w-full">

            <!-- Top Controls ----------------------------------------------------------------------------------------->
            <td>
                <div class="flex gap-3 text-right w-full justify-end">
                    <button wire:click.prevent="mark_in"
                            class="flex px-2 py-2 text-white font-bold tracking-wider text-sm bg-lime-500 rounded-lg mt-2 mr-2">
                        I am In
                    </button>
                </div>
                @error('uniqueno')
                <div class="w-full text-right justify-end">
                    <span
                        class="text-red-500 ">{{  'You are already IN' }}</span>
                </div>
                @enderror
            </td>
        </table>

        <!-- Table ---------------------------------------------------------------------------------------------------->

        <div class="mx-2 my-1 h-full">
            <x-forms.table :list="$list" class="h-full">
                @if($list->count()!=0)
                    <x-slot name="table_header">
                        <x-table.header-text center>Date</x-table.header-text>
                        <x-table.header-text center>IN Time</x-table.header-text>
                        @forelse ($list as $index =>  $row)
                            @if($row->out_time!='')
                                <x-table.header-text center>OUT Time</x-table.header-text>
                            @endif
                            @if($row->out_time=='')
                                <x-table.header-action/>
                            @endif
                        @empty
                        @endforelse
                    </x-slot>
                @endif
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <tr class='bg-white border border-gray-900 hover:bg-yellow-50 cursor-pointer'>

                            <x-table.cell-text>
                                <a href="{{route('attendancesShow')}}">
                                    {{date('d-m-Y', strtotime($row->vdate))}}
                                </a>
                            </x-table.cell-text>
                            <x-table.cell-text>
                                <a href="{{route('attendancesShow')}}">
                                    {{$row->in_time}}
                                </a>
                            </x-table.cell-text>
                            @if($row->out_time!='')
                                <x-table.cell-text>
                                    <a href="{{route('attendancesShow')}}">
                                        {{$row->out_time}}
                                    </a>
                                </x-table.cell-text>
                            @endif

                            @if($row->out_time=='')
                                <x-table.cell>
                                    <div class="flex gap-3 text-right w-full justify-end">
                                        <button wire:click.prevent="mark_out({{ $row->id}})" onclick=""
                                                class="flex px-2 py-2 text-white text-sm bg-red-500 rounded-lg">
                                            I am Out
                                        </button>
                                    </div>
                                </x-table.cell>
                            @endif

                        </tr>
                    @empty
                    @endforelse
                </x-slot>
            </x-forms.table>
        </div>
    </div>
</div>
