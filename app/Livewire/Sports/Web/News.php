<?php

namespace App\Livewire\Sports\Web;

use Livewire\Component;

class News extends Component
{
    public function render()
    {
        return view('livewire.sports.web.news')->layout('layouts.web');
    }
}
