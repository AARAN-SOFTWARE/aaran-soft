<?php

namespace App\Livewire\Webs\HomeSlide;

use Aaran\Web\Models\HomeSlide;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;
    #region[getList]
    public function getList()
    {
        $this->sortField = 'id';

        $data = HomeSlide::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return $data;
    }
    #endregion

    #region[Render]
    public function render()
    {
        return view('livewire.webs.home-slide.show')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
