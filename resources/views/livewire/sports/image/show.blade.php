<div>
    <x-slot name="header"> Sports Image</x-slot>

    <div class="w-full mt-4 md:w-full md:mt-20 mx-auto">

        <h2 class="text-5xl font-extrabold font-serif text-center">
            Latest News
        </h2>

        <!-- Tab Buttons ---------------------------------------------------------------------------------------------->
        <div class="w-full mt-12">

            <div class="max-w-7xl flex flex-row gap-5 mx-auto ">

                <div class="gap-5">

                    <!-- Tab Button1 ---------------------------------------------------------------------------------->

                    <button
                        class="ml-2 rounded-xl text-gray-900 font-semibold border-b-4 bg-white hover:bg-purple-200 card-button mx-5"
                        onclick="showCard('card1')">

                        <div class="flex">

                            <x-icons.icon :icon="'apple'" class="w-8 h-8"/>

                            <h3 class="text-xl ml-3 p-2">Club Photo</h3>
                        </div>

                    </button>

                    <!-- Tab Button2 ---------------------------------------------------------------------------------->
                    <button
                        class="ml-2 rounded-xl text-gray-900 font-semibold border-b-4 bg-white hover:bg-purple-200 card-button mx-5"
                        onclick="showCard('card2')">

                        <div class="flex">

                            <x-icons.icon :icon="'apple'" class="w-8 h-8"/>

                            <h3 class="text-xl ml-3 p-2">Master Photo</h3>
                        </div>

                    </button>

                    <!-- Tab Button3 ---------------------------------------------------------------------------------->
                    <button
                        class="ml-2 rounded-xl text-gray-900 font-semibold border-b-4 bg-white hover:bg-purple-200 card-button"
                        onclick="showCard('card3')">

                        <div class="flex">

                            <x-icons.icon :icon="'apple'" class="w-8 h-8"/>

                            <h3 class="text-2xl ml-3">Student Photo</h3>
                        </div>

                    </button>
                </div>
            </div>

            <!-- Tab Content ------------------------------------------------------------------------------------------>

            <div class="mt-3 md:mt-8 rounded-xl max-w-7xl mx-auto">

                <!-- Card Content1 ------------------------------------------------------------------------------------>

                <div id="card1"
                     class="ml-2 card-content active">
                    <div>

                        <div class="w-full grid grid-cols-2 gap-14">
                            @foreach($clubImage as $row)

                                <div class="rounded-lg bg-gray-50">
                                    <div class="">
                                        <div>
                                            <img class="bg-cover rounded-t-lg h-[22rem] w-full p-5"
                                                 alt="{{$row->clubImage}}"
                                                 src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->club_image))}}">
                                        </div>
                                    </div>

                                    <div>
                                        <div
                                            class="w-full overflow-hidden mb-2 capitalize text-3xl font-roboto p-5 mx-auto"> {{ $row->title }}
                                        </div>

                                        <div class="w-full overflow-hidden">
                                            <div
                                                class="font-nunito mb-2.5 text-sm tracking-wider leading-relaxed mx-6">{!! $row->desc !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Card Content2  ----------------------------------------------------------------------------------->

                <div id="card2"
                     class="card-content active bg-[#EFF1F3] shadow-2xl ">
                    <div>

                        <div class="w-full grid grid-cols-2 gap-14">

                            @foreach($masterImage as $row)

                                <div class="rounded-lg bg-gray-50">

                                    <div class="">
                                        <div>
                                            <img class="bg-cover rounded-t-lg h-64 w-full" alt="{{$row->masterImage}}"
                                                 src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row->master_image))}}">
                                        </div>
                                    </div>

                                    <div class="w-full mx-8 mt-8">

                                        <div
                                            class="w-full overflow-hidden mb-2 capitalize text-3xl font-roboto p-5 mx-auto"> {{ $row->title }}
                                        </div>

                                        <div class="w-full overflow-hidden">
                                            <div
                                                class="font-nunito mb-2.5 text-sm tracking-wider leading-relaxed mx-6">{!! $row->desc !!}
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Card Content3  ----------------------------------------------------------------------------------->

                <div id="card3"
                     class="card-content active border border-gray-300 rounded-xl bg-[#EFF1F3] shadow-2xl md:mx-auto md:justify-items-center">

                    <div>
                        @foreach($studentImage as $row)

                            <div class="rounded-lg bg-gray-50">

                                <div>
                                    <img class="bg-cover rounded-t-lg h-64 w-full" alt="{{$row->studentImage}}"
                                         src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$row->studentImage))}}">
                                </div>

                                <div class="w-full h-16 my-auto overflow-hidden mb-6"
                                     class="font-Ram text-5xl hover:text-cyan-700 capitalize
                               text-neutral-900 lg:text-2xl overflow-hidden"> {{ $row->title }}
                                </div>

                                <div class="w-full my-auto overflow-hidden ">
                                    <div class="font-gab mb-8 text-lg tracking-wider leading-relaxed text-left
                                 text-gray-800 h-20 overflow-hidden">{!! $row->desc !!}&nbsp;
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Script  ------------------------------------------------------------------------------------------------------>
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
