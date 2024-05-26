<?php

namespace App\Livewire\Audit\SalesTrack;

use Aaran\Audit\Models\SalesTrack\SalesTrack;
use Aaran\Audit\Models\SalesTrack\Smonth;
use Aaran\Audit\Models\SalesTrack\Track;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class TrackList extends Component
{

    #region[property]
    use CommonTrait;

    public $smonths;
    public $sales_tracks;
    public $smonth_id;
    public $sales_track_id;
    public $vdate;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->smonths = Smonth::where('year', '=', Carbon::now()->format('Y'))->get();
        $this->sales_tracks = SalesTrack::where('active_id', '=', 1)->get();
    }
    #endregion

    #region[getSave]
    public function getSave(): void
    {
        if ($this->sales_track_id != '') {
            if ($this->vid == "") {
                Track::create([
                    'vdate' => $this->vdate,
                    'smonth_id' => $this->smonth_id,
                    'sales_track_id' => $this->sales_track_id,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Track::find($this->vid);
                $obj->vdate = $this->vdate;
                $obj->smonth_id = $this->smonth_id;
                $obj->sales_track_id = $this->sales_track_id;
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        }
    }

    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Track::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->smonth_id = $obj->smonth_id;
            $this->sales_track_id = $obj->sales_track_id;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[]
    public function clearFields()
    {
        $this->smonth_id = '';
        $this->sales_track_id = '';
        $this->vdate = carbon::now()->format('Y-m-d');
        $this->active_id=true;

    }
    #endregion

    #region[getList]
    public function getList()
    {
        $this->sortField='vdate';
        return Track::where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

#region[render]
    public function render()
    {
        return view('livewire.audit.sales-track.track-list')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
