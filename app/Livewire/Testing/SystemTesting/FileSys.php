<?php

namespace App\Livewire\Testing\SystemTesting;

use Aaran\Testing\Models\TestFile;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class FileSys extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $module_id;
    public mixed $description = '';
    public bool $checked = false;

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
                    TestFile::create([
                        'module_id' => $this->module_id,
                        'vname' => Str::ucfirst($this->vname),
                        'description' => $this->description,
                        'checked' => $this->checked,
                        'user_id' => Auth::user()->id,
                        'active_id' => $this->active_id,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = TestFile::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->description = $this->description;
                    $obj->checked = $this->checked;
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
            $obj = TestFile::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
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
        $this->active_id = 1;
    }
    #endregion

    #region[checked]
    public function isChecked($id): void
    {
        $todo = TestFile::find($id);
        $todo->checked = !$todo->checked;
        $todo->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }
    #endregion


    #region[list]
    public function getList()
    {
        return TestFile::search($this->searches)
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
        return view('livewire.testing.system-testing.file-sys')->with([
            "list" => $this->getList()
        ]);
    }
}
