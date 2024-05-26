<div>
    <x-slot name="header">System Config</x-slot>

    <x-forms.m-panel>

        @admin
        <div class="flex flex-row gap-5 w-full">

            <div class="flex flex-col gap-3 w-1/4">
                <button wire:click.prevent="runMigration" class="px-2 py-1 bg-gray-400">Run Migration</button>

                <button wire:click.prevent="runMigrationRollBack" class="px-2 py-1 bg-gray-400">Run Migration:rollback
                </button>

                <button wire:click.prevent="clearView" class="px-2 py-1 bg-gray-400">Run view:clear</button>

                <button wire:click.prevent="storageLink" class="px-2 py-1 bg-gray-400">Storage Link</button>

                <button wire:click.prevent="runMigrationFreshSeed" class="px-2 py-1 bg-gray-400">Run Migration:fresh
                    --seed
                </button>

                <div wire:loading
                     wire:target="clearView,storageLink,storageLink,runMigrationRollBack,runMigration,runMigrationFreshSeed">
                    Work is on progress...
                </div>
            </div>

            <div class="w-1/4 border-2 p-3">

                <div class="text-gray-500 text-sm">
                    Tenant in user
                </div>

                <div>
                    <x-input.model-select wire:model="user_id" :label="'Name'">
                        <option value="">choose</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">   {{$user->name.' - Tenant Id : '.$user->tenant_id}}</option>
                        @endforeach
                    </x-input.model-select>
                </div>

                <div>
                    <x-input.model-select wire:model="tenant_id" :label="'Tenant Id'">
                        <option>Choose...</option>
                        @foreach($tenants as $tenant)
                            <option
                                value="{{ $tenant->id }}">{{ $tenant->t_name.' - Tenant Id : '.$tenant->id }}</option>
                        @endforeach
                    </x-input.model-select>
                    <x-input.model-select wire:model="role_id" :label="'Role Id'">
                        <option>Choose...</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->vname }}</option>
                        @endforeach
                    </x-input.model-select>
                </div>

                <button type="submit" wire:click.prevent="updateUser"
                        class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                        transition-all shadow-xs
                                        bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                                        shadow-blue-200 hover:shadow-2xl hover:shadow-blue-200 hover:-tranneutral-y-px'">
                    <x-icons.icon :icon="'save'" class="h-5 w-auto block px-1.5"/>
                    SAVE
                </button>

            </div>

            <div class="w-1/4 border-2 p-3 flex flex-col gap-3">

                <div class="text-gray-500 text-sm">
                    Database Version
                </div>
                <div class="flex gap-3">
                    <span>Software :</span>
                    <span class="text-2xl">&nbsp;&nbsp;{{$soft_v}}&nbsp;&nbsp;</span>
                    <span>Database :</span>
                    <span class="text-2xl">&nbsp;&nbsp;{{$db_v}}&nbsp;&nbsp;</span>
                </div>

                <div>
                    <x-input.text-input wire:model="soft_v"/>
                    <x-input.text-input wire:model="db_v"/>
                </div>

                <button type="submit" wire:click.prevent="updateVersion"
                        class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                        transition-all shadow-xs
                                        bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                                        shadow-blue-200 hover:shadow-2xl hover:shadow-blue-200 hover:-tranneutral-y-px'">
                    <x-icons.icon :icon="'save'" class="h-5 w-auto block px-1.5"/>
                    SAVE
                </button>
            </div>
        @endadmin

    </x-forms.m-panel>
</div>
