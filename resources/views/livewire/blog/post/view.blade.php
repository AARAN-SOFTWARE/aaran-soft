<div class="bg-gray-50">
    <main class="max-w-6xl p-2 mx-auto space-y-6 ">
        <article class="max-w-6xl bg-white p-5 pl-8 mx-auto">

            <!-- Top Controls ----------------------------------------------------------------------------------------->

            <div class="my-2 text-end">
                @if(session()->get('company_id')!='')
                    <a href="{{route('posts.upsert',[$post->id])}}">
                        <button type="button" class="items-end text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm
                        px-4 py-2 text-center dark:text-purple-400 dark:focus:ring-purple-900">Edit
                        </button>@endif
                    </a></div>

            <!-- View Post -------------------------------------------------------------------------------------------->

            <h1 class="font-bold capitalize text-3xl text-left lg:text-4xl mb-10">
                {{ $post->title }}
            </h1>

            <div class="lg:pt-2.5">
                <div>
                    <div>
                        <div class=" h-96 max-w-6xl mx-auto">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt=""
                                 class=" rounded-xl shadow-2xl h-96 w-full">
                        </div>
                    </div>

                    <div class="flex mt-4 text-left mr-5 text-gray-600 text-m">
                        Published
                        <time>{{ $post->created_at->diffForHumans() }}</time>&nbsp;

                        <div class="text-left text-m text-gray-600">
                            <div class="border-s-2 border-s-amber-500 px-1">
                                <h5 class="font-bold capitalize">Author
                                    {{ $post->user->name }}
                                </h5>
                            </div>
                        </div>

                        <div class="border-s-2 border-s-amber-500 px-1">
                            <h5 class="font-bold capitalize">Comments
                                {{ $list->count() }}
                            </h5>
                        </div>
                    </div>

                    <div class="mt-8 col-span-8">
                        <div class="hidden lg:flex justify-between mb-6">
                            <a href="{{route('posts')}}"
                               class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                                              d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path class="fill-current"
                                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>

                                Back to Posts
                            </a>
                        </div>

                        <!-- Likes ------------------------------------------------------------------------------------>

                        <div
                            class="space-y-4 lg:text-lg leading-loose text-left overflow-hidden text-wrap">{!! $post->body !!}</div>
                        <div class="mt-4 border-b-2 ">
                            {{$likes->count()}}
                            <x-icons.icon :icon="'heart'" wire:model="like" wire:click="incrementLike"
                                          class="h-4 w-4 justify-end"/>
                        </div>
                    </div>
                </div>

                <!-- Comments ----------------------------------------------------------------------------------------->

                @foreach($list as $row)
                    <div class="mt-4 rounded-lg my-2 w-full text-lg text-ellipsis space-y-2">
                        <div>
                            <span class="opacity-65 text-right capitalize w-full">&nbsp;{!!($row->user->name)!!}</span>
                        </div>
                        <div class="flex">
                            <div class="flex w-full pl-8">
                        <span class="w-full">{!!($row->body)!!}
                            </span>&nbsp;
                            </div>

                            <div class="flex">
                                <x-icons.icon :icon="'pencil'" wire:click="editComment({{ $row->id }})"
                                              class="text-gray-400 h-5 hover:cursor-pointer hover:text-black px-0.5 py-0.5 hover:rounded-sm inline-flex"/>
                                <x-icons.icon :icon="'trash'" wire:click="deleteComment({{ $row->id }})"
                                              class="text-gray-400 h-5 hover:cursor-pointer hover:text-black px-0.5 py-0.5 hover:rounded-sm inline-flex"/>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $list->links() }}

                <div class="border-t-2 border-gray-300 my-2">
                    <div class="gap-5 capitalize my-5">
                        <label for="comments" class="font-extrabold text-3xl">Comments</label>
                        <div class="w-3/5">
                        <textarea rows="5" id="vname" wire:model="body" autocomplete="off" autofocus
                                  class="rounded-lg appearance-none border
                                                 border-gray-300 py-2 px-2 bg-white text-gray-800 w-full h-44
                                                 placeholder-gray-400 shadow-md text-base focus:outline-none
                                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                                 form-textarea block transition duration-150 ease-in-out sm:text-sm
                                                 sm:leading-5 " placeholder="Write your thoughts....!"></textarea>
                            @error('user_id')
                            <div>
                                {{ 'Login to comment' }}
                            </div>
                            @enderror

                            <button type="submit" wire:click.prevent="save" class="mt-5">
                                <div
                                    class="w-full relative inline-flex items-center px-10 py-1.5 overflow-hidden text-md font-medium text-indigo-600
                                border-2 border-indigo-600 rounded-full hover:text-white group ">
                    <span
                        class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100
                        group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                                    <span
                                        class="absolute right-0 flex items-center justify-start w-8 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                                 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                      xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                               stroke-linejoin="round"
                                                                               stroke-width="2"
                                                                               d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                         </span>
                                    <span class="relative">Comment </span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>

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
