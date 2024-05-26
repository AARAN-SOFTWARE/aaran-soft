<?php

namespace App\Livewire\Controls\Model\Common;

use Aaran\Common\Models\Size;
use Illuminate\Support\Str;
use Livewire\Component;

class SizeModel extends Component
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
            $obj = Size::create([
                'vname' => Str::ucfirst($this->vname),
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-size', ['name' => $this->vname, 'id' => $obj->id]);
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
        return view('livewire.controls.model.common.size-model');
    }
}
