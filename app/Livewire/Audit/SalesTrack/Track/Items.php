<?php

namespace App\Livewire\Audit\SalesTrack\Track;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\RootlineItems;
use Aaran\Audit\Models\SalesTrack\SalesTrack;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Items extends Component
{
    #region[property]
    use CommonTrait;

    public mixed $serial;
    public $vdate;
    public $rootline_id;

    public $sales_track_id;

    public mixed $client_id;
    public string $status = '';
    public mixed $sales_track;
    public mixed $clients;

    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->sales_track = SalesTrack::find($id);

        $this->clients = Client::where('active_id', '=', '1')->get();

        $this->vdate = $this->sales_track->vdate;
    }
    #endregion

    #region[save]
    public function getSave(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                SalesTrackItem::create([
                    'serial' => $this->serial,
                    'vdate' => $this->vdate,
                    'rootline_id' => $this->rootline_id,
                    'sales_track_id' => $this->sales_track_id,
                    'client_id' => $this->client_id,
                    'status' => '1',
                    'active_id' => $this->active_id ?: '0',
                ]);

            } else {
                $obj = SalesTrackItem::find($this->vid);
                $obj->serial = $this->serial;
                $obj->vdate = $this->vdate;
                $obj->rootline_id = $this->rootline_id;
                $obj->sales_track_id = $this->sales_track_id;
                $obj->client_id = $this->client_id;
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
        $this->vdate = '';
        $this->rootline_id = '';
        $this->client_id = '';
        $this->status = '';
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
            $this->vdate = $obj->vdate;
            $this->rootline_id = $obj->rootline_id;
            $this->sales_track_id = $obj->sales_track_id;
            $this->client_id = $obj->client_id;
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
        return SalesTrackItem::search($this->searches)
            ->where('sales_track_id', '=', $this->sales_track->id)
            ->orderBy('serial', $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[generate]
    public function generate()
    {
        $rootlineItems = RootlineItems::where('rootline_id', '=', $this->sales_track->rootline_id)->get();

        $data = SalesTrackItem::where('sales_track_id', '=', $this->sales_track->id)
            ->where('vdate', '=', $this->vdate)->get();

        foreach ($rootlineItems as $index => $row) {
            if ($data->count() == 0) {
                SalesTrackItem::create([
                    'serial' => $index + 1,
                    'vdate' => $this->vdate,
                    'rootline_id' => $this->sales_track->rootline_id,
                    'sales_track_id' => $this->sales_track->id,
                    'client_id' => $row->client_id,
                    'status' => '1',
                    'active_id' => Active::ACTIVE,
                    'user_id' => auth()->id()
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
        return view('livewire.audit.sales-track.track.items')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
