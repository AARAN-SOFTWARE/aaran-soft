@if(session()->get('role_id')!=8)
<x-menu.base.li-menuitem :routes="'sportsClub'" :label="'Sports Club'"/>
<x-menu.base.li-menuitem :routes="'sportsClub.masters'" :label="'Sports Master'"/>
@else
<x-menu.base.li-menuitem :routes="'sportsClub.studentsView'" :label="'Sports Student'"/>
@endif
{{--<x-menu.base.li-menuitem :routes="'sportsClub'" :label="'Sports Club'"/>--}}
{{--<x-menu.base.li-menuitem :routes="'sportsClub.students'" :label="'Sports Students'"/>--}}

