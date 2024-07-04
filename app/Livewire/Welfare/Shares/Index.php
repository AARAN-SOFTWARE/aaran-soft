<?php

namespace App\Livewire\Welfare\Shares;

use Aaran\Welfare\Models\Project;
use Aaran\Welfare\Models\ProjectShare;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    #region[property]
    use CommonTrait;

    public $projects;
    public $estimated;
    public $face_value;
    public $volume;
    public $current_value;

    public $margin;
    public $dividend;
    public $projects_id;

    public $entry_id;

    public string $sortFields = 'projects_id';
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
        if ($this->projects_id != '') {

            if ($this->vid == "") {
                ProjectShare::create([
                    'projects_id' => $this->projects_id,
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
                $obj->projects_id = $this->projects_id;
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
        $this->projects_id = '';
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
            $this->projects_id = $obj->projects_id;
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
        return ProjectShare::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortFields, $this->sortAsc ? 'asc' : 'desc')
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
