<?php

namespace App\Livewire\Erp\Fabrication\FabricLot;

use Aaran\Erp\Models\Fabrication\FabricLot;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public string $desc = '';

    #region[Save]
    public function getSave(): string
    {
        if (session()->has('company_id')) {

            if ($this->vname != '') {

                if ($this->vid == "") {
                    FabricLot::create([
                        'vname' => Str::upper($this->vname),
                        'desc' => Str::ucfirst($this->desc),
                        'active_id' => $this->active_id,
                        'company_id' => session()->get('company_id'),
                        'user_id' => Auth::id(),
                    ]);
                    $message = "Saved";

                } else {
                    $obj = FabricLot::find($this->vid);
                    $obj->vname = Str::upper($this->vname);
                    $obj->desc = Str::ucfirst($this->desc);
                    $obj->active_id = $this->active_id ?: '0';
                    $obj->company_id = session()->get('company_id');
                    $obj->user_id = Auth::id();
                    $obj->save();
                    $message = "Updated";
                }

                $this->desc = '';
                $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
            }
        }
        return '';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = FabricLot::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->desc = $obj->desc;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return FabricLot::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.erp.fabrication.fabric-lot.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
