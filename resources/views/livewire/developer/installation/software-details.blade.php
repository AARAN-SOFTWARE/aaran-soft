<div>
    <div>
        <x-slot name="header">Software Details</x-slot>

        <x-forms.m-panel>

            <!-- Top Controls --------------------------------------------------------------------------------------------->
            <x-forms.top-controls :show-filters="$showFilters"/>

            <!-- Header --------------------------------------------------------------------------------------------------->
            <x-forms.table>

                <!-- Table Header --------------------------------------------------------------------------------------------->

                <x-slot name="table_header">
                    <x-table.header-serial/>
                    <x-table.header-text center>Domain</x-table.header-text>
                    <x-table.header-text center>Database</x-table.header-text>
                    <x-table.header-text center>Git</x-table.header-text>
                    <x-table.header-text center>Webhook</x-table.header-text>
                    <x-table.header-text center>Copy Build Folder</x-table.header-text>
                    <x-table.header-text center>Copy Env</x-table.header-text>
                    <x-table.header-text center>Db Migrate</x-table.header-text>
                    <x-table.header-text center>Storage Link</x-table.header-text>
                    <x-table.header-text center>User Created</x-table.header-text>
                    <x-table.header-text center>Set User Tenant Id</x-table.header-text>
                    <x-table.header-text center>Installed on</x-table.header-text>
                    <x-table.header-text center>Soft Version</x-table.header-text>
                    <x-table.header-text center>Db Version</x-table.header-text>
                    <x-table.header-action/>
                </x-slot>

                <!-- Table Body ------------------------------------------------------------------------------------------->
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)

                        <x-table.row>
                            <x-table.cell-text center>
                                {{ $index + 1 }}
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                {{ $row->sub_domain}}
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                {{ $row->database}}
                            </x-table.cell-text>


                            <x-table.cell-text center>
                                {{ $row->git}}
                            </x-table.cell-text>


                            <x-table.cell-text center>
                                {{ $row->webhook}}
                            </x-table.cell-text>


                            <x-table.cell-text center>
                                <label>
                                    <input type="checkbox" onclick="return false"
                                           @if($row->copy_build_folder) checked @endif
                                           class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:animate-none focus:outline-none
                                                   {{ $row->copy_build_folder ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                                </label>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <label>
                                    <input type="checkbox" onclick="return false"
                                           @if($row->copy_env) checked @endif
                                           class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:animate-none focus:outline-none
                                                   {{ $row->copy_env ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                                </label>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <label>
                                    <input type="checkbox" onclick="return false"
                                           @if($row->db_migrate) checked @endif
                                           class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:animate-none focus:outline-none
                                                   {{ $row->db_migrate ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                                </label>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <label>
                                    <input type="checkbox" onclick="return false"
                                           @if($row->storage_link) checked @endif
                                           class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:animate-none focus:outline-none
                                                   {{ $row->storage_link ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                                </label>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                <label>
                                    <input type="checkbox" onclick="return false"
                                           @if($row->user_created) checked @endif
                                           class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:animate-none focus:outline-none
                                                   {{ $row->user_created ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                                </label>
                            </x-table.cell-text>


                            <x-table.cell-text center>
                                <label>
                                    <input type="checkbox" onclick="return false"
                                           @if($row->user_tenant_id) checked @endif
                                           class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:animate-none focus:outline-none
                                                   {{ $row->user_tenant_id ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                                </label>
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                {{date('d-m-Y', strtotime($row->installed_on))}}
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                {{$row->soft_version}}
                                {{ App\Enums\Version::tryFrom($row->soft_version)}}
                            </x-table.cell-text>

                            <x-table.cell-text center>
                                {{$row->db_version}}
                                {{ App\Enums\Version::tryFrom($row->db_version)}}
                            </x-table.cell-text>

                            <x-table.cell-action id="{{$row->id}}"/>

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

            <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
            <x-forms.create-new :id="$vid">
                <div class="lg:flex w-full">
                    <div class="w-full">
                        <div class="flex items-center gap-2">
                            <x-input.model-text wire:model="sub_domain" :label="'Sub Domain'"/>
                            <x-copyClipboard text="'{{$sub_domain}}'"/>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-input.model-text wire:model="database" :label="'Database'"/>
                            <x-copyClipboard text="'{{$database}}'"/>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-input.model-text wire:model="git" :label="'Git'"/>
                            <x-copyClipboard text="'{{$git}}'"/>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-input.model-text wire:model="webhook" :label="'webhook'"/>
                            <x-copyClipboard text="'{{$webhook}}'"/>
                        </div>
                        <x-input.checkbox wire:model="copy_build_folder" :label="'Copy Build Folder'"/>
                        <x-input.checkbox wire:model="copy_env" :label="'Copy Env'"/>
                        <x-input.checkbox wire:model="db_migrate" :label="'Db Migrate'"/>
                    </div>
                    <div class="w-full pl-5">
                        <x-input.checkbox wire:model="storage_link" :label="'Storage Link'"/>
                        <x-input.checkbox wire:model="user_created" :label="'User Created'"/>
                        <x-input.checkbox wire:model="user_tenant_id" :label="'User Tenant Id'"/>
                        <x-input.model-date wire:model="installed_on" :label="'Installed on'"/>

                        <x-input.model-select wire:model="soft_version" :label="'Soft Version'">
                            <option class="text-gray-400"> choose ..</option>
                            @foreach(\App\Enums\Version::cases() as $v)
                                <option class="text-gray-700" value="{{$v->name}}">{{$v->value}}</option>
                            @endforeach
                        </x-input.model-select>

                        <x-input.model-select wire:model="db_version" :label="'DB Version'">
                            <option class="text-gray-400"> choose ..</option>
                            @foreach(\App\Enums\Version::cases() as $db)
                                <option class="text-gray-700" value="{{$db->name}}">{{$db->value}}</option>
                            @endforeach
                        </x-input.model-select>

                        <x-input.model-select wire:model="verify" :label="'Verify by'">
                            <option class="text-gray-400"> choose ..</option>
                            @foreach(\App\Models\User::all() as $user)
                                <option class="text-gray-700" value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </x-input.model-select>


                    </div>
                </div>
            </x-forms.create-new>

        </x-forms.m-panel>
    </div>
</div>
