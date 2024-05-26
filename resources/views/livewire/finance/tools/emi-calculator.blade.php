<div>
    <x-slot name="header">Emi calculator</x-slot>

    <x-forms.m-panel>

        <div class="flex flex-row gap-3 items-center">
            <div>
                <x-input.text-input wire:model="principal" label="Principal"/>
            </div>

            <div>
                <x-input.text-input wire:model="rate" label="rate"/>
            </div>

            <div>
                <x-input.text-input wire:model="term" label="term"/>
            </div>

            <div>
                <x-button.primary wire:click.prevent="setRate">Calculate</x-button.primary>
            </div>


        </div>


        @php
            $list =  $this->amount['schedule']
        @endphp

        <x-forms.table>
            <!-- Table Header --------------------------------------------------------------------------------------------->

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Due Amount</x-table.header-text>
                <x-table.header-text center>Principal</x-table.header-text>
                <x-table.header-text center>Interest</x-table.header-text>
                <x-table.header-text center>Balance</x-table.header-text>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            {{ $index + 1 }}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{$row['payment']}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{$row['interest']}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{$row['principal']}}
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{$row['balance']}}
                        </x-table.cell-text>

                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse

            </x-slot>
        </x-forms.table>
    </x-forms.m-panel>
</div>
