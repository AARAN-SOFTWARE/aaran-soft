<?php

namespace App\Livewire\Magalir\MgClub;

use Aaran\Finance\Models\MgClub;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[properties]
    public string $vno = '';
    public string $desc = '';
    #endregion

    #region[Clear]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vno = '';
        $this->vname = '';
        $this->desc = '';
        $this->active_id = '1';
        $this->searches = '';
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->vno != '') {
            if ($this->vid == "") {

                MgClub::create([
                    'vno' => Str::upper($this->vno),
                    'vname' => Str::upper($this->vname),
                    'desc' => Str::ucfirst($this->desc),
                    'active_id' => $this->active_id,
                    'user_id' => Auth::id(),
                ]);

                $message = "Saved";

            } else {
                $obj = MgClub::find($this->vid);
                $obj->vno = Str::upper($this->vno);
                $obj->vname = Str::upper($this->vname);
                $obj->desc = Str::ucfirst($this->desc);
                $obj->active_id = $this->active_id ?: '0';
                $obj->user_id = Auth::id();
                $obj->save();
                $message = "Updated";
            }

            $this->vno = '';
            $this->vname = '';
            $this->desc = '';
            $this->active_id = '1';
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = MgClub::find($id);
            $this->vid = $obj->id;
            $this->vno = $obj->vno;
            $this->vname = $obj->vname;
            $this->desc = $obj->desc;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return MgClub::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function render()
    {
        return view('livewire.magalir.mg-club.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
