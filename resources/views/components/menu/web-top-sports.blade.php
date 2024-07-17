<nav class="sticky z-[999] top-0" x-data="{ open: false }">
    <div class="px-6 border-b border-zinc-200 bg-[#19398A] text-white">

        <div class="flex items-center w-full justify-between ">

            <div class="text-zinc-600 font-bold text-xl ">

                <a href="{{route('home')}}" class="flex items-center">
                    <div class=" lg:p-3 rounded">

                        <x-assets.logo.brand logo="{{ \App\Helper\ConvertTo::toLower(config('aadmin.brand'))}}"/>

                    </div>
                    <span
                            class="self-center text-3xl text-white font-semibold whitespace-nowrap px-2 font-gab tracking-wider">
                        {{ \App\Helper\ConvertTo::toUpper(config('aadmin.brand'))}}
                    </span>
                </a>
            </div>

            <!--main menu ---------------------------------------------------------------------------------------------->
            <div class="hidden md:block ">
                <ul class="flex space-x-8 ">
                    <li>
                        <a class="text-lg font-sans text-white px-2 hover:border-b py-1 hover:border-blue-400 transition-colors duration-600"
                           href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        <a class="text-lg font-sans text-white px-2 hover:border-b-2 py-1 hover:border-blue-400 transition-colors duration-600"
                           href="{{route('gallery')}}">Gallery</a>
                    </li>
                    <li>
                        <a class="text-lg font-sans text-white px-2 hover:border-b-2 py-1 hover:border-blue-400 transition-colors duration-600"
                           href="{{route('news')}}">News</a>
                    </li>
                    <li>
                        <a class="text-lg font-sans text-white px-2 hover:border-b-2 py-1 hover:border-blue-400 transition-colors duration-600"
                           href="{{route('feed')}}">Blog</a>
                    </li>
                    <li>
                        <a class="text-lg font-sans text-white px-2 hover:border-b-2 py-1 hover:border-blue-400 transition-colors duration-600"
                           href="{{route('contact')}}">Contact</a>
                    </li>
                    <li>
                        <a class="text-lg font-sans text-white px-2 hover:border-b-2 py-1 hover:border-blue-400 transition-colors duration-600"
                           href="{{route('about')}}">About Us</a>
                    </li>
                </ul>
            </div>

            <!--hamburger button---------------------------------------------------------------------------------------->
            <div class="md:hidden">
                <nav>
                    <button class="w-10 h-10 relative focus:outline-none text-gray-800" @click="open = !open">
                        <div
                                class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                <span aria-hidden="true"
                      class="block absolute h-0.5 w-5 bg-current transform transition duration-700 ease-in-out"
                      :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                            <span aria-hidden="true"
                                  class="block absolute  h-0.5 w-5 bg-current   transform transition duration-700 ease-in-out"
                                  :class="{'opacity-0': open } "></span>
                            <span aria-hidden="true"
                                  class="block absolute  h-0.5 w-5 bg-current transform  transition duration-700 ease-in-out"
                                  :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                        </div>
                    </button>
                </nav>

            </div>

            <!--login--------------------------------------------------------------------------------------------------->
            <div class="hidden md:block">
                @if (Route::has('login'))
                    <div id="menu" class="space-x-4 ">
                        @auth
                            <a href="{{route('dashboard')}}" role="button"
                               class="font-semibold text-xl hover:text-[#19398A] hover:bg-white  px-3 py-1 rounded-md focus:outline-none focus:underline  transition ease-in-out duration-300">
                                Dashboard
                            </a>

                            <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="font-semibold text-xl hover:text-[#19398A] hover:bg-white px-3 py-1 rounded-md
                                 focus:outline-none focus:underline transition ease-in-out duration-700"
                            >
                                Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        @else
                            <a href="{{ route('login') }}"
                               class="font-semibold text-xl hover:text-white hover:bg-blue-600 px-3 py-1 rounded-md
                                   focus:outline-none transition ease-in-out duration-500">
                                Log in
                            </a>
                        @endauth
                    </div>
                @endif
            </div>

        </div>


        <!--mobile view------------------------------------------------------------------------------------------------->
        <div :class="{'block': open, 'hidden': ! open}"
             class="hidden sm:hidden transform transition duration-800 ease-in-out w-1/2 text-center ml-auto mr-0 bg-gray-800 rounded-lg ">
            <ul class="mt-4 space-y-4">
                <li>
                    <a class="hover:underline font-serif block px-4 py-2 text-white "
                       href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="hover:underline font-serif block px-4 py-2 text-white "
                       href="{{route('service')}}">services</a>
                </li>
                <li>
                    <a class="hover:underline font-serif block px-4 py-2 text-white "
                       href="{{route('about')}}">About Us</a>
                </li>
                <li>
                    <a class="hover:underline font-serif block px-4 py-2 text-white "
                       href="{{route('contact')}}">Contact</a>
                </li>
                <li>
                    <a class="hover:underline font-serif block px-4 py-2 text-white "
                       href="{{route('posts')}}">Blog</a>
                </li>


                @if (Route::has('login'))

                    @auth
                        <li>
                            <a href="{{route('dashboard')}}" role="button"
                               class="hover:underline font-serif block px-4 py-2 text-white ">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="hover:underline font-serif block px-4 py-2 text-white "
                            >
                                Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                               class="hover:underline font-serif block px-4 py-2 text-white ">
                                Log in
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
