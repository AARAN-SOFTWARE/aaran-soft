<?php

namespace App\Livewire\Audit\SalesTrack\Rootline;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\RootlineItems;
use Aaran\Audit\Models\SalesTrack\TrackItems;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Items extends Component
{
    #region[property]

    use CommonTrait;

    public mixed $serial;
    public string $rootline_id = '';
    public string $client_id = '';

    public mixed $clients;
    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->clients = Client::where('active_id', '=', '1')->get();
        $this->rootline_id = $id;
    }
    #endregion

    #region[save]
    public function getSave(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                RootlineItems::create([
                    'serial' => $this->serial,
                    'rootline_id' => $this->rootline_id,
                    'client_id' => $this->client_id,
                    'active_id' => $this->active_id ?: '0',
                    'user_id' => auth()->id(),
                ]);

            } else {
                $obj = RootlineItems::find($this->vid);
                $obj->serial = $this->serial;
                $obj->rootline_id = $this->rootline_id;
                $obj->client_id = $this->client_id;
                $obj->active_id = $this->active_id;
                $obj->user_id = auth()->id();
                $obj->save();
            }
            $this->clearFields();
        }
    }
    #endregion

    #region[getObj]
    public function clearFields(): void
    {
        $this->serial = '';
        $this->client_id = '';
        $this->vid = '';
        $this->vname = '';
        $this->active_id = '1';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = RootlineItems::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->rootline_id = $obj->rootline_id;
            $this->client_id = $obj->client_id;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[getList]
    public function getList()
    {
        return RootlineItems::search($this->searches)
            ->where('rootline_id', '=', $this->rootline_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy('serial', $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.audit.sales-track.rootline.items')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
