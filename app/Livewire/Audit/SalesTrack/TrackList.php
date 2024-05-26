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

    public $vdate;
    public $track_id;

    public $tracks;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->tracks = Track::where('active_id', '=', 1)->get();
    }
    #endregion

    #region[getSave]
    public function getSave(): void
    {
        if ($this->track_id != '') {
            if ($this->vid == "") {
                SalesTrack::create([
                    'vdate' => $this->vdate,
                    'track_id' => $this->track_id,
                    'active_id' => $this->active_id,
                    'user_id' => auth()->id(),
                ]);
                $message = "Saved";

            } else {
                $obj = SalesTrack::find($this->vid);
                $obj->vdate = $this->vdate;
                $obj->track_id = $this->track_id;
                $obj->active_id = $this->active_id;
                $obj->user_id = auth()->id();
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
            $obj = SalesTrack::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->track_id = $obj->track_id;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[]
    public function clearFields()
    {
        $this->vdate = carbon::now()->format('Y-m-d');
        $this->track_id = '';
        $this->active_id=true;

    }
    #endregion

    #region[getList]
    public function getList()
    {
        return SalesTrack::where('active_id', '=', $this->activeRecord)
            ->orderBy('vdate', $this->sortAsc ? 'asc' : 'desc')
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
