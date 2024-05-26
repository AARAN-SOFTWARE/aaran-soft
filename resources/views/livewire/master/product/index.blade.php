<div>
    <x-slot name="header">Product</x-slot>

    <!-- Top Controls ------------------------------------------------------------------------------------------------->
    <x-forms.m-panel>

        <x-forms.top-controls :show-filters="$showFilters"/>
        <x-forms.table>

            <!--Table Header ------------------------------------------------------------------------------------------>

            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Product Name</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Product Type</x-table.header-text>
                <x-table.header-text center>Hsn Code</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" center>Unit of Measure</x-table.header-text>
                <x-table.header-text center>Gst Percent</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>
                        <x-table.cell-text center>
                            <a href="{{route('products.upsert',[$row->id])}}">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('products.upsert',[$row->id])}}">
                                {{ $row->vname }}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('products.upsert',[$row->id])}}">
                                {{ \App\Enums\ProductType::tryFrom($row->product_type)->getName()}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('products.upsert',[$row->id])}}">
                                {{ $row->hsncode->vname }}
                            </a>
                        </x-table.cell-text>


                        <x-table.cell-text center>
                            <a href="{{route('products.upsert',[$row->id])}}">
                                {{\App\Enums\Units::tryFrom($row->units)->getName()}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{route('products.upsert',[$row->id])}}">
                                {{ \App\Enums\GstPercent::tryFrom($row->gst_percent)->getName()}}
                            </a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <div class="w-full flex justify-center gap-3">
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                    <a href="{{route('products.upsert',[$row->id])}}"
                                       class="flex flex-col text-gray-600 text-xl text-center">
                                        <div
                                            class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                            <div class="flex flex-col justify-start items-center -translate-y-full">
                                                <div
                                                    class="bg-blue-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                    Edit
                                                </div>
                                                <div
                                                    class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-blue-500 -mt-[1px]"></div>
                                            </div>
                                        </div>
                                        <x-button.link>&nbsp;
                                            <x-icons.icon :icon="'pencil'"
                                                          class="text-blue-500 h-5 w-auto block"/>
                                        </x-button.link>
                                    </a>
                                </div>
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                    <x-button.link wire:click="getDelete({{$row->id}})"
                                    >&nbsp;
                                        <div
                                            class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                            <div class="flex flex-col justify-start items-center -translate-y-full">
                                                <div
                                                    class="bg-red-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                    delete
                                                </div>
                                                <div
                                                    class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-red-500 -mt-[1px]"></div>
                                            </div>
                                        </div>
                                        <x-icons.icon :icon="'trash'"
                                                      class="text-red-600 h-5 w-auto block"/>
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
        <x-modal.delete/>

    </x-forms.m-panel>
</div>
