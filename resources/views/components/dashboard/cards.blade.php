@props([
'transaction' => [],
])

<div class="w-full p-2 mt-5">
    <div class="flex flex-row gap-4 w-full">

        <div
            class="w-full flex flex-col bg-white border border-t-2 border-t-blue-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-blue-500 dark:shadow-neutral-700/70">

            <div class="p-4 md:p-5">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white w-full flex justify-between">
                    Sales
                    <x-icons.icon :icon="'performance'" class="h-10 text-blue-500  w-auto block"/>
                </h3>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    Total Turnover : {{$transaction['total_sales']}}
                </p>

                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    This month : {{$transaction['month_sales']}}
                </p>


                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400"
                   href="#">
                    Know More
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </div>

        </div>

        <div
            class="w-full flex flex-col bg-white border border-t-2 border-t-amber-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-blue-500 dark:shadow-neutral-700/70">
            <div class="p-4 md:p-5">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white w-full flex justify-between">
                    Purchase
                    <x-icons.icon :icon="'job-responsibility-bag-hand'" class="h-10 text-amber-500  w-auto block"/>
                </h3>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    Total Purchase : {{$transaction['total_purchase']}}
                </p>

                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    This month : {{$transaction['month_purchase']}}
                </p>
                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400"
                   href="#">
                    Know More
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div
            class="w-full flex flex-col bg-white border border-t-2 border-t-green-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-blue-500 dark:shadow-neutral-700/70">
            <div class="p-4 md:p-5">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white w-full flex justify-between">
                    Receivable
                    <x-icons.icon :icon="'performance-tablet-increase'" class="h-10 text-green-500  w-auto block"/>
                </h3>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    Total Receipts : {{$transaction['total_receivable']}}
                </p>

                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    This month : {{$transaction['month_receivable']}}
                </p>
                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400"
                   href="#">
                    Know More
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div
            class="w-full flex flex-col bg-white border border-t-2 border-t-purple-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-blue-500 dark:shadow-neutral-700/70">
            <div class="p-4 md:p-5">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white w-full flex justify-between">
                    Payable
                    <x-icons.icon :icon="'business-contract-give'" class="h-10 text-purple-500  w-auto block"/>
                </h3>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    Total Payments : {{$transaction['total_payable']}}
                </p>

                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    This month : {{$transaction['month_payable']}}
                </p>
                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400"
                   href="#">
                    Know More
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</div>
