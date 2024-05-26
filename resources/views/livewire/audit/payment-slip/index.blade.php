<div>
    <x-slot name="header">Payment Slips</x-slot>

    <x-forms.m-panel>
        <x-forms.top-control-without-search>
            <div class="mt-5 pr-3 cursor-pointer">
                <button wire:click.prevent="reLoad" class="bg-yellow-300 rounded-full px-1 py-0.5 flex justify-center items-start" >
                    <x-icons.icon :icon="'refresh'" class="block h-6 w-auto"/>
                </button>
            </div>

            <div>
                <x-input.model-select wire:model="group" wire:change="reRender" :label="'Group'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($groups as $group)
                        <option value="{{$group->group}}">{{$group->group}}</option>
                    @endforeach
                </x-input.model-select>
            </div>

            <div class="py-3 px-5">
                <label>
                    <input wire:model="cdate" wire:change.debounce="reRender" type="date"
                           class="purple-textbox w-[12rem]"/>
                </label>
            </div>

            <div>
                <x-input.model-select wire:model="client_id" wire:change="reRender" :label="'Sender'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->vname}}</option>
                    @endforeach
                </x-input.model-select>
            </div>

            <div>
                <x-input.model-select wire:model="receive_id" wire:change="reRender" :label="'Receiver'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->vname}}</option>
                    @endforeach
                </x-input.model-select>
            </div>

            <div class="px-1">
                <x-input.model-select wire:model="activeX" wire:change="reRender" :label="'Active'">
                    <option class="text-gray-400"> choose ..</option>
                    <option value="0">Not Active</option>
                    <option value="1">Active</option>
                </x-input.model-select>
            </div>

            <div>
                <x-input.model-select wire:model="allgroup" wire:change="reRender" :label="'All Group'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($allGroups as $allGroup)
                        <option value="{{$allGroup->group}}">{{$allGroup->group}}</option>
                    @endforeach
                </x-input.model-select>
            </div>


        </x-forms.top-control-without-search>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Serial</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Group</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Sender</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Receiver</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Due</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Amount</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Paid</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Paid On</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Status</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Action</x-table.ths-center>
            </x-slot>

            <x-slot name="table_body">

                @php
                    $total = 0;
                @endphp

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $index + 1 }}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->slip_no}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->group}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->sender->vname}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->receiver->vname}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->due}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->amount}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->paid}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{$row->paidOn ?  date('d-m-Y',strtotime($row->paidOn)) : '' }}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <div
                                class="text-center flex items-center w-4 h-4 mr-2 text-sm rounded-full {{$row->status === '1' ?'bg-green-500':'bg-red-500'}}">
                                &nbsp;
                            </div>
                        </x-table.cell>


                        <x-table.action :id="$row->id"/>
                    </x-table.row>

                    @php
                        $total += floatval($row->amount);
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <td colspan="6" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="px-2 text-right  text-xl border text-red-500 border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($total)}}</td>
                    <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>
            </x-slot>
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <x-forms.create :id="$vid">

            <x-input.model-text wire:model="slip_no" :label="'Serial'"/>
            <x-input.model-text wire:model="group" :label="'Group'"/>

            <x-input.model-select wire:model="sender_id" :label="'Sender'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-select wire:model="receiver_id" :label="'Receiver'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->vname}}</option>
                @endforeach
            </x-input.model-select>


            <x-input.model-text wire:model="due" :label="'Due'"/>
            <x-input.model-text wire:model="amount" :label="'Amount'"/>
            <x-input.model-text wire:model="paid" :label="'Paid'"/>
            <x-input.model-text wire:model="paidOn" type="date" :label="'Paid On'"/>

            <x-input.model-select wire:model="status" wire:change="reRender" :label="'Status'">
                <option class="text-gray-400"> choose ..</option>
                <option value="1">Paid</option>
                <option value="0">Not Paid</option>
            </x-input.model-select>
        </x-forms.create>

    </x-forms.m-panel>
</div>
