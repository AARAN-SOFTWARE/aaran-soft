@props([
    'list'=>null,
    'title'=>null,
])
<style>
    .slider:hover .flex {
        animation-play-state: paused;
    }

    #fade-drop {
        animation: quickDrop 0.5s ease forwards;
    }

    @keyframes quickDrop {
        0% {
            opacity: 0;
        }
        70% {
            transform: translateY(220px);
        }
        100% {
            transform: translateY(208px);
        );
        }
    }
</style>
<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div x-data="slider()" x-init="init()" class="relative w-full ">
        <div class="overflow-hidden relative">

            <div class="flex transition-transform duration-700 ease-in-out"
                 :style="{ transform: `translateX(-${currentIndex * 100}%)` }">

                <template x-for="(image, index) in images" :key="index">
                    <div class="w-full flex-shrink-0">
                        <img :src="image" class="w-full h-screen object-cover opacity-65">
                    </div>
                </template>
            </div>




            @foreach($title as $index =>$row)
                <div :key="index"
{{--                    :style="{ transform: `translateX(-${currentIndex * 100}%)` }"--}}
                    class="w-8/12 absolute bottom-52 left-64 border-l-[25px]  border-white text-white font-roboto uppercase text-8xl"
                    id="fade-drop">
                    <div class="pl-16 drop-shadow-xl animate-pulse duration-1000"  >
                        <span >{{$row->vname }}</span>
                    </div>
                </div>
            @endforeach

            <!-- Navigation Buttons -->
            <button @click="prev"
                    class="absolute left-1 top-1/2 transform -translate-y-1/2 bg-gray-800/25 text-white p-6 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>
            </button>
            <button @click="next"
                    class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-gray-800/25 text-white p-6 rounded-md">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                </svg>
            </button>
            <!-- Indicators -->
            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2">
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
                    images: [
                        '<?= implode("', '", $list) ?>'
                    ],
                    text: [
                        'HELLO'
                    ],
                    next() {
                        this.currentIndex = (this.currentIndex + 1) % this.images.length;
                    },
                    prev() {
                        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                    },
                    init() {
                        setInterval(() => {
                            this.next();
                        }, 3000);
                    }
                }
            }
        </script>

    </div>
</div>
