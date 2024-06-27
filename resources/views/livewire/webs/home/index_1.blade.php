<div>
    <div class="w-full max-w-5xl mx-auto h-[40rem] text-center" x-data="slider">
        <!-- Item image -->
        <div class="transition-all duration-150 delay-300 ease-in-out">
            <div class="relative flex flex-col" x-ref="items">
                <template x-for="(item, index) in items" :key="index">
                    <div
                        x-show="active === index"
                        x-transition:enter="transition ease-in-out duration-500 delay-200 order-first"
                        x-transition:enter-start="opacity-0 scale-105"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in-out duration-300 absolute"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                    >

                        <div class="w-full lg:h-[32rem] mt-32">
                            <div class="w-1/2 mx-auto">
                                <img class="rounded-xl" :src="item.img" width="1024" height="576" :alt="item.desc">
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Buttons -->
        <div class="max-w-xs sm:max-w-sm md:max-w-3xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 mt-5">
            <!-- Alpine.js template for buttons: https://github.com/alpinejs/alpine#x-for -->
            <template x-for="(item, index) in items" :key="index">
                <button class="p-2 rounded focus:outline-none focus-visible:ring focus-visible:ring-indigo-300 group"
                        @click="active = index">
                <span class="text-center flex flex-col items-center"
                      :class="active === index ? '' : 'opacity-50 group-hover:opacity-100 group-focus:opacity-100 transition-opacity'">
{{--                    <span class="flex items-center justify-center relative w-9 h-9 rounded-full bg-indigo-100 mb-2">--}}
                    {{--                        <img :src="item.buttonIcon" :alt="item.desc">--}}
                    {{--                    </span>--}}
                    <span class="block text-sm font-medium text-slate-900 mb-2" x-text="item.desc"></span>
                    <span class="block relative w-full bg-slate-200 h-1 rounded-full" role="progressbar"
                          :aria-valuenow="active === index ? progress : 0" aria-valuemin="0" aria-valuemax="100">
                        <span class="absolute inset-0 bg-indigo-500 rounded-[inherit]"
                              :style="`${active === index ? `width: ${progress}%` : 'width: 0%'}`"></span>
                    </span>
                </span>
                </button>
            </template>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', () => ({
                duration: 5000,
                active: 0,
                progress: 0,
                firstFrameTime: 0,
                items: [
                    {
                        img: '/../../../images/team-3.jpg',
                        desc: 'Omnichannel',
                        buttonIcon: 'ps-icon-01.svg',
                    },
                    {
                        img: '/../../../images/e-way-billing.jpg',
                        desc: 'Multilingual',
                        buttonIcon: 'ps-icon-02.svg',
                    },
                    {
                        img: '/../../../images/Receipt-amico.svg',
                        desc: 'Interpolate',
                        buttonIcon: 'ps-icon-03.svg',
                    },
                    {
                        img: '/../../../images/logo.png',
                        desc: 'Enriched',
                        buttonIcon: 'ps-icon-04.svg',
                    },
                ],
                init() {
                    this.startAnimation()
                    this.$watch('active', callback => {
                        cancelAnimationFrame(this.frame)
                        this.startAnimation()
                    })
                },
                startAnimation() {
                    this.progress = 0
                    this.$nextTick(() => {
                        this.heightFix()
                        this.firstFrameTime = performance.now()
                        this.frame = requestAnimationFrame(this.animate.bind(this))
                    })
                },
                animate(now) {
                    let timeFraction = (now - this.firstFrameTime) / this.duration
                    if (timeFraction <= 1) {
                        this.progress = timeFraction * 100
                        this.frame = requestAnimationFrame(this.animate.bind(this))
                    } else {
                        timeFraction = 1
                        this.active = (this.active + 1) % this.items.length
                    }
                },
                heightFix() {
                    this.$nextTick(() => {
                        this.$refs.items.parentElement.style.height = this.$refs.items.children[this.active + 1].clientHeight + 'px'
                    })
                }
            }))
        })
    </script>
</div>
