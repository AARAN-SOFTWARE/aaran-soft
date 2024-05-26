<?php

namespace App\Livewire\Taskmanager\Task;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Task;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use App\Models\Image;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AllTask extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public string $client_id;
    public string $body;
    public mixed $cdate;
    public string $channel;
    public string $allocated;
    public string $status;

    public $tags;
    public $users;
    public $clients;
    public $commentsCount;
    public $verified;
    public $verified_on;

    public $photos = [];
    public $isUploaded = false;
    public mixed $editable = true;
    #endregion

    #region[Mount]
    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->users = User::all();
        $this->clients = Client::where('active_id', '=', Active::ACTIVE)->get();
    }
    #endregion

    #region[Save]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->vname) {
                if ($this->vid == "") {
                    $obj = Task::create([
                        'client_id' => $this->client_id,
                        'title' => $this->vname,
                        'body' => $this->body,
                        'channel' => $this->channel,
                        'allocated' => $this->allocated,
                        'status' => 1,
                        'verified' => $this->verified,
                        'verified_on' => $this->verified_on,
                        'user_id' => Auth::user()->id,
                        'active_id' => $this->active_id ? 1 : 0
                    ]);
                    $this->save_item($obj->id, $this->photos);
                    $message = "Saved";

                } else {
                    $obj = Task::find($this->vid);
                    $obj->client_id = $this->client_id;
                    $obj->title = $this->vname;
                    $obj->body = $this->body;
                    $obj->channel = $this->channel;
                    $obj->allocated = $this->allocated;
                    $obj->status = $this->status;
                    $obj->verified = $this->verified;
                    $obj->verified_on = $this->verified_on;
                    $obj->active_id = $this->active_id;
                    $obj->save();
                    $message = "Updated";
                }
                $this->clearFields();
            }
        }
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Task::find($id);
            $this->vid = $obj->id;
            $this->client_id = $obj->client_id;
            $this->vname = $obj->title;
            $this->body = $obj->body;
            $this->channel = $obj->channel;
            $this->allocated = $obj->allocated;
            $this->status = $obj->status;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            $this->image = $obj->image;
            $this->active_id = $obj->active_id;
            $data = Image::where('task_id', $id)->get();
            foreach ($data as $row) {
                array_push($this->photos, $row->image);
            }
            return $obj;
        }
        return null;
    }
    #endregion

    #region[Image]
    public function taskImage(): void
    {
        $this->isUploaded = true;
    }

    public function save_item($id, $images)
    {
        foreach ($images as $image) {
            Image::create([
                'task_id' => $id,
                'image' => $this->save_image($image),
            ]);
        }
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

        return Task::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('status', '!=', 100)
            ->with('user',)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    #endregion

    public function clearFields(): void
    {
        $this->client_id = '';
        $this->vname = '';
        $this->body = '';
        $this->channel = '';
        $this->allocated = '';
        $this->verified = '';
        $this->verified_on = '';
        $this->status = '';
        $this->photos = [];
        $this->isUploaded = false;
    }
    #region[Render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.taskmanager.task.all-task', [
            'list' => $this->getList()
        ]);
    }
    #endregion
}
