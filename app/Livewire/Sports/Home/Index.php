<?php

namespace App\Livewire\Sports\Home;

use Aaran\Web\Models\HomeSlide;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $slides;
    public array $sliderData = [];

    public function getSlideData()
    {
        $this->slides = DB::table('home_slides')->select('bg_image')->get();
        foreach ($this->slides as $row) {
            $this->sliderData[] = URL(\Illuminate\Support\Facades\Storage::url('images/' . $row->bg_image));
        }
        return $this->sliderData;
    }


    public function render()
    {
//        $this->getSlideData();
        return view('livewire.sports.home.index')->layout('layouts.web')->with([
//            'list' => $this->getSlideData(),'title'=>HomeSlide::all(),
            'list' => HomeSlide::all(),
        ]);
    }
}
