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

            config('clients.AARAN_ERP') => 'livewire.webs.home.demo.aaranerp',
            config('clients.GARMENT_DEMO') => 'livewire.webs.home.demo.garment-demo',
            config('clients.OFFSET_DEMO') => 'livewire.webs.home.demo.offset-demo',

            config('clients.AARAN_ASSOCIATES') => 'livewire.webs.home.sundar.aaran-associates',

            config('clients.VIJAY_GARMENTS') => 'livewire.webs.home.index',
            config('clients.SK_PRINTERS') => 'livewire.webs.home.index',
            config('clients.SARA_SCREENS') => 'livewire.webs.home.index',
            config('clients.ESSA_KNITTING') => 'livewire.webs.home.index',

            config('clients.BEST_PRINT') => 'livewire.webs.home.index',


            config('clients.NEETHU_INDUSTRIES') => 'livewire.webs.home.index',



            config('clients.DEVELOPER_DEMO') => 'livewire.webs.home.index_1',

            default => 'livewire.webs.home.index',
        };
//        view('livewire.webs.home.index')
    }
}
