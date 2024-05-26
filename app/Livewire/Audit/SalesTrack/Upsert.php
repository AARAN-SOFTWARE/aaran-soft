<?php

namespace App\Livewire\Audit\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Upsert extends Component
{
    #region[property]
    use CommonTrait;

    public mixed $sales_track_id;
    public mixed $client_id;
    public mixed $serial;
    public mixed $clients;
    public string $status='';
    public mixed $total_count = 0;
    public mixed $total_value = 0;
    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->clients = Client::where('active_id', '=', '1')->get();
        $this->sales_track_id = $id;
    }
    #endregion

    #region[save]
    public function getSave(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                SalesTrackItem::create([
                    'serial'=>$this->serial,
                    'sales_track_id' => $this->sales_track_id,
                    'client_id' => $this->client_id,
                    'total_count' => $this->total_count ?: '0',
                    'total_value' => $this->total_value ?: '0',
                    'status' => '1',
                    'active_id' => $this->active_id ?: '0',
                ]);

            } else {
                $obj = SalesTrackItem::find($this->vid);
                $obj->serial = $this->serial;
                $obj->sales_track_id = $this->sales_track_id;
                $obj->client_id = $this->client_id;
                $obj->total_count = $this->total_count ?: '0';
                $obj->total_value = $this->total_value ?: '0';
                $obj->status = $this->status?:1;
                $obj->active_id = $this->active_id;
                $obj->save();
            }
            $this->clearFields();
        }
    }
    #endregion

    #region[getObj]
    public function clearFields():void
    {
        $this->serial='';
        $this->client_id = '';
        $this->total_count = '';
        $this->total_value = '';
        $this->vname = '';
        $this->status='';
        $this->active_id = '1';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SalesTrackItem::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->sales_track_id = $obj->sales_track_id;
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

        return SalesTrackItem::search($this->searches)
            ->where('sales_track_id', '=', $this->sales_track_id)
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
