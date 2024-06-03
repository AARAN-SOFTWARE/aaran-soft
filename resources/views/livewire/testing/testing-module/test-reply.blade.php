<div>
    <x-slot name="header">Test - Review</x-slot>

    <div class="w-5/6 h-auto grid grid-cols-1 gap-3 bg-zinc-50 mx-auto pt-10 pb-10 mb-10">
        <div class="w-11/12  h-auto mx-auto bg-white rounded">
            <div class="flex justify-between">
                <div class="ml-5">
                    <div class="text-lg font-sans font-semibold">
                        {{ $vname }}
                    </div>
                    <div class="w-36 flex justify-between">
                        <div class="text-xs text-gray-600 font-semibold">
                            {{date('d-m-Y -h:i a', strtotime($updated_at))}}
                        </div>
                        <div
                            class="w-3 h-3 mt-1 rounded-full {{\App\Enums\Active::tryFrom($actives)->getStyle()}}">
                        </div>
                    </div>
                </div>
                <div class="font-sans text-sm text-gray-600 mt-6 mr-5 font-semibold flex"><div class=""> <x-icons.icon icon="user" class="w-6 h-6 pt-0.5" /> </div> <div> {{ $username }}</div></div>
            </div>

            <div class="flex-col justify-center w-5/6 h-96 pt-10 mx-auto ">
                <div class="flex">
                    <div class="w-[40rem] h-80 auto mx-auto overflow-y-auto">
                        @forelse ($images as $row)
                            <div>
                                <button wire:click="fullview({{ $row->id }})">
                                    <img
                                        class="w-[40rem] h-80"
                                        src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" alt=""></button>
                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>

                <div class="flex gap-2 w-[40rem] justify-end mx-auto">
                    <span class=" text-xs py-0.5 text-gray-500 font-semibold">Assign To :</span>
                    <span class=" text-sm text-gray-500 font-semibold">{{ \Aaran\Testing\Models\TestOperation::assign($assignee)}}</span>
                </div>
            </div>

        </div>
        <div class="w-11/12 h-auto mx-auto flex justify-center">
            <div class="w-full  h-80 overflow-y-auto  p-5 border-2 border-white rounded-xl bg-white text-gray-600 font-serif">{!! $body !!}</div>

        </div>
        <div class="w-11/12 mx-auto h-96 bg-white rounded-xl flex-col ">
            <div class="w-1/3 bg-stone-50 mx-auto text-center mt-5">
                <div class="w-80 flex  pt-5 mx-auto"><span class=""><x-icons.icon icon="chat" class="w-5 h-5 mt-1" /></span> <span class="pb-1"> {{$commentsCount}}</span></div>
                <div>
                    <textarea name="" rows="10" placeholde="lets leave a reply..." class="w-80 h-20 rounded-xl m-5 text-zinc-100"></textarea>
                </div>

            </div>
            <div class="w-1/3 bg-stone-100">

            </div>
        </div>


    </div>

    <!-- FlowBite reply template-->

