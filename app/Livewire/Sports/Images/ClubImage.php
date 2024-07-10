<?php

namespace App\Livewire\Sports\Images;

use Aaran\SportsClub\Models\SportClubPic;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClubImage extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[Properties]
    public string $title = '';
    public string $desc = '';
    public $club_image = "";
    public string $old_club_image = '';

    public bool $isUploaded = false;

    public $sport_club_id;

    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id) {
            $this->sport_club_id = $id;
        }
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->title != '') {
            if ($this->vid == "") {
                $obj = SportClubPic:: create([
                    'title' => $this->title,
                    'desc' => $this->desc,
                    'club_image' => $this->saveImage(),
                    'sport_club_id'=> $this->sport_club_id,
                    'active_id' => $this->active_id ? 1 : 0,
                    'user_id' => auth()->id()
                ]);
            } else {
                $obj = SportClubPic::find($this->vid);
                $obj->title = $this->title;
                $obj->desc = $this->desc;
                $obj->club_image = $this->saveImage();
                $obj->sport_club_id = $this->sport_club_id;
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
            $obj = SportClubPic::find($id);
            $this->vid = $obj->id;
            $this->title = $obj->title;
            $this->desc = $obj->desc;
            $this->old_club_image = $obj->club_image;
            $this->sport_club_id = $obj->sport_club_id;
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
        $this->club_image = '';
        $this->old_club_image = '';
        $this->active_id = Active::ACTIVE->value;
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->club_image) {

            $image = $this->club_image;
            $filename = $this->club_image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_club_image))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_club_image));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_club_image) {
                return $this->old_club_image;
            } else {
                return 'no_image';
            }
        }
    }

    public function updatedphoto()
    {
        $this->validate([
            'club_image' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField = 'id';
        return SportClubPic::search($this->searches)
            ->where('sport_club_id', '=', $this->sport_club_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.image.club-image')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
