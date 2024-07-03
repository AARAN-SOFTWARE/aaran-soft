<?php

namespace App\Livewire\Welfare\Project;

use Aaran\Welfare\Models\Project;
use Aaran\Welfare\Models\ProjectProduct;
use Aaran\Welfare\Models\ProjectSegment;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    #region[property]
    use CommonTrait;
    public $description;
    public $projectSegment;
    public $project_segment_id;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->projectSegment=ProjectSegment::all();
    }
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required|unique:project_segments,vname']);
                Project::create([
                    'vname' => Str::ucfirst($this->vname),
                    'description' => $this->description,
                    'project_segment_id' => $this->project_segment_id,
                    'entry_id'=>auth()->id(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Project::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->description = $this->description;
                $obj->project_segment_id = $this->project_segment_id;
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
        $this->project_segment_id = '';
        $this->active_id = 1;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Project::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->project_segment_id = $obj->project_segment_id;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]

    public function getList()
    {
        return Project::search($this->searches)
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
        return view('livewire.welfare.project.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
