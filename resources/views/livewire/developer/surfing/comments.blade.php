<div>
    <x-slot name="header">Comments</x-slot>

    <div class="flex justify-between">
        <div class="w-full text-right">
            <div class="lg:text-4xl">{{$surfing_id}}</div>
        </div>
        <div class="text-4xl font-bold text-center w-full">{{$title}}</div>
        <div class="w-full">{{$surfing_category_name}}</div>
    </div>
    <div class="lg:text-center text-4xl animate-pulse text-blue-500 mt-3">
        <a href="{{$webpage}}" target="_blank">
            {{$webpage}}
        </a>
    </div>

    <div class="my-3">
        @forelse ($replies as $row)
            <div class="p-1 flex flex-row justify-between border-b border-gray-200  ">
                <div class="px-5 ">
                    {{$row->vname}}
                </div>
                <div class="text-sm text-gray-500 gap-3 inline-flex">
                    {{$row->user->name}}
                    &nbsp;&nbsp;@&nbsp;&nbsp;{{date('d-m-Y h:i a', strtotime($row->updated_at))}}
                    <x-table.cell-action id="{{$row->id}}"/>
                </div>
            </div>
        @empty
            <div class="flex justify-center items-center space-x-2">
                <x-icons.inbox class="h-8 w-8 text-cool-gray-400"/>
                <span class="font-medium py-8 text-cool-gray-400 text-xl">No Entry found...</span>
            </div>
        @endforelse
        <x-modal.delete/>
    </div>


    <div class="flex justify-between">

        <div class="flex gap-3">
            <div class="h-12">
                <x-button.primary wire:click="create">
                    Reply
                </x-button.primary>
            </div>
            <div>
                <x-button.back/>
            </div>
        </div>
    </div>


    <!-- Create Record -->
    <form wire:submit.prevent="save">
        <div>
            <x-modal.dialog wire:model.defer="showEditModal">
                <x-slot name="title">
                </x-slot>

                <x-slot name="content">

                    <div class="flex flex-col gap-3 py-3">
                        <label for="reply" class="w-[8rem] text-zinc-500 tracking-wide py-2">Comments</label>
                        <textarea rows="5" id="reply" wire:model="reply" autocomplete="off" autofocus
                                  class="rounded-lg appearance-none border
                                                 border-gray-300 py-2 px-2 bg-white text-gray-800 w-full
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5"></textarea>
                    </div>
                    <x-input.model-text wire:model="verified" :label="'Verified'"/>
                    <x-input.model-date wire:model="verified_on" :label="'Verified On'"/>

                    <div class="pb-2">&nbsp;</div>

                </x-slot>

                <x-slot name="footer">
                    <div class="w-full flex justify-between gap-3">
                        <div class="flex gap-2">
                            <x-button.primary type="submit" wire:click.prevent="save">Save</x-button.primary>
                        </div>

                    </div>

                </x-slot>
            </x-modal.dialog>
        </div>
    </form>

</div>
