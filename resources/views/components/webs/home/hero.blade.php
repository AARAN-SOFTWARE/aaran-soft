<div class="flex flex-col sm:flex-row justify-between items-center p-5 bg-white">

    <x-storyset.programer/>

    <div
        class="w-full animate__animated wow animate__fadeInDown  p-5 ">

        <div class="relative inline-block">
            <span class=" text-3xl md:text-6xl font-bold font-serif animate__animated wow animate__fadeOut">
                CODEXSUN
            </span>
            <span
                class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-red-500 via-orange-400 to-yellow-600 rounded-full"></span>
        </div>

        <h1 class="text-zinc-400 py-3 text-lg font-semibold">Software make simple</h1>

        <h1 class="mb-5 font-extrabold text-2xl sm:text-4xl text-zinc-500">Manage your business like never
            before</h1>

        <p class="py-2 font-light tracking-widest text-zinc-500 text-balance max-w-5xl">
            The perfect key for unlocking business growth is Infusing Intelligence to your business.
            Start getting complete business solution package with end-to-end management.</p>

        <a
            href="{{ route('demo-requests.upsert') }}"
            class="animate-pulse focus:animate-none hover:animate-none inline-flex text-2xl bg-green-600 px-4 py-2 mt-3 rounded-lg cursor-pointer
                    tracking-wide text-white font-mono font-bold">
            <span class="px-5"> Book for demo</span>
            <x-icons.elements :icon="'notebook'" class="w-10 h-auto block"/>
        </a>

    </div>
