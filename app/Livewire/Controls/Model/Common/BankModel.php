<?php

namespace App\Livewire\Controls\Model\Common;

use Aaran\Common\Models\Bank;
use Aaran\Master\Models\Contact_detail;
use Illuminate\Support\Str;
use Livewire\Component;

class BankModel extends Component
{
    public bool $showModel = false;

    public $vname = "";

    public function mount($name): void
    {
        $this->vname = $name;
    }

    public function save(): void
    {
        if ($this->vname != '') {
            $obj = Bank::create([
                'vname' => Str::upper($this->vname),
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-bank', ['name' => $this->vname, 'id' => $obj->id]);
            $this->clearAll();
        }
    }

    public function clearAll(): void
    {
        $this->showModel = false;
        $this->vname = "";
    }
    public function render()
    {
        return view('livewire.controls.model.common.bank-model');
    }




}
