<!--red #FF321E -->
<!--yellow #F7C028 -->
<!--blue #3DC1F0 -->

<div class="sm:h-screen flex flex-col sm:flex-row justify-between items-center sm:p-5 p-3">

    <x-storyset.programer/>

    <div
        class="w-full animate__animated wow animate__fadeInDown sm:p-5 p-3 font-roboto tracking-wider">

        <div class="relative inline-block">
            <span class=" text-3xl sm:text-6xl font-bold font-asul animate__animated wow animate__fadeOut">
                CODEXSUN
            </span>
            <span
                class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-red-500 via-orange-400 to-yellow-600 rounded-full animate__animated wow animate__fadeIn whitespace-nowrap infinite linear"
                data-wow-duration="3s"></span>
        </div>

        <h1 class="text-zinc-400 pt-5 text-lg font-semibold">Software make simple</h1>

        <h1 class="py-2 font-semibold  text-2xl sm:text-4xl text-zinc-500">Manage your business like never
            before</h1>

        <p class="py-2 text-zinc-500 text-balance max-w-5xl leading-7">
            The perfect key for unlocking business growth is Infusing Intelligence to your business.
            Start getting complete business solution package with end-to-end management.</p>

        <a
            href="{{ route('demo-requests.upsert') }}"
            class="animate-pulse focus:animate-none hover:animate-none inline-flex sm:text-2xl text-xl bg-[#3DC1F0] sm:px-4 sm:py-2 mt-3 px-2 py-1 rounded-lg cursor-pointer
                    tracking-wide text-white  font-bold">
            <span class="px-5"> Book for demo</span>
            <x-icons.elements :icon="'notebook'" class="w-10 h-auto block"/>
        </a>

    </div>
