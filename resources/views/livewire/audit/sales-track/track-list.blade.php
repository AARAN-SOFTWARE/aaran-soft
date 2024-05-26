<div>
    <x-slot name="header">Sales Track</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vdate')"/>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Date</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Track</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('track.trackItem',['salesTrack_id'=>$row->sales_track_id,'track_id'=>$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track.trackItem',['salesTrack_id'=>$row->sales_track_id,'track_id'=>$row->id])}}">
                           {{date('d-m-Y', strtotime($row->vdate))}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track.trackItem',['salesTrack_id'=>$row->sales_track_id,'track_id'=>$row->id])}}">
                                {{ $row->salesTrack->vname}}
                            </a>
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
        <x-forms.create :id="$vid">
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-select wire:model="smonth_id" :label="'Month'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($smonths as $month)
                    <option value="{{$month->id}}">
                        {{\App\Enums\Months::tryFrom($month->month)->getName().' - '.$month->year}}
                    </option>
                @endforeach
            </x-input.model-select>
            <x-input.model-select wire:model="sales_track_id" :label="'Track'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($sales_tracks as $tack)
                    <option value="{{$tack->id}}">{{$tack->vname}}</option>
                @endforeach
            </x-input.model-select>
        </x-forms.create>

    </x-forms.m-panel>
</div>
