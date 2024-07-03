<div class="">
    <div class="w-full mx-auto " x-data="slider">

        <!-- About ---------------------------------------------------------------------------------------------------->

        <div>
            <div class="p-4 mt-4 mx-auto w-full">
                <div class="flex md:flex justify-center space-x-4 md:w-full md:gap-4">
                    <button
                        class="p-2 px-1.5 py-1.5 md:px-4 md:w-52 rounded-full md:py-4 font-semibold focus:outline-none tab-button md:text-2xl"
                        onclick="showTab('tab1')">Offset
                    </button>

                    <button
                        class="px-1.5 py-1.5 md:md:px-4 md:w-72 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl"
                        onclick="showTab('tab2')">Garments
                    </button>

                    <button
                        class="px-1.5 py-1.5 md:px-4 md:w-72 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl"
                        onclick="showTab('tab3')">Online Store
                    </button>

                    <button
                        class="px-1.5 py-1.5 md:px-4 md:w-72 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl"
                        onclick="showTab('tab4')">Bonus Features
                    </button>
                </div>
            </div>
        </div>

        <div id="tab1"
             class="w-3/4 p-4 tab-content shadow-md rounded-lg mx-auto">

            <a href="https://offset.aaranerp.com"
               class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">

                <img class="feature p-2 h-[30rem]" alt="Sales &amp; Purchase Invoices, Expense Tracking"
                     src="../../../../images/sales-purchase.webp">
                <div class="border-gray-400 bg-white p-2 font-bold font-serif">Simple Invoice</div>
            </a>

        </div>

        <!-- Counts ----------------------------------------------------------------------------------------------->

        <div class="w-3/4 mx-auto mt-24">

            <div class="flex flex-row mx-auto items-center justify-center content-center gap-x-36 mb-5">

                <div
                    class="flex flex-col rounded-xl border-l-4 border-purple-400 hover:rounded-lg hover:bg-gray-100 hover:shadow-2xl hover:duration-700 bg-gray-50">

                    <div class="flex w-64 ml-4">
                        <div class="text-7xl text-red-700 text-center font-bold white w-24 mt-5"
                             x-data="animatedCounter(50, 200)" x-init="updatecounter"
                             x-text="Math.round(current)">
                        </div>

                        <p class="text-7xl text-red-700 text-center font-bold white mt-5">%</p>
                    </div>

                    <div class="text-2xl font-bold p-3 ml-5 tracking-wider">
                        Increase In Repeat Customers
                    </div>
                </div>

                <div
                    class="flex flex-col rounded-xl border-l-4 border-purple-400 hover:rounded-lg hover:bg-gray-100 hover:shadow-2xl hover:duration-700 bg-gray-50">

                    <div class="flex w-64 ml-4">
                        <div class="text-7xl text-purple-700 text-center font-bold white w-24 mt-5"
                             x-data="animatedCounter(75, 200)" x-init="updatecounter"
                             x-text="Math.round(current)">
                        </div>
                        <p class="text-7xl text-purple-700 text-center font-bold white mt-5">%</p>
                    </div>

                    <div class="text-2xl font-bold p-3 ml-5 tracking-wider">
                        Efficient Inventory Management
                    </div>
                </div>

                <div
                    class="flex flex-col rounded-xl border-l-4 border-purple-400 hover:rounded-lg hover:bg-gray-100 hover:shadow-2xl hover:duration-700 bg-gray-50">

                    <div class="flex w-64 ml-4">
                        <div class="text-6xl text-yellow-700 text-center font-bold white w-24 mt-5 "
                             x-data="animatedCounter(90, 200)" x-init="updatecounter"
                             x-text="Math.round(current)">
                        </div>
                        <p class="text-7xl text-yellow-700 text-center font-bold white mt-5">%</p>
                    </div>

                    <div class="text-2xl font-bold p-3 ml-5 tracking-wider">
                        Enhancement in business outlook
                    </div>
                </div>

                <div
                    class="flex flex-col rounded-xl border-l-4 border-purple-400 hover:rounded-lg hover:bg-gray-100 hover:shadow-2xl hover:duration-700 bg-gray-50">

                    <div class="flex w-64 ml-4 ">
                        <div class="text-7xl text-green-700 text-center font-bold white w-32 mt-5 "
                             x-data="animatedCounter(100, 200)" x-init="updatecounter"
                             x-text="Math.round(current)">
                        </div>
                        <p class="text-7xl text-green-700 text-center font-bold white mt-5">%</p>
                    </div>

                    <div class="text-2xl font-bold p-3 ml-5 tracking-wider">
                        Fater & Effective Bill Process
                    </div>
                </div>

            </div>

        </div>

        <!-- Team ----------------------------------------------------------------------------------------------------->

        <div class="w-full h-screen">

            <div class="text-center">
                <div class="font-Ram text-xl text-center pt-24 tracking-wide text-blue-500">Team<br>
                </div>

                <div class="font-Ram text-3xl text-center tracking-wider my-4">Meet Our Team Members<br>
                </div>
            </div>

            <div class="flex justify-center bg-alice-blue">

                <div class="flex max-w-7xl flex-cols-3 gap-12 mt-12 lg:h-[35rem] md:ml-5">

                    <!--Card 1  ------------------------------------------------------------------------------------------------>
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
                                                                   class=" h-10 w-8 hidden group-hover:block"/>
                                            </a>

                                            <a class="hover:bg-blue-400 rounded-full h-8 w-8">
                                                <x-icons.icon-fill :iconfill="'twitter1'" :colour="'#fdfefe '"
                                                                   class="h-10 w-8 hidden group-hover:block"/>
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

                    <!-- card 2 -------------------------------------------------------------------------------------------------->

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
                                                                   class="h-10 w-8 hidden group-hover:block"/>
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

                    <!-- card 3 --------------------------------------------------------------------------------------------------->

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

        <!-- counter script ------------------------------------------------------------------------------------------->

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

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('slider', () => ({
                    duration: 5000,
                    active: 0,
                    progress: 0,
                    firstFrameTime: 0,
                    items: [
                        {
                            img: '/../../../images/software2.jpg',
                            p: 'When you think about the word “art,” what comes to mind? A child’s artwork pinned to the fridge? A favorite artist whose work always inspires? Abstract art that is hard to understand? ',
                            desc: 'Omnichannel',
                            buttonIcon: 'ps-icon-01.svg',
                        },
                        {
                            img: '/../../../images/e-way-billing.jpg',
                            p: 'As a sickly child who needed to stay home from school a lot, I found that making art helped me cope. Today, creating art is my sanctuary. I use it as a sounding board to better understand myself and a way to recharge and learn from the challenges of life. ',
                            desc: 'Multilingual',
                            buttonIcon: 'ps-icon-02.svg',
                        },
                        {
                            img: '/../../../images/software1.jpg',
                            p: 'Although everyone has their own concept of what defines art, one thing is universally true: Creativity is a defining feature of the human species. ',
                            desc: 'Interpolate',
                            buttonIcon: 'ps-icon-03.svg',
                        },
                        {
                            img: '/../../../images/billing-system-software.jpg',
                            p: 'Seemingly ordinary everyday activities can provide opportunities to tap into one’s natural creativity and imagination: whipping up a meal from leftovers, figuring out an alternate route to work, dancing a little jig in response to hearing a song, or planting and tending a garden. ',
                            desc: 'Enriched',
                            buttonIcon: 'ps-icon-04.svg',
                        },
                    ],
                    init() {
                        this.startAnimation()
                        this.$watch('active', callback => {
                            cancelAnimationFrame(this.frame)
                            this.startAnimation()
                        })
                    },
                    startAnimation() {
                        this.progress = 0
                        this.$nextTick(() => {
                            this.heightFix()
                            this.firstFrameTime = performance.now()
                            this.frame = requestAnimationFrame(this.animate.bind(this))
                        })
                    },
                    animate(now) {
                        let timeFraction = (now - this.firstFrameTime) / this.duration
                        if (timeFraction <= 1) {
                            this.progress = timeFraction * 100
                            this.frame = requestAnimationFrame(this.animate.bind(this))
                        } else {
                            timeFraction = 1
                            this.active = (this.active + 1) % this.items.length
                        }
                    },
                    heightFix() {
                        this.$nextTick(() => {
                            this.$refs.items.parentElement.style.height = this.$refs.items.children[this.active + 1].clientHeight + 'px'
                        })
                    }
                }))
            })
        </script>

        <div class="w-full mt-4 md:w-full md:mt-20 mx-auto">

            <script>
                function showCard(cardId) {

                    const cardContents = document.querySelectorAll('.card-content');
                    cardContents.forEach((content) => {
                        content.classList.add('hidden');
                    });


                    const selectedCard = document.getElementById(cardId);
                    if (selectedCard) {
                        selectedCard.classList.remove('hidden');
                    }


                    const cardButtons = document.querySelectorAll('.card-button');
                    cardButtons.forEach((button) => {
                        button.classList.remove('active');
                    });


                    const clickedButton = document.querySelector(`[onclick="showCard('${cardId}')"]`);
                    if (clickedButton) {
                        clickedButton.classList.add('active');
                    }
                }

                //  the first card
                showTab('card1');
            </script>

            <style>
                .tab-button.active {
                    background-color: #fff;
                    border-color: #4299e1;
                    color: #4299e1;
                }
            </style>
            <style>
                .card-button.active {
                    background-color: #fff;
                    border-color: #4299e1;
                    color: #4299e1;
                }
            </style>

            <script>
                function showTab(tabId) {

                    const tabContents = document.querySelectorAll('.tab-content');
                    tabContents.forEach((content) => {
                        content.classList.add('hidden');
                    });

                    const selectedTab = document.getElementById(tabId);
                    if (selectedTab) {
                        selectedTab.classList.remove('hidden');
                    }


                    const tabButtons = document.querySelectorAll('.tab-button');
                    tabButtons.forEach((button) => {
                        button.classList.remove('active');
                    });

                    const clickedButton = document.querySelector(`[onclick="showTab('${tabId}')"]`);
                    if (clickedButton) {
                        clickedButton.classList.add('active');
                    }
                }

                showTab('tab1');
            </script>
        </div>

    </div>

</div>
