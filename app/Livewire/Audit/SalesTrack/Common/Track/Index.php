<?php

namespace App\Livewire\Audit\SalesTrack\Common\Track;

use Aaran\Audit\Models\SalesTrack\Track;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[save]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Track::create([
                    'vname' => Str::ucfirst($this->vname),
                    'active_id' => $this->active_id,
                    'user_id' => auth()->id(),
                ]);
                $message = "Saved";

            } else {
                $obj = Track::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
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

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Track::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return Track::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.audit.sales-track.sales-track.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
