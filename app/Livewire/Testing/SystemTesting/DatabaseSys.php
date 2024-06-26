<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\DbTest;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class DatabaseSys extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $module_id;
    public mixed $description = '';
    public mixed $comment = '';
    public bool $db_check = false;
    public bool $run_mig = false;

    public  mixed $users = '';

    public bool $showEditModal = false;
    public mixed $editable = true;
    public string $sortFields = 'created_at';
    #endregion


    #region[mount]
    public function mount($id)
    {
        $this->module_id = $id;
        $this->users=User::all();
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    $this->validate(['vname' => 'required']);
                    DbTest::create([
                        'module_id' => $this->module_id,
                        'vname' => Str::ucfirst($this->vname),
                        'description' => $this->description,
                        'db_check' => $this->db_check,
                        'run_mig' => $this->run_mig,
                        'comment' => $this->comment,
                        'user_id' => Auth::user()->id,
                        'active_id' => $this->active_id,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = DbTest::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->description = $this->description;
                    $obj->db_check = $this->db_check;
                    $obj->run_mig = $this->run_mig;
                    $obj->comment = $this->comment;
                    $obj->active_id = $this->active_id;
                    $obj->save();
                    $message = "Updated";
                }
                $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
                $this->clearFields();
                $this->render();
            }
        }
    }
    #endregion


    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = DbTest::find($id);
            $this->vid = $obj->id;
            $this->module_id = $obj->module_id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->db_check = $obj->db_check;
            $this->run_mig = $obj->run_mig;
            $this->comment = $obj->comment;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion


    #region[clearFields]
    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->description = '';
        $this->db_check = '';
        $this->run_mig = '';
        $this->comment = '';
        $this->active_id = 1;
    }
    #endregion

    #region[checked]
    public function isChecked($id): void
    {
        $todo = DbTest::find($id);
        $todo->db_check = !$todo->db_check;
        $todo->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    public function sortBy($field): void
    {
        if ($this->sortFields === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    #region[checked]
    public function isCheck($id): void
    {
        $todo = DbTest::find($id);
        $todo->run_mig = !$todo->run_mig;
        $todo->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion


    #region[list]
    public function getList()
    {
        return DbTest::search($this->searches)
            ->where('module_id','=',$this->module_id)
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
        return view('livewire.testing.system-testing.database-sys')->with([
            "list" => $this->getList()
        ]);
    }
    #endregion
}
