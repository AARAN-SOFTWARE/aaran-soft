<div class="">
    <x-slot name="header">Dashboard</x-slot>
    <div class="h-screen mx-auto">

        <x-dashboard.greetings/>

        <div class="lg:flex lg:flex-cols-3 w-full h-screen gap-10">


            <div class="w-full shadow-2xl h-screen p-5 mt-6">
                @if(session()->get('role_id')==1|| session()->get('role_id')==2|| session()->get('role_id')==3 )
                    @if(Aaran\Aadmin\Src\DbMigration::hasEntry())
                        <x-dashboard.cards :transaction="$transaction"/>
                    @endif
                @endif

                @if(Aaran\Aadmin\Src\DbMigration::hasWelfare())
                    <div class="grid grid-cols-3  gap-4">
                        <div class="grid col-span-2">
                            @livewire('dashboard.welfare.project-snippet')
                        </div>
                        <x-dashboard.welfare.transaction :transaction="$transaction"/>
                    </div>
                @endif

                @if(session()->get('role_id')==1|| session()->get('role_id')==2|| session()->get('role_id')==3 || session()->get('role_id')==4)
                    @if(Aaran\Aadmin\Src\DbMigration::hasTodoList())
                        <div class="flex flex-col sm:flex-row  gap-4">
                            <div class="flex-col justify-evenly">
                                <div class="lg:w-full lg:flex justify-between gap-3 py-5 h-1/2">
                                    <div class="lg:w-[30rem] h-[16-rem] mx-auto">
                                        <livewire:taskmanager.todos.index/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @if(Aaran\Aadmin\Src\DbMigration::hasAttendance())
                    <div class="lg:w-[30rem] h-[16-rem] mx-auto">
                        <livewire:attendance.attendance.index/>
                    </div>
                @endif


                <div class="fixed right-0 px-2 py-2 text-gray-400 bottom-0">
                    v-{{config('aadmin.soft_version')}}&nbsp;-&nbsp;m-{{config('aadmin.soft_version')}}
                    &nbsp;-&nbsp;{{config('aadmin.git_version')}}
                    &nbsp;-&nbsp;{{\Livewire\str()->ucfirst(config('aadmin.app_type'))}}
                </div>
            </div>
            <div class="w-3/12">&nbsp;</div>
        </div>


    </div>
</div>
