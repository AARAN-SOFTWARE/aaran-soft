<?php

namespace App\Livewire\Sports\Images;

use Aaran\SportsClub\Models\SportMasterPic;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MasterImage extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[Properties]
    public string $title = '';
    public string $desc = '';
    public $master_image = "";
    public string $old_master_image = '';

    public bool $isUploaded = false;

    public $sport_master_id;

    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id) {
            $this->sport_master_id = $id;
        }
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->title != '') {
            if ($this->vid == "") {
                $obj = SportMasterPic:: create([
                    'title' => $this->title,
                    'desc' => $this->desc,
                    'master_image' => $this->saveImage(),
                    'sport_master_id'=> $this->sport_master_id,
                    'active_id' => $this->active_id ? 1 : 0,
                    'user_id' => auth()->id()
                ]);
            } else {
                $obj = SportMasterPic::find($this->vid);
                $obj->title = $this->title;
                $obj->desc = $this->desc;
                $obj->master_image = $this->saveImage();
                $obj->sport_master_id = $this->sport_master_id;
                $obj->active_id = $this->active_id;
                $obj->user_id = auth()->id();

                $obj->save();
            }
            $this->clearFields();
        }
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SportMasterPic::find($id);
            $this->vid = $obj->id;
            $this->title = $obj->title;
            $this->desc = $obj->desc;
            $this->old_master_image = $obj->master_image;
            $this->sport_master_id = $obj->sport_master_id;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }

    #endregion

    #region[clear Fields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->title = '';
        $this->desc = '';
        $this->master_image = '';
        $this->old_master_image = '';
        $this->active_id = Active::ACTIVE->value;
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->master_image) {

            $image = $this->master_image;
            $filename = $this->master_image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_master_image))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_master_image));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_master_image) {
                return $this->old_master_image;
            } else {
                return 'no_image';
            }
        }
    }

    public function updatedphoto()
    {
        $this->validate([
            'master_image' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField = 'id';
        return SportMasterPic::search($this->searches)
            ->where('sport_master_id', '=', $this->sport_master_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]

    public function render()
    {
        return view('livewire.sports.image.master-image')->with([
            'list' => $this->getList(),
    ]);
    }

    #endregion
}