</div>
<div class="p-3 md:mt-16  mx-auto md:w-3/4">
    <h2 class="text-5xl text-center font-serif font-bold">
        All-in-one billing software to help grow
    </h2>
    <h2 class="text-5xl text-center font-serif font-bold mt-2">
        your business
    </h2>
    <!-- Tab Buttons -->
    <div class="p-4 mt-4 text-center text-gray-500 bg-gray-100 rounded-full mx-auto w-full">
        <div class="flex md:flex justify-center space-x-4 md:w-full md:gap-4">
            <button class="p-2 px-1.5 py-1.5 md:px-4 md:w-52 rounded-full bg-gray-100 text-gray-600 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl" onclick="showTab('tab1')">Billing</button>
            <button class="px-1.5 py-1.5 md:md:px-4 md:w-72 rounded-full bg-gray-100 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl" onclick="showTab('tab2')">Inventory Management</button>
            <button class="px-1.5 py-1.5 md:px-4 md:w-72 rounded-full bg-gray-100 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl" onclick="showTab('tab3')">Business Management</button>
            <button class="px-1.5 py-1.5 md:px-4 md:w-72 rounded-full bg-gray-100 md:py-4 font-semibold hover:text-indigo-900 focus:outline-none tab-button md:text-2xl" onclick="showTab('tab4')">Bonus Features</button>
        </div>
    </div>

    <!-- Tab Content -->
    <div id="tab1" class="p-4 tab-content bg-white shadow-md rounded-lg grid md:grid-rows-2 md:grid-cols-3 mx-auto justify-items-center">
        <div class="grid-cols-1  border border-b-gray-500 bg-gray-200 rounded-xl md:mt-10 md:m-4 ">
            <img class="feature  md:p-2 md:justify-items-center md:mx-auto" alt="Automatic GST Bill Sharing on Whatsapp/SMS" src="../../../../images/automatic-invoice.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Automatic invoice sharing on SMS &amp; Whatsapp</div>
        </div>
        <div class="grid-cols-2 border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2" alt="Sales &amp; Purchase Invoices, Expense Tracking" src="../../../../images/sales-purchase.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Sales Purchase and Expenses</div>
        </div>
        <div class="grid-cols-3 border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2 "  alt="Create Quotations/Estimates &amp; Proforma Invoices" src="../../../../images/quotation-proforma.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Quotations Estimates &amp; Proforma Invoices</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2" height="256"  alt="Track Invoice Edit History" src="../../../../images/audit.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Audit Trail</div>
        </div>
        <div class=" border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature w-96 h-60 p-2" height="256" alt="POS Billing Software Free" src="../../../../images/Receipt-amico.svg">
                <div class="border-gray-400 bg-white p-3 mt-1 font-bold font-serif">POS Billing</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2 " height="256" alt="Create Delivery Challan" src="../../../../images/delivery-challan.webp">
                <div class="border-gray-400 bg-white p-2 font-bold font-serif">Delivery Challan</div>
        </div>
    </div>
    <div id="tab2" class="p-4 tab-content bg-white shadow-md rounded-lg hidden grid md:grid-rows-2 md:grid-cols-3">
        <div class="grid-cols-1 border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2 mr-2" alt="Inventory Management Software" src="../../../../images/manage-stocks.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Manage Stock Items</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Godown Management Billing Software" src="../../../../images/godown.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Godown Management</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Product Batching Feature" src="../../../../images/batching.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Batching</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Add Serial Number for easy product tracking" src="../../../../images/serialisation.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Serialisation</div>
        </div>
        <div class=" border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Create and Print Barcodes" src="../../../../images/barcodes.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Generate and Print Barcodes</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Add custom fields for easy inventory management" src="../../../../images/custom-fields.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Inventory Custom Fields</div>
        </div>
    </div>
    <div id="tab3" class="p-4 tab-content bg-white shadow-md rounded-lg hidden grid md:grid-rows-2 md:grid-cols-3">
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature h-52 mx-auto"  alt="Access myBillBook on multiple devices" src="../../../../images/Sign up-1.png">
            <div class="border-gray-400 bg-white p-2 mt-10 font-bold font-serif">Multiple Device Login</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4 h-72">
            <img class="feature p-2"  alt="Manage Multiple Businesses with one Invoicing Software" src="../../../../images/multiple-business.webp">
            <div class="border-gray-400 bg-white p-1 font-bold font-serif">Multiple Businesses</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4 h-72">
            <img class="feature p-2"  alt="Provide access to multiple users" src="../../../../images/multiple-users.webp">
            <div class="border-gray-400 bg-white p-1 font-bold font-serif">Multiple Users</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4 h-72">
            <img class="feature p-2"  alt="Create different user roles" src="../../../../images/user-role.webp">
            <div class="border-gray-400 bg-white p-1 font-bold font-serif">User Role Settings</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4 h-72">
            <img class="feature p-2"  alt="Staff Attendance and Payroll Management" src="../../../../images/staff-attendance.webp">
            <div class="border-gray-400 bg-white p-1 font-bold font-serif">Staff Attendance and Payroll</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4 h-72">
            <img class="feature p-2"  alt="Billing Software that Generates Business Reports for free" src="../../../../images/business-reports.webp">
            <div class="border-gray-400 bg-white p-1 font-bold font-serif">Business Reports</div>
        </div>
    </div>
    <div id="tab4" class="p-4 tab-content bg-white shadow-md rounded-lg hidden grid md:grid-rows-2 md:grid-cols-3">
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
                <img class="feature p-2"  alt="Multiple Bank Account Management" src="../../../../images/multiple-bank-accounts.webp">
                <div class="border-gray-400 bg-white p-2 font-bold font-serif">Multiple Bank Account</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Recover Deleted Invoices for better Invoice Management" src="../../../../images/recover-deleted-invoices.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Recover Deleted Invoices</div>
        </div>

        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Bulk Upload/ Edit Invoices" src="../../../../images/bulk-upload.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Bulk Upload/ Edit</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
                <img class="feature p-2"  alt="Automated Billing for recurring invoices" src="../../../../images/automated-billing.webp">
                <div class="border-gray-400 bg-white p-2 font-bold font-serif">Automated Billing</div>
        </div>
        <div class="border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Create Invoices in Foreign Currency" src="../../../../images/foreign-currency.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Foreign Currency</div>
        </div>
        <div class=" border border-b-gray-500 bg-gray-200 rounded-xl mt-10 m-4">
            <img class="feature p-2"  alt="Billing Software that works with/without internet" src="../../../../images/online-offline.webp">
            <div class="border-gray-400 bg-white p-2 font-bold font-serif">Online &amp; Offline Billing</div>
        </div>
    </div>

</div>

