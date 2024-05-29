<?php

namespace App\Livewire\Testing\TestingModule;


use Aaran\Testing\Models\Actions;
use Aaran\Testing\Models\TestImage;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestOperation extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public mixed $actions_id;
    public mixed $modals_id;
    public mixed $vdate = '';
    public string $body;
    public mixed $model;
    public string $assignee;
    public string $status;
    public mixed $users;
    public $verified;
    public $actions;

    public $image;
    public $images;
//    public $isUploaded = false;
    public array $photos = [];
    public array $old_photos = [];
    public mixed $editable = true;
    #endregion


    #region[Mount]
    public function mount($id,$modals_id)
    {
        $this->actions_id=$id;
        $this->modals_id=$modals_id;
        $this->users = User::all();
        $this->actions = Actions::where('active_id', '=', Active::ACTIVE)->where('modals_id','=',$modals_id)->get();
    }
    #endregion

    #region[Save]
    public function getSave()
    {

        if ($this->editable) {
            if ($this->vname) {
                if ($this->vid == "") {
                    $obj = \Aaran\Testing\Models\TestOperation::create([
                        'actions_id' => $this->actions_id,
                        'modals_id' => $this->modals_id,
                        'vdate' => $this->vdate?:Carbon::now()->format('Y-m-d'),
                        'vname' => $this->vname,
                        'body' => $this->body,
                        'assignee' => $this->assignee?:1,
                        'status' => 1,
                        'verified' => $this->verified?:1,
                        'user_id' => Auth::user()->id,
                        'active_id' => $this->active_id ? 1 : 0,
                    ]);
                    $this->save_item($obj->id, $this->photos);
                    $message = "Saved";

                } else {
                    $obj = \Aaran\Testing\Models\TestOperation::find($this->vid);
                    $obj->actions_id = $this->actions_id;
                    $obj->modals_id = $this->modals_id;
                    $obj->vdate = $this->vdate;
                    $obj->vname = $this->vname;
                    $obj->body = $this->body;
                    $obj->assignee = $this->assignee;
                    $obj->status = $this->status;
                    $obj->verified = $this->verified;
                    $obj->active_id = $this->active_id;
                    $obj->save();
                    $this->save_item($obj->id, $this->photos);
                    $message = "Updated";
                }
                $this->clearFields();
                $this->render();
            }
        }
    }
    #endregion


    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = \Aaran\Testing\Models\TestOperation::find($id);
            $this->vid = $obj->id;
            $this->actions_id = $obj->actions_id;
            $this->modals_id = $obj->modals_id;
            $this->vdate = $obj->vdate;
            $this->vname = $obj->vname;
            $this->body = $obj->body;
            $this->assignee = $obj->assignee;
            $this->status = $obj->status;
            $this->verified = $obj->verified;
            $this->active_id = $obj->active_id;
            $data = TestImage::where('operations_id', $id)->get();
            foreach ($data as $row) {
                array_push($this->old_photos, $row->image);
            }

            return $obj;
        }
        return null;
    }
    #endregion

    #region[image]
//    public function testImage(): void
//    {
//        $this->isUploaded = true;
//    }

    public function save_item($id, $images)
    {
        foreach ($images as $image) {
            TestImage::create([
                'operations_id' => $id,
                'image' => $this->save_image($image),
            ]);
        }
//            $this->isUploaded=false;
    }

    public function save_image($image)
    {
        if ($image == '') {
            return $image = 'empty';
        } else {
            $image_name = $image->getClientOriginalName();
            return $image->storeAs('photos', $image_name, 'public');
        }
    }

#endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';
        $this->vdate = \Illuminate\Support\Carbon::now()->format('Y-m-d');

        $data= TestImage::join('test_operations','test_operations.id','=','test_images.operations_id')
            ->where('active_id', '=', $this->activeRecord)
            ->where('actions_id', '=', $this->actions_id)
            ->where('modals_id', '=', $this->modals_id)
            ->where('user_id', '=', Auth::id())
            ->orWhere('assignee', '=', Auth::id())
            ->where('verified', '=',$this->verified)
            ->where('status', '!=', 100)
            ->with('user',)
            ->get();
        $this->images=$data;
        return $data->unique('vname');
    }

#endregion

    #region[Clear Field]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vname = '';
        $this->vdate = '';
        $this->body = '';
        $this->assignee = '';
        $this->verified = '';
        $this->active_id = '1';
        $this->photos = [];
        $this->old_photos = [];
//        $this->isUploaded = false;

    }
    #endregion


    #region[Render]
    public
    function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.testing.testing-module.test-operation', [
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
