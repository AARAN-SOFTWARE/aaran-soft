<?php

namespace App\Livewire\Testing\TestingModule;

use Aaran\Testing\Models\TestImage;
use Aaran\Testing\Models\TestOperation;
use Aaran\Testing\Models\TestReview;
use App\Enums\Active;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestReply extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public string $actions_id;
    public string $body;
    public string $reply;
    public string $username;
    public $updated_at;
    public $showEditModal_1=false;
    public string $assignee;
    public string $status;
    public string $changeStatus = '';
    public int $actives;
    public $operations_id;

    public TestOperation $editing;
    public $tags;
    public $users;
    public $replies;
    public $reply_id;
    public $commentsCount;
    public $verified;
    public $images;
    public $route;
    #endregion

    #region[Mount]
    public function mount($id): void
    {
        $this->route = url()->previous();
        $this->getData($id);
        $this->replies = TestReview::where('operations_id', $id)->get();
        $this->commentsCount = TestReview::where('operations_id', $id)->count();
        $this->images = TestImage::where('operations_id','=', $id)->get();
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {

        $this->validate([
            'reply' => 'required',
        ]);
        if ($this->reply) {
            if ($this->vid == "") {

                TestReview::create([
                    'operations_id' => $this->operations_id,
                    'vname' => $this->reply,
                    'verified' => $this->verified,
                    'user_id' => Auth::user()->id,
                ]);
            } else {
                $obj = TestReview::find($this->vid);
                $obj->vname = $this->reply;
                $obj->user_id = Auth::user()->id;
                if ($obj->user_id == auth()->id()) {
                    $obj->save();
                }
            }
        }
        redirect()->to(route('operation.reply', [$this->operations_id]));
        $this->clearFields();
        return '';
    }
    #endregion

    #region[delete]
    public function delete(): void
    {
        if ($this->vid) {
            $obj = $this->getObj($this->vid);
            $obj->delete();
            $this->showDeleteModal = false;
            $this->clearFields();
            redirect()->to(route('operation.reply', [$this->operations_id]));
        }
    }
    #endregion

    #region[get Obj]
    public function getData($id)
    {
        if ($id) {

            $obj = TestOperation::find($id);

            $this->operations_id = $obj->id;
            $this->actions_id = $obj->actions_id;
            $this->vname = $obj->vname;
            $this->body = $obj->body;
            $this->assignee = $obj->assignee;
            $this->verified = $obj->verified;
            $this->updated_at = $obj->updated_at;
            $this->status = $obj->status;
            $this->username = $obj->user->name;
            $this->actives = $obj->actives ? 0 : 1;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[get obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = TestReview::find($id);
            $this->vid = $obj->id;
            $this->reply_id = $obj->id;
            $this->reply = $obj->vname;
        }
        return $obj;
    }
    #endregion

    public function clearFields():void
    {
        $this->vid = '';
        $this->vname='';
        $this->reply='';
    }

    #region[Update]
    public function updateStatus(): void
    {
        $this->validate(['changeStatus' => 'required']);
        $obj = TestOperation::find($this->operations_id);
        $obj->status = $this->changeStatus;
        $obj->save();
        redirect()->to(route('operation.reply', [$this->operations_id]));
    }
    #endregion

    #region[Sundar]
    public function adminCloseTask(): void
    {
        $obj = TestOperation::find($this->operations_id);
        $obj->status = Status::ADMINCLOSED->value;
        $obj->active_id = Active::NOTACTIVE->value;
        $obj->save();
        redirect()->to(route('action.operation', [$this->actions_id]));
    }
    #endregion

    #region[fullview]
    public $full_image;
    public function fullview($id)
    {
        $this->showEditModal_1=true;
        $data=TestImage::find($id);
        $this->full_image=$data->image;
    }
    #endregion

//    #region[replyImage]
//    public function saveImage()
//    {
//        if ($this->image) {
//
//            $image = $this->image;
//            $filename = $this->image->getClientOriginalName();
//
//            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_image))) {
//                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_image));
//            }
//            $image->storeAs('public/images', $filename);
//            return $filename;
//
//        } else {
//            if ($this->old_image) {
//                return $this->old_image;
//            } else {
//
//                return $this->image = 'empty';
//            }
//        }
//    }
//    #endregion

    #region[Render]
    public function getRoute(): void
    {
        $this->redirect($this->route);
    }

    public function render()
    {
        return view('livewire.testing.testing-module.test-reply');
    }
    #endregion
}

