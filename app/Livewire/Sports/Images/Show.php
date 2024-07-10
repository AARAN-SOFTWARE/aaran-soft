<?php

namespace App\Livewire\Sports\Images;

use Aaran\SportsClub\Models\SportClubPic;
use Aaran\SportsClub\Models\SportMasterPic;
use Aaran\SportsClub\Models\SportStudentPic;
use Livewire\Component;

class Show extends Component
{
    public $clubImage;
    public $masterImage;
    public $studentImage;
    #region[Mount]
    public function mount()
    {
            $this->clubImage = SportClubPic::all();
            $this->masterImage = SportMasterPic::all();
            $this->studentImage = SportStudentPic::all();
    }
    #endregion
    public function render()
    {
        return view('livewire.image.show');
    }
}
