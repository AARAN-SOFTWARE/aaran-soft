<div>
    <x-slot name="header">Stock Details</x-slot>

    <x-forms.m-panel>
        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>
        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Date</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Volume</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Open</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Close</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>High</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Low</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Trend</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ date('d-m-Y', strtotime($row->vdate)) }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->volume+0 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->open+0 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->close+0 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->high+0 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->low+0 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{ $row->trend }}
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

        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid" :max-width="'6xl'">
            <div class="flex gap-3 w-full">
                <div class="flex flex-col gap-3 w-full">
                    <x-input.model-date wire:model="vdate" :label="'Date'"/>
                    <x-input.model-text wire:model="ltp" :label="'LTP'"/>
                    <x-input.model-text wire:model="chg" :label="'Charges'"/>
                    <x-input.model-text wire:model="chg_percent" :label="'Chg Percent'"/>
                    <x-input.model-text wire:model="volume" :label="'LTP'"/>
                    <x-input.model-text wire:model="open_interest" :label="'Open Interest'"/>
                    <x-input.model-text wire:model="open" :label="'Open'"/>
                    <x-input.model-text wire:model="close" :label="'Close'"/>
                    <x-input.model-text wire:model="high" :label="'High'"/>
                    <x-input.model-text wire:model="low" :label="'Low'"/>
                    <x-input.model-text wire:model="pivot" :label="'Pivot'"/>
                </div>
                <div class="flex flex-col gap-3 w-full">
                    <x-input.model-text wire:model="high_52" :label="'52Weeks High'"/>
                    <x-input.model-text wire:model="low_52" :label="'52Weeks Low'"/>
                    <x-input.model-text wire:model="all_high" :label="'AllTime High'"/>
                    <x-input.model-text wire:model="all_low" :label="'AllTime Low'"/>
                    <x-input.model-text wire:model="r1" :label="'Resistance 1'"/>
                    <x-input.model-text wire:model="r2" :label="'Resistance 2'"/>
                    <x-input.model-text wire:model="r3" :label="'Resistance 3'"/>
                    <x-input.model-text wire:model="s1" :label="'Support 1'"/>
                    <x-input.model-text wire:model="s2" :label="'Support 2'"/>
                    <x-input.model-text wire:model="s3" :label="'Support 3'"/>
                    <x-input.model-select wire:model="trend" :label="'Trend'">
                        <option value="">Choose...</option>
                        <option value="UpTrend">UpTrend</option>
                        <option value="DownTrend">DownTrend</option>
                        <option value="SideWise">SideWise</option>
                    </x-input.model-select>
                </div>
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
