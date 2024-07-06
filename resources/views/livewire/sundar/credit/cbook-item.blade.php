<div>
    <x-slot name="header">Credit Items</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table :list="$list">

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text center>Credit</x-table.header-text>
                <x-table.header-text center>Rate</x-table.header-text>
                <x-table.header-text center>Interest</x-table.header-text>
                <x-table.header-text center>Due Date</x-table.header-text>
                <x-table.header-text center>Processing</x-table.header-text>
                <x-table.header-text center>Terms</x-table.header-text>
                <x-table.header-text center>Pending</x-table.header-text>
                <x-table.header-text center>Pending Dues</x-table.header-text>
                <x-table.header-text center>Remarks</x-table.header-text>
                <x-table.header-action/>
                <x-table.header-text center class="w-5">#</x-table.header-text>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{date('d-m-Y', strtotime($row->vdate))}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->credit + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->rate + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->interest + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->due_date}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->processing + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->terms + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->pending_due + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->pending + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->remarks }}
                            </a>
                        </x-table.cell-text>


                        <x-table.cell-action id="{{$row->id}}"/>

                        <x-table.cell-text right>
                            <button wire:click.prevent="generateDues({{$row->id}})">
                                <x-icons.icon icon="utilities" class="w-6 h-auto block text-purple-600"/>
                            </button>
                        </x-table.cell-text>

                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse

            </x-slot>

            <!-- Table Footer ----------------------------------------------------------------------------------------->

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <!-- Create --------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$vid">
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-text wire:model="credit" :label="'Credit'"/>
            <x-input.model-text wire:model="rate" :label="'Rate of Interest'"/>
            <x-input.model-text wire:model="interest" :label="'Interest for Month'"/>
            <x-input.model-date wire:model="due_date" :label="'Due Date'"/>
            <x-input.model-text wire:model="processing" :label="'Processing Fee'"/>
            <x-input.model-text wire:model="terms" :label="'Terms'"/>
            <x-input.model-text wire:model="pending_due" :label="'Pending due'"/>
            <x-input.model-text wire:model="pending" :label="'Pending Amount '"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
