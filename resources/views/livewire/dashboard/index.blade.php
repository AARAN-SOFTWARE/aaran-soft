<div>
    <x-slot name="header">Dashboard</x-slot>
    <div class="w-full h-screen">

        <div>
            <div
                class="h-20 bg-gradient-to-r from-violet-600 to-indigo-600 text-3xl text-white tracking-widest px-5 py-3 rounded-lg">
                {{$greetings}}&nbsp;{{Auth::user()->name}}&nbsp;&nbsp;
            </div>

        </div>


        <div class="lg:flex justify-between gap-3 py-5 xl:pl-12 h-2/5 ">
            <div class="lg:w-1/4 ">
                @if(Aaran\Aadmin\Src\Customise::hasTodoList())
                    <livewire:taskmanager.todos.index/>
                @endif

            </div>


            @if(Aaran\Aadmin\Src\Customise::hasAttendance())
                <livewire:attendance.attendance.index/>
            @endif


        </div>
        <div class="fixed right-0 px-2 py-2 text-gray-400 bottom-0">
            v-{{config('aadmin.soft_version')}}&nbsp;-&nbsp;m-{{config('aadmin.soft_version')}}
            &nbsp;-&nbsp;{{config('aadmin.git_version')}}
            &nbsp;-&nbsp;{{\Livewire\str()->ucfirst(config('aadmin.app_type'))}}
        </div>
    </div>
</div>
