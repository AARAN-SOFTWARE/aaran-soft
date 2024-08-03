<div class="w-full mx-auto">

    <!--script -------------------------------------------------------------------------------------------------------->

    <script src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.js"></script>

    <div class="relative">

        <div x-data="{
        currentSlide: 0,
        skip: 1,
        atBeginning: false,
        atEnd: false,
        autoSlideInterval: null,
        progress: 0,
        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
             this.progress < 100 ? this.progress += 25 : this.progress=0;
                this.next();
            }, 2500);
        },

        stopAutoSlide() {
            clearInterval(this.autoSlideInterval);
        },
        goToSlide(index) {
            let slider = this.$refs.slider;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            slider.scrollTo({ left: offset * index, behavior: 'smooth' });
        },
        next() {
            let slider = this.$refs.slider;
            let current = slider.scrollLeft;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            let maxScroll = offset * (slider.children.length - 1);

            current + offset >= maxScroll ? slider.scrollTo({ left: 0, behavior: 'smooth' }) : slider.scrollBy({ left: offset * this.skip, behavior: 'smooth' });
        },
        prev() {
            let slider = this.$refs.slider;
            let current = slider.scrollLeft;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            let maxScroll = offset * (slider.children.length - 1);

            current <= 0 ? slider.scrollTo({ left: maxScroll, behavior: 'smooth' }) : slider.scrollBy({ left: -offset * this.skip, behavior: 'smooth' });
        },
        updateButtonStates() {
            let slideEls = this.$el.parentElement.children;
            this.atBeginning = slideEls[0] === this.$el;
            this.atEnd = slideEls[slideEls.length-1] === this.$el;
        },
        focusableWhenVisible: {
            'x-intersect:enter'() { this.$el.removeAttribute('tabindex'); },
            'x-intersect:leave'() { this.$el.setAttribute('tabindex', '-1'); }
        },
        disableNextAndPreviousButtons: {
            'x-intersect:enter.threshold.05'() { this.updateButtonStates(); },
            'x-intersect:leave.threshold.05'() { this.updateButtonStates(); }
        },
        updateCurrentSlide() {
            let slider = this.$refs.slider;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            this.currentSlide = Math.round(slider.scrollLeft / offset);
        }
    }" x-init="startAutoSlide()"
{{--             @mouseover="stopAutoSlide()" --}}
{{--             @mouseout="startAutoSlide()" --}}
             class="flex flex-col w-full">

{{--            <div class="bg-gray-200 rounded-full h-2 w-full mt-4">--}}
{{--                <div class="bg-blue-500 text-xs leading-none py-1 text-center rounded-full h-2"--}}
{{--                     :style="`width: ${progress}%`">&nbsp;--}}
{{--                </div>--}}
{{--            </div>--}}

            <div x-on:keydown.right="next" x-on:keydown.left="prev" tabindex="0" role="region"
                 aria-labelledby="carousel-label" class="flex space-x-6">
                <h2 id="carousel-label" class="sr-only" hidden>Carousel</h2>

                <span id="carousel-content-label" class="sr-only" hidden>Carousel</span>

                <!--image animation ----------------------------------------------------------------------------------->
                <ul x-ref="slider" @scroll="updateCurrentSlide" tabindex="0" role="listbox"
                    aria-labelledby="carousel-content-label"
                    class="mt-2 flex w-full overflow-x-hidden snap-x snap-mandatory opacity-95">


                    <li x-bind="disableNextAndPreviousButtons"
                        class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start" role="option">
                        <img class="w-full h-[50rem] " src="/../../../images/software2.jpg" alt="placeholder image">
                        <div>asdfsdfsdfsfsfsdfs</div>
                    </li>

                    <li x-bind="disableNextAndPreviousButtons"
                        class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start" role="option">
                        <img class="w-full h-[50rem]" src="/../../../images/software1.jpg" alt="placeholder image">
                    </li>

                    <li x-bind="disableNextAndPreviousButtons"
                        class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start" role="option">
                        <img class="w-full h-[50rem]" src="/../../../images/billing-system-software.jpg"
                             alt="placeholder image">
                    </li>

                    <li x-bind="disableNextAndPreviousButtons"
                        class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start" role="option">
                        <img class="w-full h-[50rem]" src="/../../../images/software2.jpg" alt="placeholder image">
                    </li>

                    <li x-bind="disableNextAndPreviousButtons"
                        class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start" role="option">
                        <img class="w-full h-[50rem]" src="/../../../images/software1.jpg" alt="placeholder image">
                    </li>

                    <li x-bind="disableNextAndPreviousButtons"
                        class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start" role="option">
                        <img class="w-full h-[50rem]" src="/../../../images/software2.jpg" alt="placeholder image">
                        {{--                        <button x-bind="focusableWhenVisible" class="px-4 py-2 text-sm" x-text="currentSlide+1">index</button>--}}
                    </li>

                </ul>
            </div>

            <!-- Prev / Next Buttons ---------------------------------------------------------------------------------->

            <div class="absolute z-10 flex justify-between w-full h-full px-4">

                <!-- Prev Button -------------------------------------------------------------------------------------->
                <button x-on:click="prev" class="text-6xl" :aria-disabled="atBeginning" :tabindex="atEnd ? -1 : 0">

                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-5 text-gray-300 lg:h-8 hover:text-gray-400"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </span>
                    <span class="sr-only">Skip to previous slide page</span>
                </button>


                <!-- Next Button -------------------------------------------------------------------------------------->

                <button x-on:click="next" class="text-6xl" :aria-disabled="atEnd" :tabindex="atEnd ? -1 : 0">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-5 text-gray-300 lg:h-8 hover:text-gray-400"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
                    <span class="sr-only">Skip to next slide page</span>
                </button>
            </div>

            <!-- Indicators ------------------------------------------------------------------------------------------->

            <div class="absolute z-10 w-full bottom-10 lg:bottom-12">
                <div class="flex justify-center space-x-2">
                    <template x-for="(slide, index) in Array.from($refs.slider.children)" :key="index">
                        <button @click="goToSlide(index)"
                                :class="{'bg-gray-500': currentSlide === index, 'bg-bubble': currentSlide !== index}"
                                class="w-3 h-1 rounded-full lg:w-3 lg:h-3 hover:bg-gray-400 focus:outline-none focus:bg-gray-400"></button>
                    </template>
                </div>
            </div>

        </div>
    </div>
</div>
