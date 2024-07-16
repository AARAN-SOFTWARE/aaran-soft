<?php

namespace App\Livewire\Sports\Web;

use Livewire\Component;

class Videos extends Component
{
    public function render()
    {
        return view('livewire.sports.web.videos')->layout('layouts.web');
    }
}
