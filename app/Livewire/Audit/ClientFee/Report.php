<?php

namespace App\Livewire\Audit\ClientFee;

use Aaran\Audit\Models\ClientFee;
use App\Enums\Years;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Report extends Component
{
    #region[property]
    use CommonTrait;
    public $clientId;
    public $year;
    #endregion

    #region[mount]
    public function mount($id): void
    {
        $this->clientId=$id;
        $this->year = Years::AY_2024->value;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'client_id';

        return ClientFee::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('client_id', '=', $this->clientId)
            ->where('year', '=', $this->year)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion


    public function reRender()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.audit.client-fee.report')->with([
            'list' => $this->getList()
        ]);
    }
}
