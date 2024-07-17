<?php

namespace App\Livewire\Sports;

use Aaran\SportsClub\Models\SportHighlight;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Highlight extends Component
{
    use CommonTrait;
    #region[properties]
    public $url;
    public $activity_id;
    #endrregion

    #region[mount]
    public function mount($id)
    {
        $this->activity_id = $id;
    }
    #endrregion

    #region[save]
    public function getSave(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required|unique:cities,vname']);
                SportHighlight::create([
                    'activity_id' => $this->activity_id,
                    'vname' => Str::ucfirst($this->vname),
                    'url' => $this->url,
                    'active_id' => $this->active_id,
                    'sport_club_id'=>session()->get('club_id'),
                    'tenant_id'=>session()->get('tenant_id'),
                    'user_id'=>auth()->id(),
                ]);
                $message = "Saved";

            } else {
                $obj = SportHighlight::find($this->vid);
                $obj->activity_id=$this->activity_id;
                $obj->vname = Str::ucfirst($this->vname);
                $obj->url = $this->url;
                $obj->active_id = $this->active_id;
                $obj->sport_club_id = session()->get('club_id');
                $obj->tenant_id = session()->get('tenant_id');
                $obj->user_id = auth()->id();
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
            $obj = SportHighlight::find($id);
            $this->vid = $obj->id;
            $this->activity_id=$obj->activity_id;
            $this->vname = $obj->vname;
            $this->url=$obj->url;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vid='';
        $this->vname='';
        $this->url='';
        $this->active_id=1;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return SportHighlight::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('tenant_id', '=',session()->get('tenant_id'))
            ->where('sport_club_id', '=',session()->get('club_id'))
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
        return view('livewire.sports.highlight')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
