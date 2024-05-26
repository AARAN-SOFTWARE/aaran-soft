<div>
    <x-slot name="header">Cutting Note</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table>

        <!-- Header --------------------------------------------------------------------------------------------------->
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Order No</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Job No</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Date</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Cutting Master</x-table.header-text>
                <x-table.header-text center>Cutting Qty</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('cuttings.upsert',[$row->id])}}">
                                {{ $index+1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('cuttings.upsert',[$row->id])}}">
                                {{ $row->order->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('cuttings.upsert',[$row->id])}}">
                                {{ $row->jobcard_id }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('cuttings.upsert',[$row->id])}}">
                                {{date('d-m-Y', strtotime($row->vdate))}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('cuttings.upsert',[$row->id])}}">
                                {{ $row->cutting_master }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('cuttings.upsert',[$row->id])}}">
                                {{ $row->total_qty + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell>
                            <div class="w-full flex justify-center gap-3">
                                <a href="{{route('cuttings.upsert',[$row->id])}}"
                                   class="flex text-gray-600 truncate text-xl text-center">
                                    <x-button.link>&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </a>
                                <x-button.link wire:click="set_delete({{$row->id}})"
                                               wire:confirm="Are you sure you want to delete this ?">&nbsp;
                                    <x-icons.icon :icon="'trash'"
                                                  class="text-red-600 h-5 w-auto block"/>
                                </x-button.link>
                            </div>
                        </x-table.cell>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>

            <!-- Pagination ------------------------------------------------------------------------------------------->
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

    </x-forms.m-panel>
</div>
