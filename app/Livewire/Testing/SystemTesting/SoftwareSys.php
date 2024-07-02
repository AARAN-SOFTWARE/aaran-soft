<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\AdminTest;
use Aaran\Testing\Models\SwTest;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class SoftwareSys extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $admin;
    public mixed $admin_id;
    public mixed $module_id;

    public mixed $description = '';
    public bool $checked_1 = false;
    public bool $checked_2 = false;
    public bool $checked_3 = false;
    public bool $checked_4 = false;
    public mixed $comment = '';

    public  mixed $users = '';

    public bool $showEditModal = false;
    public mixed $editable = true;
    public string $sortFields = 'created_at';

    #endregion

    #region[mount]


    public function mount($id)
    {
        $this->admin = AdminTest::find($id);
        $this->module_id = $this->admin->module_id;
        $this->admin_id = $id;
        $this->users=User::all();
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    SwTest::create([
                        'module_id' => $this->module_id,
                        'admin_id' => $this->admin_id,
                        'vname' => $this->vname,
                        'description' => $this->description,
                        'checked_1' => $this->checked_1?:0,
                        'checked_2' => $this->checked_2?:0,
                        'checked_3' => $this->checked_3?:0,
                        'checked_4' => $this->checked_4?:0,
                        'comment' => $this->comment,
                        'user_id' => Auth::user()->id,
                        'active_id' => $this->active_id,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = SwTest::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->description = $this->description;
                    $obj->checked_1 = $this->checked_1;
                    $obj->checked_2 = $this->checked_2;
                    $obj->checked_3 = $this->checked_3;
                    $obj->checked_4 = $this->checked_4;
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
        $data=SwTest::where('module_id','=',$this->module_id)->get();
        if ($data->count()==0) {
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasCore',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasCommon',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasMaster',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasEntry',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasReport',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasTodoList',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasErp',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasOrder',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasStyle',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasPo',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasCreditNote',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);
            SwTest::create([
                'module_id' => $this->module_id,
                'admin_id' => $this->admin_id,
                'vname' => 'hasDebitNote',
                'description' => '',
                'checked_1' => false,
                'checked_2' => false,
                'checked_3' => false,
                'checked_4' => false,
                'comment' => '',
                'user_id' => Auth::user()->id,
                'active_id' => 1,
            ]);

            $this->save();
        }
    }


    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SwTest::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->checked_1 = $obj->checked_1;
            $this->checked_2 = $obj->checked_2;
            $this->checked_3 = $obj->checked_3;
            $this->checked_4 = $obj->checked_4;
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
        $this->comment = '';
        $this->active_id = 1;
    }
    #endregion

    #region[checked]
    public function isChecked1($id): void
    {
        $check_1 = SwTest::find($id);
        $check_1->checked_1 = !$check_1->checked_1;
        $check_1->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked2($id): void
    {
        $check_2 = SwTest::find($id);
        $check_2->checked_2 = !$check_2->checked_2;
        $check_2->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked3($id): void
    {
        $check_3 = SwTest::find($id);
        $check_3->checked_3 = !$check_3->checked_3;
        $check_3->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[checked]
    public function isChecked4($id): void
    {
        $check_4 = SwTest::find($id);
        $check_4->checked_4 = !$check_4->checked_4;
        $check_4->save();
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
        return SwTest::search($this->searches)
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
        return view('livewire.testing.system-testing.software-sys')->with([
            "list" => $this->getList()
        ]);
    }
    #endregion
}
