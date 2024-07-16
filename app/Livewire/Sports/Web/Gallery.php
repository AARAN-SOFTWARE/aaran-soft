<?php

namespace App\Livewire\Sports\Web;

use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        return view('livewire.sports.web.gallery')->layout('layouts.web');
    }
}
