<div>
    <x-slot name="header">Discourse</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Header --------------------------------------------------------------------------------------------->
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial text="E.no"/>
                <x-table.header-text center>Date</x-table.header-text>
                <x-table.header-text left wire:click.prevent="sortBy('client_id')">Client</x-table.header-text>
                <x-table.header-text left>Title</x-table.header-text>
                <x-table.header-text left>Body</x-table.header-text>
                <x-table.header-text center wire:click.prevent="sortBy('channel')">Channel</x-table.header-text>
                <x-table.header-text center>Allocated</x-table.header-text>
                <x-table.header-text center>Priority</x-table.header-text>
                <x-table.header-text center>Image</x-table.header-text>
                <x-table.header-text center>Entry</x-table.header-text>
                <x-table.header-text center>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text center>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{ $row->id }}</a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{$row->vdate ? date('d-m-Y', strtotime($row->vdate)):''}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{ $row->client->vname }}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{ $row->title }}</a>
                        </x-table.cell-text>

                        <x-table.cell-text :class="'line-clamp-1'">
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {!! $row->body  !!}</a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{ $row->channel? \App\Enums\Channels::tryFrom($row->channel)->getName():''}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{ $row->user->name }}</a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{ $row->priority ? \App\Enums\Priority::tryFrom($row->priority)->getName():''}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                <img src="{{ url(\Illuminate\Support\Facades\Storage::url($row->image ))}}" alt="image"
                                     class="h-10 w-auto"></a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                {{ $row->user->name }}</a>
                        </x-table.cell-text>

                        <x-table.cell>
                            <a href="{{ route('discourse.show',[$row->id]) }}">
                                <div
                                    class="flex w-full text-xl text-center  items-center justify-center p-1 {{  \App\Enums\Status::tryFrom($row->status)->getStyle()}}">
                                    {{ \App\Enums\Status::tryFrom($row->status)->getName()}}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell-action :id="$row->id"/>
                    </x-table.row>

                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>

            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <!-- Delete Model ---------------------------------------------------------------------------------------------->
        <x-modal.delete/>

        <!-- Create Form ---------------------------------------------------------------------------------------------->
        <x-forms.create-new :id="$vid">

            <div class="flex space-x-5">
                <div class="flex flex-col gap-4">
                    <x-input.model-select wire:model="client_id" :label="'Client'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->vname}}</option>
                        @endforeach
                    </x-input.model-select>

                    <x-input.model-text wire:model="title" :label="'Title'"/>

                    <div class="px-1 py-4">
                        <x-input.rich-text wire:model="body" :placeholder="''" :height="'h-72'"/>
                    </div>

                    <x-input.model-select wire:model="channel" :label="'Channel'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach(\App\Enums\Channels::cases() as $channel)
                            <option value="{{$channel->value}}">{{$channel->getName()}}</option>
                        @endforeach
                    </x-input.model-select>
                </div>

                <div class="flex flex-col gap-4">
                    <x-input.model-text wire:model="vdate" type="date" :label="'Date'"/>

                    <x-input.model-select wire:model="allocated" :label="'Assign To'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </x-input.model-select>

                    <x-input.model-select wire:model="priority" :label="'Priorities'">
                        <option class="text-gray-400"> choose ..</option>
                        @foreach(\App\Enums\Priority::cases() as $priorities)
                            <option value="{{$priorities->value}}">{{$priorities->getName()}}</option>
                        @endforeach
                    </x-input.model-select>

                    @admin
                    <x-input.model-text wire:model="verified" :label="'Verified'"/>

                    <x-input.model-date wire:model="verified_on" :label="'Verified On'"/>
                    @endadmin

                    <!-- image ---------------------------------------------------------------------------------------------->

{{--                    <div class="grid grid-cols-2 flex-shrink-0 h-80 w-80 mr-4">--}}
{{--                        <div class="border border-gray-400 h-64 w-52">--}}
{{--                            Photo Preview:--}}
{{--                            @if($image)--}}
{{--                                <img--}}
{{--                                    src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}"--}}
{{--                                    class="h-64 w-auto" alt="{{$image}}">--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <input type="file" wire:model="image">--}}
{{--                        <button wire:click.prevent="save_image"></button>--}}
{{--                    </div>--}}

                    <!-- Create Form ---------------------------------------------------------------------------------------------->

                    <!-- Create Form ---------------------------------------------------------------------------------------------->

                    <div class="flex flex-row gap-6 mt-4">

                        <div class="flex">

                            <label for="logo_in" class="w-[10rem] text-zinc-500 tracking-wide py-2">Image</label>

                            <div class="flex-shrink-0">

                                <div>
                                    @if($image)
                                        <img
                                            src="{{$isUploaded? $image->temporaryUrl() : url(\Illuminate\Support\Facades\Storage::url($image)) }}"
                                            alt="Image"
                                            class="h-24 w-auto mb-1 rounded-md outline outline-2 outline-gray-300 shadow-md shadow-gray-400">
                                    @else
                                        <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="relative">

                            <div>
                                <label for="image"
                                       class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                    <x-icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                    Upload file

                                    <input type="file" id='image' wire:model="image" class="hidden"/>
                                    <p class="text-xs font-light text-gray-400 mt-2">PNG, JPG SVG, WEBP, and GIF are
                                        Allowed.</p>
                                </label>
                            </div>

                            <div wire:loading wire:target="image" class="z-10 absolute top-6 left-[107px]">
                                <div class="w-14 h-14 rounded-full animate-spin
                    border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </x-forms.create-new>
    </x-forms.m-panel>
</div>
