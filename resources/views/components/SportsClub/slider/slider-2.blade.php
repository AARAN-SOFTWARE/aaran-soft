@props([
    "list"
])
<div class="w-5/12 h-44 bg-orange-500 rounded-lg relative">

    <div x-data="{
        currentSlide: 0,
        skip: 1,
        atBeginning: false,
        atEnd: false,
        autoSlideInterval: null,
        progress: 0,

        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
                this.next();
            }, 2000);
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
            let maxScroll = offset * (slider.children.length );

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
    }"
         x-init="startAutoSlide()" @mouseover="stopAutoSlide()" @mouseout="startAutoSlide()"
         class="flex flex-col w-full">


        <div x-on:keydown.right="next" x-on:keydown.left="prev" tabindex="0" role="region"
             aria-labelledby="carousel-label" class="flex space-x-6">
            <h2 id="carousel-label" class="sr-only" hidden>Carousel</h2>

            <span id="carousel-content-label" class="sr-only" hidden>Carousel</span>

            <!--image animation ----------------------------------------------------------------------------------->


            <ul x-ref="slider" @scroll="updateCurrentSlide" tabindex="0" role="listbox"
                aria-labelledby="carousel-content-label"
                class="flex w-full overflow-x-hidden snap-x snap-mandatory opacity-95">

                <li x-bind="disableNextAndPreviousButtons"
                    class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start"
                    role="option">
                    <div class="w-full h-44 flex-col flex justify-center items-center">
                        <div>Tournament</div>
                        <div>240</div>
                    </div>
                </li>
                <li x-bind="disableNextAndPreviousButtons"
                    class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start"
                    role="option">
                    <div class="w-full h-44 flex-col flex justify-center items-center">
                        <div>Tournament</div>
                        <div>280</div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Indicators ------------------------------------------------------------------------------------------->

        <div class="absolute bottom-4 right-[258px]">
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
@error('')  @enderror


