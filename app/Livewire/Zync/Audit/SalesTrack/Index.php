<?php

namespace App\Livewire\Zync\Audit\SalesTrack;

use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[render]
    public function render()
    {
        return view('livewire.zync.audit.sales-track.index');
    }
    #endregion
}
