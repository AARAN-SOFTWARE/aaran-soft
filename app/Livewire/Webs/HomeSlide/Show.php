<?php

namespace App\Livewire\Webs\HomeSlide;

use Aaran\SportsClub\Models\Achievements;
use Aaran\SportsClub\Models\SportClubPic;
use Aaran\Web\Models\HomeSlide;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;
    public $clubImage;
    public $image;

    public function target()
    {
        dd('tart');
    }

    public function getClubImage()
    {
        $this->clubImage=SportClubPic::latest()->take(8)->get();

    }

    public function getImage()
    {
        $this->image=Achievements::latest()->take(3)->get();

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
        $this->getImage();
        return view('livewire.webs.home-slide.show')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