{{--    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">--}}
{{--        <div class="max-w-2xl mx-auto px-4">--}}
{{--            <div class="flex justify-between items-center mb-6">--}}
{{--                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>--}}
{{--            </div>--}}
{{--            <form class="mb-6">--}}
{{--                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">--}}
{{--                    <label for="comment" class="sr-only">Your comment</label>--}}
{{--                    <textarea id="comment" rows="6"--}}
{{--                              class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"--}}
{{--                              placeholder="Write a comment..." required></textarea>--}}
{{--                </div>--}}
{{--                <button type="submit"--}}
{{--                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">--}}
{{--                    Post comment--}}
{{--                </button>--}}
{{--            </form>--}}
{{--            <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">--}}
{{--                <footer class="flex justify-between items-center mb-2">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img--}}
{{--                                class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"--}}
{{--                                alt="Michael Gough">Michael Gough</p>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"--}}
{{--                                                                                  title="February 8th, 2022">Feb. 8, 2022</time></p>--}}
{{--                    </div>--}}
{{--                    <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"--}}
{{--                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                            type="button">--}}
{{--                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                        </svg>--}}
{{--                        <span class="sr-only">Comment settings</span>--}}
{{--                    </button>--}}
{{--                    <!-- Dropdown menu -->--}}
{{--                    <div id="dropdownComment1"--}}
{{--                         class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                            aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </footer>--}}
{{--                <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the--}}
{{--                    instruments for the UX designers. The knowledge of the design tools are as important as the--}}
{{--                    creation of the design strategy.</p>--}}
{{--                <div class="flex items-center mt-4 space-x-4">--}}
{{--                    <button type="button"--}}
{{--                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">--}}
{{--                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>--}}
{{--                        </svg>--}}
{{--                        Reply--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">--}}
{{--                <footer class="flex justify-between items-center mb-2">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img--}}
{{--                                class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"--}}
{{--                                alt="Jese Leos">Jese Leos</p>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"--}}
{{--                                                                                  title="February 12th, 2022">Feb. 12, 2022</time></p>--}}
{{--                    </div>--}}
{{--                    <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"--}}
{{--                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                            type="button">--}}
{{--                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                        </svg>--}}
{{--                        <span class="sr-only">Comment settings</span>--}}
{{--                    </button>--}}
{{--                    <!-- Dropdown menu -->--}}
{{--                    <div id="dropdownComment2"--}}
{{--                         class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                            aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </footer>--}}
{{--                <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>--}}
{{--                <div class="flex items-center mt-4 space-x-4">--}}
{{--                    <button type="button"--}}
{{--                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">--}}
{{--                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>--}}
{{--                        </svg>--}}
{{--                        Reply--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <article class="p-6 mb-3 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">--}}
{{--                <footer class="flex justify-between items-center mb-2">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img--}}
{{--                                class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"--}}
{{--                                alt="Bonnie Green">Bonnie Green</p>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12"--}}
{{--                                                                                  title="March 12th, 2022">Mar. 12, 2022</time></p>--}}
{{--                    </div>--}}
{{--                    <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"--}}
{{--                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                            type="button">--}}
{{--                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                        </svg>--}}
{{--                        <span class="sr-only">Comment settings</span>--}}
{{--                    </button>--}}
{{--                    <!-- Dropdown menu -->--}}
{{--                    <div id="dropdownComment3"--}}
{{--                         class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                            aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </footer>--}}
{{--                <p class="text-gray-500 dark:text-gray-400">The article covers the essentials, challenges, myths and stages the UX designer should consider while creating the design strategy.</p>--}}
{{--                <div class="flex items-center mt-4 space-x-4">--}}
{{--                    <button type="button"--}}
{{--                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">--}}
{{--                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>--}}
{{--                        </svg>--}}
{{--                        Reply--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">--}}
{{--                <footer class="flex justify-between items-center mb-2">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img--}}
{{--                                class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"--}}
{{--                                alt="Helene Engels">Helene Engels</p>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23"--}}
{{--                                                                                  title="June 23rd, 2022">Jun. 23, 2022</time></p>--}}
{{--                    </div>--}}
{{--                    <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4"--}}
{{--                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                            type="button">--}}
{{--                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <!-- Dropdown menu -->--}}
{{--                    <div id="dropdownComment4"--}}
{{--                         class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                            aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"--}}
{{--                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </footer>--}}
{{--                <p class="text-gray-500 dark:text-gray-400">Thanks for sharing this. I do came from the Backend development and explored some of the tools to design my Side Projects.</p>--}}
{{--                <div class="flex items-center mt-4 space-x-4">--}}
{{--                    <button type="button"--}}
{{--                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">--}}
{{--                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>--}}
{{--                        </svg>--}}
{{--                        Reply--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- FlowBite reply template-->

    <div></div>

    <div class="w-full border-t-2 border-gray-400 rounded-md shadow-lg bg-opacity-5">
    <div class="p-6 pt-12 pb-6 bg-white rounded-md space-y-4">

        <!-- Top Controls ----------------------------------------------------------------------------------------->

        <div>
            <div class="lg:flex flex-col gap-3">
                <div class="lg:flex border border-gray-300">

                    <!-- Table Content ---------------------------------------------------------------------------->
                    <div class="lg:grid w-full ">

                        <div class="w-full h-14 border flex flex-row justify-between">
                            <a class="cursor-pointer text-3xl h-3/4 w-1/4 flex items-center justify-center">
                                {{ $operations_id }}
                            </a>

                            <div
                                class=" w-full lg:flex items-center justify-center text-4xl {{  \App\Enums\Status::tryFrom($status)->getStyle() }}">
                                {{  \App\Enums\Status::tryFrom($status)->getName() }}
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="flex w-full mt-2">
                                <div class="w-full">
                                    <div class="flex justify-between w-full py-1">
                                        <a class="cursor-pointer w-full text-2xl text-left px-3 hover:underline underline-offset-8">
                                            {{ $vname }}
                                        </a>

                                        <div class="text-xs w-[15rem] lg:text-lg lg:text-right px-5">

                                        </div>
                                    </div>

                                    <div class="lg:flex w-2/3 gap-3 p-3 ml-5 text-zinc-500">
                                        {!! $body !!}
                                    </div>
                                </div>
                            </div>

                            <div class="lg:flex flex-row justify-between">

                                <div class="px-3 flex flex-row justify-between">
                                    <div class="flex flex-row gap-2">
                                        <span class=" text-sm py-0.5 text-gray-500">Assign To :</span>
                                        <span class=" text-md text-gray-600">{{ \Aaran\Testing\Models\TestOperation::assign($assignee)}}</span>
                                    </div>

                                    <a class="cursor-pointer flex flex-row px-20">
                                        <x-icons.icon :icon="'annotation'" class="h-7 w-auto block px-1.5"/>
                                        <span class="text-xl font-semibold pl-1 -mt-0.5">
                                        {{$commentsCount}}
                                        </span>
                                    </a>
                                </div>

                                <div class="px-3 py-1 flex flex-row gap-3 items-center ">
                                    {{date('d-m-Y -h:i a', strtotime($updated_at))}}
                                    <div
                                        class="text-center flex items-center w-4 h-4 mr-2 text-sm rounded-full {{\App\Enums\Active::tryFrom($actives)->getStyle()}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image  ------------------------------------------------------------------------------------------->

            <div class="flex w-full justify-between">
                <div class="gap-3">
                    <div class="lg:grid grid-cols-5 ">
                        @forelse ($images as $row)
                            <div
                                class=" h-40 w-40 lg:mr-8 mt-3 relative max-w-xs overflow-hidden bg-cover bg-no-repeat ">
                                <button wire:click="fullview({{ $row->id }})">
                                    <img
                                        class="justify-items-start h-40 w-40 transition duration-500 max-w-xs ease-in-out hover:scale-110 "
                                        src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" alt=""></button>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>

                <!-- Replies  ------------------------------------------------------------------------------------->

                <div class="w-2/4 mt-2 border-l-2 px-2">
                    @forelse ($replies as $row)
                        <div class="p-3 lg:flex flex-row justify-between border-b border-gray-200  ">
                            <div class="px-5 ">
                                {{$row->vname}}
                            </div>

                            <div class="text-sm text-gray-500 ">
                                {{$row->user->name}}
                                &nbsp;&nbsp;@&nbsp;&nbsp;{{date('d-m-Y h:i a', strtotime($row->updated_at))}}
                            </div>
                        </div>

                    @empty
                        <div class="flex justify-center items-center space-x-2">
                            <x-icons.inbox class="h-8 w-7 text-cool-gray-400"/>
                            <span class="font-medium py-8 text-cool-gray-400 text-xl">No Entry found...</span>
                        </div>
                    @endforelse


                    <div class="lg:flex justify-between">

                        <div class="flex gap-1.5 mt-2">
                            <div class="h-12">

                                <x-button.primary wire:click="create">
                                    <div class="inline-flex gap-1.5">
                                        <x-icons.icon :icon="'u-turn-left2'" class="h-4 w-5 text-neutral-200 "/>
                                        Reply
                                    </div>
                                </x-button.primary>
                            </div>

                            <div>
                                <x-button.back/>
                            </div>
                        </div>

                        <!-- Status ------------------------------------------------------------------------------->

                        <div>
                            <label for="changeStatus"
                                   class="w-[8rem] text-zinc-500 tracking-wide py-2 hidden ">Under</label>
                            <select wire:model="changeStatus" class="w-full purple-textbox mt-2" id="changeStatus">
                                <option class="text-zinc-500 px-1">Status...</option>
                                @foreach(\App\Enums\Status::cases() as $obj)
                                    <option value="{{$obj->value}}">{{ $obj->getName() }}</option>
                                @endforeach
                            </select>


                            <div class="lg:flex flex-row gap-10">
                                @error('changeStatus')
                                <span class="text-red-500">{{  'Choose any one and update' }}</span>
                                @enderror

                                <button wire:click.prevent="updateStatus"

                                        class="relative inline-flex items-center h-6 w-5 mt-2 justify-center px-10 py-4 overflow-hidden font-mono font-medium tracking-tighter text-white bg-blue-900 rounded-lg group">
                                    <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-lime-700 rounded-full group-hover:w-56 group-hover:h-56"></span>
                                    <span class="relative">Update</span>

                                </button>

                                @admin
                                <button wire:click.prevent="adminCloseTask"

                                        class="relative inline-flex items-center h-6 w-5 mt-2 justify-center px-10 py-4 overflow-hidden font-mono font-medium tracking-tighter text-white bg-neutral-500 rounded-lg group">
                                    <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-red-900 rounded-full group-hover:w-56 group-hover:h-56"></span>
                                    <span class="relative">Close</span>

                                </button>
                                @endadmin

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments ----------------------------------------------------------------------------------------->
            <form wire:submit.prevent="save">
                <div>
                    <x-modal.dialog wire:model.defer="showEditModal">
                        <x-slot name="title">
                        </x-slot>

                        <x-slot name="content">

                            <div class="flex flex-col gap-3 py-3">
                                <label for="reply"
                                       class="w-[8rem] text-zinc-500 tracking-wide py-2">Comments</label>
                                <textarea rows="5" id="reply" wire:model="reply" autocomplete="off" autofocus
                                          class="appearance-none rounded-lg
                                                  py-2 px-2 bg-white text-gray-800 w-full
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5 @error('reply')?rounded-lg border border-gray-300 :border-red-500 border-opacity-100 hover:border-opacity-5 rounded-xl @enderror"></textarea>
                            </div>

                            @error('reply')
                            <div class="text-red-500">
                                Leave a reply !
                            </div>
                            @enderror

                            <x-input.model-text wire:model="verified" :label="'Verified'"/>

                            <div class="pb-2">&nbsp;</div>

                        </x-slot>

                        <x-slot name="footer">
                            <div class="w-full flex justify-between gap-3">
                                <div class="flex gap-2">
                                    <x-button.primary type="submit" wire:click.prevent="save">Save
                                    </x-button.primary>
                                </div>

                            </div>

                        </x-slot>
                    </x-modal.dialog>
                </div>
            </form>

            <!-- Image view --------------------------------------------------------------------------------------->

            <x-jet.modal :maxWidth="'6xl'" wire:model.defer="showEditModal_1">
                <div class="px-6  pt-4">
                    <img class="rounded-xl justify-items-start h-full w-full"
                         src="{{ \Illuminate\Support\Facades\Storage::url($full_image) }}">
                </div>
                <div class="px-6 py-3 bg-gray-100 text-right">
                    <div class="w-full flex justify-end gap-3">
                        <div class="flex gap-3">
                            <button wire:click.prevent="$set('showEditModal_1', false)"
                                    class='inline-flex items-center px-4 py-2 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest
                               focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150
                               focus:ring-gray-500 bg-gray-600 hover:bg-gray-500 active:bg-gray-700 border-gray-600'>
                                <x-icons.icon :icon="'chevrons-left'" class="h-5 w-auto block px-1.5"/>
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </x-jet.modal>
        </div>
    </div>
</div>


