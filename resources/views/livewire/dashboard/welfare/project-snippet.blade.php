<div class="w-full mt-5">
    <div class="flex flex-row gap-4 w-full">

        <div
            class="w-full flex flex-col bg-white border border-t-2 border-t-green-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-blue-500 dark:shadow-neutral-700/70">

            <div class="p-4 md:p-5">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white w-full flex justify-between">
                    Projects
                    <x-icons.icon :icon="'office-building'" class="h-10 text-green-500  w-auto block"/>
                </h3>


                <div class="grid grid-cols-1 gap-3 mt-4">


                    @forelse ($list as $index =>  $row)

                        <div class="h-35 border border-green-300 rounded-2xl p-5 hover:bg-amber-50 cursor-pointer">

                            <div class="w-full flex justify-between">
                                <span
                                    class="text-xl text-slate-500 font-semibold tracking-widest">{{$row->project_segment_name}}</span>
                            </div>

                            <div class="w-full flex justify-between">
                                <span
                                    class="text-2xl text-green-500 font-semibold tracking-widest">{{$row->project_name}}</span>
                                <span
                                    class="font-semibold text-gray-500 tracking-wide">{{$row->project_description}}</span>
                            </div>

                            <div class="w-full flex justify-between">
                                <span
                                    class="text-md font-semibold tracking-widest">No of Shares : {{$row->total_shares}}</span>
                                <span class="font-semibold tracking-wide">Face Value : {{$row->face_value}}</span>
                            </div>

                            <div>
                                <span
                                    class="text-md font-semibold tracking-widest">Sold : {{$row->sold_shares}}/{{$row->total_shares}}</span>
                                <span
                                    class="text-md font-semibold tracking-widest">Current : {{$row->current_value}}</span>
                            </div>

                            <div class="w-full flex justify-between">
                                <span class="text-md font-semibold tracking-widest">Period : {{$row->period}}</span>
                            </div>

                            <div class="w-full flex justify-between">
                                <span class="text-lg font-semibold tracking-widest">Returns : {{$row->returns_percent}} %</span>
                                <span class="font-semibold tracking-wide">Per Share : {{$row->dividend}}</span>
                            </div>

                        </div>

                    @empty
                        <div>
                            Nothing to display
                        </div>
                    @endforelse

                </div>

                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400"
                   href="{{ route('shareTrades.investing') }}">
                    Know More
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</div>
