<div>
    <x-slot name="header">Sales Track Items</x-slot>
    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
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
                            <a href="{{route('track')}}">
                                {{ $row->serial }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track')}}">
                                {{  $row->client->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track')}}">
                                {{  $row->total_count }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track')}}">
                                {{  $row->total_value }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('track')}}">
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

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="serial" :label="'Serial'"/>

            <x-input.model-select wire:model="client_id" :label="'Client'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->vname}}</option>
                @endforeach
            </x-input.model-select>

        </x-forms.create>
    </x-forms.m-panel>
</div>
