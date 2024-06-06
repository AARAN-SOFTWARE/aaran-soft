<?php

namespace App\Livewire\Dashboard;

use App\Helper\Core;
use Livewire\Component;

class Index extends Component
{

    public $greetings = '';

    public function mount()
    {
        $this->greetings = Core::greetings();
    }



    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
