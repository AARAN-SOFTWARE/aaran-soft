<?php

namespace App\Livewire\Audit\Discourse;

use Aaran\Audit\Models\Discourse;
use Aaran\Audit\Models\DiscourseReplies;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{

    use CommonTrait;
    use WithFileUploads;

    #region[Properties]
    public string $client_id = '';
    public mixed $vdate;
    public string $title = '';
    public string $body = '';
    public string $channel = '';
    public string $allocated = '';
    public mixed $priority = '';
    public mixed $commentsCount = '';
    public mixed $image='';
    public string $verified='';
    public string $verified_on='';
    public mixed $editable = true;
    public mixed $showEditModal_1 = false;

    public $discourse_replies;
    public string $username;
    public $updated_at;
    public string $status;
    public string $changeStatus = '';
    public $discourse_id;
    public $users;
    public $replies;
    #endregion

    #region[mount]
    public function mount($id): void
    {
        $this->getObj($id);

        $this->replies = DiscourseReplies::where('discourse_id', $id)->get();

        $this->commentsCount = DiscourseReplies::where('discourse_id', $id)->count();
    }
    #endregion

    #region[getSave]
    public function getSave(): string
    {

        if ($this->discourse_replies) {
            if ($this->discourse_id) {
                DiscourseReplies::create([
                    'discourse_id' => $this->discourse_id,
                    'vname' => $this->discourse_replies,
                    'verified' => $this->verified,
                    'verified_on' => $this->verified_on,
                    'user_id' => Auth::user()->id,
                ]);

                $this->discourse_replies = '';
                $this->verified_on = '';
                $this->verified = '';
            }
        }
        redirect()->to(route('discourse.show', [$this->discourse_id]));

        return '';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {

            $obj = Discourse::find($id);
            $this->vdate = $obj->vdate;
            $this->priority = $obj->priority;
            $this->channel = $obj->channel;
            $this->image = $obj->image;
            $this->active_id = $obj->active_id;
            $this->discourse_id = $obj->id;
            $this->client_id = $obj->client_id;
            $this->title = $obj->title;
            $this->body = $obj->body;
            $this->allocated = $obj->allocated;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            $this->updated_at = $obj->updated_at;
            $this->status = $obj->status;
            $this->username = $obj->user->name;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[updateStatus]
    public function updateStatus(): void
    {
        $this->validate(['changeStatus' => 'required']);
        $obj = Discourse::find($this->discourse_id);
        $obj->status = $this->changeStatus;
        $obj->save();
        redirect()->to(route('discourse.show', [$this->discourse_id]));
    }
    #endregion

    #region[fullView]
    public function fullView(): void
    {
        $this->showEditModal_1=true;
    }
    #endregion

    #region[render]

    public function getRoute(): void
    {
        $this->redirect(route('discourse'));
    }
    public function render()
    {
        return view('livewire.audit.discourse.show');
    }
    #endregion

}
