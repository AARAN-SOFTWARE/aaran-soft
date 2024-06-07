<div>
    <x-slot name="header">Charges</x-slot>

    <x-forms.m-panel>

        <div class="flex justify-between items-center">
            <select wire:model="k_id" :label="'User'" class="w-[30rem] purple-textbox" wire:change.prevent="reRender">
                <option class="text-gray-400"> choose ..</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

            <x-button.new/>

        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vdate')"/>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" class="w-[10rem]" center>Date</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Charges</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vdate')" center>Remarks</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            @php
                $totalCharges = 0;
            @endphp

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            {{date('d-m-Y', strtotime($row->vdate))}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{ $row->charges }}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{ $row->remarks }}
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>

                    @php
                        $totalCharges  += floatval($row->charges);
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <x-table.cell-text :colspan="2" :class="'text-blue-600 font-semibold'" right>&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</x-table.cell-text>

                    <x-table.cell-text right
                                       :class="'text-blue-600 font-semibold'">
                        {{ \App\Helper\ConvertTo::decimal2($totalCharges)}}</x-table.cell-text>

                </x-table.row>

            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
        <x-modal.delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-text wire:model="charges" :label="'Charges'"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

        <div>
            <x-button.back/>
        </div>

    </x-forms.m-panel>
</div>
