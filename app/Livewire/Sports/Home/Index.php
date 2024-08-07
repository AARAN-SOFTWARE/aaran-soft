<?php

namespace App\Livewire\Sports\Home;

use Aaran\SportsClub\Models\Sponsor;
use Aaran\SportsClub\Models\SportClubPic;
use Aaran\Web\Models\Feed;
use Aaran\Web\Models\HomeSlide;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    use CommonTrait;

    public $clubImage;
    public $achievements;
    public $activities;
    public $events;
    public $blogs;
    public $news;
    public $moments;
    public $upComingEvents;

    public $sponsors;

    public function target()
    {
        dd('tart');
    }

    public function getData()
    {
        $this->activities = Feed::where('tag_id', 1)->latest()->take(3)->get();

        $this->events = Feed::where('tag_id', 2)->latest()->take(3)->get();
        $this->achievements = Feed::where('tag_id', 3)->latest()->take(6)->get();
        $this->news = Feed::where('tag_id', 4)->latest()->take(3)->get();
        $this->blogs = Feed::where('tag_id', 5)->latest()->take(3)->get();
        $this->upComingEvents = Feed::where('tag_id', 6)->latest()->take(3)->get();
        $this->moments = Feed::where('tag_id', 7)->latest()->take(3)->get();

        $this->clubImage = SportClubPic::latest()->take(8)->get();

        $this->sponsors = Sponsor::latest()->get();

    }


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
        $this->getData();

//        $this->getSlideData();
        return view('livewire.sports.home.index')->layout('layouts.web')->with([
//            'list' => $this->getSlideData(),'title'=>HomeSlide::all(),
            'list' => HomeSlide::all(),
        ]);
    }
}
