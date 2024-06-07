<div>
    <x-slot name="header">Fora</x-slot>
    <div style="background:url('../../../../images/ui-pic/simple-pink.jpg')  no-repeat center;background-size:cover"
         class="py-52 px-1 md:px-8 text-center relative text-white font-bold text-2xl md:text-3xl overflow-auto  opacity-65">
        <h1 class="pb-4 text-black">Search Here</h1>
        <div class="w-11/12 md:w-3/4 lg:max-w-3xl m-auto">
            <div class="relative z-30 text-base  text-black"><input type="text" value="" placeholder="Keyword"
                                                                    class="mt-2 shadow-md focus:outline-none rounded-2xl py-3 px-6 block w-full">
                <button type="submit">
                    <svg class="text-teal-400 h-5 w-5 absolute top-3.5 right-8 fill-current dark:text-teal-300"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" viewBox="0 0 56.966 56.966"
                         xml:space="preserve">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                    </path>
                </svg>
                </button>
                <div
                    class="text-left absolute top-10 rounded-t-none rounded-b-2xl shadow bg-white divide-y w-full max-h-40 overflow-auto">
                </div>
            </div>
        </div>
    </div>

    @forelse ($list as $row)
        <section>
            <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
                <div class="flex flex-wrap items-center mx-auto max-w-7xl border border-gray-400 rounded-lg">

                    <div
                        class="flex flex-col items-start mt-8 mb-10 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">

                        <span
                            class="mb-8 text-xs font-bold tracking-widest text-blue-600 uppercase"> Your tagline </span>

                        <div class="flex gap-3 tracking-widest font-bold text-blue-600 uppercase mb-5">
                            <div>
                                <a href="{{ route('ui-task.show',[$row->id]) }}"
                                   class="cursor-pointer text-xs">
                                    {{ \App\Enums\Priority::tryFrom($row->priority)->getName() }}
                                </a>
                            </div>

                            <div class="border-l-2 border-gray-200">
                                <a href="{{ route('ui-task.show',[$row->id]) }}"
                                   class="ml-2 text-xs ">
                                    {{ \Aaran\Developer\Models\UiTask::allocated($row->allocated) }}
                                </a>
                            </div>
                        </div>

                        <div class="w-full h-28 overflow-hidden mb-6">
                            <a href="{{ route('ui-task.show',[$row->id]) }}"
                               class=" text-xl tracking-widest capitalize leading-none  text-neutral-900 md:text-7xl lg:text-3xl overflow-hidden"> {{ $row->vname }}
                            </a>
                        </div>

                        <div class="h-32 w-[25rem] ">
                            <a href="{{ route('ui-task.show',[$row->id]) }}">
                                <div
                                    class="mb-5 text-lg tracking-wider leading-relaxed text-left text-gray-800 h-20 overflow-hidden">{!! $row->body !!}</div>
                            </a>
                        </div>

                        <div class="flex-col mt-0 lg:mt-6 max-w-7xl sm:flex">

                            <div class="flex text-xl text-gray-700 tracking-wide">
                                <x-icons.icon :icon="'logo'"
                                              class="h-14 w-auto "/>
                            </div>

                            <div>
                                <div class=" px-2">{{ $row->user->name }}</div>

                                <div class="mt-1.5 text-gray-400 text-xs">
                                    <time>{{ $row->created_at->diffForHumans() }}</time>
                                </div>
                            </div>

                            <div>

                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
                        <div>
                            <div class="relative w-full max-w-lg">
                                <div
                                    class="absolute top-0 rounded-full bg-violet-300 -left-4 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>

                                <div
                                    class="absolute rounded-full bg-fuchsia-300 -bottom-24 right-20 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
                                <div class="relative">
                                    <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero"
                                         src="/assets/images/placeholders/squareCard.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @empty
    @endforelse

</div>
