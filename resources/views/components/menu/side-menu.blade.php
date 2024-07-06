<div x-show="sidebarOpen" x-transition.opacity.duration.600ms @click="sidebarOpen = false"
     class="fixed inset-0 bg-black bg-opacity-30 z-10 "></div>
<nav x-cloak
     class="absolute inset-0 transform duration-500 z-30 w-80 bg-gray-900 text-white h-auto print:hidden"
     :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': sidebarOpen === false}">
    <div class="flex justify-between px-5 py-6">
        <a href="{{route('dashboard')}}" class="flex gap-3">
            <x-assets.logo.cxlogo :icon="'dark'" class="h-10 w-auto block"/>
            <span class="font-bold text-2xl sm:text-3xl tracking-widest">{{config('app.name')}}</span>
        </a>

        <button
                class="focus:outline-none focus:bg-gray-700 hover:bg-gray-800 rounded-md text-gray-300"
                @click="sidebarOpen = false"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-8 w-8"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    <div class=" bg-gray-900 text-white h-full overflow-y-scroll">
        <ul class="flex flex-col py-6 space-y-1"
            x-data="{selected:null}">

            @if(Aaran\Aadmin\Src\MainMenu::hasBooks())
                <x-menu.sub.books/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasWelfare())
                <x-menu.sub.welfare/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasAdmin())
                <x-menu.sub.admin/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasAudit())
                <x-menu.sub.audit/>
                <x-menu.sub.sales-track/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasSundar())
                <x-menu.sub.sundar/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasMagalir())
                <x-menu.sub.magalir/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasTask())
                <x-menu.sub.task/>
            @endif



            @if(Aaran\Aadmin\Src\MainMenu::hasEntries())
                <x-menu.sub.entries/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasAccounts())
                <x-menu.sub.accounts/>
            @endif
            @if(Aaran\Aadmin\Src\MainMenu::hasMaster())
                <x-menu.sub.master/>
            @endif
            @if(Aaran\Aadmin\Src\MainMenu::hasCommon())
                <x-menu.sub.common/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasReport())
                <x-menu.sub.report/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasDeveloper())
                <x-menu.sub.developer/>
            @endif

            @if(Aaran\Aadmin\Src\MainMenu::hasWebs())
                <x-menu.sub.webs/>
            @endif

            <x-menu.sub.logout/>
        </ul>
    </div>
</nav>
