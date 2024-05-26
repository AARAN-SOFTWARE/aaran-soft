<div>
    <x-slot name="header">Track</x-slot>
    <x-forms.m-panel>

        <div>
            <a href="{{route('track')}}">Track</a>
        </div>

        <div class="flex w-full">
            <div class="text-xl font-bold w-full">
                {{$tracks->salesTrack->vname."  -  ".date('d-m-Y', strtotime($tracks->vdate))}}
            </div>

            <div class="flex gap-3 justify-end text-right w-full">
                <div class="font-bold w-2/4">
                    <x-input.model-select wire:model.live="status" :label="'Filter'">
                        <option class="text-gray-400" value=""> choose ..</option>
                        @foreach(\App\Enums\Status::cases() as $status)
                            <option value="{{$status->value}}">{{$status->getName()}}</option>
                        @endforeach
                    </x-input.model-select>
                </div>
                <div class="lg:w-2/4">
                    <x-input.model-date wire:model.live="vdate" :label="'Date'"/>
                </div>
                <div class=" lg:w-15 inline-flex py-5">
                    <x-button.primary wire:click="generate">Generate</x-button.primary>
                </div>
            </div>

        </div>
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text center>Client</x-table.header-text>
                <x-table.header-text center>Total count</x-table.header-text>
                <x-table.header-text center>Total Value</x-table.header-text>
                <x-table.header-text center>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('track.salesBills',['salesTrackIitem_id'=>$row->id,'track_id'=>$track_id])}}">
                                {{ $row->serial }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('track.salesBills',['salesTrackIitem_id'=>$row->id,'track_id'=>$track_id])}}">
                                {{  \App\Helper\ConvertTo::dateString($row->vdate) }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track.salesBills',['salesTrackIitem_id'=>$row->id,'track_id'=>$track_id])}}">
                                {{  $row->client->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track.salesBills',['salesTrackIitem_id'=>$row->id,'track_id'=>$track_id])}}">
                                {{  $row->total_count }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track.salesBills',['salesTrackIitem_id'=>$row->id,'track_id'=>$track_id])}}">
                                {{  $row->total_value }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track.salesBills',['salesTrackIitem_id'=>$row->id,'track_id'=>$track_id])}}">
                                <div
                                    class="text-gray-600 truncate text-xl text-center px-2 {{ \App\Enums\Status::tryFrom($row->status)->getStyle() }}">
                                    {{ \App\Enums\Status::tryFrom($row->status)->getName() }}
                                </div>
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

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="serial" :label="'Serial'"/>
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-select wire:model="client_id" :label="'Client'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->vname}}</option>
                @endforeach
            </x-input.model-select>
            <x-input.model-text wire:model="total_count" :label="'Total Count'"/>
            <x-input.model-text wire:model="total_value" :label="'Total Value'"/>
            @admin
            <x-input.model-select wire:model="status" :label="'Status'">
                <option class="text-gray-400"> choose ..</option>
                @foreach(\App\Enums\Status::cases() as $obj)
                    <option value="{{$obj->value}}">{{ $obj->getName() }}</option>
                @endforeach
            </x-input.model-select>
            @endadmin
        </x-forms.create>
    </x-forms.m-panel>
</div>
