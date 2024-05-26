<div class="relative h-72">
    <div class="mt-2 bg-white rounded-lg mr-3 h-full">
        <table class="w-full">

            <!-- Top Controls ----------------------------------------------------------------------------------------->
            <td>
                <div class="flex gap-3 text-left w-full justify-start pl-5">
                    {{ 'No of Days :'.$list->count() }}

                </div>
            <td>
                <div class="flex gap-3 text-right w-full justify-end">
                    <button wire:click.prevent="mark_in"
                            class="flex px-2 py-2 text-white font-bold tracking-wider text-sm bg-lime-500 rounded-lg mt-2 mr-2">
                        I am In
                    </button>
                </div>
                    @error('uniqueno')
                    <span class="text-red-500">{{  'You are already IN' }}</span>
                    @enderror
            </td>
        </table>

        <!-- Table ---------------------------------------------------------------------------------------------------->

        <div class="mx-2 my-1 h-full">
            <x-forms.table :list="$list" class="h-full">
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <tr class='bg-white border border-gray-900 hover:bg-yellow-50 cursor-pointer'>
                            <x-table.cell-text>
                                {{$index+1}}
                            </x-table.cell-text>
                            <x-table.cell-text>
                                {{$row->vdate}}
                            </x-table.cell-text>
                            <x-table.cell-text>
                                {{$row->in_time}}
                            </x-table.cell-text>
                            <x-table.cell-text>
                                {{$row->out_time}}
                            </x-table.cell-text>

                            <x-table.cell>
                                <div class="flex gap-3 text-right w-full justify-end">
                                    <button wire:click.prevent="mark_out({{ $row->id}})" onclick=""
                                            class="flex px-2 py-2 text-white text-sm bg-red-500 rounded-lg">
                                        I am Out
                                    </button>
                                </div>
                            </x-table.cell>
                        </tr>
                    @empty
                    @endforelse

                        <!--Footer ------------------------------------------------------------------------------------>
                    <tfoot class="mt-2">
                    <td colspan="6">
                        <div class="flex pt-6">
                            <label
                                class="px-3 pb-2 text-left text-gray-600 text-md">Total Earned:&nbsp;&nbsp;₹</label>
                            @if($list->count()!=0)
                            <label class=" pb-2 text-left text-gray-800 text-md ">{{ $total_amount*($index+1) }}</label>
                            @endif
                        </div>
                    </td>
                    </tfoot>

                </x-slot>
            </x-forms.table>
            @admin
            <div class="ml-3">
                <x-input.model-select wire:model.live="days" :label="'Name'">
                    <option value="">choose</option>
                    @foreach($data as $i)
                        <option value="{{$i->id}}">   {{$i->name}}</option>
                    @endforeach
                </x-input.model-select>
            </div>

            <div>
                {{ 'No of Days Present : '.$present->count() }}
            </div>
            @endadmin

        </div>
    </div>
</div>
