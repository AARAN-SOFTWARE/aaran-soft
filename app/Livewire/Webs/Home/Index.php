<?php

namespace App\Livewire\Webs\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view($this->getHomeViewPath())->layout('layouts.web');
    }

    private function getHomeViewPath(): string
    {
        return match (config('aadmin.app_type')) {

            config('software.DEVELOPER') => 'livewire.webs.home.index',

            config('software.AUDIT') => 'livewire.webs.home.sundar.aaran-associates',

//            config('software.SPORTS_CLUB') => 'livewire.webs.home.welfare.index',
            config('software.SPORTS_CLUB') => 'livewire.sports.home.index',
            config('software.WELFARE') => 'livewire.webs.home.welfare.index',

            config('software.GARMENT') => 'livewire.webs.home.index',
            config('software.OFFSET') => 'livewire.webs.home.index',

            config('software.DEMO') => 'livewire.webs.home.demo.garment-demo',

            default => 'livewire.webs.home.index',
        };
    }
}
