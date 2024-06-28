<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\AdminTest;
use Aaran\Testing\Models\DbTest;
use Aaran\Testing\Models\LwBladeTest;
use Aaran\Testing\Models\LwClassTest;
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
    public mixed $blade;
    public mixed $blade_id;
    public mixed $module_id;
    public mixed $menu = '';
    public bool $checked = false;
    public mixed $comment = '';

    public  mixed $users = '';

    public bool $showEditModal = false;
    public mixed $editable = true;


    public $previous;
    public $backToClass;
    public $backToMigrate;
    public $backToDB;


    #endregion

    #region[mount]


    public function mount($id)
    {
        $this->blade = LwBladeTest::find($id);
        $this->module_id = $this->blade->module_id;
        $this->previous=$this->blade->class_id;
        $this->backToClass=LwClassTest::find($this->previous)->admin_id;
        $this->backToMigrate=AdminTest::find($this->backToClass)->db_id;
        $this->backToDB=DbTest::find($this->backToMigrate)->model_id;
        $this->blade_id = $id;
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
                        'blade_id' => $this->blade_id,
                        'vname' => Str::upper($this->vname),
                        'menu' => $this->menu?:12,
                        'checked' => $this->checked?:0,
                        'comment' => Str::ucfirst($this->comment),
                        'user_id' => Auth::user()->id,
                        'active_id' => 1,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = MenuTest::find($this->vid);
                    $obj->vname = Str::upper($this->vname);
                    $obj->menu = $this->menu;
                    $obj->checked = $this->checked;
                    $obj->comment = Str::ucfirst($this->comment);
                    $obj->active_id = 1;
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
            $this->menu = $obj->menu;
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
        $this->menu = '';
        $this->checked = '';
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
