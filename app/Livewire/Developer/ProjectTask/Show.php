<?php

namespace App\Livewire\Developer\ProjectTask;

use Aaran\Developer\Models\ProjectReply;
use Aaran\Developer\Models\ProjectTask;
use App\Enums\Active;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{

    use CommonTrait;

    #region[properties]
    public string $title;
    public string $body;
    public string $channel;
    public string $allocated;
    public string $priority;
    public string $status;
    public $verified;
    public $verified_on;
    public  $old_task_pic;
    public string $reply;
    public string $username;
    public $updated_at;
    public $showEditModal_1=false;
    public string $changeStatus = '';
    public int $actives;
    public $project_task_id;

    public ProjectTask $editing;
    public $tags;
    public $users;
    public $replies;
    public $commentsCount;
    #endregion

    #region[Mount]
    public function mount($id): void
    {
        $this->getObj($id);

        $this->replies = ProjectReply::where('project_task_id', $id)->get();
        $this->commentsCount = ProjectReply::where('project_task_id', $id)->count();
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->reply) {
            if ($this->project_task_id) {

                ProjectReply::create([
                    'project_task_id' => $this->project_task_id,
                    'vname' => $this->reply,
                    'verified' => $this->verified,
                    'verified_on' => $this->verified_on,
                    'user_id' => Auth::user()->id,
                ]);

                $this->reply = '';
                $this->verified_on = '';
                $this->verified = '';
            }
        }
        redirect()->to(route('project-task.show', [$this->project_task_id]));

        return '';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {

            $obj = ProjectTask::find($id);
            $this->project_task_id = $obj->id;
            $this->title = $obj->title;
            $this->body = $obj->body;
            $this->channel = $obj->channel;
            $this->allocated = $obj->allocated;
            $this->priority = $obj->priority;
            $this->old_task_pic = $obj->task_pic;
            $this->status = $obj->status;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            $this->username = $obj->user->name;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[Update]
    public function updateStatus(): void
    {
        $this->validate(['changeStatus' => 'required']);
        $obj = ProjectTask::find($this->project_task_id);
        $obj->status = $this->changeStatus;
        $obj->save();
        redirect()->to(route('project-task.show', [$this->project_task_id]));
    }
    #endregion

    #region[Admin]
    public function adminCloseTask(): void
    {
        $obj = ProjectTask::find($this->project_task_id);
        $obj->status = Status::ADMINCLOSED->value;
        $obj->active_id = Active::NOTACTIVE->value;
        $obj->save();
        redirect()->to(route('project-task'));
    }
    #endregion

    #region[fullView]
    public function fullView(): void
    {
        $this->showEditModal_1=true;
    }
    #endregion

    #region[Render]
    public function getRoute(): void
    {
        $this->redirect(route('project-task'));
    }
    public function render()
    {
        return view('livewire.developer.project-task.show');
    }
    #endregion
}
