<?php

namespace App\Livewire\Sports\SportsSponsor;

use Aaran\SportsClub\Models\Sponsor;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public $logo;

    #region[save]
    public function getSave(): void
    {


        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required']);
                Sponsor::create([
                    'vname' => Str::ucfirst($this->vname),
                    'logo' => $this->logo,
                    'user_id' => auth()->id(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Sponsor::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->logo = $this->logo;
                $obj->user_id = auth()->id();
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Sponsor::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->logo = $obj->logo;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->logo = '';
        $this->active_id = 1;
    }

    #region[list]
    public function getList()
    {
        return Sponsor::search($this->searches)
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
        return view('livewire.sports.sports-sponsor.index')->with([
            "list" => $this->getList()
        ]);
    }
}
