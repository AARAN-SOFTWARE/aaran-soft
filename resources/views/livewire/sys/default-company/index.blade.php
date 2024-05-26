<div>
    <button type="button" wire:click="create"
            class="text-gray-600 bg-white focus:outline-none hover:bg-gray-100 font-semibold px-2 py-2 rounded-lg">
        {{$defaultCompany->company->vname ?:'Select Company' }}
        &nbsp;-&nbsp;{{\App\Enums\AcYear::tryFrom($defaultCompany->acyear)->getName()?:'' }}
    </button>

    <x-jet.modal wire:model.defer="showEditModal">

        <div
                class=" flex flex-row justify-between px-6 pt-4 text-xl font-semibold text-blue-600/100 dark:text-blue-500/100 ">
            <div>Choose Company</div>
            <div>
                <livewire:controls.select.acyear-select/>
            </div>
        </div>

        <x-forms.section-border class="py-2"/>
        <div class=" mt-4 mb-5 px-6  pt-4">
            <table class="w-full">
                @forelse ($companies as $index =>  $row)
                    <x-table.row>
                        <x-table.cell>
                            <button wire:click.prevent="switchCompany({{$row->id}})"
                                    class="flex px-3 text-gray-600 truncate text-xl text-left w-full">
                                {{ $row->vname}}
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="switchCompany({{$row->id}})"
                                    class="flex px-2 text-gray-600 text-xl justify-end w-full">
                                {{  $row->vname === $defaultCompany->company->vname ?'Default': '-'  }}

                            </button>
                        </x-table.cell>

                    </x-table.row>
                @empty
                    <x-table.empty/>
                @endforelse
            </table>
        </div>
    </x-jet.modal>
</div>
