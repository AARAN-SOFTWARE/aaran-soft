<?php

namespace App\Livewire\Audit\SalesTrack\Vehicle;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Common\Vehicle;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{

    #region[property]
    use CommonTrait;
    public $client_id;
    public $clients;
    #endregion

    #region[getSave]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Vehicle::create([
                    'client_id' => $this->client_id,
                    'vname' => Str::upper($this->vname),
                    'active_id' => $this->active_id,
                    'user_id' => auth()->id(),
                ]);
                $message = "Saved";

            } else {
                $obj = Vehicle::find($this->vid);
                $obj->client_id = $this->client_id;
                $obj->vname = Str::upper($this->vname);
                $obj->active_id = $this->active_id;
                $obj->user_id = auth()->id();
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Vehicle::find($id);
            $this->vid = $obj->id;
            $this->client_id = $obj->client_id;
            $this->vname = $obj->vname;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function clearFields()
    {
        $this->client_id = '';
        $this->vname='';
        $this->active_id='1';
    }
    #endregion

    #region[]
    public function getList()
    {
        return Vehicle::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[reRender]
    public function reRender(): void
    {
        $this->render()->render();
    }
    #endregion

    #region[]
    public function clients()
    {
        $this->clients=Client::where('active_id','=',$this->activeRecord)->get();
    }
    #endregion

    #region[render]
    public function render()
    {
        $this->clients();
        return view('livewire.audit.sales-track.vehicle.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
