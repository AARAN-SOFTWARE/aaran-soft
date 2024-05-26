<div>
    <section href="{{ route('service') }}">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <div class="w-full bg-gray-100">
            <div id="services" class="container  mx-auto xl:flex  md:flex-row  sm:flex-row sm:gap-3 pt-4 pb-1.5  text-center bg-gray-100">
                <div class=" justify-items-center grid md:grid-cols-3 p-3 gap-3 w-full mx-auto">

                    <div class="mb-3.5 lg:grid-cols-1 w-72 h-80 shadow-2xl grid-rows-1 gap-4 border rounded-2xl bg-white  animate__animated wow animate__fadeInLeftBig ">
                        <div class="mb-5">
                            <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-1.svg" alt="alternative" />
                        </div>
                        <div class="card-body mx-auto">
                            <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Platform Integration</h5>
                            <p class="mb-5 font-medium">Your sales force can use the app on any smartphone platform without compatibility issues</p>
                        </div>
                    </div>

                    <div class="mb-3.5 w-72 h-80 shadow-2xl grid-rows-2 border lg:grid-cols-2 rounded-2xl bg-white  animate__animated wow animate__fadeInDownBig" >
                        <div class="mb-1.5">
                            <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-2.svg" alt="alternative" />
                        </div>
                        <div class="card-body mx-auto">
                            <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Easy On Resources</h5>
                            <p class="mb-5 font-medium">Works smoothly even on older generation hardware due to our optimization efforts</p>
                        </div>
                    </div>

                    <div class="mb-3.5 w-72 h-80 border shadow-2xl grid-rows-3 lg:grid-cols-3 rounded-2xl bg-white  animate__animated wow animate__fadeInRightBig">
                        <div class=" mb-1.5">
                            <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-3.svg" alt="alternative" />
                        </div>
                        <div class="card-body mx-auto">
                            <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Great Performance</h5>
                            <p class="mb-4 font-medium">Optimized code and innovative technology insure no delays and ultra-fast responsiveness</p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="mb-3.5 border w-72 h-80 shadow-2xl grid-rows-4 rounded-2xl lg:grid-cols-4 bg-white  animate__animated wow animate__fadeInBottomLeft">
                        <div class=" mb-1.5">
                            <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-4.svg" alt="alternative" />
                        </div>
                        <div class="card-body mx-auto">
                            <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Multiple Languages</h5>
                            <p class="mb-4 font-medium">Choose from one of the 40 languages that come pre-installed and start selling smarter</p>
                        </div>
                    </div>
                    <div class="mb-3.5 border w-72 h-80 shadow-2xl grid-rows-5 rounded-2xl lg:grid-cols-5 bg-white  animate__animated wow animate__fadeInUpBig">
                        <div class=" mb-1.5">
                            <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-5.svg" alt="alternative" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Free Updates</h5>
                            <p class="mb-4 font-medium">Don't worry about future costs, pay once and receive all future updates at no extra cost</p>
                        </div>
                    </div>

                    <div class="mb-3.5 border w-72 h-80 shadow-2xl grid-rows-6 lg:grid-cols-6 rounded-2xl bg-white  animate__animated wow animate__backInUp">
                        <div class="mb-1.5">
                            <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-6.svg" alt="alternative" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Community Support</h5>
                            <p class="mb-4 font-medium">Register the app and get acces to knowledge and ideas from the Pavo online community</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<---pricing--->--}}
        <div id="pricing" class="cards-2 relative pt-8 text-center mx-auto bg-white">
            <div class="absolute bottom-0.5 h-40 w-full"></div>
            {{--        <div class="">--}}
            <h2 class="mb-2.5 font-semibold grid-rows-1 lg:max-w-xl p-3 lg:mx-auto text-2xl">Pricing options for all budgets</h2>
            <p class="mb-16 lg:max-w-3xl grid-rows-2 p-3 lg:mx-auto text-2xl"> Our pricing plans are set up in such a way that any user can start enjoying Pavo without worrying so much about costs. They are flexible and work for any type of industry </p>

            {{--           <---items--->--}}
            <div class="container md:grid-cols-3 flex px-4 pb-px p-5 mx-auto gap-3.5">
                <div class="card relative block rounded  w-80 h-auto md:grid-cols-4 gap-3 flex-col mr-auto mb-6 ml-auto mx-auto shadow-md">
                    <div class="card-body p-8 bg-gray-50 animate__animated wow animate__zoomIn">
                        <div class="card-title mb-1.5 text-blue-500 font-bold text-center">STANDARD</div>
                        <div class="price flex justify-center"><span class="currency font-light"><x-icons.icon :icon="'rupee'" class="text-gray-900 w-5 h-5 text-center block"/></span>
                            <span class="value text-gray-700 font-bold h-7 text-center ">2499</span></div>
                        <div class="frequency mb-1.5 font-semibold text-center">monthly</div>
                        <p class="mb-1.5 text-left">This basic package covers the marketing needs of small startups</p>
                        <ul class="list mb-7 space-y-2 text-left">
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="blue-900" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                                <div>List building and relations</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Seamless platform integration</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Great performance on devices</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Community support and videos</div>
                            </li>
                        </ul>
                        <div class="button-wrapper absolute pb-1.5 text-center ml-16">
                            <a class="border rounded-2xl p-2 flex gap-1.5 bg-cyan-200  text-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M9.674 2.075a.75.75 0 0 1 .652 0l7.25 3.5A.75.75 0 0 1 17 6.957V16.5h.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H3V6.957a.75.75 0 0 1-.576-1.382l7.25-3.5ZM11 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7.5 9.75a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Z" clip-rule="evenodd" />
                                </svg>
                                Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="card relative block w-80 h-auto md:grid-cols-5 gap-3 mr-auto mx-auto mb-6 ml-auto border rounded shadow-md">
                    <div class="card-body p-8 bg-gray-50 animate__animated wow animate__zoomIn">
                        <div class="card-title mb-1.5 text-blue-500 font-bold text-center">ADVANCED</div>
                        <div class="price flex justify-center"><span class="currency font-light"><x-icons.icon :icon="'rupee'" class="text-gray-900 w-5 h-5 text-center block"/></span>
                            <span class="value text-gray-700 font-bold h-7 text-center ">4499</span></div>
                        <div class="frequency mb-1.5 font-semibold text-center">monthly</div>
                        <p class="mb-1.5 text-left">This is a more advanced package suited for medium companies</p>
                        <ul class="list mb-7 space-y-2 text-left">
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>List building and relations</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Seamless platform integration</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Great performance on devices</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Community support and videos</div>
                            </li>
                        </ul>
                        <div class="button-wrapper absolute pb-1.5 justify-items-center mx-auto ml-16 ">
                            <a class="border rounded-2xl p-2 bg-cyan-200 gap-1.5 flex  text-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M9.674 2.075a.75.75 0 0 1 .652 0l7.25 3.5A.75.75 0 0 1 17 6.957V16.5h.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H3V6.957a.75.75 0 0 1-.576-1.382l7.25-3.5ZM11 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7.5 9.75a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Z" clip-rule="evenodd" />
                                </svg>Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class=" relative block   w-80 h-auto mr-auto grid-cols-6 gap-3 mb-6 ml-auto mx-auto border rounded shadow-md">
                    <div id="progress" class="card-body p-8 bg-gray-50 animate__animated wow animate__zoomIn">
                        <div class="card-title mb-1.5 text-blue-500 font-bold text-center">PREMIUM</div>
                        <div class="price flex justify-center"><span class="currency font-light"><x-icons.icon :icon="'rupee'" class="text-gray-900 w-5 h-5 text-center block"/></span>
                            <span class="value text-gray-700 font-bold h-7 text-center ">6499</span></div>                        <div class="frequency mb-1.5 font-semibold text-center">monthly</div>
                        <p class="mb-3 text-left">This is a comprehensive package designed for big organizations</p>
                        <ul class="list mb-7 text-left space-y-2">
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>List building and relations</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Seamless platform integration</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                                <div>Great performance on devices</div>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                                <div>Community support and videos</div>
                            </li>
                        </ul>
                        <div class="button-wrapper absolute pb-1.5 text-center ml-16">
                            <a class="border rounded-2xl p-2 gap-1.5 flex bg-cyan-200" href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M9.674 2.075a.75.75 0 0 1 .652 0l7.25 3.5A.75.75 0 0 1 17 6.957V16.5h.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H3V6.957a.75.75 0 0 1-.576-1.382l7.25-3.5ZM11 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7.5 9.75a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Z" clip-rule="evenodd" />
                                </svg>
                                Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">
</script>

<script>
    new WOW().init();
</script>
</div>

