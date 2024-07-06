<div class="">
    <x-slot name="header">Dashboard</x-slot>
    <div class="h-screen mx-auto">

        <x-dashboard.greetings/>
        <div class="lg:flex lg:flex-cols-3 w-full h-screen gap-10">
            <div class="overflow-auto sm:w-full lg:w-3/12 lg:h-screen mt-6">
                    @for($i=0;$i<10;$i++)
                        <div
                            class="sm:first:col-span-2 py-14 px-11 rounded-lg max-w-lg  hover:bg-[#ffffff] bg-slate-50 shadow-2xl hover:shadow-3xl hover:shadow-gray-500 mt-2">
                            <h3 class="mb-4 text-black text-[22px] sm:text-[40px] font-extrabold leading-none">
                                <span>Title Go's Here </span>
                            </h3>
                            <div class="text-lg text-black leading-[1.8]">
                                <p>See how other companies are using Reply, which use cases are there, and how it all
                                    works in practice.</p>
                            </div>
                            <ul class="mt-6 sm:mt-10">
                                <li class="pt-2 pb-4 mb-2 last:mb-0 border-b border-black border-solid">
                                    <a class="flex items-center justify-between text-black hover:text-black text-lg sm:text-xl font-medium"
                                       href="#">
                                        <span>Project Size : 50000 Shares</span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M4.00002 7.45035e-05L13 7.42506e-05C13.5523 7.45035e-05 14 0.44779 14 1.00007V10.0001C14 10.5524 13.5523 11.0001 13 11.0001C12.4477 11.0001 12 10.5524 12 10.0001V3.41429L1.70712 13.7072L0.292908 12.293L10.5858 2.00007L4.00002 2.00007C3.44773 2.00007 3.00002 1.55236 3.00002 1.00007C3.00002 0.44779 3.44773 7.41663e-05 4.00002 7.45035e-05Z"
                                                  fill="black"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="pt-2 pb-4 mb-2 last:mb-0 border-b border-black border-solid">
                                    <a class="flex items-center justify-between text-black hover:text-black text-lg sm:text-xl font-medium"
                                       href="#">
                                        <span>Face Value : 1000 </span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M4.00002 7.45035e-05L13 7.42506e-05C13.5523 7.45035e-05 14 0.44779 14 1.00007V10.0001C14 10.5524 13.5523 11.0001 13 11.0001C12.4477 11.0001 12 10.5524 12 10.0001V3.41429L1.70712 13.7072L0.292908 12.293L10.5858 2.00007L4.00002 2.00007C3.44773 2.00007 3.00002 1.55236 3.00002 1.00007C3.00002 0.44779 3.44773 7.41663e-05 4.00002 7.45035e-05Z"
                                                  fill="black"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="pt-2 pb-4 mb-2 last:mb-0 border-b border-black border-solid">
                                    <a class="flex items-center justify-between text-black hover:text-black text-lg sm:text-xl font-medium"
                                       href="#">
                                        <span>Current Value : 1500</span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M4.00002 7.45035e-05L13 7.42506e-05C13.5523 7.45035e-05 14 0.44779 14 1.00007V10.0001C14 10.5524 13.5523 11.0001 13 11.0001C12.4477 11.0001 12 10.5524 12 10.0001V3.41429L1.70712 13.7072L0.292908 12.293L10.5858 2.00007L4.00002 2.00007C3.44773 2.00007 3.00002 1.55236 3.00002 1.00007C3.00002 0.44779 3.44773 7.41663e-05 4.00002 7.45035e-05Z"
                                                  fill="black">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="pt-2 pb-4 mb-2 last:mb-0 border-b border-black border-solid">
                                    <a class="flex items-center justify-between text-black hover:text-black text-lg sm:text-xl font-medium"
                                       href="#">
                                        <span>Profit  : 800</span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M4.00002 7.45035e-05L13 7.42506e-05C13.5523 7.45035e-05 14 0.44779 14 1.00007V10.0001C14 10.5524 13.5523 11.0001 13 11.0001C12.4477 11.0001 12 10.5524 12 10.0001V3.41429L1.70712 13.7072L0.292908 12.293L10.5858 2.00007L4.00002 2.00007C3.44773 2.00007 3.00002 1.55236 3.00002 1.00007C3.00002 0.44779 3.44773 7.41663e-05 4.00002 7.45035e-05Z"
                                                  fill="black">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endfor
            </div>
            <div class="w-full shadow-2xl h-screen p-5 mt-6">
                @if(session()->get('role_id')==1|| session()->get('role_id')==2|| session()->get('role_id')==3 )
                    @if(Aaran\Aadmin\Src\DbMigration::hasEntry())
                        <x-dashboard.cards :transaction="$transaction"/>
                    @endif
                @endif

        @if(Aaran\Aadmin\Src\DbMigration::hasWelfare())
            <div class="grid grid-cols-3  gap-4">
                <div class="grid col-span-2">
{{--                    <x-dashboard.welfare.project :transaction="$transaction"/>--}}
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
