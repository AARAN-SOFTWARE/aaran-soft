<?php

namespace App\Livewire\Controls\Model\Common;

use Aaran\Common\Models\State;
use Illuminate\Support\Str;
use Livewire\Component;

class StateModel extends Component
{
    public bool $showModel = false;

    public $vname ='';
    public $state_code='';

    public function mount($name): void
    {
        $this->vname = $name;
    }

    public function save(): void
    {
        if ($this->vname != '') {
            $obj = State::create([
                'vname' => Str::upper($this->vname),
                'state_code'=>$this->state_code,
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-state', ['name' => $this->vname,'state_code'=>$this->state_code, 'id' => $obj->id]);
            $this->clearAll();
        }
    }

    public function clearAll(): void
    {
        $this->showModel = false;
        $this->vname = '';
        $this->state_code='';
    }



    public function render()
    {
        return view('livewire.controls.model.common.state-model');
    }
}
