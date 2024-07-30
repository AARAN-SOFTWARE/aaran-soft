@props([
    "list"=>null,
])
<div class=" h-44 bg-gradient-to-br from-[#19398A] to-orange-500  rounded-lg relative">

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
            }, 3000);
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
                @foreach($list as $row)
                    <li x-bind="disableNextAndPreviousButtons"
                        class="flex flex-col items-center justify-center w-full p-0 shrink-0 snap-start"
                        role="option">
                            <div class="flex">
                                <div class="h-44">
                                    <a href="{{route('feed',['category_id'=>$row->feed_category_id,'tag_id'=>$row->tag_id])}}">
                                    <img class="h-full w-64 rounded-l-lg"
                                         src="{{URL( \Illuminate\Support\Facades\Storage::url($row->image) )}}"
                                         alt="img"/>
                                    </a>
                                </div>
                                <div
                                    class="w-full h-44 flex-col flex justify-center items-center text-white text-sm p-5 rounded-r-lg">
                                    <div
                                        class="font-bold font-gab text-xl tracking-wider bg-gradient-to-r from-white via-yellow-500 to-cyan-500 inline-block text-transparent bg-clip-text">
                                        Blogs
                                    </div>
                                    <div
                                        class="text-md text-center font-semibold"><a href="{{route('feed',['category_id'=>$row->feed_category_id,'tag_id'=>$row->tag_id])}}">{{\Illuminate\Support\Str::words($row->vname, 6)}}</a></div>
                                    <div
                                        class="text-justify md:text-sm text-xs text-gray-200"><a href="{{route('feed',['category_id'=>$row->feed_category_id,'tag_id'=>$row->tag_id])}}">{!! \Illuminate\Support\Str::words( $row->description ,15) !!}</a></div>
                                </div>
                            </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Indicators ------------------------------------------------------------------------------------------->

        <div class="absolute bottom-4 md:right-[180px] right-[150px]">
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