</div>
<div class="sm:w-3/4 w-full mx-auto sm:my-16 my-12 h-screen sm:px-0 px-3">
    <h2 class=" w-7/12 md:text-4xl text-2xl font-asul font-semibold tracking-wide leading-[1.4] sm:py-9 ">
        All-in-one billing software to help grow your business
    </h2>
    <!-- Tab Buttons -->
    {{--    <div class="text-center text-gray-500 bg-gray-100 rounded-xl p-3">--}}
    <div class="grid grid-cols-4 sm:gap-12 gap-2 sm:text-lg text-xs font-semibold my-9">
        <button
            class="py-4 rounded-xl bg-white text-[#3DC1F0] hover:text-[#F7C028] duration-300 focus:outline-none shadow-md shadow-gray-300 tab-button"
            onclick="showTab('tab1')">Billing Management
        </button>
        <button
            class="py-4 rounded-xl bg-white text-[#3DC1F0] hover:text-[#F7C028] duration-300 focus:outline-none shadow-md shadow-gray-300 tab-button"
            onclick="showTab('tab2')">Inventory Management
        </button>
        <button
            class="py-4 rounded-xl bg-white text-[#3DC1F0] hover:text-[#F7C028] duration-300 focus:outline-none shadow-md shadow-gray-300 tab-button"
            onclick="showTab('tab3')">Business Management
        </button>
        <button
            class="py-4 rounded-xl bg-white text-[#3DC1F0] hover:text-[#F7C028] duration-300 focus:outline-none shadow-md shadow-gray-300 tab-button"
            onclick="showTab('tab4')">Bonus Features
        </button>
    </div>
    {{--    </div>--}}

    <!-- Tab Content -->
    <div id="tab1"
         class="tab-content grid sm:grid-cols-3 grid-cols-2 sm:gap-9 gap-2 font-roboto tracking-wider sm:text-lg text-xs text-center font-semibold">
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Automatic GST Bill Sharing on Whatsapp/SMS"
                 src="../../../../images/automatic-invoice.webp">
            <div class="drop-shadow-2xl">Automatic invoice sharing on SMS &amp; Whatsapp</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl"
                 alt="Sales &amp; Purchase Invoices, Expense Tracking" src="../../../../images/sales-purchase.webp">
            <div class="drop-shadow-2xl">Sales Purchase and Expenses</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl"
                 alt="Create Quotations/Estimates &amp; Proforma Invoices"
                 src="../../../../images/quotation-proforma.webp">
            <div class="drop-shadow-2xl">Quotations Estimates &amp; Proforma Invoices</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Track Invoice Edit History"
                 src="../../../../images/audit.webp">
            <div class="drop-shadow-2xl">Audit Trail</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="POS Billing Software Free"
                 src="../../../../images/Receipt-amico.svg">
            <div class="drop-shadow-2xl">POS Billing</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Create Delivery Challan"
                 src="../../../../images/delivery-challan.webp">
            <div class="drop-shadow-2xl">Delivery Challan</div>
        </div>
    </div>
    <div id="tab2"
         class="tab-content grid sm:grid-cols-3 grid-cols-2 sm:gap-9 gap-2 font-roboto tracking-wider text-lg text-center font-semibold">
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Inventory Management Software"
                 src="../../../../images/manage-stocks.webp">
            <div class="drop-shadow-2xl">Manage Stock Items</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Godown Management Billing Software"
                 src="../../../../images/godown.webp">
            <div class="">Godown Management</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gra-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Product Batching Feature"
                 src="../../../../images/batching.webp">
            <div class="">Batching</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Add Serial Number for easy product tracking"
                 src="../../../../images/serialisation.webp">
            <div class="drop-shadow-2xl">Serialisation</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Create and Print Barcodes"
                 src="../../../../images/barcodes.webp">
            <div class="drop-shadow-2xl">Generate and Print Barcodes</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl"
                 alt="Add custom fields for easy inventory management" src="../../../../images/custom-fields.webp">
            <div class="drop-shadow-2xl">Inventory Custom Fields</div>
        </div>
    </div>
    <div id="tab3"
         class="tab-content grid sm:grid-cols-3 grid-cols-2 sm:gap-9 gap-2 font-roboto tracking-wider text-lg text-center font-semibold">
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Access myBillBook on multiple devices"
                 src="../../../../images/Sign up-1.png">
            <div class="drop-shadow-2xl">Multiple Device Login</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl"
                 alt="Manage Multiple Businesses with one Invoicing Software"
                 src="../../../../images/multiple-business.webp">
            <div class="drop-shadow-2xl">Multiple Businesses</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Provide access to multiple users"
                 src="../../../../images/multiple-users.webp">
            <div class="drop-shadow-2xl">Multiple Users</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Create different user roles"
                 src="../../../../images/user-role.webp">
            <div class="drop-shadow-2xl">User Role Settings</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Staff Attendance and Payroll Management"
                 src="../../../../images/staff-attendance.webp">
            <div class="drop-shadow-2xl">Staff Attendance and Payroll</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl"
                 alt="Billing Software that Generates Business Reports for free"
                 src="../../../../images/business-reports.webp">
            <div class="drop-shadow-2xl">Business Reports</div>
        </div>
    </div>
    <div id="tab4"
         class="tab-content grid sm:grid-cols-3 grid-cols-2 sm:gap-9 gap-2 font-roboto tracking-wider text-lg text-center font-semibold">
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Multiple Bank Account Management"
                 src="../../../../images/multiple-bank-accounts.webp">
            <div class="drop-shadow-2xl">Multiple Bank Account</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl"
                 alt="Recover Deleted Invoices for better Invoice Management"
                 src="../../../../images/recover-deleted-invoices.webp">
            <div class="drop-shadow-2xl">Recover Deleted Invoices</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Bulk Upload/ Edit Invoices"
                 src="../../../../images/bulk-upload.webp">
            <div class="drop-shadow-2xl">Bulk Upload/ Edit</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Automated Billing for recurring invoices"
                 src="../../../../images/automated-billing.webp">
            <div class="drop-shadow-2xl">Automated Billing</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-gray-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl" alt="Create Invoices in Foreign Currency"
                 src="../../../../images/foreign-currency.webp">
            <div class="drop-shadow-2xl">Foreign Currency</div>
        </div>
        <div
            class="flex-col flex justify-evenly items-center bg-slate-100 hover:bg-[#F7C028] hover:text-white sm:gap-y-6 gap-y-2 p-5 rounded-xl hover:shadow-lg hover:shadow-gray-400 duration-500 ">
            <img class="feature w-auto sm:h-48 h-20 drop-shadow-xl"
                 alt="Billing Software that works with/without internet" src="../../../../images/online-offline.webp">
            <div class="drop-shadow-2xl">Online &amp; Offline Billing</div>
        </div>
    </div>
</div>