<div class="w-full mt-4 md:w-full md:mt-20 mx-auto">
    <h2 class="text-5xl font-extrabold font-serif text-center">
        Experience Effortless GST Compliance
    </h2>
    <h2 class="text-5xl font-extrabold font-serif text-center mt-3">
        with Invoicing Software
    </h2>
    <!-- Tab Buttons -->
    <div class="ml-2 flex md:w-full grid grid-cols-2 md:grid-cols-2 mt-8">
    <div class="bg-gray-100 w-52 p-2 mt-3 rounded-t-lg  grid-rows-4 md:w-1/2 md:ml-60 md:grid-cols-1">
        <div class="flex md:w-72 space-x-4 grid grid-rows-4 gap-5 mt-3 ">
            <button class="px-4 py-4 grid-rows-1 ml-2 rounded-xl text-gray-900 font-semibold border-b-4 bg-white hover:bg-purple-200 card-button" onclick="showCard('card1')">
                <div class="flex">
                    <img alt="GSTR Filing" src="../../../../images/gstr-filing.svg">
                    <h3 class="text-2xl ml-3">GST Filing</h3>
                </div>

            </button>
            <button class="px-4 py-4 grid-rows-2 rounded-xl text-gray-900 font-semibold border-b-4 b hover:bg-purple-200 bg-white card-button" onclick="showCard('card2')">
                <div class="flex">
                    <img alt="E-Invoicing" src="../../../../images/e-invoicing.svg">
                    <h3 class="text-2xl ml-3">E-Invoicing</h3>
                </div>
            </button>
            <button class="px-4 py-4 grid-rows-3 rounded-xl text-gray-900 font-semibold border-b-4 bg-white hover:bg-purple-200 card-button" onclick="showCard('card3')">
                <div class="flex">
                    <img alt="E-way Billing" src="../../../../images/e-way-billing.svg">
                    <h3 class="text-2xl ml-3">E-way Billing</h3>
                </div>
            </button>
            <button class="px-4 py-4 grid-rows-4 rounded-xl text-gray-900 font-semibold border-b-4 bg-white hover:bg-purple-200 card-button" onclick="showCard('card4')">
                <div class="flex">
                    <img alt="Easily Export Billing Data to Tally" src="../../../../images/data-export.svg">
                    <h3 class="text-2xl ml-2">Data Export to Tally</h3>
                </div>
            </button>
        </div>
    </div>

    <!-- Tab Content -->
        <div class="grid-cols-2 mt-3 md:mt-2 md:mr-64 rounded-xl">
            <div id="card1" class="card-content active border border-gray-300 rounded-xl bg-[#EFF1F3] shadow-2xl shadow-blue-900 md:mx-auto md:justify-items-center">
            <img alt="Easy GST Return Filing" class="gst-imgage  rounded-t-lg justify-items-center mx-auto p-12 pl-6" src="../../../../images/gst-filing.webp">
            <div class="gst-feature-description-text grid-cols-2 bg-white text-black md:pt-10 md:pb-4 rounded-b-lg text-center text-2xl justify-items-center font-medium p-2 font-sans ">
                Export your GSTR1 data in a simple format (JSON) and easily file your GST returns.
                Also, get GSTR-2 and GSTR-3B reports that would help you/your CAs in easy GST tax filing.
            </div>
                <button type="submit" wire:click.prevent="save" class="ml-10 p-2 mb-2">
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
                        <span class="relative">Get Started Now </span>
                    </div>
                </button>
            </div>

        <div id="card2" class="card-content hidden bg-[#EFF1F3] border  border-gray-300 rounded-xl ">
            <img alt="Easy GST Return Filing" class="gst-imgage border  border-gray-400 rounded-t-lg pb-3" src="../../../../images/e-invoicing.webp">
            <div class="gst-feature-description-text grid-cols-2 bg-white text-black pt-10 pb-4 rounded-b-lg text-center text-2xl font-medium justify-items-center p-2 font-sans">
                Effortlessly generate e-Invoices in a single click, with automatic GSTR1 reconciliation, and conveniently cancel e-Invoices directly through e-invoicing software.
            </div>
            <button type="submit" wire:click.prevent="save" class="mt-5 ml-10 p-2 mb-2">
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
                    <span class="relative">Get Started Now </span>
                </div>
            </button>
        </div>
        <div id="card3" class="card-content hidden border border-gray-300 bg-[#EFF1F3] rounded-xl">
            <img alt="Easy GST Return Filing" class="gst-imgage border border-gray-400 rounded-t-lg p-10 " src="../../../../images/e-way-billing.jpg">
            <div class="gst-feature-description-text grid-cols-2 bg-white text-black pt-10 pb-4 rounded-b-lg text-center text-2xl font-medium justify-items-center p-2 font-sans">
                Easily generate and download e-way bills in less than 30 seconds. 25+ smart error validations for error-free e-way billing. Generate e-invoices and e-way bills simultaneously.
            </div>
            <button type="submit" wire:click.prevent="save" class="mt-5 ml-10 p-2 mb-2">
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
                    <span class="relative">Get Started Now </span>
                </div>
            </button>
        </div>
        <div id="card4" class="card-content hidden border border-gray-300 rounded-xl">
            <img data-src="/static-assets/images/landing-page-v2/gst-filing.webp" alt="Easy GST Return Filing" class="gst-imgage border border-gray-400 rounded-t-lg" src="../../../../images/data-export.webp">
            <div class="gst-feature-description-text grid-cols-2 bg-white text-black pt-10 pb-4 rounded-b-lg text-center text-2xl font-medium justify-items-center p-2 font-sans">
                Export your business data to Tally with our free billing software. No more manual entries for your CA. Save your time, ensure accuracy and streamline your accounting process.
            </div>
            <button type="submit" wire:click.prevent="save" class="mt-5 ml-10 p-2 mb-2">
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
                    <span class="relative">Get Started Now </span>
                </div>
            </button>
        </div>
    </div>
        <div class="mt-10">

        </div>
</div>


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
