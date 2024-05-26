<div>
    <x-slot name="header">GST Filing</x-slot>

    <x-forms.m-panel>
        <!-- Top Controls -------------------------------------------------------------------------------------------->
        <div class="flex flex-row gap-3 py-3">

            <div class="flex flex-row gap-3 py-3 w-full">
                <label for="month" class="w-[8rem] text-zinc-500 tracking-wide py-2">Month</label>
                <select wire:model="month" wire:change="reRender" class="w-full purple-textbox" id="month">
                    <option class="text-zinc-500 px-1">Choose Month...</option>
                    @foreach(\App\Enums\Months::cases() as $month)
                        <option value="{{$month->value}}">{{$month->getName()}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-row gap-3 py-3 w-full">
                <label for="year" class="w-[8rem] text-zinc-500 tracking-wide px-3 py-2">Year</label>
                <select wire:model="year" wire:change="reRender" class="w-full purple-textbox" id="year">
                    <option class="text-zinc-500 px-1">Choose Year...</option>
                    @foreach(\App\Enums\Years::cases() as $year)
                        <option value="{{$year->value}}">{{$year->getName()}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Header --------------------------------------------------------------------------------------------------->

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-serial/>
                <x-table.header-text center>Client</x-table.header-text>
                <x-table.header-text center>GSTR-1</x-table.header-text>
                <x-table.header-text center>GSTR-3B</x-table.header-text>
                <x-table.header-text center>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell-text center>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                {{ $index + 1 }}
                            </button>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                {{ $row->client->vname }}
                            </button>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                {{ $row->gstr1_arn }}
                                -{{$row->gstr1_date ?  date('d-m-Y',strtotime($row->gstr1_date )) : '' }}
                            </button>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                {{ $row->gstr3b_arn }}
                                -{{$row->gstr3b_date ?  date('d-m-Y',strtotime($row->gstr3b_date )) : '' }}
                            </button>
                        </x-table.cell-text>

                        <x-table.cell-text center>
                            <div
                                class="flex w-full items-center justify-center  text-center {{  \App\Enums\Status::tryFrom($row->status_id)->getStyle()}}">
                                <p class="flex w-full text-xl text-center  items-center justify-center p-1">
                                    {{ \App\Enums\Status::tryFrom($row->status_id)->getName()}}
                                </p>
                            </div>
                        </x-table.cell-text>

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

        <x-modal.delete/>

        <!-- Create --------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="gstr1_arn" autofocus :label="'GSTR-1-ARN'"/>
            <x-input.model-text wire:model="gstr1_date" type="date" :label="'GSTR-1-DATE'"/>
            <x-input.model-text wire:model="gstr3b_arn" :label="'3B-ARN'"/>
            <x-input.model-text wire:model="gstr3b_date" type="date" :label="'3B-DATE'"/>
        </x-forms.create>

        <div class="flex flex-row justify-between px-5">

            <x-button.primary wire:click="generate">Generate</x-button.primary>
            <div>Hi, yet to be file - <span class="px-5 text-xl text-red-500 font-extrabold">{{$filed}}</span></div>
        </div>

    </x-forms.m-panel>
</div>
