<div>
    <x-slot name="header">Contacts</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>
        <div class="w-1/6">
            <x-input.model-select wire:model.live="contactType" :label="'Contact Type'">
                <option class="text-gray-400" value=""> choose ..</option>
                <option class="text-gray-400" value="0.0"> Creditors</option>
                <option class="text-gray-400" value="1"> Debtors</option>
            </x-input.model-select>
        </div>
        <x-forms.table>

        <!-- Table Header --------------------------------------------------------------------------------------------->
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Contact Name</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Mobile</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Whatsapp</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center class="w-1/6">Contact Type</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('contacts.upsert',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('contacts.upsert',[$row->id])}}">
                                {{ $row->vname}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('contacts.upsert',[$row->id])}}">
                                {{ $row->mobile}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('contacts.upsert',[$row->id])}}">
                                {{ $row->whatsapp}}
                            </a>
                        </x-table.cell-text>
                        <x-table.cell-text center class="rounded-md text-white p-1 {{\App\Enums\ContactType::tryFrom($row->contact_type)->getStyle()}}">
                            <a href="{{route('contacts.upsert',[$row->id])}}">
                                {{\App\Enums\ContactType::tryFrom($row->contact_type)->getName()}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell>
                            <div class="w-full flex justify-center gap-3">
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                <a href="{{route('contacts.upsert',[$row->id])}}"
                                   class="flex text-gray-600 truncate text-xl text-center">
                                    <div class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                        <div class="flex flex-col justify-start items-center -translate-y-full">
                                            <div class="bg-blue-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                Edit
                                            </div>
                                            <div class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-blue-500 -mt-[1px]"></div>
                                        </div>
                                    </div>
                                    <x-button.link>&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 hover:text-white  hover:rounded-sm hover:bg-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </a>
                            </div>
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                <x-button.link wire:click="getDelete({{$row->id}})">&nbsp;
                                    <div class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                        <div class="flex flex-col justify-start items-center -translate-y-full">
                                            <div class="bg-red-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                delete
                                            </div>
                                            <div class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-red-500 -mt-[1px]"></div>
                                        </div>
                                    </div>
                                    <x-icons.icon :icon="'trash'"
                                                  class="text-red-600 h-5 hover:bg-red-500 hover:text-white hover:rounded-sm hover:font-bold w-auto block"/>
                                </x-button.link>
                                </div>
                            </div>
                        </x-table.cell>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>

            <!-- Pagination ------------------------------------------------------------------------------------------->
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
        <x-modal.delete/>

    </x-forms.m-panel>
</div>
