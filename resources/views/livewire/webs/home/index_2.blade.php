<!-- component -->
<div class="h-screen w-full overflow-hidden flex flex-nowrap text-center" id="slider">


@foreach(\App\Enums\Status::cases() as $city)

        <div class="{{$city->getStyle()}} text-white space-y-4 flex-none w-full flex flex-col items-center justify-center">
        {{ $city->getName() }}
    </div>
@endforeach


</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('#slider');
        setTimeout(function moveSlide() {
            const max = slider.scrollWidth - slider.clientWidth;
            const left = slider.clientWidth;

            if (max === slider.scrollLeft) {
                slider.scrollTo({left: 0, behavior: 'smooth'})
            } else {
                slider.scrollBy({left, behavior: 'smooth'})
            }

            setTimeout(moveSlide, 2000)
        }, 2000)

    })
</script>
