<div class="relative h-72">
    <div class="border border-gray-300 max-w-screen-md rounded-t-md  overflow-scroll shadow-lg bg-white h-full border-b-0">

        <div>
            <div class="flex items-center gap-3 p-2 border-b border-gray-300">
                <x-icons.icon :icon="'clipboard-document-list'" class="block h-8 w-auto text-blue-600"/>
                <span class="text-xl font-semibold tracking-wider text-zinc-600">To Do List</span>
            </div>

            <div class="flex flex-shrink-0 m-3 flex-col">
                @foreach($list as $index =>$row)

                    <div class="flex flex-row justify-between gap-3">

                        <div class="flex gap-3 w-full">
                            <label>
                                <input wire:click="isChecked({{$row->id}})" type="checkbox"
                                       @if($row->completed) checked @endif
                                       class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                                                   {{ $row->completed ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                            </label>

                            @if($row->vname === $ename)
                                <label class="flex flex-row w-full">
                                    <input class="w-10 purple-textbox" wire:change.prevent="updateTodo({{$row->id}})"
                                           wire:model="slno">
                                    <input class="purple-textbox w-full" wire:change.prevent="updateTodo({{$row->id}})"
                                           wire:model="ename">
                                </label>
                            @else
                                <label
                                    class="font-medium {{ $row->completed ? 'line-through text-green-500': 'text-gray-700'}}">
                                    {{ $row->slno }}&nbsp;.&nbsp;&nbsp;&nbsp;{{ $row->vname }}
                                </label>
                            @endif

                            @if($editmode)
                                <label>
                                    <input wire:model="vname">
                                </label>
                            @endif


                        </div>

                        <div class="flex-shrink-0 text-[0.5rem] pt-1 text-zinc-400">
                            {{ \Illuminate\Support\Carbon::parse($row->vdate)->diffForHumans()}}
                        </div>

                        <div class="flex justify-center gap-2">

                            <button wire:click.prevent="markAsPublic('{{$row->id}}')">

                                @if($row->subjective)
                                    <x-icons.icon :icon="'eye'"
                                                  class="text-blue-500 hover:text-gray-500 h-5 w-auto block"/>
                                @else
                                    <x-icons.icon :icon="'eye-slash'"
                                                  class="text-gray-300 hover:text-blue-500 h-5 w-auto block"/>
                                @endif
                            </button>

                            <button wire:click.prevent="edit('{{$row->vname}}')">

                                <x-icons.icon :icon="'pencil'"
                                              class="text-gray-300 hover:text-blue-500 h-4 w-auto block"/>
                            </button>

                            <button wire:click="getDelete({{ $row->id }})">
                                <x-icons.icon :icon="'trash'"
                                              class="text-gray-300 hover:text-red-600 h-5 w-auto block"/>
                            </button>
                        </div>
                    </div>
                    <x-forms.section-border/>
                @endforeach
            </div>
        </div>
    </div>
    <div class=" border border-gray-300 max-w-screen-md rounded-b-md shadow-lg">
        <label>
            <input type="text" wire:model="vname" wire:change="saveTodo" placeholder="Ink your ideas..."
                   class="border-transparent appearance-none border ring-1 ring-gray-200
                                  border-gray-200 bg-gray-100 py-2 px-3 text-zinc-800 font-semibold
                                  placeholder-gray-400 text-base focus:outline-none
                                  focus:ring-1 focus:ring-gray-300 focus:border-transparent w-full rounded-b-md">
        </label>
    </div>
</div>

