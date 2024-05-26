
<div
    x-data="{
        notifications: [],
        add(e) {
            this.notifications.push({
                id: e.timeStamp,
                type: e.detail.type,
                content: e.detail.content,
            })
        },
        remove(notification) {
            this.notifications = this.notifications.filter(i => i.id !== notification.id)
        },
    }"
    @notify.window="add($event)"
    class="fixed top-0 right-0 flex w-full max-w-xs flex-col space-y-4 pr-4 pb-4 sm:justify-start"
    role="status"
    aria-live="polite"
>
    <!-- Notification -->
    <template x-for="notification in notifications" :key="notification.id">
        <div
            x-data="{
                show: false,
                init() {
                    this.$nextTick(() => this.show = true)

                    setTimeout(() => this.transitionOut(), 2000)
                },
                transitionOut() {
                    this.show = false

                    setTimeout(() => this.remove(this.notification), 500)
                },
            }"
            x-show="show"
            x-transition.duration.500ms
            class="relative w-full pl-10 max-w-sm"
        >


            {{--             <--- alert message --->--}}

            <div x-show="notification.type === 'success'" class="inline-flex rounded-xl pointer-events-auto p-2 max-w-sm h-12 bg-green-500 gap-2">
                <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center ml-2 my-auto rounded-full border-2 border-green-200 text-lg font-bold text-white">&check;</span>
                <p x-text="notification.content" class="text-sm font-semibold flex-shrink-0 ml-1.5 my-auto text-white">you have saved successfully </p>
                <span class="ml-3 flex rounded-full bg-green-500">
                    <button @click="transitionOut()" class="close rounded-full hover:bg-green-600">
                        <x-icons.icon :icon="'x-mark'" class="w-8 h-auto block font-bold text-white"/>
                    </button>
                </span>
            </div>

            <div x-show="notification.type === 'info'" class="inline-flex rounded-xl pointer-events-auto p-2 max-w-sm h-12 bg-blue-600 gap-2">
                <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center ml-2 my-auto rounded-full border-2 border-white text-lg font-bold text-white">!</span>
                <p x-text="notification.content" class="text-sm font-semibold leading-5 ml-1.5 my-auto text-white">you have saved infooo</p>
                <span class="ml-3 flex rounded-full bg-blue-600">
                    <button @click="transitionOut()" class="close rounded-full text-right hover:bg-blue-700">
                        <x-icons.icon :icon="'x-mark'" class="w-8  font-bold h-auto text-right block text-white"/>
                    </button>
                </span>
            </div>
            <div x-show="notification.type === 'danger'" class="inline-flex rounded-xl pointer-events-auto p-2 max-w-sm h-12 bg-red-500 gap-2">
                <span aria-hidden="true" class="inline-flex h-8 w-8 items-center justify-center my-auto rounded-full border-2 border-white text-lg font-bold text-white">
                    <x-icons.icon :icon="'error'" class="w-6 font-semibold h-auto block text-white"/>
                </span>
                <p x-text="notification.content" class="text-sm font-semibold leading-5 ml-1.5 my-auto text-white">you have saved successfully</p>
                <span class="ml-3 flex border border-red-500 rounded-full bg-red-500 ">
                    <button @click="transitionOut()" class="close font-semibold text-2xl rounded-3xl hover:bg-white">
                        <x-icons.icon :icon="'x-mark'" class="w-8 font-semibold h-auto block text-white  hover:text-gray-800"/>
                    </button>
                </span>
            </div>
            <div x-show="notification.type === 'warning'" class="inline-flex rounded-xl pointer-events-auto p-2 max-w-sm h-12 bg-yellow-400 gap-2">
                <span aria-hidden="true" class="inline-flex h-8 w-8 items-center justify-center my-auto rounded-full border-2 border-black text-lg font-bold text-black">
                    <x-icons.icon :icon="'error'" class="w-6 font-semibold h-auto block text-black"/>
                </span>
                <p x-text="notification.content" class="text-sm font-semibold leading-5 ml-1.5 my-auto text-black">you have saved successfully</p>
                <span class=" ml-3 flex  rounded-full bg-yellow-400 ">
                    <button @click="transitionOut()" class="close font-semibold text-2xl rounded-3xl hover:bg-white">
                        <x-icons.icon :icon="'x-mark'" class="w-8 font-semibold h-auto block text-black  hover:text-gray-800"/>
                    </button>
                </span>
            </div>

            <div x-show="notification.type === 'message'" class="inline-flex rounded-xl pointer-events-auto p-2 max-w-sm h-12 bg-gray-300 gap-2">
                <span aria-hidden="true" class="inline-flex h-8 w-8 items-center justify-center my-auto rounded-full border-2 border-gray-900 text-lg font-bold text-black">
                    <x-icons.icon :icon="'error'" class="w-6 font-semibold h-auto block text-text-gray-900"/>
                </span>
                <p x-text="notification.content" class="text-sm font-semibold leading-5 ml-1.5 my-auto text-gray-900">you have saved successfully</p>
                <span class=" ml-3 flex rounded-full bg-gray-300 ">
                    <button @click="transitionOut()" class="close font-semibold text-2xl rounded-3xl hover:bg-white">
                        <x-icons.icon :icon="'x-mark'" class="w-8 font-semibold h-auto block text-text-gray-900  hover:text-gray-800"/>
                    </button>
                </span>
            </div>
            {{--            <--- End alert message --->--}}



            {{--            <div x-show="notification.type === 'success'" class=" inline-flex">--}}
            {{--                <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-green-600 text-lg font-bold text-green-600">&check;</span>--}}
            {{--                <span class="sr-only">Success:</span>--}}
            {{--                <p x-text="notification.content" class="text-sm font-medium leading-5 text-gray-900 pointer-events-auto relative w-full max-w-sm rounded-md border border-gray-200 bg-white py-4 pl-6 pr-4 shadow-lg"></p>--}}
            {{--            </div>--}}


            {{--            <div class="flex items-start">--}}
            {{--                <!-- Icons -->--}}
            {{--                <div x-show="notification.type === 'info'" class="flex-shrink-0">--}}
            {{--                    <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-gray-400 text-xl font-bold text-gray-400">!</span>--}}
            {{--                    <span class="sr-only">Information:</span>--}}
            {{--                </div>--}}

            {{--                <div x-show="notification.type === 'success'" class="flex-shrink-0">--}}
            {{--                    <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-green-600 text-lg font-bold text-green-600">&check;</span>--}}
            {{--                    <span class="sr-only">Success:</span>--}}
            {{--                </div>--}}

            {{--                <div x-show="notification.type === 'error'" class="flex-shrink-0">--}}
            {{--                    <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-red-600 text-lg font-bold text-red-600">&times;</span>--}}
            {{--                    <span class="sr-only">Error:</span>--}}
            {{--                </div>--}}

            {{--                <!-- Text -->--}}
            {{--                <div class="ml-3 w-0 flex-1 pt-0.5">--}}
            {{--                    <p x-text="notification.content" class="text-sm font-medium leading-5 text-gray-900"></p>--}}
            {{--                </div>--}}

            {{--                <!-- Remove button -->--}}
            {{--                <div class="ml-4 flex flex-shrink-0">--}}
            {{--                    <button @click="transitionOut()" type="button" class="inline-flex text-gray-400">--}}
            {{--                        <svg aria-hidden="true" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
            {{--                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>--}}
            {{--                        </svg>--}}
            {{--                        <span class="sr-only">Close notification</span>--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--            </div>--}}


        </div>
    </template>
</div>
