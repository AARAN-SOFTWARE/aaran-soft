<div class="p-3 md:mt-16  mx-auto md:w-3/4">
    <h2 class="text-3xl text-center font-serif font-bold">
        Driving digital transformation with our software
    </h2>
    <h2 class="text-5xl text-center font-serif font-bold mt-2">
        Try out
    </h2>
    <!-- Tab Buttons -->
    <div class="p-4 mt-4 text-center text-gray-500 bg-gray-100 rounded-full mx-auto w-full">
        <div class="flex md:flex justify-center space-x-4 md:w-full md:gap-4">
            <button
                class="p-2 px-1.5 py-1.5 md:px-4 md:w-52 rounded-full bg-gray-100 text-gray-600 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl"
                onclick="showTab('tab1')">Offset
            </button>
            <button
                class="px-1.5 py-1.5 md:md:px-4 md:w-72 rounded-full bg-gray-100 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl"
                onclick="showTab('tab2')">Garments
            </button>
            <button
                class="px-1.5 py-1.5 md:px-4 md:w-72 rounded-full bg-gray-100 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl"
                onclick="showTab('tab3')">Online Store
            </button>
            <button
                class="px-1.5 py-1.5 md:px-4 md:w-72 rounded-full bg-gray-100 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl"
                onclick="showTab('tab4')">Bonus Features
            </button>
        </div>
    </div>

    <!-- Tab 1 Content ------------------------------------------------------------------------------------------------>
    <div id="tab1"
         class="w-full p-4 tab-content shadow-md rounded-lg mx-auto bg-green-600">

        <a href="https://offset.aaranerp.com"
           class="grid-cols-2 border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2" alt="Sales &amp; Purchase Invoices, Expense Tracking"
                 src="../../../../images/sales-purchase.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Simple Invoice</div>
        </a>

    </div>

    <!-- Tab 2 Content ------------------------------------------------------------------------------------------------>

    <div id="tab2" class="p-4 tab-content bg-white shadow-md rounded-lg hidden grid md:grid-rows-2 md:grid-cols-3">

        <a href="https://offset.aaranerp.com"
           class="grid-cols-2 border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2" alt="Sales &amp; Purchase Invoices, Expense Tracking"
                 src="../../../../images/sales-purchase.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Simple Invoice</div>
        </a>

    </div>

    <!-- Tab 3 Content ------------------------------------------------------------------------------------------------>

    <div id="tab3" class="p-4 tab-content bg-white shadow-md rounded-lg hidden grid md:grid-rows-2 md:grid-cols-3">

        <a href="https://offset.aaranerp.com"
           class="grid-cols-2 border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2" alt="Sales &amp; Purchase Invoices, Expense Tracking"
                 src="../../../../images/sales-purchase.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Simple Invoice</div>
        </a>

    </div>

    <div id="tab4" class="p-4 tab-content bg-white shadow-md rounded-lg hidden grid md:grid-rows-2 md:grid-cols-3">

        <a href="https://offset.aaranerp.com"
           class="grid-cols-2 border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2" alt="Sales &amp; Purchase Invoices, Expense Tracking"
                 src="../../../../images/sales-purchase.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Simple Invoice</div>
        </a>

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


<div class="flex w-full justify-center  p-5 bg-white">
    <a
        href="{{ route('demo-requests.upsert') }}"
        class="animate-pulse focus:animate-none hover:animate-none inline-flex text-2xl bg-green-600 px-4 py-2 mt-3 rounded-lg cursor-pointer
                    tracking-wide text-white font-mono font-bold">
        <span class="px-5"> Book for demo</span>
        <x-icons.elements :icon="'notebook'" class="w-10 h-auto block"/>
    </a>
</div>
