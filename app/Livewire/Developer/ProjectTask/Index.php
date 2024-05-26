<?php

namespace App\Livewire\Developer\ProjectTask;

use Aaran\Developer\Models\ProjectTask;
use App\Enums\Channels;
use App\Enums\Priority;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public string $title;
    public string $body;
    public string $channel;
    public string $allocated;
    public string $priority;
    public string $status;
    public $verified;
    public $verified_on;
    public $task_pic;
    public $old_task_pic;


    public $users;
    #endregion


    #region[Mount]
    public function mount()
    {
        $this->users = User::all();
    }
    #endregion

    #region[save]
    public function getSave()
    {
        if ($this->title != '') {

            if ($this->vid === "") {
                $obj = ProjectTask::create([
                    'title' => $this->title,
                    'body' => $this->body,
                    'channel' => $this->channel ?: Channels::SOFTWARE->value,
                    'allocated' => $this->allocated ?: '1',
                    'priority' => $this->priority ?: Priority::NORMAL->value,
                    'status' => Status::NEW->value,
                    'verified' => $this->verified,
                    'verified_on' => $this->verified_on,
                    'user_id' => Auth::user()->id,
                    'active_id' => $this->active_id ? 1 : 0,
                    'task_pic' => $this->saveImage()
                ]);

                $message = "Saved";

            } else {
                $obj = ProjectTask::find($this->vid);
                $obj->title = $this->title;
                $obj->body = $this->body;
                $obj->channel = $this->channel;
                $obj->allocated = $this->allocated;
                $obj->priority = $this->priority;
                $obj->status = $this->status;
                $obj->verified = $this->verified;
                $obj->verified_on = $this->verified_on;
                $obj->active_id = $this->active_id;
                $obj->task_pic = $this->saveImage();

                $obj->save();

                $message = "Updated";
            }
            $this->clearFields();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[properties]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->title = '';
        $this->body = '';
        $this->channel = '';
        $this->allocated = '';
        $this->priority = '';
        $this->status = '';
        $this->old_task_pic = '';
        $this->task_pic = '';
        $this->verified = '';
        $this->verified_on = '';
        $this->active_id = 1;
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ProjectTask::find($id);
            $this->vid = $obj->id;
            $this->title = $obj->title;
            $this->body = $obj->body;
            $this->channel = $obj->channel;
            $this->allocated = $obj->allocated;
            $this->priority = $obj->priority;
            $this->old_task_pic = $obj->task_pic;
            $this->status = $obj->status;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            $this->active_id = $obj->active_id;
        }
        return $obj;
    }
    #endregion

    #region[image]

    public function saveImage()
    {
        if ($this->task_pic) {

            $image = $this->task_pic;
            $filename = $this->task_pic->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_task_pic))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_task_pic));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_task_pic) {
                return $this->old_task_pic;
            } else {
                return 'no image';
            }
        }
    }

#region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return ProjectTask::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('status', '!=', 100)
            ->with('user',)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

#endregion

#region[Render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.developer.project-task.index')->with([
            'list' => $this->getList()
        ]);
    }
#endregion
}
