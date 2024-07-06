<div>
    <x-slot name="header">Credit Items</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table :list="$list">

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Loan</x-table.header-text>
                <x-table.header-text center>Rate</x-table.header-text>
                <x-table.header-text center>Processing</x-table.header-text>
                <x-table.header-text center>Insurance</x-table.header-text>
                <x-table.header-text center>Commission</x-table.header-text>
                <x-table.header-text center>Credited</x-table.header-text>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text center>EMI</x-table.header-text>
                <x-table.header-text center>EMI Date</x-table.header-text>
                <x-table.header-text center>Terms</x-table.header-text>
                <x-table.header-text center>Pending Dues</x-table.header-text>
                <x-table.header-text center>Pending</x-table.header-text>
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

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->loan + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->rate + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->processing + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->insurance + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->commission + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->credited + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{date('d-m-Y', strtotime($row->vdate))}}
                            </a>
                        </x-table.cell-text>


                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->emi + 0 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{date('d-m-Y', strtotime($row->emi_date))}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            <a href="{{route('credits.interests',[$row->id])}}">
                                {{ $row->terms }}
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

        <x-forms.create :id="$vid" max-width="6xl">

            <div class="grid grid-cols-2 gap-1 w-full">

                <x-input.model-text wire:model="loan" :label="'Loan'"/>
                <x-input.model-text wire:model="rate" :label="'Rate of Interest'"/>
                <x-input.model-text wire:model="processing" :label="'Processing Fee'"/>
                <x-input.model-text wire:model="insurance" :label="'Insurance'"/>
                <x-input.model-text wire:model="commission" :label="'Commission'"/>
                <x-input.model-text wire:model="credited" :label="'Credited'"/>
                <x-input.model-date wire:model="vdate" :label="'Date'"/>
                <x-input.model-text wire:model="emi" :label="'EMI'"/>
                <x-input.model-date wire:model="emi_date" :label="'EMI Date'"/>
                <x-input.model-text wire:model="terms" :label="'Terms'"/>
                <x-input.model-text wire:model="pending_due" :label="'Pending due'"/>
                <x-input.model-text wire:model="pending" :label="'Pending Amount '"/>
                <x-input.model-text wire:model="remarks" :label="'Remarks'"/>

            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
