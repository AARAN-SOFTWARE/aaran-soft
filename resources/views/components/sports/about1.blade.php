<div>
    <div class="w-full bg-gray-200 h-screen flex-col flex justify-center items-center">

        <div class="mb-20 mx-auto items-center text-4xl tracking-wider font-semibold font-lexanddeca">
            WELCOME TO SPORTSCLUB
        </div>

        <div class="w-9/12 h-[25rem] flex mx-auto justify-between gap-5">

            <div class="w-4/12 h-[25rem] bg-zinc-400">
                <img src="../../../../images/profile/bg-1.jpg" alt="" class="h-[25rem]">
            </div>

            <div class="flex flex-col w-9/12 ">

                <div class="w-full flex mx-auto justify-evenly gap-3 px-5">

                    <div class="w-4/12 text-center bg-[#19398A] h-9 ">
                        <button
                            class="text-lg font-semibold text-white hover:text-white focus:outline-none tab-button p-1"
                            onclick="showTab('tab1')">CLUB HISTORY
                        </button>
                    </div>

                    <div class="w-4/12 text-center hover:bg-[#19398A] hover:text-white  h-9">
                        <button
                            class="text-lg w-full font-semibold hover:text-white focus:outline-none tab-button p-1"
                            onclick="showTab('tab2')">MANAGEMENT TEAM
                        </button>
                    </div>

                    <div class="w-4/12 text-center hover:bg-[#19398A] hover:text-white h-9">
                        <button
                            class="text-lg w-full font-semibold hover:text-white focus:outline-none tab-button p-1"
                            onclick="showTab('tab3')">COMMITTEE MEMBERS
                        </button>
                    </div>
                </div>

                <div class="w-10/12 text-justify">
                    <div id="tab1"
                         class="h-[22rem] p-5 tab-content mx-auto mt-3">

                        <div
                            class="border-gray-400 font-serif text-xs h-[20rem] leading-loose tracking-widest">
                            When
                            founders face obstacles such as a sudden decrease in sales, supply chain issues, or growing
                            debt, these mounting pressures can escalate early frustrations into full-blown panic
                            attacks.

                            When your well-being is affected and your business demands pull you in countless directions,
                            it
                            can be challenging to determine whether to forge ahead or pivot to something new.

                            Here are five tips to guide you through this critical decision.

                        </div>

                    </div>

                    <div id="tab2"
                         class="h-[22rem] p-4 tab-content mx-auto flex ">

                        <div class="p-1.5 mt-5 font-serif h-[20rem] leading-8 text-xs tracking-widest">

                            <div class="text-gray-600 font-semibold">First President <span
                                    class="text-gray-500 font-nunito">– Mr A Vellingiri – MAG</span></div>

                            <div class="text-gray-600 font-semibold">Current President <span
                                    class="text-gray-500 font-nunito">– Mr N Velusamy – Toplight</span></div>

                            <div class="text-gray-600 font-semibold">Vice President <span
                                    class="text-gray-500 font-nunito">– Mr.V.Eswaramoorthy – Startime</span></div>

                            <div class="text-gray-600 font-semibold">Secretary <span class="text-gray-500 font-nunito">– Mr.S.Thangamani – Dhanalakshmi Exports</span>
                            </div>

                            <div class="text-gray-600 font-semibold">Joint Secretary <span
                                    class="text-gray-500 font-nunito">– Mr.T.Govindaraj – Madha Knitwear</span></div>

                            <div class="text-gray-600 font-semibold">Treasurer <span class="text-gray-500 font-nunito">– Mr.N Balasubramanian – Adithiya Textile Process</span>
                            </div>

                        </div>

                    </div>

                    <div id="tab3"
                         class="h-[22rem] p-4 tab-content mx-auto flex ">

                        <div class="p-1.5 mt-5 font-serif h-[20rem] leading-8 text-xs tracking-widest">

                            <div class="text-gray-600 font-semibold">Mr.P.Natraj<span class="text-gray-500 font-nunito"> – KPR Mills</span>
                            </div>

                            <div class="text-gray-600 font-semibold">Mr.M.Senthilkumar <span
                                    class="text-gray-500 font-nunito"> – BKS Textiles</span></div>

                            <div class="text-gray-600 font-semibold">Mr.AM.Shanmugam<span
                                    class="text-gray-500 font-nunito">– MSK</span></div>

                            <div class="text-gray-600 font-semibold">Mr.M Somasundaram<span
                                    class="text-gray-500 font-nunito">– MS Knitting Mills</span></div>

                            <div class="text-gray-600 font-semibold">Mr.M Ganeshan <span
                                    class="text-gray-500 font-nunito">– MS Tex</span></div>

                            <div class="text-gray-600 font-semibold">Mr.P.Balasubramaniam <span
                                    class="text-gray-500 font-nunito">– MKRP Dyeing</span></div>

                            <div class="text-gray-600 font-semibold">Mr.P.Kesaver Senthil<span
                                    class="text-gray-500 font-nunito">– Venkatachlapathy Traders</span></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>

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
