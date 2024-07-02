<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\AdminTest;
use Aaran\Testing\Models\DbTest;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminSys extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $db;
    public mixed $table_name;
    public mixed $db_id;
    public mixed $module_id;
    public mixed $description="";
    public mixed $db_mig = "";
    public bool $checked_1 = false;
    public bool $checked_2 = false;
    public mixed $comment = '';

    public string $sortFields = 'created_at';
    public  mixed $users = '';

    public bool $showEditModal = false;
    public mixed $editable = true;
    public $previous;

    #endregion

    #region[mount]


    public function mount($id)
    {
        $this->db = DbTest::find($id);
        $this->module_id=$this->db->module_id;
        $this->previous=$this->db->model_id;
        $this->db_id = $id;
        $this->table_name = DbTest::where('module_id','=',$this->module_id)->get();
        $this->users=User::all();
        $this->active_id = true;
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                AdminTest::create([
                    'module_id' => $this->module_id,
                    'db_id' => $this->db_id,
                    'vname' => Str::lower('create_'.$this->vname.'_table'),
                    'description' => Str::ucfirst($this->description),
                    'checked_1' => $this->checked_1?:0,
                    'checked_2' => $this->checked_2?:0,
                    'db_mig' => $this->db_mig?:6,
                    'comment' => Str::ucfirst($this->comment),
                    'user_id' => Auth::user()->id,
                    'active_id' => $this->active_id,
                ]);
                $message = 'Saved';
            }
            else {
                $obj = AdminTest::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->description = Str::ucfirst($this->description);
                $obj->checked_1 = $this->checked_1;
                $obj->checked_2 = $this->checked_2;
                $obj->db_mig = $this->db_mig;
                $obj->comment = Str::ucfirst($this->comment);
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
            $this->clearFields();
            $this->render();
        }
    }
    #endregion

    public function generate()
    {
        $data=AdminTest::where('module_id','=',$this->module_id)->get();
        if ($data->count()==0) {
            foreach ($this->table_name as $row){
                AdminTest::create([
                    'module_id' => $this->module_id,
                    'db_id' => $this->db_id,
                    'vname' => Str::lower($row->table_name),
                    'db_mig' => 6,
                    'description' => '',
                    'checked_1' => false,
                    'checked_2' => false,
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
            $obj = AdminTest::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->db_mig = $obj->db_mig;
            $this->checked_1 = $obj->checked_1;
            $this->checked_2 = $obj->checked_2;
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
        $this->checked_1 = '';
        $this->checked_2 = '';
        $this->db_mig = '';
        $this->comment = '';
        $this->active_id = 1;
    }
    #endregion

    #region[checked]
    public function isChecked1($id): void
    {
        $check_1 = AdminTest::find($id);
        $check_1->checked_1 = !$check_1->checked_1;
        $check_1->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked2($id): void
    {
        $check_2 = AdminTest::find($id);
        $check_2->checked_2 = !$check_2->checked_2;
        $check_2->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked3($id): void
    {
        $check_3 = AdminTest::find($id);
        $check_3->checked_3 = !$check_3->checked_3;
        $check_3->save();
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
        $this->sortFields = $field;
    }

    #region[list]
    public function getList()
    {
        return AdminTest::search($this->searches)
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
        return view('livewire.testing.system-testing.admin-sys')->with([
            "list" => $this->getList()
        ]);
    }
    #endregion
}
