<div class="w-9/12 h-[31rem] mx-auto flex-col flex justify-center gap-y-5">
    <div class="font-gab text-3xl font-semibold">Achievements</div>
    <div class="flex justify-between">
        @for($i=1; $i<=3; $i++)
            <div style="background-image: url('/../../../images/profile/bg-1.jpg')"
                 class="w-96 h-96 bg-no-repeat bg-cover bg-center rounded-xl flex-col flex justify-end">
                <div class=" bg-gradient-to-t from-black to-gray-400/25 text-white flex-col p-5 rounded-b-lg">
                    <div class="font-bebas text-2xl tracking-wider">Viewers Choice</div>
                    <div class="font-roboto">“Pursue what catches your heart, not what catches your eyes.” - Roy T. Bennett, The Light in the Heart</div>
                </div>
            </div>
        @endfor
    </div>
</div>
