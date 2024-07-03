<?php

namespace App\Livewire\Welfare\Segment;

use Aaran\Welfare\Models\ProjectSegment;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    #region[property]
    use CommonTrait;
    public $description;
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required|unique:project_segments,vname']);
                ProjectSegment::create([
                    'vname' => Str::ucfirst($this->vname),
                    'description' => $this->description,
                    'entry_id'=>auth()->id(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = ProjectSegment::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->description = $this->description;
                $obj->entry_id = auth()->id();
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion


    #region[clearFields]
    public function clearFields()
    {
        $this->vid='';
        $this->vname = '';
        $this->description = '';
        $this->active_id = 1;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ProjectSegment::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]

    public function getList()
    {
        return ProjectSegment::search($this->searches)
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
        return view('livewire.welfare.segment.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
