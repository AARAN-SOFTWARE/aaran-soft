<?php

namespace App\Livewire\Testing\TestingModule;

use Aaran\Testing\Models\Header;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[save]
    public function getSave(): void
    {


        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required']);
                Header::create([
                    'vname' => Str::ucfirst($this->vname),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Header::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Header::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return Header::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        sleep(0.5);
        return view('livewire.testing.testing-module.index',[
            'list' => $this->getList()
        ]);
    }
    #endregion
}
