<?php

namespace App\Livewire\Testing\TestingModule;

use Aaran\Testing\Models\Actions;
use Aaran\Testing\Models\TestFile;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Notifications\Action;
use Illuminate\Support\Str;
use Livewire\Component;

class TestAction extends Component
{
    use CommonTrait;
    public $modal_id;
    public $test_file_id;
    public $str;

    public function mount($id)
    {
        $this->modal_id = $id;
    }

    public function getSave(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
//                $this->validate(['vname' => 'required|unique:vname']);
                TestFile::create([
                    'vname' => Str::ucfirst($this->vname),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = TestFile::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->generate();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }

    public function generate()
    {
        $file_name = TestFile::all();
        foreach ($file_name as $obj) {
            $file = Actions::where('modals_id', '=', $this->modal_id)
                ->where('test_file_id', $obj->id)
                ->get();
            if ($file->count() == 0) {
                Actions::create([
                    'test_file_id' => $obj->id,
                    'modals_id' => $this->modal_id,
                    'vname'=>$obj->vname,
                    'active_id'=>'1',
                ]);
            }
        }
    }

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Actions::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion


    #region[list]
    public function getList()
    {
        return Actions::search($this->searches)
            ->where('modals_id', $this->modal_id)
            ->where('active_id', '=', $this->activeRecord)
//            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc' )
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
        return view('livewire.testing.testing-module.test-action')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
