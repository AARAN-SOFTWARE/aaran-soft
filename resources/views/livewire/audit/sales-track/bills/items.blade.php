<div>
    <x-slot name="header">Sales Bill Items</x-slot>


    <div class="inline-flex gap-3 py-3">
        <a href="{{route('salesTracks')}}" class="text-gray-400">Sales Track</a>

        <x-icons.icon :icon="'double-arrow-right'"
                      class="text-gray-500 hover:text-white  hover:rounded-sm  h-4 w-auto block mt-2"/>

        @if($salesBill)
            <a href="{{route('salesTracks.Bills',[$salesBill->id])}}" class="text-gray-400">Sales Bills</a>
        @endif

        <x-icons.icon :icon="'double-arrow-right'"
                      class="text-gray-500 hover:text-white  hover:rounded-sm  h-4 w-auto block mt-2"/>

        @if($salesBill)
            <a href="{{route('salesTracks.Bills',[$salesBill->id])}}" class="text-gray-500">Sales Bills</a>
        @endif
    </div>

    <x-forms.m-panel>




        <div class="flex w-full gap-3">




            <!-- Sales From-------------------------------------------------------------------------------------------->
            <div class="w-full">


                <div class="inline-flex gap-5">
                    <label for="Sales From"
                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Sales From</label>
                    <label class="w-[10rem]  tracking-wide text-lg text-semibold py-2">
                    {{\Aaran\Audit\Models\Client::getName($sales_from)}}</label>
                </div>

                <!--Invoice No----------------------------------------------------------------------------------------->
                <x-input.model-text wire:model="vno" :label="'Invoice No'"/>

                <!-- Date  -------------------------------------------------------------------------------------------->
                <x-input.model-date wire:model="vdate" :label="'Date'"/>



                <!--Vehicle-------------------------------------------------------------------------------------------->
                <div class="flex flex-col gap-2 pt-5">
                    <div class="xl:flex w-full gap-2">

                        <!-- vehicle ----------------------------------------------------------------------------------->
                        <label for="ledger_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Vehicle</label>
                        <div x-data="{isTyped: @entangle('vehicleTyped')}" @click.away="isTyped = false"
                             class='w-full'>
                            <div class="relative">
                                <input
                                    id="vehicle_name"
                                    type="search"
                                    wire:model.live="vehicle_name"
                                    autocomplete="off"
                                    placeholder="Vehicle.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementVehicle"
                                    wire:keydown.arrow-down="incrementVehicle"
                                    wire:keydown.enter="enterVehicle"
                                    class="block w-full purple-textbox"
                                />

                                <div x-show="isTyped"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     x-cloak
                                >
                                    <div class="absolute z-20 w-full mt-2">
                                        <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                            <ul class="overflow-y-scroll h-96">
                                                @if($vehicleCollection)
                                                    @forelse ($vehicleCollection as $i => $vehicle)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightVehicle === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setVehicle('{{$vehicle->vname}}','{{$vehicle->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $vehicle->vname }}
                                                        </li>
                                                    @empty
                                                        <button wire:click.prevent="vehicleSave('{{$vehicle_name}}')"
                                                                class="text-white bg-green-500 text-center w-full">
                                                            create
                                                        </button>
                                                    @endforelse
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bill To  -------------------------------------------------------------------------------------------->
            <div class="w-full">
                <div class="inline-flex gap-5">
                    <label for="Sales From"
                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Bill To</label>
                    <label class="w-[10rem]  tracking-wide text-lg text-semibold py-2">
                        {{\Aaran\Audit\Models\Client::getName($client_id)}}</label>
                </div>
            </div>

        </div>

        <section class="md:flex md:flex-row w-full gap-0.5">
            <!-- product -------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="product_name"></label>
                <div x-data="{isTyped: @entangle('productTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="product_name"
                            type="search"
                            wire:model.live="product_name"
                            autocomplete="off"
                            placeholder="Product Name.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementProduct"
                            wire:keydown.arrow-down="incrementProduct"
                            wire:keydown.enter="enterProduct"
                            class="block w-full purple-textbox-no-rounded"
                        />

                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                    <ul class="overflow-y-scroll h-96">
                                        @if($productCollection)
                                            @forelse ($productCollection as $i => $product)

                                                <li class="cursor-pointer w-full h-fit px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300
                                                        {{ $highlightProduct === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setProduct('{{$product->vname}}','{{$product->id}}','{{$product->gst_percent}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $product->vname }} &nbsp;-&nbsp; GST&nbsp;:
                                                    &nbsp;{{$product->gst_percent}}%
                                                </li>

                                            @empty
                                                @livewire('controls.model.master.product-model',[$product_name])
                                            @endforelse
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- description -------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="qty"></label>
                <input id="qty" wire:model.live="description" class="block w-full purple-textbox-no-rounded"
                       autocomplete="false"
                       placeholder="Description..">
            </div>
            <!-- colour  -------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="colour_name"></label>
                <div x-data="{isTyped: @entangle('colourTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="colour_name"
                            type="search"
                            wire:model.live="colour_name"
                            autocomplete="off"
                            placeholder="Colour Name.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementColour"
                            wire:keydown.arrow-down="incrementColour"
                            wire:keydown.enter="enterColour"
                            class="block w-full purple-textbox-no-rounded"
                        />

                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                    <ul class="overflow-y-scroll h-96">
                                        @if($colourCollection)
                                            @forelse ($colourCollection as $i => $colour)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightColour === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setColour('{{$colour->vname}}','{{$colour->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $colour->vname }}
                                                </li>

                                            @empty
                                                <button wire:click.prevent="colourSave('{{$colour_name}}')"
                                                        class="text-white bg-green-500 text-center w-full">
                                                    create
                                                </button>
                                            @endforelse
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- size  -------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="size_name"></label>
                <div x-data="{isTyped: @entangle('sizeTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="size_name"
                            type="search"
                            wire:model.live="size_name"
                            autocomplete="off"
                            placeholder="Size.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementSize"
                            wire:keydown.arrow-down="incrementSize"
                            wire:keydown.enter="enterSize"
                            class="block w-full purple-textbox-no-rounded"
                        />

                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                    <ul class="overflow-y-scroll h-96">
                                        @if($sizeCollection)
                                            @forelse ($sizeCollection as $i => $size)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightSize === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setSize('{{$size->vname}}','{{$size->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $size->vname }}
                                                </li>

                                            @empty
                                                <button wire:click.prevent="sizeSave('{{$size_name}}')"
                                                        class="text-white bg-green-500 text-center w-full">
                                                    create
                                                </button>
                                            @endforelse
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- qty  -------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="qty"></label>
                <input id="qty" wire:model.live="qty" class="block w-full purple-textbox-no-rounded"
                       autocomplete="false"
                       placeholder="Qty">
            </div>

            <!-- amt  -------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="price"></label>
                <input id="price" wire:model.live="price" class="block w-full purple-textbox-no-rounded"
                       autocomplete="false"
                       placeholder="price">
            </div>

            <!-- add button-------------------------------------------------------------------------------------------->
            <button wire:click="addItems"
                    class="px-3 justify-items-center py-1.5 md:px-3 bg-green-500 text-white font-semibold tracking-wider ">
                Add
            </button>

        </section>

            <!-- Table Bottom ------------------------------------------------------------------------------------->
        <x-forms.table>

            <x-slot name="table_header">
                <x-table.ths-slno>Sl.no</x-table.ths-slno>
                <x-table.ths-center>Product</x-table.ths-center>
                <x-table.ths-center>Colour</x-table.ths-center>
                <x-table.ths-center>Size</x-table.ths-center>
                <x-table.ths-center>Qty</x-table.ths-center>
                <x-table.ths-center>Price</x-table.ths-center>
                <x-table.ths-center>Total</x-table.ths-center>
                <x-table.header-action/>
            </x-slot>

            <x-slot name="table_body">

                @if ($itemList)

                    @foreach($itemList as $index => $row)
                        <x-table.row>

                            <x-table.cell>
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    <button class="w-full h-full cursor-pointer"
                                            wire:click.prevent="changeItems({{$index}})">
                                        {{$index+1}}
                                    </button>
                                </p>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full h-full cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">
                                    {{$row['product_name']}}
                                    @if($row['description'])
                                        &nbsp;-&nbsp;{{$row['description']}}
                                    @endif
                                </button>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full h-full cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">
                                    {{$row['colour_name']}}
                                </button>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full h-full cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">
                                    {{$row['size_name']}}
                                </button>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full h-full cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">
                                    {{$row['qty']}}
                                </button>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full h-full cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">
                                    {{$row['price']}}
                                </button>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full h-full cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">
                                    {{  round($row['qty']*$row['price']) }}
                                </button>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="inline-flex gap-3">
                                    <button wire:click.prevent="changeItems({{$index}})"
                                            class="py-1.5 w-full text-gray-500 items-center ">
                                        <x-icons.icon icon="pencil" class="block w-auto h-6"/>
                                    </button>
                                    <button wire:click.prevent="removeItems({{$index}})"
                                            class="py-1.5 w-full text-red-500 items-center ">
                                        <x-icons.icon icon="trash" class="block w-auto h-6"/>
                                    </button>
                                </div>
                            </x-table.cell>

                        </x-table.row>

                    @endforeach
                @endif


            </x-slot>

        </x-forms.table>

        <!-- Bottom Right  -------------------------------------------------------------------------------------------->
        <section class="w-full flex gap-5">
            <div class="w-1/4">
                <div class="flex flex-col gap-2 pt-5">
                    <div class="xl:flex w-full gap-2">

                        <!-- Ledger ----------------------------------------------------------------------------------->
                        <label for="ledger_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Ledger</label>
                        <div x-data="{isTyped: @entangle('ledgerTyped')}" @click.away="isTyped = false"
                             class='w-full'>
                            <div class="relative">
                                <input
                                    id="ledger_name"
                                    type="search"
                                    wire:model.live="ledger_name"
                                    autocomplete="off"
                                    placeholder="Ledger.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementLedger"
                                    wire:keydown.arrow-down="incrementLedger"
                                    wire:keydown.enter="enterLedger"
                                    class="block w-full purple-textbox"
                                />

                                <div x-show="isTyped"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     x-cloak
                                >
                                    <div class="absolute z-20 w-full mt-2">
                                        <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                            <ul class="overflow-y-scroll h-96">
                                                @if($ledgerCollection)
                                                    @forelse ($ledgerCollection as $i => $ledger)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightLedger === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setLedger('{{$ledger->vname}}','{{$ledger->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $ledger->vname }}
                                                        </li>
                                                    @empty
                                                        @livewire('controls.model.common.ledger-model',[$ledger_name])
                                                    @endforelse
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-input.model-text wire:model="bundle" :label="'Bundle'"/>
            </div>
            <div class="w-2/5 mr-3 ml-auto ">

                <x-input.model-text wire:model="additional" wire:change.debounce="calculateTotal"
                                    class="md:text-right purple-textbox w-full md:ml-20" :label="'Additional'"/>

                <div class="grid w-full md:grid-cols-2 pt-6">
                    <label
                        class="md:px-3 md:pb-2 text-left text-gray-600 text-md">Taxable&nbsp;Amount&nbsp;:&nbsp;&nbsp;</label>
                    <label class="ml-8 md:px-3 md:pb-2 text-right text-gray-800 text-md">{{  $total_taxable }}</label>
                </div>


                <div class="grid w-full grid-cols-2 pt-6">
                    <label
                        class="px-3 pb-2 text-left text-gray-600 text-md">Gst&nbsp;:&nbsp;&nbsp;</label>
                    <label class="px-3 pb-2 text-right text-gray-800 text-md">{{  $total_gst }}</label>
                </div>


                <div class="grid w-full grid-cols-2 pt-6">
                    <label
                        class="px-3 pb-2 text-left text-gray-600 text-md">Round off&nbsp;:&nbsp;&nbsp;</label>
                    <label class="px-3 pb-2 text-right text-gray-800 text-md">{{$round_off}}</label>
                </div>


                <div class="grid w-full grid-cols-2 pt-6">
                    <label
                        class="mr-3 md:px-3 md:pb-2 text-xl text-left  text-gray-600">Grand&nbsp;Total&nbsp;:&nbsp;&nbsp;</label>
                    <label
                        class="ml-8  px-3 pb-2  md:px-3 md:pb-2 text-xl font-extrabold text-right text-gray-800">{{$grand_total}}</label>
                </div>
            </div>
        </section>

        <!-- Bottom Buttons-------------------------------------------------------------------------------------------->
        <div class="flex justify-between pt-1">
            <div>
                <x-button.save/>
                <x-button.back/>
            </div>

            @if($vid)
            <div>
                <button wire:click.prevent="markAsEntered"
                        class="bg-green-400 text-white tracking-wider px-4 py-1 rounded-md flex items-center hover:bg-red-500">
                    <x-icons.icon :icon="'annotation'" class="h-8 px-3 w-auto inline-block items-center"/>
                    Mark as Entered
                </button>
            </div>
            @endif
        </div>

    </x-forms.m-panel>
</div>
