<div class="bg-[#F0F2F8]">
    <div class="w-full h-44 bg-[#081E40] flex-col flex justify-center items-center">
        <div class="text-white text-4xl nd:w-9/12 w-11/12 mx-auto font-gab">Gallery</div>
    </div>
    <div class="md:w-9/12 w-11/12 grid md:grid-cols-4 grid-cols-2 gap-2 mx-auto py-12">
        @foreach( $clubImage as $row)
            <div
                class="md:h-72 h-52 border border-gray-400 bg-cover bg-center bg-no-repeat bg-black rounded-md flex-col flex items-center justify-evenly group hover:opacity-75 hover:bg-black "
                style="background-image:  url('../../../../storage/images/{{$row->club_image}}');">
                <div class="w-[96%] h-[96%] rounded-md hidden flex-col items-center justify-center
                    border-2 border-white group-hover:flex group-hover:bg-opacity-25 gap-3">
                    <div class="w-2/3 text-white text-md font-roboto bg-black/50 px-2 text-center rounded-sm">
                        {{\Illuminate\Support\Str::words($row->title, 10)}}</div>
                    <button class="bg-red-700 flex items-center px-4 rounded-md"
                            @click="$dispatch('lightbox',  {imgModalSrc: '../../../../storage/images/{{$row->club_image}}',
                            imgModalAlt: 'First Image', imgModalDesc: 'Random Image One Description' })">
                        <x-icons.icon icon="view" class="w-8 h-8 text-white mt-2 ml-2.5 font-bold"/>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Image light-box  -->
    <div x-data="{ lightbox: false, imgModalSrc : '', imgModalAlt : '', imgModalDesc : '',image:'' }">

        <div x-show="lightbox"
             @lightbox.window="lightbox = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;">

            <div x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-90"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-90"
                 class="fixed inset-0 z-50  flex items-center justify-center w-full p-2 overflow-hidden bg-black bg-opacity-75 h-100">
                <div @click.away="lightbox = ''" class="">
                    <img class=" w-auto md:h-[45rem]  mt-16 h-auto border-2 border-white rounded-md" :src="imgModalSrc" :alt="imgModalAlt">
                </div>
            </div>

        </div>
    </div>
</div>
