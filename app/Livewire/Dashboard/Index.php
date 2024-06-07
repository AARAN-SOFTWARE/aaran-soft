<?php

namespace App\Livewire\Dashboard;

use App\Helper\Core;
use App\Helper\Slogan;
use Livewire\Component;

class Index extends Component
{

    public $greetings = '';
    public $slogans = '';

    public function mount()
    {
        $this->greetings = Core::greetings();
        $this->slogans = Slogan::facts();
    }



    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
