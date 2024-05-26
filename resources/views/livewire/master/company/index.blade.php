<div>
    <x-slot name="header">Company</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <div class="md:flex md:justify-between md:pb-5">
            <div class="w-full h-20 md:w-2/4 flex md:space-x-2">

                <x-input.search-box/>
                <x-input.toggle-filter :show-filters="$showFilters"/>
            </div>

            <div class="flex justify-between md:mb-5 md:space-x-2 md:flex md:items-center">
                <x-forms.per-page/>
                @admin
                <x-button.new/>
                @endadmin
            </div>
        </div>

        <x-input.advance-search :show-filters="$showFilters"/>
        <x-forms.table>

        <!-- Table Header --------------------------------------------------------------------------------------------->

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Company Name</x-table.header-text>
                <x-table.header-text center>Address-1</x-table.header-text>
                <x-table.header-text center>Address-2</x-table.header-text>
                <x-table.header-text center>Mobile</x-table.header-text>
                <x-table.header-text center>Landline</x-table.header-text>
                <x-table.header-text center>Gst</x-table.header-text>
                <x-table.header-text center>Pan</x-table.header-text>
                <x-table.header-text center>Email</x-table.header-text>
                <x-table.header-text center>Website</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <div class="flex">
                            <div class="flex-shrink-0 h-10 w-10 mr-4 rounded-xl">
                                <a href="{{route('companies.upsert',[$row->id])}}">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($row->logo)}}" alt="logo"/>
                                </a></div>

                               <div><a href="{{route('companies.upsert',[$row->id])}}"
                                   class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->display_name}}
                                </a></div>
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->address_1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->address_2 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->mobile }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->landline }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->gstin }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->pan }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->email }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('companies.upsert',[$row->id])}}">
                                {{ $row->website }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <div class="w-full flex justify-center gap-3">
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                <a href="{{route('companies.upsert',[$row->id])}}">
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
                                <x-button.link wire:click="set_delete({{$row->id}})"
                                               wire:confirm="Are you sure you want to delete this ?">&nbsp;
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
                        </x-table.cell-text>
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

    </x-forms.m-panel>
</div>
