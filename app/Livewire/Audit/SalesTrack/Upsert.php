<?php

namespace App\Livewire\Audit\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\TrackItems;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Upsert extends Component
{
    #region[property]

    use CommonTrait;

    public string $track_id = '';
    public string $client_id = '';
    public mixed $serial;
    public mixed $clients;
    public string $status = '';
    public mixed $total_count = 0;
    public mixed $total_value = 0;
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
                    'total_count' => $this->total_count ?: '0',
                    'total_value' => $this->total_value ?: '0',
                    'status' => '1',
                    'active_id' => $this->active_id ?: '0',
                ]);

            } else {
                $obj = TrackItems::find($this->vid);
                $obj->serial = $this->serial;
                $obj->track_id = $this->track_id;
                $obj->client_id = $this->client_id;
                $obj->total_count = $this->total_count ?: '0';
                $obj->total_value = $this->total_value ?: '0';
                $obj->status = $this->status ?: 1;
                $obj->active_id = $this->active_id;
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
        $this->total_count = '';
        $this->total_value = '';
        $this->vname = '';
        $this->status = '';
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
        $this->sortField = 'serial';

        return TrackItems::search($this->searches)
            ->where('track_id', '=', $this->track_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.audit.sales-track.upsert')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
