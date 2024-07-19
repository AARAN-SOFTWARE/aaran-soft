<div>

    <x-slot name="header">Icons</x-slot>

    <x-forms.m-panel>

        <div class="relative w-full">
            <label>
                <input type="search" wire:model.live="searches"  wire:keydown.escape="$set('searches', '')"
                       class="search-box"
                       placeholder="type for Search...           escape to clear">
            </label>
            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                <x-icons.search-lens/>
            </div>
        </div>

{{--<----row-1----->--}}
        <div class="bg-white-900">
            <div class="grid grid-cols-2 md:grid-cols-10 gap-3">


                <x-icons.utilities :icon="'plus-slim'"/>
                <x-icons.utilities :icon="'trash'"/>
                <x-icons.utilities :icon="'save'"/>
                <x-icons.utilities :icon="'pencil'"/>
                <x-icons.utilities :icon="'chevrons-left'"/>
                <x-icons.utilities :icon="'printer'"/>
                <x-icons.utilities :icon="'plus-bold'"/>
                <x-icons.utilities :icon="'cart'"/>
                <x-icons.utilities :icon="'cog'"/>
                <x-icons.utilities :icon="'arrow-circle-right'"/>

                {{--<----row-2----->--}}

                <x-icons.utilities :icon="'annotation'"/>
                <x-icons.utilities :icon="'adjustments'"/>
                <x-icons.utilities :icon="'refresh'"/>
                <x-icons.utilities :icon="'check-circle'"/>
                <x-icons.utilities :icon="'exclamation-circle'"/>
                <x-icons.utilities :icon="'information-circle'"/>
                <x-icons.utilities :icon="'x-circle'"/>
                <x-icons.utilities :icon="'backward'"/>
                <x-icons.utilities :icon="'arrow-down-on-square-stack'"/>
                <x-icons.utilities :icon="'wifi'"/>

                {{--<----row-3----->--}}

                <x-icons.utilities :icon="'chat'"/>
                <x-icons.utilities :icon="'share'"/>
                <x-icons.utilities :icon="'message'"/>
                <x-icons.utilities :icon="'login'"/>
                <x-icons.utilities :icon="'log-out'"/>
                <x-icons.utilities :icon="'wordpress'"/>
                <x-icons.utilities :icon="'power'"/>
                <x-icons.utilities :icon="'person-add'"/>
                <x-icons.utilities :icon="'key'"/>
                <x-icons.utilities :icon="'github'"/>

                {{--<----row-4----->--}}

                <x-icons.utilities :icon="'location'"/>
                <x-icons.utilities :icon="'flag'"/>
                <x-icons.utilities :icon="'facebook'"/>
                <x-icons.utilities :icon="'view'"/>
                <x-icons.utilities :icon="'email'"/>
                <x-icons.utilities :icon="'coin'"/>
                <x-icons.utilities :icon="'double-arrow-right'"/>
                <x-icons.utilities :icon="'double-arrow-left'"/>
                <x-icons.utilities :icon="'double-arrow-up'"/>
                <x-icons.utilities :icon="'cart'"/>

                {{--<----row-5----->--}}

                <x-icons.utilities :icon="'clock'"/>
                <x-icons.utilities :icon="'home'"/>
                <x-icons.utilities :icon="'chevron'"/>
                <x-icons.utilities :icon="'globe'"/>
                <x-icons.utilities :icon="'user'"/>
                <x-icons.utilities :icon="'newspaper'"/>
                <x-icons.utilities :icon="'collection'"/>
                <x-icons.utilities :icon="'terminal'"/>
                <x-icons.utilities :icon="'document'"/>
                <x-icons.utilities :icon="'receipt'"/>

                {{--<----row-6----->--}}

                <x-icons.utilities :icon="'ticket'"/>
                <x-icons.utilities :icon="'cube'"/>
                <x-icons.utilities :icon="'amazon'"/>
                <x-icons.utilities :icon="'amd'"/>
                <x-icons.utilities :icon="'android'"/>
                <x-icons.utilities :icon="'calculator'"/>
                <x-icons.utilities :icon="'controller'"/>
                <x-icons.utilities :icon="'database'"/>
                <x-icons.utilities :icon="'dropbox'"/>
                <x-icons.utilities :icon="'fingerprint'"/>

                {{--<----row-7----->--}}

                <x-icons.utilities :icon="'instagram'"/>
                <x-icons.utilities :icon="'linkedin'"/>
                <x-icons.utilities :icon="'skype'"/>
                <x-icons.utilities :icon="'stack'"/>
                <x-icons.utilities :icon="'table'"/>
                <x-icons.utilities :icon="'twitter'"/>
                <x-icons.utilities :icon="'twitter-x'"/>
                <x-icons.utilities :icon="'unity'"/>
                <x-icons.utilities :icon="'whatsapp'"/>
                <x-icons.utilities :icon="'X-diamond'"/>

                {{--<----row-8---->--}}

                <x-icons.utilities :icon="'youtube'"/>
                <x-icons.utilities :icon="'zoom-in'"/>
                <x-icons.utilities :icon="'zoom-out'"/>
                <x-icons.utilities :icon="'wikipedia'"/>
                <x-icons.utilities :icon="'google'"/>
                <x-icons.utilities :icon="'google-play'"/>
                <x-icons.utilities :icon="'google-chrome'"/>
                <x-icons.utilities :icon="'common'"/>
                <x-icons.utilities :icon="'dashboard'"/>
                <x-icons.utilities :icon="'location_outline'"/>

                {{--<----row-9----->--}}

                <x-icons.utilities :icon="'dots-circle-horizontal'"/>
                <x-icons.utilities :icon="'color-swatch'"/>
                <x-icons.utilities :icon="'variable'"/>
                <x-icons.utilities :icon="'view-grid-add'"/>
                <x-icons.utilities :icon="'scale'"/>
                <x-icons.utilities :icon="'office-building'"/>
                <x-icons.utilities :icon="'library'"/>
                <x-icons.utilities :icon="'document-report'"/>
                <x-icons.utilities :icon="'document-text'"/>
                <x-icons.utilities :icon="'receipt-refund'"/>

                {{--<----row-10----->--}}

                <x-icons.utilities :icon="'list-bullet'"/>
                <x-icons.utilities :icon="'document-duplicate'"/>
                <x-icons.utilities :icon="'user-circle'"/>
                <x-icons.utilities :icon="'notification'"/>
                <x-icons.utilities :icon="'book-open'"/>
                <x-icons.utilities :icon="'credit-card'"/>
                <x-icons.utilities :icon="'face-smile'"/>
                <x-icons.utilities :icon="'folder'"/>
                <x-icons.utilities :icon="'bulb'"/>
                <x-icons.utilities :icon="'lock-closed'"/>

                {{--<----row-11----->--}}

                <x-icons.utilities :icon="'lock-open'"/>
                <x-icons.utilities :icon="'minus'"/>
                <x-icons.utilities :icon="'arrow-down'"/>
                <x-icons.utilities :icon="'bar-center'"/>
                <x-icons.utilities :icon="'window'"/>
                <x-icons.utilities :icon="'truck'"/>
                <x-icons.utilities :icon="'scissors'"/>
                <x-icons.utilities :icon="'rocket'"/>
                <x-icons.utilities :icon="'shop-bag'"/>
                <x-icons.utilities :icon="'sparkles'"/>
                <x-icons.utilities :icon="'star'"/>

                {{--<----row-12----->--}}

                <x-icons.utilities :icon="'common'"/>
                <x-icons.utilities :icon="'dashboard'"/>
                <x-icons.utilities :icon="'users'"/>
                <x-icons.utilities :icon="'user-group'"/>
                <x-icons.utilities :icon="'dashboard-outline'"/>
                <x-icons.utilities :icon="'mail'"/>
                <x-icons.utilities :icon="'u-turn-left'"/>
                <x-icons.utilities :icon="'u-turn-right'"/>
                <x-icons.utilities :icon="'bug-ant'"/>

                {{--<----row-13----->--}}

                <x-icons.utilities :icon="'link'"/>
                <x-icons.utilities :icon="'apple'"/>
                <x-icons.utilities :icon="'cash'"/>
                <x-icons.utilities :icon="'pen-nib'"/>
                <x-icons.utilities :icon="'store'"/>
                <x-icons.utilities :icon="'book'"/>
                <x-icons.utilities :icon="'calender-1'"/>
                <x-icons.utilities :icon="'grid'"/>
                <x-icons.utilities :icon="'utilities'"/>
                <x-icons.utilities :icon="'profile'"/>

                {{--<----row-14 ----->--}}

                <x-icons.utilities :icon="'cal-month'"/>
                <x-icons.utilities :icon="'hour-glass'"/>
                <x-icons.utilities :icon="'eye-slash'"/>
                <x-icons.utilities :icon="'trash-bold'"/>
                <x-icons.utilities :icon="'upload'"/>
                <x-icons.utilities :icon="'download'"/>
                <x-icons.utilities :icon="'heart'"/>
                <x-icons.utilities :icon="'rupee'"/>
                <x-icons.utilities :icon="'clipboard-document-list'"/>
                <x-icons.utilities :icon="'clip-board'"/>

                {{--<----row-14 ----->--}}

                <x-icons.utilities :icon="'thumbs-up'"/>
                <x-icons.utilities :icon="'logo'"/>
                <x-icons.utilities :icon="'warning'"/>
                <x-icons.utilities :icon="'message-round'"/>
                <x-icons.utilities :icon="'login-key'"/>
                <x-icons.utilities :icon="'u-turn-left2'"/>
                <x-icons.utilities :icon="'performance'"/>
                <x-icons.utilities :icon="'right-long-arrow'"/>
                <x-icons.utilities :icon="'photo'"/>
                <x-icons.utilities :icon="'phone'"/>
                <x-icons.utilities :icon="'cmp1'"/>
                <x-icons.utilities :icon="'cmp2'"/>

                {{--<----row-15 ----->--}}
                <x-icons.utilities :icon="'event'"/>
                <x-icons.utilities :icon="'newspaper-outline'"/>
                <x-icons.utilities :icon="'arrow-right-circle'"/>
                <x-icons.utilities :icon="'member-group'"/>
                <x-icons.utilities :icon="'gift-top'"/>
                <x-icons.utilities :icon="'eye-new'"/>
                <x-icons.utilities :icon="'x-mark'"/>
                <x-icons.utilities :icon="'location1'"/>
                <x-icons.utilities :icon="'circle-location'"/>
                <x-icons.utilities :icon="'mail1'"/>
                <x-icons.utilities :icon="'location-3'"/>
                <x-icons.utilities :icon="'phone-call'"/>


                </div>
            </div>
    </x-forms.m-panel>
</div>

