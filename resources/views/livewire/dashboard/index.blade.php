<div class="">
    <x-slot name="header">Dashboard</x-slot>
    <div class="w-11/12 h-screen rounded-xl mx-auto">

        <div class="">
            <div style="background-image: url('/../../../images/index_assets/banner2.jpg');"
                 class="w-full h-32 mt-5 bg-no-repeat bg-cover flex text-3xl  tracking-widest ">
                <div class="my-auto">
                    <div class=" ml-5 font-semibold text-black">
                        <span class="w-full">{{$greetings}}, </span>&nbsp;<span>{{Auth::user()->name}}</span>&nbsp;&nbsp;<span>👋</span>
                    </div>
                    <div>
                        <span class="text-base font-sans text-gray-500 ml-5">{!! $slogans['quote'] !!}</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex h-full">
            <div class="w-3/4">
                <div class="w-full mt-10">
                    <div class="grid grid-cols-3 gap-3">
                        <div
                            class="w-[24rem] h-[10rem] flex-col bg-white outline outline-1 outline-gray-200 shadow-lg shadow-gray-200 p-5">
                            <div class="flex justify-between">
                                <div class="flex-col w-1/2">
                                    <div class="text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/>
                                        </svg>
                                    </div>
                                    <div>
                                        Aaron Softs
                                    </div>
                                    <div>Sales</div>
                                    <div class="flex">
                                        <div class="flex">
                                    <span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg></span>
                                            <span>
                                        1200
                                    </span>
                                        </div>
                                        <div class="w-10 h-4 bg-green-700 text-white font-bold text-xs rounded-md">
                                            +49%
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div
                            class="w-[24rem] h-[16rem] bg-white outline outline-1 outline-gray-200 shadow-lg shadow-gray-200">
                        </div>
                        <div
                            class="w-[24rem] h-[16rem] bg-white outline outline-1 outline-gray-200 shadow-lg shadow-gray-200">
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/4 h-screen flex-col justify-evenly ">
                <div class="lg:w-full lg:flex justify-between gap-3 py-5 h-1/2">
                    <div class="lg:w-[30rem] h-[16-rem] mx-auto">
                        @if(Aaran\Aadmin\Src\Customise::hasTodoList())
                            <livewire:taskmanager.todos.index/>
                        @endif
                    </div>
                </div>
                <div class="lg:w-[30rem] h-[16-rem] mx-auto">
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


    </div>
</div>
