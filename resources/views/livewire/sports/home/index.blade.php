<div>
    <x-slider.home :list="$list"/>

    <x-sports.design.latest-news :list="$news"/>

    <x-sports.design.training/>

    <x-sports.design.iamhere/>

    <x-sports.design.recent-posts :list="$blogs"/>

{{--    <x-sports.design.gallery :clubImage="$clubImage"/>--}}

    <x-sports.design.gallery_1 :list="$clubImage"/>


{{--    <x-sports.design.achievement :image="$achievements"/>--}}

    <x-sports.design.latest :events="$events" :up-coming-events="$upComingEvents" :blogs="$blogs" :news="$news"
                            :moments="$moments"/>

    <x-sports.footer.sponser :list="$sponsors"/>

    <x-sports.design.stats/>

    <x-sports.design.peoples/>

    <x-sports.footer.footer/>

    <x-sports.footer.copyright/>

</div>



