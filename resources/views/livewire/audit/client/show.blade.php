<div>

    <x-slot name="header">Client Details</x-slot>
    <div class="w-full border-t-2 border-purple-400 rounded-md shadow-lg bg-opacity-5">
        <div class="p-6 pt-12 pb-6 bg-white rounded-md">

            <!-- Client ID -------------------------------------------------------------------------------------------->

            <div class="flex flex-row gap-2 justify-between">
                <div class="flex  flex-row gap-3">
                    <div class="text-xl text-gray-500 py-2">Client Id:</div>
                    <div
                        class="text-2xl bg-amber-200 rounded-full px-4 py-1 flex items-center justify-center">{{$client->id}}</div>
                </div>

                <div class="text-center text-3xl font-semibold tracking-widest">
                    {{$client->vname}}
                </div>

                <div class="text-center text-2xl font-semibold tracking-widest px-5">
                    <x-input.model-select wire:model="client_id" wire:change="reRender" :label="''">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach($clients as $row)
                            <option value="{{$row->id}}">{{$row->vname}}</option>
                        @endforeach
                    </x-input.model-select>
                </div>
            </div>

            <!-- Table ------------------------------------------------------------------------------------------------>

            <div class="flex-col space-y-4 mt-10">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-cool-gray-200">
                        <tbody class="border-none">

                        <!-- Client Details---------------------------------------------------------------------------->

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Contact Person
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$vname}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Address
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$address_1}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Mobile
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$mobile}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$address_2}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Whatsapp
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$whatsapp}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        City
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$city}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Email
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$email}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        State
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$state}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Gstin
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$gstin}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Pincode
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$pincode}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        &nbsp;
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full flex justify-center gap-3 text-xl text-blue-400"
                                        wire:click="showDetailModal('contactDetails')">
                                    Edit Details
                                    <x-icons.icon :icon="'pencil'"
                                                  class="text-blue-500 h-5 w-auto block"/>
                                </button>
                            </x-table.cell>

                            <!--Clip Board ---------------------------------------------------------------------------->

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{
                                                $client->vname.
                                                '   Address :'.$address_1.
                                                '        :'.$address_2.
                                                ' Gst     :'.$gstin.
                                                '          '.
                                                ' Contact   :'.$vname.
                                                ' Mobile    :'.$mobile.
                                                ' Email     :'.$email

                                                }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <button class="w-full flex justify-center gap-3 text-xl text-blue-400"
                                        wire:click="showDetailModal('address')">
                                    Edit Address
                                    <x-icons.icon :icon="'pencil'"
                                                  class="text-blue-500 h-5 w-auto block"/>
                                </button>
                            </x-table.cell>
                        </x-table.row>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- User Table ------------------------------------------------------------------------------------------->

            <div class="flex-col space-y-4 mt-10">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-cool-gray-200">

                        <tbody class="bg-white divide-y divide-cool-gray-200">

                        <!-- Gst User  -------------------------------------------------------------------------------->

                        <x-table.row>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        Gst User Pass
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$gst_user}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $gst_user }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$gst_pass }}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $gst_pass  }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>


                            <x-table.cell>
                                <div class="w-full flex justify-center gap-3">
                                    <button class="text-gray-300 hover:text-blue-600" value="copy"
                                            onclick="copyToClipboard('{{ 'Gst user: '.$gst_user.' - '.'Pass: '.$gst_pass  }}')">
                                        <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                    </button>

                                    <x-button.link wire:click="showDetailModal('gstPass')">&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <!-- E-Invoice User Pass ---------------------------------------------------------------------->

                        <x-table.row>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        E-Invoice User Pass
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$einvoice_user}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard(' {{$einvoice_user}}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$einvoice_pass}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard(' {{$einvoice_pass}}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="w-full flex justify-center gap-3">
                                    <button class="text-gray-300 hover:text-blue-600" value="copy"
                                            onclick="copyToClipboard(' {{'Einvoice user :'.$einvoice_user.' - '.'Pass:'.$einvoice_pass}}')">
                                        <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>

                                    </button>
                                    <x-button.link wire:click="showDetailModal('einvoice')">&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <!-- E-Way User Pass -------------------------------------------------------------------------->

                        <x-table.row>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        E-Way User Pass
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$eway_user}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $eway_user }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>

                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$eway_pass}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard(' {{$eway_pass}}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="w-full flex justify-center gap-3">
                                    <button class="text-gray-300 hover:text-blue-600" value="copy"
                                            onclick="copyToClipboard(' {{'Eway user:'.$eway_user.' - '.'Pass:'.$eway_pass}}')">
                                        <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                    </button>

                                    <x-button.link wire:click="showDetailModal('eway')">&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <!-- E-Invoice API ---------------------------------------------------------------------------->

                        <x-table.row>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        E-Invoice API
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$einvoice_api}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $einvoice_api }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$einvoice_api_pass}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $einvoice_api_pass }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="w-full flex justify-center gap-3">
                                    <button class="text-gray-300 hover:text-blue-600" value="copy"
                                            onclick="copyToClipboard('{{ 'Einvoice_api:'.$einvoice_api.' - '.'api_pass:'.$einvoice_api_pass }}')">
                                        <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                    </button>

                                    <x-button.link wire:click="showDetailModal('einvoiceApi')">&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <!-- E-Way API -------------------------------------------------------------------------------->

                        <x-table.row>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        E-Way API
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$eway_api}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $eway_api }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$eway_api_pass}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $eway_api_pass }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="w-full flex justify-center gap-3">
                                    <button class="text-gray-300 hover:text-blue-600" value="copy"
                                            onclick="copyToClipboard('{{ 'Eway_api:'.$eway_api.' - '.'api_pass'. $eway_api_pass }}')">
                                        <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                    </button>

                                    <x-button.link wire:click="showDetailModal('ewayApi')">&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <!-- E-Mail Acc ------------------------------------------------------------------------------->

                        <x-table.row>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        E-mail Acc
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$acc_email}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $acc_email }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>

                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$acc_email_pass}}
                                    </p>

                                    <div>
                                        <button class="text-gray-300 hover:text-blue-600" value="copy"
                                                onclick="copyToClipboard('{{ $acc_email_pass }}')">
                                            <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                        </button>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="w-full flex justify-center gap-3">
                                    <button class="text-gray-300 hover:text-blue-600" value="copy"
                                            onclick="copyToClipboard('{{ 'Acc_email:'.$acc_email.' - '.'email_pass:'.$acc_email_pass }}')">
                                        <x-icons.icon :icon="'clip-board'" class="h-6 w-6"/>
                                    </button>

                                    <x-button.link wire:click="showDetailModal('accEmail')">&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Back Button ------------------------------------------------------------------------------------------>

            <div class="pt-6 flex gap-3">
                <div class="mt-5">
                    <a href="{{route('clients')}}" class="mt-5 bg-gray-400 text-white tracking-wider px-4 py-1
                rounded-md flex items-center w-24 hover:bg-gray-500">
                        <x-icons.icon :icon="'chevrons-left'" class="h-8 w-auto inline-block items-center"/>
                        Back
                    </a>
                </div>
            </div>
        </div>

        <!-- Show EditModel ------------------------------------------------------------------------------------------->

        <form wire:submit.prevent="upsertDetails">
            <div>
                <x-modal.dialog wire:model.defer="showModal">
                    <x-slot name="title">Edit
                        <x-forms.section-border class="py-2"/>
                    </x-slot>

                    <!-- Edit Details --------------------------------------------------------------------------------->

                    <x-slot name="content">
                        @switch($modalName)
                            @case('contactDetails')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="vname" class="w-[10rem] text-zinc-500 tracking-wide py-2">Contact
                                        Person</label>
                                    <input wire:model="vname" id="vname" autocomplete="off"
                                           value="{{ old('vname') }}"
                                           autofocus
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="mobile"
                                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Mobile</label>
                                    <input wire:model="mobile" id="mobile" autocomplete="off"
                                           value="{{ old('mobile') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="whatsapp"
                                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Whatsapp</label>
                                    <input wire:model="whatsapp" id="whatsapp" autocomplete="off"
                                           value="{{ old('whatsapp') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="email" class="w-[10rem] text-zinc-500 tracking-wide py-2">Email</label>
                                    <input wire:model="email" id="email" autocomplete="off"
                                           value="{{ old('email') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="gstin" class="w-[10rem] text-zinc-500 tracking-wide py-2">GST no</label>
                                    <input wire:model="gstin" id="gstin" autocomplete="off"
                                           value="{{ old('gstin') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                @break

                                <!-- Edit Address --------------------------------------------------------------------->

                            @case('address')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="address_1"
                                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Address</label>
                                    <input wire:model="address_1" id="address_1" autocomplete="off"
                                           value="{{ old('address_1') }}"
                                           autofocus
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="address_2" class="w-[10rem] text-zinc-500 tracking-wide py-2">Address
                                        2</label>
                                    <input wire:model="address_2" id="address_2" autocomplete="off"
                                           value="{{ old('address_2') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="city" class="w-[10rem] text-zinc-500 tracking-wide py-2">City</label>
                                    <input wire:model="city" id="city" autocomplete="off"
                                           value="{{ old('city') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="state" class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                                    <input wire:model="state" id="state" autocomplete="off"
                                           value="{{ old('state') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="pincode"
                                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                                    <input wire:model="pincode" id="state" autocomplete="off"
                                           value="{{ old('pincode') }}"
                                           class="w-full purple-textbox tracking-wider"
                                    />
                                </div>
                                @break

                                <!-- Edit GST User -------------------------------------------------------------------->

                            @case('gstPass')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="gst_user" class="w-[10rem] text-zinc-500 tracking-wide py-2">GST
                                        User</label>
                                    <input wire:model="gst_user" id="gst_user" autocomplete="off"
                                           value="{{ old('gst_user') }}"
                                           autofocus
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="gst_pass" class="w-[10rem] text-zinc-500 tracking-wide py-2">GST
                                        Pass</label>
                                    <input wire:model="gst_pass" id="gst_pass" autocomplete="off"
                                           value="{{ old('gst_pass') }}"
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                @break

                                <!-- Edit E-invoice_user -------------------------------------------------------------->

                            @case('einvoice')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="einvoice_user" class="w-[10rem] text-zinc-500 tracking-wide py-2">Einvoice
                                        User</label>
                                    <input wire:model="einvoice_user" id="einvoice_user" autocomplete="off"
                                           value="{{ old('einvoice_user') }}" autofocus
                                           class="w-full  purple-textbox"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="einvoice_pass" class="w-[10rem] text-zinc-500 tracking-wide py-2">Einvoice
                                        Pass</label>
                                    <input wire:model="einvoice_pass" id="einvoice_pass" autocomplete="off"
                                           value="{{ old('einvoice_pass') }}"
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                @break

                                <!-- Edit E-way_user ------------------------------------------------------------------>

                            @case('eway')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="eway_user" class="w-[10rem] text-zinc-500 tracking-wide py-2">EWay
                                        User</label>
                                    <input wire:model="eway_user" id="eway_user" autocomplete="off"
                                           value="{{ old('eway_user') }}" autofocus
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="eway_pass" class="w-[10rem] text-zinc-500 tracking-wide py-2">EWay
                                        Pass</label>
                                    <input wire:model="eway_pass" id="eway_pass" autocomplete="off"
                                           value="{{ old('eway_pass') }}"
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                @break

                                <!-- Edit E-invoice_API --------------------------------------------------------------->

                            @case('einvoiceApi')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="einvoice_api" class="w-[10rem] text-zinc-500 tracking-wide py-2">EInvoice
                                        API User</label>
                                    <input wire:model="einvoice_api" id="einvoice_api" autocomplete="off"
                                           value="{{ old('einvoice_api') }}" autofocus
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="einvoice_api_pass" class="w-[10rem] text-zinc-500 tracking-wide py-2">EInvoice
                                        API Pass</label>
                                    <input wire:model="einvoice_api_pass" id="einvoice_api_pass"
                                           autocomplete="off"
                                           value="{{ old('einvoice_api_pass') }}"
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                @break

                                <!-- Edit E-way_API ------------------------------------------------------------------->

                            @case('ewayApi')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="eway_api" class="w-[10rem] text-zinc-500 tracking-wide py-2">EWay API
                                        User</label>
                                    <input wire:model="eway_api" id="eway_api" autocomplete="off"
                                           value="{{ old('eway_api') }}" autofocus
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="eway_api_pass" class="w-[10rem] text-zinc-500 tracking-wide py-2">EWay
                                        API Pass</label>
                                    <input wire:model="eway_api_pass" id="eway_api_pass" autocomplete="off"
                                           value="{{ old('eway_api_pass') }}"
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                @break

                                <!-- Edit Acc-Email ------------------------------------------------------------------->

                            @case('accEmail')
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="acc_email" class="w-[10rem] text-zinc-500 tracking-wide py-2">Acc
                                        Email</label>
                                    <input wire:model="acc_email" id="acc_email" autocomplete="off"
                                           value="{{ old('acc_email') }}" autofocus
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                <div class="flex flex-row gap-3 py-3">
                                    <label for="acc_email_pass" class="w-[10rem] text-zinc-500 tracking-wide py-2">Acc
                                        Email pass</label>
                                    <input wire:model="acc_email_pass" id="acc_email_pass" autocomplete="off"
                                           value="{{ old('acc_email_pass') }}"
                                           class="w-full purple-textbox"
                                    />
                                </div>
                                @break

                        @endswitch

                        <div class="mb-3">&nbsp;</div>

                    </x-slot>

                    <!-- Cancel/Save ---------------------------------------------------------------------------------->

                    <x-slot name="footer">
                        <div class="w-full flex justify-between gap-3">
                            <div class="flex gap-3">
                                <x-button.secondary
                                    wire:click.prevent="$set('showModal', false)">Cancel
                                </x-button.secondary>

                                <x-button.primary type="submit" wire:click.prevent="upsertDetails">Save
                                </x-button.primary>
                            </div>
                        </div>

                    </x-slot>
                </x-modal.dialog>
            </div>
        </form>
    </div>
</div>
