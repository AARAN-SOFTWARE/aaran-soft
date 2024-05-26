<div>
    <x-slot name="header">
        Task Review
    </x-slot>
    <x-forms.m-panel>

        <!- - Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Header --------------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial wire:click.prevent="sortBy('vname')"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Activities</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('assign-to')" center>Assign to</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('status')" center>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text center>
                            <a href="{{ route('task-review.show',[$row->id]) }}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('task-review.show',[$row->id]) }}">
                            {{ $row->vname}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('task-review.show',[$row->id]) }}">
                                {{ Aaran\Developer\Models\TaskReview::assignTo($row->assign_to) }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('task-review.show',[$row->id]) }}">
                                <div
                                    class="h-1/4 flex items-center justify-center bg-blue-300
                                    {{  \App\Enums\Status::tryFrom($row->status )->getStyle() }}">
                                    {{  \App\Enums\Status::tryFrom($row->status )->getName() }}
                                </div>
{{--                                {{ $row->status }}--}}
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
            <x-input.model-text wire:model="vname" :label="'Activities'"/>
            <x-input.model-select wire:model="assign_to" :label="'Assign To'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </x-input.model-select>
{{--            <x-input.model-text wire:model="status" :label="'Status'"/>--}}
        </x-forms.create>

    </x-forms.m-panel>

</div>
