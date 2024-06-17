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

            config('software.DEVELOPER') => 'livewire.webs.home.demo.aaranerp',
            config('software.DEMO') => 'livewire.webs.home.demo.garment-demo',
            config('software.AUDIT') => 'livewire.webs.home.sundar.aaran-associates',

            config('software.GARMENT') => 'livewire.webs.home.index',
            config('software.OFFSET') => 'livewire.webs.home.index',

            config('clients.DEVELOPER_DEMO') => 'livewire.webs.home.index_1',

            default => 'livewire.webs.home.index',
        };
//        view('livewire.webs.home.index')
    }
}
