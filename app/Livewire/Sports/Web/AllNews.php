<?php

namespace App\Livewire\Sports\Web;

use Livewire\Component;

class AllNews extends Component
{
    public function render()
    {
        return view('livewire.sports.web.all-news')->layout('layouts.web');
    }
}
