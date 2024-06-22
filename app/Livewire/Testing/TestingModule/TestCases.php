<?php

namespace App\Livewire\Testing\TestingModule;

use Aaran\Testing\Models\Modals;
use Aaran\Testing\Models\TestCase;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class TestCases extends Component
{
    use CommonTrait;
    use WithFileUploads;
    #region[properties]

    public mixed $modals_id;
    public mixed $users;

    public mixed $action = '';

    public mixed $type = '';
    public mixed $test_case = '';
    public mixed $test_data = '';
    public mixed $input = '';
    public mixed $expected_output = '';
    public mixed $actual_output = '';
    public mixed $browser= '';
    public mixed $comment = '';
    public mixed $status = '';

    public $image='';
    public $old_image = '';
    public $isUploaded=false;
    public $showEditModal_1=false;


    public bool $checked=false;

    public $models;
    public string $sortFields = 'created_at';


    public mixed $editable = true;
    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->modals_id = $id;
        $this->models=Modals::find($id);
        $this->users = User::all();
    }
    #endregion


    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->action != '') {
                if ($this->vid == "") {
                    TestCase::create([
                        'modals_id' => $this->modals_id,
                        'action' => $this->action,
                        'type' => $this->type,
                        'test_case' => $this->test_case,
                        'test_data' => $this->test_data,
                        'input' => $this->input,
                        'expected_output' => $this->expected_output,
                        'actual_output' => $this->actual_output,
                        'browser' => $this->browser?:'Firefox',
                        'comment' => $this->comment,
                        'status' => $this->status?:'Undefined',
                        'checked' => $this->checked?:0,
                        'image' => $this->save_image(),
                        'active_id' => 1,
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = TestCase::find($this->vid);
                    $obj->action = Str::ucfirst($this->action);
                    $obj->type = $this->type;
                    $obj->test_case = $this->test_case;
                    $obj->test_data = $this->test_data;
                    $obj->input = $this->input;
                    $obj->expected_output = $this->expected_output;
                    $obj->actual_output = $this->actual_output;
                    $obj->browser = $this->browser;
                    $obj->comment = $this->comment;
                    $obj->status = $this->status;
                    $obj->active_id = $this->active_id;
                    $obj->checked = $this->checked;
                    if ($obj->image != $this->image ){
                        $obj->image = $this->save_image();
                    } else {
                        $obj->image = $this->image;
                    }
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


    #region[clearFields]
    public function clearFields()
    {
        $this->vid = '';
        $this->action = '';
        $this->type = '';
        $this->test_case ='';
        $this->test_data = '';
        $this->input = '';
        $this->expected_output = '';
        $this->actual_output = '';
        $this->browser = '';
        $this->comment = '';
        $this->status = '';
        $this->image = '';
        $this->old_image = '';
        $this->isUploaded=false;
        $this->active_id = 1;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = TestCase::find($id);
            $this->vid = $obj->id;
            $this->action = $obj->action;
            $this->type = $obj->type;
            $this->test_case = $obj->test_case;
            $this->test_data = $obj->test_data;
            $this->input = $obj->input;
            $this->expected_output = $obj->expected_output;
            $this->actual_output = $obj->actual_output;
            $this->browser = $obj->browser;
            $this->comment = $obj->comment;
            $this->status = $obj->status;
            $this->image = $obj->image;
            $this->old_image = $obj->image;
            $this->active_id = $obj->active_id;
            $this->checked = $obj->checked;
            return $obj;
        }
        return null;
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

    public function isChecked($id): void
    {
        $todo = TestCase::find($id);
        $todo->checked = !$todo->checked;
        $todo->save();
        $this->clearFields();
        $this->dispatch('$refresh');
    }

    #region[image]
    public function save_image()
    {
        if ($this->image == '') {
            return $this->image = 'empty';
        } else {
            if ($this->old_image){
                Storage::delete('public/'.$this->old_image);
            }
            $image_name=$this->image->getClientOriginalName();
            return $this->image->storeAs('testimage', $image_name,'public');
        }
    }
    #endregion

    #region[image]
    public function updatedimage()
    {
        $this->validate([
            'image'=>'image|max:1024',
        ]);
        $this->isUploaded=true;
    }
    #endregion

    public $full_image;
    public function fullview($id)
    {
        $this->showEditModal_1=true;
        $data=TestCase::find($id);
        $this->full_image=$data->image;

    }
    #endregion

    #region[list]
    public function getList()
    {
        return TestCase::search($this->searches)
            ->where('modals_id', '=', $this->modals_id)
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
        return view('livewire.testing.testing-module.test-cases')->with([
            'list' => $this->getList()
        ]);
    }
}
