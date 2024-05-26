<?php

namespace App\Livewire\Developer\Surfing;

use Aaran\Developer\Models\SurfingCategory;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class SurfingCategoryList extends Component
{

    use CommonTrait;

    #region[save]

    public function getSave(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                SurfingCategory::create([
                    'vname' => Str::ucfirst($this->vname),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = SurfingCategory::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
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
            $obj = SurfingCategory::find($id);
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
        return SurfingCategory::search($this->searches)
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
        return view('livewire.developer.surfing.surfing-category-list')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
