<?php

namespace App\Livewire\Sports\Web;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.sports.web.about')->layout('layouts.web');
    }
}
