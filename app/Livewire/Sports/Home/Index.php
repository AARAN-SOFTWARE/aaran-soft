<?php

namespace App\Livewire\Sports\Home;

use Aaran\Web\Models\HomeSlide;
use Livewire\Component;

class Index extends Component
{
    public $slides;
    public function getSlideData()
    {
       return $this->slides = HomeSlide::all();
    }

    public function render()
    {
//        $this->getSlideData();
        return view('livewire.sports.home.index')->layout('layouts.web')->with([
            'list' => $this->getSlideData()
        ]);
    }
}
