<?php

namespace App\Livewire\Sports\Web;

use Aaran\SportsClub\Models\SportClubPic;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Gallery extends Component
{
    use CommonTrait;
    public $clubImage;


    public function getClubImage()
    {
        $this->clubImage=SportClubPic::all();

    }
    public function render()
    {
        $this->getClubImage();
        return view('livewire.sports.web.gallery')->layout('layouts.web');
    }
}
