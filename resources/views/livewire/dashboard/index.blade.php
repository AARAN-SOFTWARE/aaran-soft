<div class="">
    <x-slot name="header">Dashboard</x-slot>
    <div class="h-screen rounded-2xl mx-auto p-2">


        <x-dashboard.greetings/>

        @if(Aaran\Aadmin\Src\DbMigration::hasEntry())
            <x-dashboard.cards :transaction="$transaction"/>
        @endif

        <div class="flex flex-col sm:flex-row  gap-4">
            <div class="flex-col justify-evenly">
                <div class="lg:w-full lg:flex justify-between gap-3 py-5 h-1/2">
                    <div class="lg:w-[30rem] h-[16-rem] mx-auto">
                        @if(Aaran\Aadmin\Src\DbMigration::hasTodoList())
                            <livewire:taskmanager.todos.index/>
                        @endif
                    </div>
                </div>
                <div class="lg:w-[30rem] h-[16-rem] mx-auto">
                    @if(Aaran\Aadmin\Src\DbMigration::hasAttendance())
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


    </div>
</div>
