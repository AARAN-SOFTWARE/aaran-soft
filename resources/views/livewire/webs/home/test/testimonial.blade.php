<div>

    <div class="min-h-screen p-16 bg-gray-100 flex items-center justify-center">


        <section
            :aria-labelledby="title.toLowerCase().replace(' ', '-')"
            class="flex flex-col items-center justify-center w-full max-w-lg"
            @keydown.arrow-right="state.usedKeyboard = true;updateCurrent(nextSlide)"
            @keydown.arrow-left="state.usedKeyboard = true;updateCurrent(previousSlide)"
            @keydown.window.tab="state.usedKeyboard = true"
            x-data="testimonialSlideshow(slides)"
            x-title="Quotes Slideshow"
            x-init="setup()">
            <div
                :id="title.toLowerCase().replace(' ', '-')"
                class="sr-only" x-text="title">
            </div>
            <div
                tabindex="1"
                class="relative w-full overflow-hidden mb-6 bg-gray-300"
                :class="{'focus:outline-none' : !state.usedKeyboard}">
                <template x-for="(slide, index) in slides" :key="slide.id">
                    <div :aria-hidden="(state.order[state.currentSlide] != slide.id).toString()">
                        <div
                            x-show="state.order[state.currentSlide] == slide.id"
                            class="w-full text-center p-16"
                            :x-ref="slide.id"
                            :x-transition:enter="transitions('enter')"
                            :x-transition:enter-start="transitions('enter-start')"
                            :x-transition:enter-end="transitions('enter-end')"
                            :x-transition:leave="transitions('leave')"
                            :x-transition:leave-start="transitions('leave-start')"
                            :x-transition:leave-end="transitions('leave-end')"
                        >
                            <blockquote>
                                <p
                                    class="text-2xl font-extrabold italic mb-4 text-gray-800 leading-tight"
                                    x-html="slide.content">
                                </p>
                                <footer>—<cite x-html="slide.author"></cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </template>
               l <div
                    x-cloak
                    class="w-full bg-gray-200">
                    <div
                        class="bg-indigo-500 h-2 w-0"
                        :class="{'progress': !state.moving}"
                        :style="`animation-duration:${attributes.timer}ms;`">
                    </div>
                </div>
            </div>
            <div
                aria-live="polite"
                aria-atomic="true"
                class="sr-only"
                x-text="'Slide ' + (state.currentSlide + 1) + ' of ' + slides.length">
            </div>
            <div>
                <template x-for="(slide, index) in Array.from({ length: slides.length })" :key="index">
                    <button
                        class=" text-white inline-flex items-center justify-center bg-gray-600 hover:bg-indigo-500 w-4 h-4 p-0 mb-2 rounded-full"
                        style="text-indent:-9999px"
                        :class="{
					'bg-indigo-500' : state.currentSlide == index,
					'focus:outline-none' : !state.usedKeyboard,
				}"
                        @click="stopAutoplay();updateCurrent(index)"
                        x-text="index + 1">
                    </button>
                </template>
            </div>


        </section>


    </div>

    <!-- Dev tools -->
    <div
        id="alpine-devtools"
        x-data="devtools()"
        x-show="alpines.length"
        x-init="start()">
    </div>

    <script>
        // Alpine 2.3.5
        window.testimonialSlideshow = function(slides) {
            return {
                title: 'Programmer Quotes',
                state: {
                    moving: false,
                    currentSlide: 0,
                    looping: false,
                    order: [],
                    nextSlideDirection: '',
                    userInteracted: false,
                    usedKeyboard: false,



                },
                autoplayTimer: null,
                attributes: {
                    direction: 'right-left',
                    duration: 1000,
                    timer: 7000,
                },
                slides: [],
                setup() {
                    this.slides = slides.map((slide, index) => { slide.id = index + Date.now(); return slide })

                    // Cache the original order so that we can reorder on transition (to skip inbetween slides)
                    this.state.order = this.slides.map(slide => slide.id)
                    const newSlideOrder = this.slides.filter(slide => this.current.id != slide.id)
                    newSlideOrder.unshift(this.current)
                    this.slides = newSlideOrder

                    // Start the autoslide
                    this.attributes.timer && this.autoPlay()
                },
                get current() {
                    return this.slides.find(slide => slide.id == this.state.order[this.state.currentSlide])
                },
                get previousSlide() {
                    return (this.state.currentSlide - 1) > -1 ? this.state.currentSlide - 1 : this.state.currentSlide
                },
                get nextSlide() {
                    return (this.state.currentSlide + 1) < this.slides.length ? this.state.currentSlide + 1 : this.state.currentSlide
                },
                updateCurrent(nextSlide) {
                    if (nextSlide == this.state.currentSlide) return
                    if (this.state.moving) return
                    this.state.moving = true

                    const next = this.slides.find(slide => slide.id == this.state.order[nextSlide])

                    // Reorder the slides for a smoother transition
                    const newSlideOrder = this.slides.filter(slide => {
                        return ![this.current.id, this.state.order[nextSlide]].includes(slide.id)
                    })

                    const activeSlides = [this.current, next]
                    this.state.nextSlideDirection = nextSlide > this.state.currentSlide ? 'right-to-left' : 'left-to-right'

                    newSlideOrder.unshift(...(this.state.nextSlideDirection == 'right-to-left' ? activeSlides : activeSlides.reverse()))
                    this.slides = newSlideOrder
                    this.state.currentSlide = nextSlide
                    setTimeout(() => {
                        this.state.moving = false
                        // TODO: possibly a better check to determine whether autoplay should resume
                        this.attributes.timer && !this.autoplayTimer && this.autoPlay()
                    }, this.attributes.duration)

                },
                transitions(state, $dispatch) {
                    const rightToLeft = this.state.nextSlideDirection === 'right-to-left'
                    switch (state) {
                        case 'enter':
                            return `transition-all duration-${this.attributes.duration}`
                        case 'enter-start':
                            return rightToLeft ? 'transform translate-x-full' : 'transform -translate-x-full'
                        case 'enter-end':
                            return 'transform translate-x-0'
                        case 'leave':
                            return `absolute top-0 transition-all duration-${this.attributes.duration}`
                        case 'leave-start':
                            return 'transform translate-x-0'
                        case 'leave-end':
                            return rightToLeft ? 'transform -translate-x-full' : 'transform translate-x-full'
                    }
                },
                autoPlay() {
                    this.loop = () => {
                        const next = (this.state.currentSlide === (this.slides.length - 1)) ? 0 : this.state.currentSlide + 1
                        this.updateCurrent(this.state.looping ? next : this.currentSlide)
                        this.autoplayTimer = setTimeout(() => {
                            requestAnimationFrame(this.loop)
                        }, this.attributes.timer + this.attributes.duration)

                    }
                    this.autoplayTimer = setTimeout(() => {
                        this.state.looping = true
                        requestAnimationFrame(this.loop)
                    }, this.attributes.timer)
                },
                stopAutoplay() {
                    clearTimeout(this.autoplayTimer)
                    this.autoplayTimer = null
                }
            }
        }

        window.slides = [
            {
                content: 'Any fool can write code that a computer can understand. Good programmers write code that humans can understand.',
                author: 'Martin Fowler'
            },
            {
                content: 'First, solve the problem. Then, write the code.',
                author: 'John Johnson'
            },
            {
                content: 'Experience is the name everyone gives to their mistakes.',
                author: 'Oscar Wilde'
            },
            {
                content: 'In order to be irreplaceable, one must always be different.',
                author: 'Coco Chanel'
            },
            {
                content: 'Knowledge is power.',
                author: 'Francis Bacon'
            },
            {
                content: 'Sometimes it pays to stay in bed on Monday, rather than spending the rest of the week debugging Monday’s code.',
                author: 'Dan Salomon'
            },
            {
                content: 'Perfection is achieved not when there is nothing more to add, but rather when there is nothing more to take away.',
                author: 'Antoine de Saint-Exupery'
            },
            {
                content: 'Ruby is rubbish! PHP is phpantastic!',
                author: 'Nikita Popov'
            },
            {
                content: 'Code is like humor. When you have to explain it, it’s bad.',
                author: 'Cory House'
            },
            {
                content: 'Fix the cause, not the symptom.',
                author: 'Steve Maguire'
            },
            {
                content: 'Optimism is an occupational hazard of programming: feedback is the treatment.',
                author: 'Kent Beck'
            },
            {
                content: 'When to use iterative development? You should use iterative development only on projects that you want to succeed.',
                author: 'Martin Fowler'
            },
            {
                content: 'Simplicity is the soul of efficiency.',
                author: 'Austin Freeman'
            },
            {
                content: 'Before software can be reusable it first has to be usable.',
                author: 'Ralph Johnson'
            },
            {
                content: 'Make it work, make it right, make it fast.',
                author: 'Kent Beck'
            },
        ]
    </script>


</div>