<div class="w-3/4 mx-auto py-24">
    <h2 class=" w-9/12 md:text-4xl text-2xl font-asul font-semibold tracking-wide leading-[1.4] sm:py-9 ">
        Experience Effortless GST Compliance
        with Invoicing Software
    </h2>
    <!-- Tab Buttons -->
    <div class="flex gap-6 border border-gray-300 p-5 rounded-xl">
        <div class="w-4/12 grid gap-y-6 text-md font-semibold font-roboto tracking-wider">
            <div>
                <button
                    class="card-button active w-52 py-4 flex items-center gap-2 justify-center shadow-md shadow-gray-400 rounded-xl"
                    onclick="showCard('card1')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>
                    <div class="">GST Filing</div>
                </button>
            </div>
            <div>
                <button
                    class="card-button w-52 py-4 flex items-center gap-2 justify-center shadow-md shadow-gray-400 rounded-xl text-[#F7C028]"
                    onclick="showCard('card2')">
                    {{--                        <img alt="E-Invoicing" src="../../../../images/e-invoicing.svg">--}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5"/>
                    </svg>
                    <div class="">E-Invoicing</div>
                </button>
            </div>
            <div>
                <button
                    class="card-button  w-52 py-4 flex items-center gap-2 justify-center shadow-md shadow-gray-400 rounded-xl text-[#F7C028]"
                    onclick="showCard('card3')">
                    {{--                        <img alt="E-way Billing" src="../../../../images/e-way-billing.svg">--}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                    </svg>
                    <div class="">E-way Billing</div>
                </button>
            </div>
            <div>
                <button
                    class="card-button  w-52 py-4 flex items-center gap-2 justify-center shadow-md shadow-gray-400 rounded-xl text-[#F7C028]"
                    onclick="showCard('card4')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>
                    <div class="">Data Export to Tally</div>
                </button>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="bg-slate-100 hover:bg-[#3DC1F0] hover:text-white duration-300 rounded-xl hover:shadow-md hover:shadow-gray-400 font-roboto tracking-wider font-semibold">
            <div id="card1" class="h-96 card-content active flex-col flex justify-evenly items-center">
                <div class="flex gap-3 px-5">
                    <img alt="Easy GST Return Filing" class="w-1/2 h-56 rounded-xl" src="../../../../images/gst-filing.webp">
                    <div class="gst-feature-description-text w-1/2 flex-col flex justify-center items-center">
                        Export your GSTR1 data in a simple format (JSON) and easily file your GST returns.
                        Also, get GSTR-2 and GSTR-3B reports that would help you/your CAs in easy GST tax filing.
                    </div>
                </div>
                <button>
                    <a href="#"
                       class="relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                        <span
                            class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                        <span
                            class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                        <span class="relative">Get Started Now</span>
                    </a>
                </button>
            </div>

            <div id="card2" class="card-content hidden ">
                <img alt="Easy GST Return Filing" class="gst-imgage "
                     src="../../../../images/e-invoicing.webp">
                <div
                    class="gst-feature-description-text">
                    Effortlessly generate e-Invoices in a single click, with automatic GSTR1 reconciliation, and
                    conveniently cancel e-Invoices directly through e-invoicing software.
                </div>
                <button>
                    <a href="#"
                       class="relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                        <span
                            class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                        <span
                            class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                        <span class="relative">Get Started Now</span>
                    </a>
                </button>
            </div>
            <div id="card3" class="card-content hidden ">
                <img alt="Easy GST Return Filing" class="gst-imgage "
                     src="../../../../images/e-way-billing.jpg">
                <div
                    class="gst-feature-description-text ">
                    Easily generate and download e-way bills in less than 30 seconds. 25+ smart error validations for
                    error-free e-way billing. Generate e-invoices and e-way bills simultaneously.
                </div>
                <button>
                    <a href="#"
                       class="relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                        <span
                            class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                        <span
                            class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                        <span class="relative">Get Started Now</span>
                    </a>
                </button>
            </div>
            <div id="card4" class="card-content hidden">
                <img data-src="/static-assets/images/landing-page-v2/gst-filing.webp" alt="Easy GST Return Filing"
                     class="gst-imgage " src="../../../../images/data-export.webp">
                <div
                    class="gst-feature-description-text">
                    Export your business data to Tally with our free billing software. No more manual entries for your
                    CA. Save your time, ensure accuracy and streamline your accounting process.
                </div>
                <button>
                    <a href="#"
                       class="relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                        <span
                            class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                        <span
                            class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                        <span class="relative">Get Started Now</span>
                    </a>
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
            background-color: #F7C028;
            border-color: #4299e1;
            color: white;
        }
    </style>
    <style>
        .card-button.active {
            background-color: #3DC1F0;
            border-color: #4299e1;
            color: white;
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
