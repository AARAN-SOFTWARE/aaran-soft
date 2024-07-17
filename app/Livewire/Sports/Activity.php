<?php

namespace App\Livewire\Sports;

use Aaran\SportsClub\Models\SportActivity;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Activity extends Component
{
    use CommonTrait;
    use WithFileUploads;
    #region[properties]
    public $image;
    public $old_image;
    #endrregion

    #region[save]
    public function getSave(): void
    {


        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required|unique:cities,vname']);
                SportActivity::create([
                    'vname' => Str::ucfirst($this->vname),
                    'image' => $this->saveImage(),
                    'active_id' => $this->active_id,
                    'sport_club_id'=>session()->get('club_id'),
                    'tenant_id'=>session()->get('tenant_id'),
                    'user_id'=>auth()->id(),
                ]);
                $message = "Saved";

            } else {
                $obj = SportActivity::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->image = $this->saveImage();
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
            $obj = SportActivity::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->old_image=$obj->image;
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
        $this->image='';
        $this->old_image='';
        $this->active_id=1;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return SportActivity::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('tenant_id', '=',session()->get('tenant_id'))
            ->where('sport_club_id', '=',session()->get('club_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->image) {

            $image = $this->image;
            $filename = $this->image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_image))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_image));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_image) {
                return $this->old_image;
            } else {
                return 'no_image';
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
        return view('livewire.sports.activity')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
