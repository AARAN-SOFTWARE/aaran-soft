<div>
    <!-- Slider -->
{{--    <x-sports.slider.homeslidesports :slides="$slides"/>--}}
    <div class="bg-gray-100 flex md:h-screen h-64 my-1">
        <!-- Slider Content -->
        <div x-data="slider()" x-init="init()" class="slider relative w-full md:h-screen h-64">
            <div class="overflow-hidden relative">
                <div class="flex transition-transform  duration-1000 ease-in-out"
                     :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                    <template x-for="(image, index) in images" :key="index">
                        <div class="w-full flex-shrink-0">
                            <img :src="image" class="w-full md:h-[54rem] h-64 md:pb-1 object-cover ">
                        </div>
                    </template>
                </div>
            </div>
            <!-- Navigation Buttons -->
            <button @click="prev"
                    class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800/25 text-white md:p-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>

            </button>
            <button @click="next"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2  bg-gray-800/25 text-white md:p-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                </svg>
            </button>
            <!-- Indicators -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2">
                <template x-for="(image, index) in images" :key="index">
                    <div @click="currentIndex = index"
                         :class="{'bg-gray-800': currentIndex === index, 'bg-gray-400': currentIndex !== index}"
                         class="w-3 h-3 rounded-full cursor-pointer"></div>
                </template>
            </div>
        </div>

        <script>
            function slider() {
                return {
                    currentIndex: 0,
                    @foreach($slides as $row)
                    images: [
                        '{{ \Illuminate\Support\Facades\Storage::url('images/'.$row->bg_image)}}',
                    ],
                    @endforeach
                    next() {
                        this.currentIndex = (this.currentIndex + 1) % this.images.length;
                    },
                    prev() {
                        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                    },
                    init() {
                        setInterval(() => {
                            this.next();
                        }, 6000);
                    }
                }
            }
        </script>
    </div>
</div>
