<div>
    <div class="py-12 bg-neutral-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-20">
            <div><h1 class="text-black text-6xl font-extrabold">Latest Updates</h1>
            </div>

            <!-- Content ---------------------------------------------------------------------------------------------->

            <div class="text-right ">

                @if(session()->get('company_id')!='')
                <x-button.new>
                    <div class="'bg-blue-500 hover:bg-amber-950'">
                    </div>
                </x-button.new>@endif

            </div>

            <div class="lg:grid lg:grid-cols-2">
                @foreach($list as $row)
                    <article class="transition-colors bg-white duration-300 w-11/12 max-h-96 hover:shadow-2xl border border-black border-opacity-50 hover:border-opacity-5 rounded-xl
            text-ellipsis overflow-hidden mx-3 my-2 px-4 py-3">
                        <a href="{{route('posts.views',[$row->id])}}">

                            <div class="mt-4">
                                <div>
                                    <div class="flex">
                                        <div>
                                            <div class="h-40 w-40 lg:mr-8">
                                                <img class="rounded-xl justify-items-start h-40 w-40 transition duration-500 ease-in-out hover:scale-110"
                                                     src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}">
                                            </div>
                                        </div>

                                        <div>
                                            <h1 class="text-3xl text-left capitalize">
                                                {{ $row->title }}
                                            </h1>

                                            <div class=" text-lg mt-3 text-ellipsis overflow-hidden  space-y-4">
                                                {!! \Illuminate\Support\Str::limit($row->body, 100 )!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <header class="mt-8 lg:mt-0">
                                        <span class="mt-2 block text-gray-400 text-xs">
                                            Published <time>{{ $row->created_at->diffForHumans() }}</time>
                                        </span>
                                    </header>
                                </div>

                                <footer>
                                    <div class="ml-3">
                                        <h5 class="font-bold capitalize">
                                            {{ $row->user->name }}
                                        </h5>
                                    </div>
                                </footer>

                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer ------------------------------------------------------------------------------------------------------->

    <footer>
        <div class="w-full bg-gray-800">
            <div
                class="container xl:flex sm:flex  w-full h-auto px-5 py-6 mx-auto flex items-center sm:flex-row flex-col dark:bg-gray-800">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                         stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2"
                         class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl text-white">AARAN </span>
                </a>
                <p class="text-sm text-gray-100 sm:ml-6 sm:mt-0 mt-4 ">© 2023 Sundar —
                    <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-200 ml-1"
                       target="_blank">@aaransoftwares@gmail.com</a>
                </p>
            </div>
        </div>
    </footer>
</div>


