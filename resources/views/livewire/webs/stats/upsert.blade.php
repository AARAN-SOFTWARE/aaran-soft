<div>
    <x-slot name="header">Testimony</x-slot>
    <x-forms.m-panel>
        <div class="flex flex-col-2 gap-3">
            <div class="lg:w-1/2 ml-2 px-8 flex flex-col gap-3">
                <x-input.model-text wire:model.live="vname" :label="'Heading'"/>
                <div class="flex flex-col sm:flex-row gap-1 sm:gap-3">
                    <label for="description"
                           class="w-[10rem] text-zinc-500 tracking-wide py-2">Slogan</label>
                    <textarea id="description" autocomplete="off" wire:model.live="description"
                              class="w-full purple-textbox h-16"
                    ></textarea>
                </div>
                <hr class="my-2 border-gray-200 dark:border-gray-700">
                <div>
                    <div class="flex flex-col gap-3">
                        <x-input.model-text wire:model.live="itemList.{{0}}.count" :label="'Count'"/>
                        <x-input.model-text wire:model.live="itemList.{{0}}.heading" :label="'Heading'"/>
                        <x-input.model-text wire:model.live="itemList.{{0}}.description" :label="'Description'"/>

                    </div>

                    <button
                        class="text-white inline-block py-1 px-3 font-semibold bg-blue-500 hover:bg-blue-700 rounded-lg"
                        wire:click="addItem('{{$itemIncrement}}')">
                        + Add
                    </button>
                </div>
            </div>
            <div class="lg:w-1/2 ml-2 px-8 flex flex-col gap-3">
                <div class="ml-2 px-8  grid grid-cols-2 gap-3">
                    @foreach( $secondaryItem as $index => $row )
                        <div class="gap-3">
                            <div class="flex flex-col gap-3">
                                <x-input.model-text wire:model.live="itemList.{{$row}}.count" :label="'Count'"/>
                                <x-input.model-text wire:model.live="itemList.{{$row}}.heading" :label="'Heading'"/>
                                <x-input.model-text wire:model.live="itemList.{{$row}}.description" :label="'Description'"/>
                            </div>

                            <button
                                class=" bg-red-500 hover:bg-red-700 inline-block py-1 px-3 text-white h-fit font-semibold flex-col gap-2 rounded-lg"
                                wire:click="deleteItem('{{$index}}','{{$row}}')">
                                <span>Delete</span>
                                <x-icons.icon :icon="'trash'" class="block h-4 w-4"/>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </x-forms.m-panel>
    <!-- Save Button area --------------------------------------------------------------------------------------------->
    <x-forms.m-panel-bottom-button save back active/>
</div>
