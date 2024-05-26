<?php

namespace App\Livewire\Audit\SalesTrack\Common\Track;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\TrackItems;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Items extends Component
{
    #region[property]

    use CommonTrait;

    public mixed $serial;
    public string $track_id = '';
    public string $client_id = '';

    public mixed $clients;
    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->clients = Client::where('active_id', '=', '1')->get();
        $this->track_id = $id;
    }
    #endregion

    #region[save]
    public function getSave(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                TrackItems::create([
                    'serial' => $this->serial,
                    'track_id' => $this->track_id,
                    'client_id' => $this->client_id,
                    'active_id' => $this->active_id ?: '0',
                    'user_id' => auth()->id(),
                ]);

            } else {
                $obj = TrackItems::find($this->vid);
                $obj->serial = $this->serial;
                $obj->track_id = $this->track_id;
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
            $obj = TrackItems::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->track_id = $obj->track_id;
            $this->client_id = $obj->client_id;
            $this->total_count = $obj->total_count;
            $this->total_value = $obj->total_value;
            $this->status = $obj->status;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[getList]
    public function getList()
    {
        return TrackItems::search($this->searches)
            ->where('track_id', '=', $this->track_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy('serial', $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.audit.sales-track.track.items')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
