<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\DbTest;
use Aaran\Testing\Models\ModelTest;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class DatabaseSys extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $model;
    public mixed $model_id;
    public mixed $module_id;
    public mixed $module_name;
    public mixed $table_name = '';
    public mixed $description = '';
    public mixed $comment = '';
    public mixed $foreign_id = '';
    public bool $checked_1 = false;
    public bool $checked_2 = false;
    public bool $checked_3 = false;
    public bool $checked_4 = false;
    public bool $checked_5 = false;

    public  mixed $users = '';

    public bool $showEditModal = false;
    public mixed $editable = true;
    public string $sortFields = 'created_at';
    #endregion


    #region[mount]
    public function mount($id)
    {
        $this->model = ModelTest::find($id);
        $this->module_id = $this->model->module_id;
        $this->model_id = $id;
        $this->module_name = ModelTest::where('module_id','=',$this->module_id)->get();
        $this->users=User::all();
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {

            if ($this->vname != '') {
                if ($this->vid == "") {
                    DbTest::create([
                        'module_id' => $this->module_id,
                        'model_id' => $this->model_id,
                        'vname' => Str::ucfirst($this->vname),
                        'table_name' => Str::lower('create_'.$this->table_name.'_table'),
                        'description' => Str::ucfirst($this->description),
                        'foreign_id' => $this->foreign_id,
                        'checked_1' => $this->checked_1,
                        'checked_2' => $this->checked_2,
                        'checked_3' => $this->checked_3,
                        'checked_4' => $this->checked_4,
                        'checked_5' => $this->checked_5,
                        'comment' => $this->comment,
                        'user_id' => Auth::user()->id,
                        'active_id' => 1,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = DbTest::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->table_name =  Str::ucfirst($this->table_name);
                    $obj->description = Str::ucfirst($this->description);
                    $obj->foreign_id = $this->foreign_id;
                    $obj->checked_1 = $this->checked_1;
                    $obj->checked_2 = $this->checked_2;
                    $obj->checked_3 = $this->checked_3;
                    $obj->checked_4 = $this->checked_4;
                    $obj->checked_5 = $this->checked_5;
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

    public function generate()
    {
        $data=DbTest::where('module_id','=',$this->module_id)->get();
        if ($data->count()==0) {
            foreach ($this->module_name as $row){
                DbTest::create([
                    'module_id' => $this->module_id,
                    'model_id' => $this->model_id,
                    'vname' => $row->vname,
                    'table_name' => Str::lower('create_'.$row->vname.'_table'),
                    'description' => '',
                    'foreign_id' => '',
                    'checked_1' => false,
                    'checked_2' => false,
                    'checked_3' => false,
                    'checked_4' => false,
                    'checked_5' => false,
                    'comment' => '',
                    'active_id' => 1,
                    'user_id' => Auth::user()->id,
                ]);
                $this->save();}
        }
    }


    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = DbTest::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->table_name = $obj->table_name;
            $this->description = $obj->description;
            $this->foreign_id = $obj->foreign_id;
            $this->checked_1 = $obj->checked_1;
            $this->checked_2 = $obj->checked_2;
            $this->checked_3 = $obj->checked_3;
            $this->checked_4 = $obj->checked_4;
            $this->checked_5 = $obj->checked_5;
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
        $this->table_name = '';
        $this->description = '';
        $this->foreign_id = '';
        $this->checked_1 = '';
        $this->checked_2 = '';
        $this->checked_3 = '';
        $this->checked_4 = '';
        $this->checked_5 = '';
        $this->comment = '';
        $this->active_id = 1;
    }
    #endregion

    #region[checked]
    public function isChecked1($id): void
    {
        $a = DbTest::find($id);
        $a->checked_1 = !$a->checked_1;
        $a->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked2($id): void
    {
        $b = DbTest::find($id);
        $b->checked_2 = !$b->checked_2;
        $b->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked3($id): void
    {
        $c = DbTest::find($id);
        $c->checked_3 = !$c->checked_3;
        $c->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked4($id): void
    {
        $c = DbTest::find($id);
        $c->checked_4 = !$c->checked_4;
        $c->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked5($id): void
    {
        $c = DbTest::find($id);
        $c->checked_5 = !$c->checked_5;
        $c->save();
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
