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

        <div class="w-full h-40 bg-alice-blue mt-32">

            <div class="flex flex-row mx-auto items-center justify-center content-center gap-40 mt-12 mb-5">


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

                                <div class="hidden group-hover:block">
                                    <div
                                        class="flex flex-col pt-5 pr-3 items-end group-hover:transition-transform group-hover:scale-y-90 group-hover:duration-500 gap-y-5">

                                        <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                            <x-icons.icon-fill :iconfill="'facebook-fill'" :colour="'#fdfefe '"
                                                               class="p-2.5 h-10 w-8 hidden group-hover:block"/>
                                        </a>

                                        <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                            <x-icons.icon-fill :iconfill="'twitter1'" :colour="'#fdfefe '"
                                                               class="h-10 w-8 p-2.5 hidden group-hover:block"/>
                                        </a>
                                        <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                            <x-icons.icon-fill :iconfill="'git-hub'" :colour="'#fdfefe '"
                                                               class="h-10 w-8 hidden group-hover:block"/>
                                        </a>
                                    </div>
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

                                <div class="hidden group-hover:block">
                                    <div
                                        class="flex flex-col pt-5 pr-3 items-end group-hover:transition-transform group-hover:scale-y-90 group-hover:duration-500 gap-y-5">

                                        <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                            <x-icons.icon-fill :iconfill="'facebook-fill'" :colour="'#fdfefe '"
                                                               class="text-white h-10 w-8 hidden group-hover:block"/>

                                        </a>
                                        <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                            <x-icons.icon-fill :iconfill="'twitter1'" :colour="'#fdfefe '"
                                                               class="text-white h-10 w-8 hidden group-hover:block"/>
                                        </a>
                                        <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                            <x-icons.icon-fill :iconfill="'git-hub'" :colour="'#fdfefe '"
                                                               class="h-10 w-8 mt-0.5 hidden group-hover:block"/>
                                        </a>
                                    </div>
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
                                    class="flex flex-col pt-5 pr-3 items-end group-hover:transition-transform group-hover:scale-y-90 group-hover:duration-500 gap-y-5">
                                    <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                        <x-icons.icon-fill :iconfill="'facebook-fill'" :colour="'#fdfefe '"
                                                           class="text-white h-10 w-8 hidden group-hover:block"/>
                                    </a>
                                    <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                        <x-icons.icon-fill :iconfill="'twitter1'" :colour="'#fdfefe '"
                                                           class="text-white h-10 w-8 hidden group-hover:block"/>
                                    </a>

                                    <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                        <x-icons.icon-fill :iconfill="'git-hub'" :colour="'#fdfefe '"
                                                           class="h-10 w-8 hidden group-hover:block"/>
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
