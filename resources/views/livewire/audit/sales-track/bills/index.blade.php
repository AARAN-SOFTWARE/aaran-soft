 <div>
    <x-slot name="header">Sales Bills</x-slot>

    <x-forms.m-panel>

        <div class="inline-flex gap-3">
            <a href="{{route('salesTracks')}}">Sales Track</a>
            <x-icons.icon :icon="'double-arrow-right'"
                          class="text-black hover:text-white  hover:rounded-sm  h-4 w-auto block mt-2"/>
            <a href="{{route('salesTracks.items',[$salesTrackIitem->id])}}">Sales Track-Item</a>
        </div>

        <div class="flex w-full">
            <div class="text-xl font-bold w-full">
                {{$salesTrackIitem->track->vname."  -  ".date('d-m-Y', strtotime($salesTrackIitem->salesTrack->vdate))}}
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
                <div class=" lg:w-15 inline-flex">

                    <x-button.new/>

                </div>
            </div>

        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Client</x-table.header-text>
                <x-table.header-text center>Invoice No</x-table.header-text>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text center>Vehicle</x-table.header-text>
                <x-table.header-text center>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                {{  $row->client->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                {{  $row->vno }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                {{  $row->vdate }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                {{  $row->vehicle->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <div
                                    class="text-gray-600 truncate text-xl text-center px-2 {{ \App\Enums\Status::tryFrom($row->status)->getStyle() }}">
                                    {{ \App\Enums\Status::tryFrom($row->status)->getName() }}
                                </div>
                            </a>
                        </x-table.cell-text>
                        <x-table.cell-text>
                        <div class="w-full flex justify-center gap-3">
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <div
                                    class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                    <div class="flex flex-col justify-start items-center -translate-y-full">
                                        <div
                                            class="bg-blue-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                            Edit
                                        </div>
                                        <div
                                            class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-blue-500 -mt-[1px]"></div>
                                    </div>
                                </div>
                                <x-button.link>&nbsp;
                                    <x-icons.icon :icon="'pencil'"
                                                  class="text-blue-500 hover:text-white  hover:rounded-sm hover:bg-blue-500 h-5 w-auto block"/>
                                </x-button.link>
                            </a>
                            <x-table.delete wire:click="getDelete({{ $row->id }})"/>
                        </div>
                        </x-table.cell-text>

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
    </x-forms.m-panel>
</div>

