<?php

namespace App\Livewire\Audit\SalesTrack\Track;

use Aaran\Audit\Models\SalesTrack\Rootline;
use Aaran\Audit\Models\SalesTrack\SalesTrack;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Index extends Component
{

    #region[property]

    use CommonTrait;

    public string $vcode = '';
    public string $vdate = '';
    public string $rootline_id = '';

    public mixed $rootlines;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->rootlines = Rootline::where('active_id', '=', 1)->get();
    }
    #endregion

    #region[getSave]
    public function getSave(): void
    {
        if ($this->rootline_id != '') {
            if ($this->vid == "") {
                SalesTrack::create([
                    'vcode' => $this->vcode,
                    'vdate' => $this->vdate,
                    'rootline_id' => $this->rootline_id,
                    'active_id' => $this->active_id,
                    'user_id' => auth()->id(),
                ]);
                $message = "Saved";

            } else {
                $obj = SalesTrack::find($this->vid);
                $obj->vcode = $this->vcode;
                $obj->vdate = $this->vdate;
                $obj->rootline_id = $this->rootline_id;
                $obj->active_id = $this->active_id;
                $obj->user_id = auth()->id();
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }

    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SalesTrack::find($id);
            $this->vid = $obj->id;
            $this->vcode = $obj->vcode;
            $this->vdate = $obj->vdate;
            $this->rootline_id = $obj->rootline_id;
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
        $this->rootline_id = '';
        $this->vcode = '';
        $this->vid = '';
        $this->active_id = true;

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
        return view('livewire.audit.sales-track.track.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
