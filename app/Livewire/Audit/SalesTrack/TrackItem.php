<?php

namespace App\Livewire\Audit\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use Aaran\Audit\Models\SalesTrack\Track;
use Aaran\Audit\Models\SalesTrack\TrackItems;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class TrackItem extends Component
{
    #region[property]
    use CommonTrait;
    public $sales_track_id;
    public $track_id;
    public $tracks;
    public $vdate;

    public mixed $client_id;
    public mixed $serial;
    public mixed $clients;
    public string $status='';
    public mixed $total_count = 0;
    public mixed $total_value = 0;

    #endregion

    #region[mount]
    public function mount($salesTrack_id, $track_id)
    {
        $this->sales_track_id = $salesTrack_id;
        $this->track_id = $track_id;
        $this->tracks=Track::find($track_id);
        $this->clients = Client::where('active_id', '=', '1')->get();
    }
    #endregion

    #region[save]
    public function getSave(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                TrackItems::create([
                    'serial'=>$this->serial,
                    'vdate'=>$this->vdate,
                    'sales_track_id' => $this->sales_track_id,
                    'client_id' => $this->client_id,
                    'total_count' => $this->total_count ?: '0',
                    'total_value' => $this->total_value ?: '0',
                    'status' => '1',
                    'track_id' => $this->track_id,
                    'active_id' => $this->active_id ?: '0',
                ]);

            } else {
                $obj = TrackItems::find($this->vid);
                $obj->serial = $this->serial;
                $obj->vdate = $this->vdate;
                $obj->sales_track_id = $this->sales_track_id;
                $obj->client_id = $this->client_id;
                $obj->total_count = $this->total_count ?: '0';
                $obj->total_value = $this->total_value ?: '0';
                $obj->status = $this->status?:1;
                $obj->track_id = $this->track_id;
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
        $this->vdate='';
        $this->vname = '';
        $this->status='';
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
            $this->vdate = $obj->vdate;
            $this->sales_track_id = $obj->sales_track_id;
            $this->client_id = $obj->client_id;
            $this->total_count = $obj->total_count;
            $this->total_value = $obj->total_value;
            $this->status = $obj->status;
            $this->track_id=$obj->track_id;
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
            ->where('vdate', '=', $this->vdate?:$this->tracks->vdate)
            ->when($this->status,function ($query,$status){
                return $query->where('status', '=', $status);
            })
            ->where('sales_track_id', '=', $this->sales_track_id)
            ->where('track_id', '=', $this->track_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[generate]
    public function generate()
    {
        $salesTrackItems=SalesTrackItem::where('sales_track_id', '=', $this->sales_track_id)->get();

        foreach ($salesTrackItems as $salesTrackItem) {

            $trackItem=TrackItems::where('track_id', '=', $this->track_id)
                     ->where('sales_track_id','=',$this->sales_track_id)
                    ->where('serial', '=', $salesTrackItem->serial)
                ->where('vdate', '=', $this->vdate)
                    ->get();

            if ($trackItem->count() == 0)
            {
                TrackItems::create([
                    'serial'=>$salesTrackItem->serial,
                    'vdate'=>$this->vdate,
                    'sales_track_id' => $salesTrackItem->sales_track_id,
                    'client_id' => $salesTrackItem->client_id,
                    'total_count' => $salesTrackItem->total_count ?: '0',
                    'total_value' => $salesTrackItem->total_value ?: '0',
                    'status' => '1',
                    'track_id' => $this->track_id,
                    'active_id' => $salesTrackItem->active_id ?: '0',
                ]);
            }
        }
    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.audit.sales-track.track-item')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
