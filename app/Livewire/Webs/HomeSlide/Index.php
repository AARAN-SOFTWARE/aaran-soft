<?php

namespace App\Livewire\Webs\HomeSlide;

use Aaran\Web\Models\HomeSlide;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public string $description;
    public string $link;
    public $users;
    public $bg_image;
    public $cont_image;
    public $old_bg_image;
    public $old_cont_image;
    #endregion

    #region[Save]
    public function getSave()
    {
        $this->validate([
            'vname' => 'max:70',
            'description' => 'max:300',
        ]);
        if ($this->vname != '') {
            if ($this->vid == "") {
                $obj = HomeSlide:: create([
                    'vname' => $this->vname,
                    'description' => $this->description,
                    'link' => $this->link,
                    'user_id' => auth()->id(),
                    'active_id' => $this->active_id ? 1 : 0,
                    'bg_image' => $this->saveBg_Image(),
                    'cont_image' => $this->saveImage(),
                ]);
            } else {
                $obj = HomeSlide::find($this->vid);
                $obj->vname = $this->vname;
                $obj->description = $this->description;
                $obj->link = $this->link;
                $obj->user_id = auth()->id();
                $obj->active_id = $this->active_id;
                $obj->bg_image = $this->saveBg_Image();
                $obj->cont_image = $this->saveImage();

                $obj->save();

            }
            $this->clearFields();
        }
    }
    #endregion

    #region[Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = HomeSlide::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->link = $obj->link;
            $this->active_id = $obj->active_id;
            $this->users = $obj->users;
            $this->old_bg_image = $obj->bg_image;
            $this->old_cont_image = $obj->cont_image;
            return $obj;
        }
    }
    #endregion

    #region[clear-fields]

    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->description = '';
        $this->link = '';
        $this->active_id = '1';
        $this->bg_image = '';
        $this->cont_image = '';
        $this->old_bg_image = '';
        $this->old_cont_image = '';

    }
    #endregion

    #region[BgImage]
    public function saveBg_Image()
    {
        if ($this->bg_image) {
            $image = $this->bg_image;
            $filname = $this->bg_image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images' . $this->old_bg_image))) {
                Storage::disk('public')->delete(Storage::path('public/images' . $this->old_bg_image));
            }

            $image->StoreAs('images', $filname,'public');

            return $filname;

        } else {
            if ($this->old_bg_image) {
                return $this->old_bg_image;
            } else {
                return 'no_image';
            }
        }
    }
    #endregion

    #region[ContImage]
    public function saveImage()
    {
        if ($this->cont_image) {
            $image = $this->cont_image;
            $filname = $this->cont_image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images' . $this->old_cont_image))) {
                Storage::disk('public')->delete(Storage::path('public/images' . $this->old_cont_image));
            }

            $image->StoreAs('images', $filname,'public');

            return $filname;

        } else {
            if ($this->old_cont_image) {
                return $this->old_cont_image;
            } else {
                return 'no_image';
            }
        }
    }
    #endregion


    #region[getList]
    public function getList()
    {
        $this->sortField = 'id';

        $data = HomeSlide::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return $data;
    }
    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.webs.home-slide.index')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
