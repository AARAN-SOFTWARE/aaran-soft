<?php

namespace App\Livewire\Welfare\Trade;

use Aaran\Welfare\Models\Project;
use Aaran\Welfare\Models\ProjectTrade;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    #region[property]
    use CommonTrait;

    public $user;
    public $projects;
    public $projects_id;
    public $user_id;
    public $entry_id;

    public $no_of_shares;
    public string $sortFields = 'user_id';
    #endregion

    #region[mount]
    public function mount()
    {
        $this->projects = Project::all();
        $this->user = User::all();
    }
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->user_id != '') {
            if ($this->vid == "") {
                $this->validate(['user_id' => 'required']);
                ProjectTrade::create([
                    'user_id' => $this->user_id,
                    'projects_id' => $this->projects_id,
                    'no_of_shares' => $this->no_of_shares,
                    'entry_id'=>auth()->id(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = ProjectTrade::find($this->vid);
                $obj->user_id = $this->user_id;
                $obj->projects_id = $this->projects_id;
                $obj->no_of_shares = $this->no_of_shares;
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
        $this->user_id = '';
        $this->projects_id = '';
        $this->no_of_shares = '';
        $this->active_id = 1;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ProjectTrade::find($id);
            $this->vid = $obj->id;
            $this->no_of_shares = $obj->no_of_shares;
            $this->user_id = $obj->user_id;
            $this->projects_id = $obj->projects_id;
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
        return ProjectTrade::search($this->searches)
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
        return view('livewire.welfare.trade.index')->with([
            "list" => $this->getList()
        ]);
    }
}
