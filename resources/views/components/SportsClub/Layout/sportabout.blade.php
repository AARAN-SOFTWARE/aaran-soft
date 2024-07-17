<div>
    <div class="h-[17rem]] w-full mx-auto">
        <div class="flex flex-col">
            <div class="h-16 w-full flex-col flex justify-center items-center bg-[#081E40]">
                <div class="text-2xl w-9/12 text-white font-gab tracking-wider">About Us</div>
            </div>
        </div>
    </div>

    <div class="w-9/12 h-[25rem] my-10 flex mx-auto justify-between gap-5 ">

        <div class="w-4/12 h-[25rem] bg-zinc-400">
            <img src="../../../../images/profile/bg-1.jpg" alt="" class="h-[25rem]">
        </div>

        <div class="flex flex-col w-9/12 ">

            <div class="w-full flex mx-auto justify-evenly gap-3 px-5">

                <div class="w-4/12 text-center bg-[#19398A] ">
                    <button
                        class="font-semibold text-white hover:text-white focus:outline-none tab-button md:text-2xl p-1"
                        onclick="showTab('tab1')">Offset
                    </button>
                </div>

                <div class="w-4/12 text-center hover:bg-[#19398A] hover:text-white">
                    <button
                        class="w-full font-semibold hover:text-white focus:outline-none tab-button md:text-2xl p-1"
                        onclick="showTab('tab2')">Garments
                    </button>
                </div>

                <div class="w-4/12 text-center hover:bg-[#19398A] hover:text-white">
                    <button
                        class="w-full font-semibold hover:text-white focus:outline-none tab-button md:text-2xl p-1"
                        onclick="showTab('tab3')">Online Store
                    </button>
                </div>
            </div>

            <div class="w-8/12">
                <div id="tab1"
                     class="w- h-[22rem] p-4 tab-content mx-auto">

                    <div class="border-gray-400 bg-white p-2 font-bold font-serif text-xs  h-[22rem] leading-loose">When
                        founders face obstacles such as a sudden decrease in sales, supply chain issues, or growing
                        debt, these mounting pressures can escalate early frustrations into full-blown panic attacks.

                        When your well-being is affected and your business demands pull you in countless directions, it
                        can be challenging to determine whether to forge ahead or pivot to something new.

                        Here are five tips to guide you through this critical decision.

                    </div>

                </div>

                <div id="tab2"
                     class="w-3/4 p-4 tab-content shadow-md rounded-lg mx-auto">

                    <a href="https://offset.aaranerp.com"
                       class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">

                        <img class="feature p-2 h-[15rem]" alt="Sales &amp; Purchase Invoices, Expense Tracking"
                             src="../../../../images/sales-purchase.webp">
                        <div class="border-gray-400 bg-white p-2 font-bold font-serif">Simple Invoice2</div>
                    </a>

                </div>

                <div id="tab3"
                     class="w-3/4 p-4 tab-content shadow-md rounded-lg mx-auto">

                    <a href="https://offset.aaranerp.com"
                       class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">

                        <img class="feature p-2 h-[15rem]" alt="Sales &amp; Purchase Invoices, Expense Tracking"
                             src="../../../../images/sales-purchase.webp">
                        <div class="border-gray-400 bg-white p-2 font-bold font-serif">Simple Invoice3</div>
                    </a>

                </div>
            </div>
        </div>
    </div>

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
                background-color: #19398A;
                border-color: #ffffff;
                color: #ffffff;
            }
        </style>
        <style>
            .card-button.active {
                background-color: #fff;
                border-color: #4299e1;
                color: #19398A;
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
