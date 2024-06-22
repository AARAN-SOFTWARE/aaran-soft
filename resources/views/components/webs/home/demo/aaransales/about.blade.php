<div class="">
    <div class="w-full mx-auto">
        <div class="flex flex-row">

            <div class="text-6xl font-Ram w-1/2 tracking-wider pl-20 mt-48 capitalize">
                <h5 class="tracking-wider text-4xl text-blue-500 mb-5"> About Us</h5>
                infosys is a global leader in next-generation digital services and consulting.
                navigate their digital transformation.
            </div>

            <div class="h-[35rem] w-2/3">
                <x-storyset.data-extraction/>
            </div>
        </div>

        <button class="bg-purple-700 w-[15rem] rounded-xl px-3 py-3 text-xl tracking-wider text-white mx-20">
            Learn More
        </button>

        <div class="w-full h-[25rem] bg-alice-blue mt-32">
        </div>
    </div>

    <div class="flex flex-row mx-auto items-center justify-center content-center gap-40 mt-12 ">


        <div class="flex flex-col hover:rounded-lg hover:bg-gray-100  hover:shadow-2xl hover:duration-700">

            <div class="text-6xl text-black text-center font-bold white w-52 mt-5  "
                 x-data="animatedCounter(400, 200)" x-init="updatecounter"
                 x-text="Math.round(current)">
            </div>

            <div class="text-xl text-gray-400 p-3 ml-5 tracking-wider">
                Happy Clients
            </div>
        </div>

        <div class="flex flex-col hover:rounded-lg hover:bg-gray-100  hover:shadow-2xl hover:duration-700">

            <div class="text-6xl text-black text-center font-bold white w-52 mt-5 "
                 x-data="animatedCounter(800, 200)" x-init="updatecounter"
                 x-text="Math.round(current)">
            </div>

            <div class="text-xl text-gray-400 p-3 ml-5 tracking-wider">
                Happy Clients
            </div>
        </div>

        <div class="flex flex-col hover:rounded-lg hover:bg-gray-100  hover:shadow-2xl hover:duration-700">

            <div class="text-6xl text-black text-center font-bold white w-52 mt-5 "
                 x-data="animatedCounter(3000, 200)" x-init="updatecounter"
                 x-text="Math.round(current)">
            </div>

            <div class="text-xl text-gray-400 p-3 ml-5 tracking-wider">
                Happy Clients
            </div>
        </div>

        <div class="flex flex-col hover:rounded-lg hover:bg-gray-100  hover:shadow-2xl hover:duration-700">

            <div class="text-6xl text-black text-center font-bold white w-52 mt-5 "
                 x-data="animatedCounter(1000, 200)" x-init="updatecounter"
                 x-text="Math.round(current)">
            </div>

            <div class="text-xl text-gray-400 p-3 ml-5 tracking-wider">
                Happy Clients
            </div>
        </div>

    </div>

    <div class="w-full h-screen">

        <div class="text-center">
            <div class="font-Ram text-lg text-center pt-24 tracking-wide text-blue-500">Team<br>
            </div>

            <div class="font-Ram text-3xl text-center pt-3 tracking-wide">Meet Our Team Members<br>
            </div>
        </div>

        <div class="flex justify-center bg-alice-blue">

            <div class="flex max-w-7xl flex-cols-3 gap-12 mt-12 lg:h-[35rem] md:ml-5">

                <div
                    class="rounded-xl shadow-sm hover:shadow-2xl border border-gray-50 h-[30rem] w-[35rem] bg-white duration-700">

                    <div>
                        <div class="h-[22rem] w-full">
                            <div style="background-image: url('/../../../images/team-3.jpg');"
                                 class="rounded-t-lg w-[25rem] h-[22rem] bg-no-repeat bg-cover bg-center group">

                                <div
                                    class="flex flex-col pt-5 pr-3 items-end group-hover:transition-transform group-hover:scale-y-90 group-hover:duration-500">
                                    <a class="">
                                        <x-icons.icon :icon="'facebook-fill'" class="text-white h-10 w-8 hidden group-hover:block"/>
                                    </a>
                                    <a>
                                        <svg class="text-black  h-10 w-8 hidden group-hover:block dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z" clip-rule="evenodd"/>
                                        </svg>

                                    </a>
                                    <a>
                                        <x-icons.icon :icon="'github'" class="h-10 w-8 hidden group-hover:block"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="text-2xl mx-8 mt-3 font-Don tracking-wider">Divi</div>
                        <div class="text-sm mx-8 py-3 tracking-wider text-gray-400 ">CEO</div>
                    </div>
                </div>

                <div
                    class="rounded-xl shadow-sm hover:shadow-2xl border border-gray-50 h-[30rem] w-[35rem] bg-white duration-700">

                    <div>
                        <div class="h-[22rem] w-full">
                            <div style="background-image: url('/../../../images/team-3.jpg');"
                                 class="rounded-t-lg w-[25rem] h-[22rem] bg-no-repeat bg-cover bg-center group">

                                <div
                                    class="flex flex-col pt-5 pr-3 items-end group-hover:transition-transform group-hover:scale-y-90 group-hover:duration-500 gap-y-5
                                   animate-pulse ">
                                    <a class="hover:bg-purple-700 rounded-full h-8 w-8">
                                        <x-icons.icon :icon="'facebook'"
                                                      class="h-10 w-8 ml-1.5 mt-0.5 hidden group-hover:block "/>
                                    </a>
                                    <a class="hover:bg-purple-700 rounded-full h-8 w-8">
                                        <x-icons.icon :icon="'twitter'"
                                                      class="h-10 w-8 ml-1.5 mt-0.5 hidden group-hover:block"/>
                                    </a>
                                    <a class="hover:bg-purple-700 rounded-full h-8 w-8">
                                        <x-icons.icon :icon="'github'"
                                                      class="h-10 w-8 ml-1.5 mt-0.5 hidden group-hover:block"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-2xl mx-8 mt-3 font-Don tracking-wider">Divi</div>
                        <div class="text-sm mx-8 py-3 tracking-wider text-gray-400">CEO</div>
                    </div>
                </div>

                <div
                    class="rounded-xl shadow-sm hover:shadow-2xl border border-gray-50 h-[30rem] w-[35rem] bg-white duration-700">

                    <div>
                        <div class="h-[22rem] w-full">
                            <div style="background-image: url('/../../../images/team-3.jpg');"
                                 class="rounded-t-lg w-[25rem] h-[22rem] bg-no-repeat bg-cover bg-center group">

                                <div
                                    class="flex flex-col pt-5 pr-3 items-end group-hover:transition-transform group-hover:scale-y-90 group-hover:duration-500">
                                    <a class="">
                                        <x-icons.icon :icon="'facebook'" class="h-10 w-8 hidden group-hover:block"/>
                                    </a>
                                    <a>
                                        <x-icons.icon :icon="'twitter'" class="h-10 w-8 hidden group-hover:block"/>
                                    </a>
                                    <a>
                                        <x-icons.icon :icon="'github'" class="h-10 w-8 hidden group-hover:block"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-2xl mx-8 mt-3 font-Don tracking-wider">Divi</div>
                        <div class="text-sm mx-8 py-3 tracking-wider text-gray-400">CEO</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function animatedCounter(targer, time = 200, start = 0) {
            return {
                current: 0,
                target: targer,
                time: time,
                start: start,
                updatecounter: function () {
                    start = this.start;
                    const increment = (this.target - start) / this.time;
                    const handle = setInterval(() => {
                        if (this.current < this.target)
                            this.current += increment
                        else {
                            clearInterval(handle);
                            this.current = this.target
                        }
                    }, 1);
                }
            };
        }
    </script>

</div>
