<?php

namespace App\Livewire\Developer\ReviewFileNme;

use Aaran\Developer\Models\ReviewFileName;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[save]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                ReviewFileName::create([
                    'vname' => Str::upper($this->vname),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = ReviewFileName::find($this->vid);
                $obj->vname = Str::upper($this->vname);
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #region[clearFields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vname = '';
        $this->active_id = 1;
    }
    #endregion


    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ReviewFileName::find($id);
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
        return ReviewFileName::search($this->searches)
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
    #endregion

    public function render()
    {
        return view('livewire.developer.review-file-name.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
