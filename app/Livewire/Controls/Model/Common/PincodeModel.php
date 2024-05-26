<?php

namespace App\Livewire\Controls\Model\Common;

use Aaran\Common\Models\Pincode;
use Illuminate\Support\Str;
use Livewire\Component;

class PincodeModel extends Component
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
            $obj = Pincode::create([
                'vname' => Str::upper($this->vname),
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-pincode', ['name' => $this->vname, 'id' => $obj->id]);
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
        return view('livewire.controls.model.common.pincode-model');
    }
}
