<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\ModelTest;
use Aaran\Testing\Models\TestFile;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class ModelSys extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $module_id;
    public mixed $module_name;
    public mixed $eloquent = '';
    public mixed $description = '';
    public bool $checked_1 = false;
    public bool $checked_2 = false;
    public bool $checked_3 = false;

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

    #region[generate]

    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    ModelTest::create([
                        'module_id' => $this->module_id,
                        'vname' => Str::ucfirst($this->vname),
                        'description' => Str::ucfirst($this->description),
                        'checked_1' => $this->checked_1?:0,
                        'checked_2' => $this->checked_2?:0,
                        'checked_3' => $this->checked_3?:0,
                        'eloquent' => $this->eloquent,
                        'user_id' => Auth::user()->id,
                        'active_id' => 1,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = ModelTest::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->description = Str::ucfirst($this->description);
                    $obj->checked_1 = $this->checked_1;
                    $obj->checked_2 = $this->checked_2;
                    $obj->checked_3 = $this->checked_3;
                    $obj->eloquent = $this->eloquent;
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
            $obj = ModelTest::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->checked_1 = $obj->checked_1;
            $this->checked_2 = $obj->checked_2;
            $this->checked_3 = $obj->checked_3;
            $this->eloquent = $obj->eloquent;
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
        $this->checked_1 = '';
        $this->checked_2 = '';
        $this->checked_3 = '';
        $this->eloquent = '';
        $this->active_id = 1;
    }
    #endregion

    #region[checked]
    public function isChecked1($id): void
    {
        $todo = ModelTest::find($id);
        $todo->checked_1 = !$todo->checked_1;
        $todo->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked2($id): void
    {
        $todo = ModelTest::find($id);
        $todo->checked_2 = !$todo->checked_2;
        $todo->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked3($id): void
    {
        $todo = ModelTest::find($id);
        $todo->checked_3 = !$todo->checked_3;
        $todo->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[list]
    public function getList()
    {
        return ModelTest::search($this->searches)
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
        return view('livewire.testing.system-testing.model-sys')->with([
            "list" => $this->getList()
        ]);
    }
}
