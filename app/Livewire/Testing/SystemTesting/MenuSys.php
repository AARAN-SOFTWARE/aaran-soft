<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\LwBladeTest;
use Aaran\Testing\Models\MenuTest;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class MenuSys extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $blade_id;
    public mixed $module_id;
    public mixed $description = '';
    public bool $checked = false;
    public mixed $comment = '';

    public  mixed $users = '';

    public bool $showEditModal = false;
    public mixed $editable = true;

    #endregion

    #region[mount]


    public function mount($id)
    {
        $this->blade_id = LwBladeTest::find($id);
        $this->module_id = $this->blade_id->module_id;
        $this->users=User::all();
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    MenuTest::create([
                        'module_id' => $this->module_id,
                        'vname' => $this->vname,
                        'description' => $this->description,
                        'checked' => $this->checked?:0,
                        'comment' => $this->comment,
                        'user_id' => Auth::user()->id,
                        'active_id' => $this->active_id,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = MenuTest::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->description = $this->description;
                    $obj->checked = $this->checked;
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
            $obj = MenuTest::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->checked = $obj->checked;
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
    public function isChecked($id): void
    {
        $check_1 = MenuTest::find($id);
        $check_1->checked = !$check_1->checked;
        $check_1->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion

    #region[list]
    public function getList()
    {
        return MenuTest::search($this->searches)
            ->where('module_id','=',$this->module_id)
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
        return view('livewire.testing.system-testing.menu-sys')->with([
            "list" => $this->getList()
        ]);
    }
    #endregion
}
