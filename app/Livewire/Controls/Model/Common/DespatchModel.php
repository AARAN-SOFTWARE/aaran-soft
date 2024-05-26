<?php

namespace App\Livewire\Controls\Model\Common;

use Aaran\Common\Models\Despatch;
use Illuminate\Support\Str;
use Livewire\Component;

class DespatchModel extends Component
{

    public bool $showModel = false;

    public $vname ='';
    public $vdate='';

    public function mount($name): void
    {
        $this->vname = $name;
    }

    public function save(): void
    {
        if ($this->vname != '') {
            $obj = Despatch::create([
                'vname' => Str::upper($this->vname),
                'vdate'=>$this->vdate,
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-despatch', ['name' => $this->vname,'vdate'=>$this->vdate, 'id' => $obj->id]);
            $this->clearAll();
        }
    }

    public function clearAll(): void
    {
        $this->showModel = false;
        $this->vname = '';
        $this->vdate='';
    }
    public function render()
    {
        return view('livewire.controls.model.common.despatch-model');
    }
}
