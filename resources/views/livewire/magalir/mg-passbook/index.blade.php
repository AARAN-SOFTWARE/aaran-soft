<div>
    <x-slot name="header">Pass Book</x-slot>

    <x-forms.m-panel>
        <div class="flex justify-between mb-8">
            <div>
                <table>
                    <tbody>
                    <tr>
                        <td class="border px-5 border-gray-200">Club</td>
                        <td class="border px-8 border-gray-200">{{$member->mgClub->vname}}</td>
                    </tr>
                    <tr>
                        <td class="border px-5 border-gray-200">Member Name</td>
                        <td class="border px-8 border-gray-200">{{$member->vname}}</td>
                    </tr>
                    <tr>
                        <td class="border px-5 border-gray-200">Mobile</td>
                        <td class="border px-8 border-gray-200">{{$member->mobile}}</td>
                    </tr>
                    <tr>
                        <td class="border px-5 border-gray-200">City</td>
                        <td class="border px-8 border-gray-200">{{$member->city->vname}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex items-end px-5">{{$member->vname}}</div>
            <div class="flex items-end px-5">
                <x-button.new/>
            </div>

        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.No</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Due Date</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Due Amount</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Received Date</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Received</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Remarks</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Status</x-table.ths-center>
                <x-table.ths-center>Action</x-table.ths-center>
            </x-slot>
            <x-slot name="table_body">

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <div class="text-gray-600 truncate text-xl text-center">
                                {{ $index+1 }}
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="text-gray-600 truncate text-xl text-center">
                                {{$row->due_date ?  date('d-m-Y',strtotime($row->due_date)) : '' }}
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="text-gray-600 truncate text-xl text-right">
                                {{ $row->due_amount }}
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="text-gray-600 truncate text-xl text-center">
                                {{$row->received_date ?  date('d-m-Y',strtotime($row->received_date)) : '' }}
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="text-gray-600 truncate text-xl text-right">
                                {{ $row->received }}
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="text-gray-600 truncate text-xl text-left">
                                {{ $row->remarks }}
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="flex gap-2 items-center justify-center w-full">
                                <span
                                    class="flex w-5 rounded-full {{ $row->due_amount === $row->received ?   \App\Enums\Status::tryFrom(12)->getStyle() :  \App\Enums\Status::tryFrom(8)->getStyle()}}">
                                    &nbsp;</span>
                                <span class="flex">
                                    {{ $row->due_amount === $row->received ?   'Received' :  'Pending'}}</span>
                            </div>
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
            <x-input.model-text wire:model="due_date" type="date" :label="'Due Date On'"/>
            <x-input.model-text wire:model="due_amount" :label="'Due amount'"/>
            <x-input.model-text wire:model="received_date" type="date" :label="'Received On'"/>
            <x-input.model-text wire:model="received" :label="'Received'"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
