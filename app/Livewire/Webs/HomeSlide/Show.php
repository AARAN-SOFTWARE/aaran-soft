<?php

namespace App\Livewire\Webs\HomeSlide;

use Aaran\SportsClub\Models\Achievements;
use Aaran\SportsClub\Models\SportActivity;
use Aaran\SportsClub\Models\SportClubPic;
use Aaran\Web\Models\Feed;
use Aaran\Web\Models\HomeSlide;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Show extends Component
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

    public function target()
    {
        dd('tart');
    }

    public function getClubImage()
    {
        $this->clubImage=SportClubPic::latest()->take(8)->get();

    }

    public function getData()
    {
        $this->activities=Feed::where('tag_id',1)->latest()->take(8)->get();
        $this->events=Feed::where('tag_id',2)->latest()->take(3)->get();
        $this->achievements=Feed::where('tag_id',3)->latest()->take(3)->get();
        $this->news=Feed::where('tag_id',4)->latest()->take(3)->get();
        $this->blogs=Feed::where('tag_id',5)->latest()->take(3)->get();
        $this->upComingEvents=Feed::where('tag_id',6)->latest()->take(3)->get();
        $this->moments=Feed::where('tag_id',7)->latest()->take(3)->get();

    }


    #region[getList]
    public function getList()
    {
        $this->sortField = 'id';

        $data = HomeSlide::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return $data;
    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getClubImage();
        $this->getData();
        return view('livewire.webs.home-slide.show')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
