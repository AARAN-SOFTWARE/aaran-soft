@props([
    'stats'=>null,
    'statsItem'=>null,
])
<section class="py-10 bg-gray-100 sm:py-16 lg:py-24">
    <div class="w-10/12 px-4 mx-auto sm:px-6 lg:px-8">

        <div class="max-w-2xl mx-auto text-center">
            @foreach($stats as $row)
                <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl animate__animated wow animate__fadeInUp"
                    data-wow-duration="2s">
                    {{$row->vname}}
                </h2>

                <p class="mt-3 text-xl leading-relaxed text-gray-600 md:mt-8 animate__animated wow animate__fadeInUpBig"
                   data-wow-duration="3s">
                    {{$row->description}}
                </p>
            @endforeach
        </div>


        <div class="grid grid-cols-1 gap-12 mt-10 text-center lg:mt-24 sm:gap-x-8 md:grid-cols-5">
            @foreach($statsItem as $row)
                <div>
                    <h3 class="font-bold text-7xl">
                    <span data-purecounter-start="0" data-purecounter-end="{{$row->count}}" data-purecounter-duration="3"
                          class="text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-600 to-blue-600 purecounter"></span>
                    </h3>
                    <p class="mt-4 text-xl font-medium text-gray-900 animate__animated wow animate__zoomIn"
                       data-wow-duration="3s">
                        {{$row->heading}}
                    </p>

                    <p class="text-base mt-0.5 text-gray-500 animate__animated wow animate__zoomIn"
                       data-wow-duration="3s">
                       {{$row->description}}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pure/3.0.0/pure-min.css"></script>

<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script>
    new PureCounter();
</script>
