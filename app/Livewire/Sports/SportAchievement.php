<?php

namespace App\Livewire\Sports;

use Aaran\SportsClub\Models\Achievements;
use Aaran\SportsClub\Models\SportClub;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class SportAchievement extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[Properties]
    public string $desc = '';
    public  $image;
    public string $old_image = '';
    public string $category = '';
    public string $date = '';
    public string $location = '';
    public bool $isUploaded = false;

    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $obj = Achievements:: create([
                    'vname' => Str::ucfirst ($this->vname),
                    'desc' => $this->desc,
                    'image' => $this->saveImage(),
                    'category' => $this->category,
                    'date' => $this->date,
                    'location' => $this->location,
                    'user_id' => \auth()->id(),
                    'sport_club_id' => session()->get('club_id'),
                    'active_id' => $this->active_id ? 1 : 0,
                    'tenant_id'=>session()->get('tenant_id'),
                ]);
            } else {
                $obj = Achievements::find($this->vid);
                $obj->vname = $this->vname;
                $obj->desc = $this->desc;
                $obj->image = $this->saveImage();
                $obj->category = $this->category;
                $obj->date = $this->date;
                $obj->location = $this->location;
                $obj->user_id = \auth()->id();
                $obj->sport_club_id =session()->get('club_id');
                $obj->active_id = $this->active_id;
                $obj->tenant_id = session()->get('tenant_id');

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
            $obj = Achievements::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->desc = $obj->desc;
            $this->old_image = $obj->image;
            $this->category = $obj->category;
            $this->date = $obj->date;
            $this->location = $obj->location;
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
        $this->vname = '';
        $this->desc = '';
        $this->image = '';
        $this->old_image = '';
        $this->category = '';
        $this->date = '';
        $this->location = '';
        $this->active_id = Active::ACTIVE->value;
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

    public function updatedphoto()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion

    #region[list]
    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $this->sortField = 'id';

        return Achievements::search($this->searches)
            ->where('sport_club_id', '=',session()->get('club_id'))
            ->where('active_id', '=', $this->activeRecord)
            ->where('tenant_id', '=', session()->get('tenant_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.sports.sport-achievement')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
