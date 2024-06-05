<div>
    <x-slot name="header">Social Details</x-slot>
    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('category')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('category')">category</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('category')">email_id</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('category')">user_name</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('category')">password</x-table.ths-center>
                <x-table.heading class="w-[12rem]">Action</x-table.heading>
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
                                {{  \App\Enums\Social::tryFrom($row->category)->getName()}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->email_id}}
                            </p>
                        </x-table.cell>
                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->vname}}
                            </p>
                        </x-table.cell>
                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->password}}
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
            <x-input.model-select wire:model="category" :label="'Category Type'">
                <option class="text-gray-400"> choose ..</option>
                @foreach(\App\Enums\Social::cases() as $category)
                    <option value="{{$category->value}}">{{$category->getName()}}</option>
                @endforeach
            </x-input.model-select>
            <x-input.model-text wire:model="email_id" :label="'Email Id'"/>
            <x-input.model-text wire:model="vname" :label="'User Name'"/>
            <x-input.model-text wire:model="password" :label="'Password'"/>
        </x-forms.create>
    </x-forms.m-panel>
</div>
