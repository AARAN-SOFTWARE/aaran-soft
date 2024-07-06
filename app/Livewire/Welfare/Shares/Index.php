<?php

namespace App\Livewire\Welfare\Shares;

use Aaran\Welfare\Models\Project;
use Aaran\Welfare\Models\ProjectShare;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[property]
    public $project_id;
    public $estimated;
    public $total_shares;
    public $face_value;
    public $sold_shares;
    public $current_value;
    public $period;
    public $returns_percent;
    public $dividend;
    public $entry_id;


    public $projects;


    #endregion

    #region[mount]
    public function mount()
    {
        $this->projects = Project::all();
    }
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->project_id != '') {

            if ($this->vid == "") {
                ProjectShare::create([
                    'project_id' => $this->project_id,
                    'estimated' => $this->estimated,
                    'face_value' => $this->face_value,
                    'volume' => $this->volume,
                    'current_value' => $this->current_value,
                    'margin' => $this->margin,
                    'dividend' => $this->dividend,
                    'entry_id'=>auth()->id(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = ProjectShare::find($this->vid);
                $obj->project_id = $this->project_id;
                $obj->estimated = $this->estimated;
                $obj->face_value = $this->face_value;
                $obj->volume = $this->volume;
                $obj->current_value = $this->current_value;
                $obj->margin = $this->margin;
                $obj->dividend = $this->dividend;
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
        $this->project_id = '';
        $this->estimated = '';
        $this->face_value = '';
        $this->volume = '';
        $this->current_value = '';
        $this->margin = '';
        $this->dividend = '';
        $this->active_id = 1;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ProjectShare::find($id);
            $this->vid = $obj->id;
            $this->project_id = $obj->project_id;
            $this->estimated = $obj->estimated;
            $this->face_value = $obj->face_value;
            $this->volume = $obj->volume;
            $this->current_value = $obj->current_value;
            $this->margin = $obj->margin;
            $this->dividend = $obj->dividend;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[sortFields]
    public function sortBy($field): void
    {
        if ($this->sortFields === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortFields = $field;
    }
    #endregion

    #region[list]

    public function getList()
    {
        $this->sortField = 'project_id';

        return ProjectShare::search($this->searches)
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
        return view('livewire.welfare.shares.index')->with([
            "list" => $this->getList()
        ]);
    }
}
