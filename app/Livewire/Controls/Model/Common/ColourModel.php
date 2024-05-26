<?php

namespace App\Livewire\Controls\Model\Common;

use Aaran\Common\Models\Colour;
use Illuminate\Support\Str;
use Livewire\Component;

class ColourModel extends Component
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
            $obj = Colour::create([
                'vname' => Str::ucfirst($this->vname),
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-colour', ['name' => $this->vname, 'id' => $obj->id]);
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
        return view('livewire.controls.model.common.colour-model');
    }
}
