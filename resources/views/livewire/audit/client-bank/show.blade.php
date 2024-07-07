<div>
    <x-slot name="header">Bank Details</x-slot>
    <div class="w-full border-t-2 border-purple-400 rounded-md shadow-lg bg-opacity-5">
        <div class="p-6 pt-12 pb-6 bg-white rounded-md">

            <!-- Client Bank-details ---------------------------------------------------------------------------------->

            <div class="flex flex-row gap-2">
                <div class="w-full flex">
                    <div class="w-28 text-xl text-gray-500 py-2">Client Id:</div>
                    <div
                        class="w-12 text-2xl bg-amber-200 rounded-full px-2 py-1 flex items-center justify-center">{{$bank->client_id}}</div>
                </div>
                <div class="w-full text-center text-3xl font-semibold tracking-widest">{{$bank->vname}}</div>
                <div class="w-full">
                    <x-input.model-select wire:model="client_id" wire:change="switch" :label="''">
                        @foreach($banks as $i)
                            <option value="{{$i->id}}">{{$i->vname}}</option>
                        @endforeach
                    </x-input.model-select>
                </div>
            </div>

            <!-- Bank-details Table ----------------------------------------------------------------------------------->
            <div class="flex-col space-y-4 mt-10">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-cool-gray-200">
                        <tbody class="border-none">

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Name
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->client->vname}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        CUS ID
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->customer_id}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Account No
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->acno}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        USER ID
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->customer_id2}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        IFSC CODE
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->ifsc}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        PKS
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->pks}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        BANK
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->bank}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        TRS
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->trs}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        BRANCH
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->branch}}
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        PROFILE
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->profileps}}
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
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        &nbsp;
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Mobile
                                    </p>
                                </div>
                            </x-table.cell>


                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->mobile}}
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

                            <x-table.cell colspan="3">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->email}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        DVCATM
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell colspan="3">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->dvcatm}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Entry By
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell colspan="3">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->user->name}}
                                        - {{$bank->updated_at ?  date('d-m-Y h:i A',strtotime($bank->updated_at )) : '' }}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        Edit Bank
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <x-button.link wire:click="edit({{ $id }})">&nbsp;

                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 hover:h-6 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        Edit Login
                                    </p>
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="flex px-3">
                                    <x-button.link wire:click="editLogin({{ $id }})">&nbsp;

                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 hover:h-6 w-auto block"/>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        </tbody>
                    </table>
                </div>
            </div>

            <x-forms.create-new :id="$vid">

                <div class="lg:flex w-full">
                    <div class="lg:ml-2 px-8 w-full">
                        <x-input.model-text wire:model="vname" :label="'Name'"/>
                        <x-input.model-text wire:model="acno" :label="'Ac No'"/>
                        <x-input.model-text wire:model="ifsc" :label="'IFSC Code'"/>
                        <x-input.model-text wire:model="Bank" :label="'Bank'"/>
                        <x-input.model-text wire:model="branch" :label="'Branch'"/>
                        <x-input.model-text wire:model="dvcatm" :label="'dvcatm'"/>
                        <x-input.model-text wire:model="verified" :label="'Verified'"/>
                        <x-input.model-text wire:model="email" :label="'Email'"/>
                    </div>


                    {{--                    <div class="lg:px-8 w-1/2">--}}
                    {{--                        <x-input.model-text wire:model="customer_id" :label="'Cus Id'"/>--}}
                    {{--                        <x-input.model-text wire:model="customer_id2" :label="'User Id'"/>--}}
                    {{--                        <x-input.model-text wire:model="pks" :label="'Pks'"/>--}}
                    {{--                        <x-input.model-text wire:model="trs" :label="'Trs'"/>--}}
                    {{--                        <x-input.model-text wire:model="profileps" :label="'Profile'"/>--}}
                    {{--                        <x-input.model-text wire:model="mobile" :label="'Mobile'"/>--}}
                    {{--                    </div>--}}
                </div>
            </x-forms.create-new>

            <div>
                <form wire:submit.prevent="save" >
                    <div class="w-full">
                        <x-jet.modal :maxWidth="'6xl'" wire:model.defer="showEditModal2">
                            <div class="px-6  pt-4">
                                <div class="text-lg">
                                    {{$id === "" ? 'New Entry' : 'Edit Entry'}}
                                </div>
                                <x-forms.section-border class="py-2"/>
                                                    <div class="lg:px-8 w-full">
                                                        <x-input.model-text wire:model="customer_id" :label="'Cus Id'"/>
                                                        <x-input.model-text wire:model="customer_id2" :label="'User Id'"/>
                                                        <x-input.model-text wire:model="pks" :label="'Pks'"/>
                                                        <x-input.model-text wire:model="trs" :label="'Trs'"/>
                                                        <x-input.model-text wire:model="profileps" :label="'Profile'"/>
                                                        <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
                                                    </div>
                                <div class="mb-1">&nbsp;</div>
                            </div>
                            <div class="px-6 py-3 bg-gray-100 text-right">
                                <div class="w-full flex justify-between gap-3">
                                    <div class="py-2">
                                        <label for="active_id" class="inline-flex relative items-center cursor-pointer">
                                            <input type="checkbox" id="active_id" class="sr-only peer"
                                                   wire:model="active_id">
                                            <div
                                                class="w-10 h-5 bg-gray-200 rounded-full peer peer-focus:ring-2
                                        peer-focus:ring-blue-300
                                         peer-checked:after:translate-x-full peer-checked:after:border-white
                                         after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300
                                         after:border after:rounded-full after:h-4 after:w-4 after:transition-all
                                         peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-900">Active</span>
                                        </label>
                                    </div>
                                    <div class="flex gap-3">
                                        <button wire:click.prevent="$set('showEditModal2', false)"
                                                class='inline-flex items-center px-4 py-2 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest
                               focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150
                               focus:ring-gray-500 bg-gray-600 hover:bg-gray-500 active:bg-gray-700 border-gray-600'>
                                            <x-icons.icon :icon="'chevrons-left'" class="h-5 w-auto block px-1.5"/>
                                            Cancel
                                        </button>
                                        <x-button.save/>
                                    </div>
                                </div>
                            </div>
                        </x-jet.modal>
                    </div>
                </form>
            </div>

            <!-- Footer ----------------------------------------------------------------------------------------------->

            <div class="mt-5">
                <a href="{{route('clientBanks')}}" class="mt-5 bg-gray-400 text-white tracking-wider px-4 py-1
                rounded-md flex items-center w-24 hover:bg-gray-500">
                    <x-icons.icon :icon="'chevrons-left'" class="h-8 w-auto inline-block items-center"/>
                    Back
                </a>
            </div>
        </div>
    </div>
</div>
