<?php

namespace App\Livewire\Developer\TaskReview;

use Aaran\Developer\Models\TaskReview;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    Use CommonTrait;

    public $assign_to;
    public $status;
    public $users;
    public $user_id;


    #region[Mount]
    public function mount()
    {
        $this->users = User::all();
    }
    #endregion

    #region[save]
    public function getSave(): string
     {
         if ($this->vname != '') {
             if ($this->vid == "") {
                 TaskReview::create([
                     'vname' => Str::upper($this->vname),
                     'assign_to' => $this->assign_to?:1,
                     'status' => Status::NEW->value,
                     'active_id' => $this->active_id,
                 ]);
                 $message = "Saved";

             } else {
                 $obj = TaskReview::find($this->vid);
                 $obj->vname = Str::upper($this->vname);
                 $obj->assign_to = $this->assign_to;
                 $obj->status =$this->status;
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
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vname = '';
        $this->assign_to = '';
        $this->status = '';
        $this->active_id = 1;
    }
    #endregion


    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = TaskReview::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->assign_to = $obj->assign_to;
            $this->status = $obj->status;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion


    #region[list]
    public function getList()
    {
        return TaskReview::search($this->searches)
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

    #region[render]
    public function render()
    {
        return view('livewire.developer.task-review.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
