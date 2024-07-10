<?php

namespace App\Livewire\Sports\Images;

use Aaran\SportsClub\Models\SportStudentPic;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentImage extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[Properties]
    public string $title = '';
    public string $desc = '';
    public $student_image = "";
    public string $old_student_image = '';

    public bool $isUploaded = false;

    public $sport_student_id;

    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id) {
            $this->sport_student_id = $id;
        }
    }
    #endregion


    #region[getSave]
    public function getSave()
    {
        if ($this->title != '') {
            if ($this->vid == "") {
                $obj = SportStudentPic:: create([
                    'title' => $this->title,
                    'desc' => $this->desc,
                    'student_image' => $this->saveImage(),
                    'sport_student_id'=> $this->sport_student_id,
                    'active_id' => $this->active_id ? 1 : 0,
                    'user_id' => auth()->id()
                ]);
            } else {
                $obj = SportStudentPic::find($this->vid);
                $obj->title = $this->title;
                $obj->desc = $this->desc;
                $obj->student_image = $this->saveImage();
                $obj->sport_student_id = $this->sport_student_id;
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
            $obj = SportStudentPic::find($id);
            $this->vid = $obj->id;
            $this->title = $obj->title;
            $this->desc = $obj->desc;
            $this->old_student_image = $obj->student_image;
            $this->sport_student_id = $obj->sport_student_id;
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
        $this->student_image = '';
        $this->old_student_image = '';
        $this->active_id = Active::ACTIVE->value;
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->student_image) {

            $image = $this->student_image;
            $filename = $this->student_image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_student_image))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_student_image));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_student_image) {
                return $this->old_student_image;
            } else {
                return 'no_image';
            }
        }
    }

    public function updatedphoto()
    {
        $this->validate([
            'student_image' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField = 'id';
        return SportStudentPic::search($this->searches)
            ->where('sport_student_id', '=', $this->sport_student_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    public function render()
    {
        return view('livewire.sports.image.student-image')->with([
            'list' => $this->getList(),
        ]);
    }
}
