<div>
    <x-slot name="header">Activities</x-slot>

    <x-forms.m-panel>

        <div class="flex flex-row justify-between">
            <div>
                Latest
                @if($dates)
                    @foreach ($dates as $row)
                        <div>
                            {{$row->cdate ?  date('d-m-Y',strtotime($row->cdate)) : '' }}
                        </div>
                    @endforeach
                @endif
            </div>
            <div>
                <label>
                    <input wire:model="cdate" wire:change.debounce="reRender" type="date"
                           class="purple-textbox w-[12rem]"/>
                </label>
            </div>
            <div>
                <x-button.new/>
            </div>
        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Activity</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Client</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Duration</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Tags</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Remarks</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Created At</x-table.ths-center>
                <x-table.ths-center>Action</x-table.ths-center>
            </x-slot>

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $index + 1 }}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->vname}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                @if($row->client_id)
                                        {{ $row->client->vname ?:'' }}
                                @endif
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->duration}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->tags}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->remarks}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{$row->created_at ?  date('d-m-Y h:i:s a',strtotime($row->created_at)) : '' }}
                            </p>
                        </x-table.cell>

                        <x-table.action :id="$row->id"/>
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

            <x-input.model-text wire:model="cdate" type="date" :label="'DATE'"/>

            <x-input.model-select wire:model="client_id" :label="'client'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $row)
                    <option value="{{$row->id}}">{{$row->vname}}</option>
                @endforeach
            </x-input.model-select>

            <div class="flex flex-col gap-3 py-3">
                <label for="vname" class="w-[8rem] text-zinc-500 tracking-wide py-2">Activites</label>
                <textarea rows="5" id="vname" wire:model="vname" autocomplete="off" autofocus
                          class="rounded-lg appearance-none border
                                                 border-gray-300 py-2 px-2 bg-white text-gray-800 w-full
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5"></textarea>
            </div>

            <x-input.model-text wire:model="duration" :label="'Duration'"/>

            <x-input.model-select wire:model="channel" :label="'channel'">
                <option class="text-gray-400"> choose ..</option>
                @foreach(\App\Enums\Channels::cases() as $channel)
                    <option value="{{$channel->value}}">{{$channel->getName()}}</option>
                @endforeach
            </x-input.model-select>

            @admin
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
            <x-input.model-text wire:model="verified" :label="'Verified'"/>
            <x-input.model-date wire:model="verified_on" :label="'Verified On'"/>
            @endadmin
        </x-forms.create>

    </x-forms.m-panel>
</div>
