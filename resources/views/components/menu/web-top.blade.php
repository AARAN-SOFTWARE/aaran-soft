{{--<nav class="h-20 lg:h-auto lg:w-auto lg:sticky lg:inset-0 z-10 lg:border-b-2 lg:py-5 bg-gray-100">--}}
{{--    <div class="container w-full flex flex-wrap  rounded justify-between items-center mx-auto ">--}}
{{--        <a href="{{route('home')}}" class="mt-2 flex items-center lg:w-auto">--}}
{{--            <div class="p-1 lg:p-3 rounded py-2 ">--}}
{{--                <x-assets.logo.cxlogo :icon="'light'" class="h-9 ml-4 mx-auto w-auto  block"/>--}}
{{--            </div>--}}
{{--            <span--}}
{{--                class="self-center text-3xl font-semibold whitespace-nowrap px-2 tracking-wider text-zinc-700">CODEXSUN</span>--}}
{{--            <div class="p-1 ml-2  lg:hidden">--}}
{{--                <button onclick="toggleMenu()">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
{{--                         stroke="currentColor" class="w-10 h-8">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                              d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--        <div id="menu"--}}
{{--             class="h-60 w-full lg:bg-gray-100 lg:opacity-100 lg:w-auto bg-purple-100 p-5 static  lg:flex-grow lg:h-16 lg:items-center lg:grid-cols-2">--}}
{{--            <ul class="gap-2 mx-auto lg:ml-60  lg:h-7 grid grid-rows-5 lg:flex-col lg:grid-cols-5 flex-row">--}}
{{--                <li>--}}
{{--                    <a class="hover:underline font-serif text-2xl p-2 grid-rows-1 lg:p-3 lg:grid-cols-1"--}}
{{--                       href="{{route('home')}}">home <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="hover:underline text-2xl p-2 grid-rows-2 font-serif lg:p-3 lg:grid-cols-2"--}}
{{--                       href="{{route('service')}}">services</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="hover:underline text-2xl p-2 grid-rows-3 font-serif lg:p-3 lg:grid-cols-3"--}}
{{--                       href="{{route('about')}}">About Us</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="hover:underline text-2xl p-2 grid-rows-4 font-serif lg:p-3 lg:grid-cols-4"--}}
{{--                       href="{{route('contact')}}">Contact</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="hover:underline text-2xl p-2 grid-rows-5 font-serif lg:p-3 lg:grid-cols-5"--}}
{{--                       href="{{route('posts')}}">Blog</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="bg-purple-100 w-full lg:bg-gray-100 lg:opacity-100 lg:w-auto lg:items-center  lg:grid-cols-3">--}}
{{--            <div class="lg:top-0 lg:right-0 lg:mr-8 p-3">--}}
{{--                @if (Route::has('login'))--}}
{{--                    <div id="menu" class="space-x-4 ">--}}
{{--                        @auth--}}
{{--                            <a href="{{route('dashboard')}}" role="button"--}}
{{--                               class="font-semibold text-xl hover:text-white hover:bg-green-600  px-3 py-1 rounded-xl focus:outline-none focus:underline  transition ease-in-out duration-150">--}}
{{--                                Dashboard--}}
{{--                            </a>--}}

{{--                            <a--}}
{{--                                href="{{ route('logout') }}"--}}
{{--                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"--}}
{{--                                class="font-semibold text-xl hover:text-white hover:bg-red-600 px-3 py-1 rounded-xl--}}
{{--                                 focus:outline-none focus:underline transition ease-in-out duration-150"--}}
{{--                            >--}}
{{--                                Log out--}}
{{--                            </a>--}}

{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                  style="display: none;">--}}
{{--                                @csrf--}}
{{--                            </form>--}}

{{--                        @else--}}
{{--                            <a href="{{ route('login') }}"--}}
{{--                               class="font-semibold text-xl hover:text-white hover:bg-blue-600 px-3 py-1 rounded-xl--}}
{{--                                   focus:outline-none focus:underline transition ease-in-out duration-150">--}}
{{--                                Log in--}}
{{--                            </a>--}}
{{--                        @endauth--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <script>--}}
{{--            function toggleMenu() {--}}
{{--                menu = document.getElementById('menu');--}}
{{--                if (menu.classList.contains('hidden')) {--}}
{{--                    menu.classList.remove('hidden')--}}
{{--                } else {--}}
{{--                    menu.classList.add('hidden')--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}
{{--    </div>--}}
{{--    <script>--}}
{{--        function toggleMenu() {--}}
{{--            var menu = document.getElementById('menu');--}}
{{--            if (menu.classList.contains('hidden')) {--}}
{{--                menu.classList.remove('hidden')--}}
{{--            } else {--}}
{{--                menu.classList.add('hidden')--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>--}}
{{--    --}}{{--    <script>--}}
{{--    --}}{{--        $(window).on('load',function (){--}}
{{--    --}}{{--            $(".container").fadeOut(1000);--}}
{{--    --}}{{--            $(".loading").fadeIn(1000);--}}
{{--    --}}{{--        });--}}
{{--    --}}{{--    </script>--}}

{{--</nav>--}}
