<div>
    <x-slot name="header">Demo request</x-slot>

    <x-forms.m-panel>
        <x-forms.table>
            <x-slot name="table_header">
                <x-table.ths-slno >Sl.no</x-table.ths-slno>
                <x-table.ths-center >Company Name</x-table.ths-center>
                <x-table.ths-center >Contact Person</x-table.ths-center>
                <x-table.heading >Email</x-table.heading>
                <x-table.heading >Mobile NO</x-table.heading>
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
                                {{ $row->company_name}}
                            </p>
                        </x-table.cell>
                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->contaxt_person}}
                            </p>
                        </x-table.cell>
                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->email}}
                            </p>
                        </x-table.cell>
                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->mobile}}
                            </p>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>
        </x-forms.table>
    </x-forms.m-panel>
</div>
