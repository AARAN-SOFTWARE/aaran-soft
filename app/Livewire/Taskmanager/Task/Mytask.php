<?php

namespace App\Livewire\Taskmanager\Task;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Task;
use App\Enums\Active;
use App\Enums\Channels;
use App\Livewire\Trait\CommonTrait;
use App\Models\Image;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Mytask extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public string $client_id = '1';
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

    public mixed $image;
    public $isUploaded=false;
    public array $photos = [];
    #endregion

    #region[Mount]
    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->users = User::all();
        $this->clients = Client::where('active_id','=',Active::ACTIVE )->get();
    }
    #endregion

    #region[Save]
    public function getSave()
    {
        if ($this->vname) {

            if ($this->vid == "") {
               $obj = Task::create([
                    'client_id' => $this->client_id,
                    'title' => $this->vname,
                    'body' => $this->body,
                    'channel' => $this->channel ?: Channels::ALL->value,
                    'allocated' => $this->allocated,
                    'status' => 1,
                    'verified' => $this->verified,
                    'verified_on' => $this->verified_on,
                    'user_id' => Auth::user()->id,
                    'active_id' => $this->active_id ? 1 : 0
                ]);
                $this->save_item($obj->id);
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
                DB::table('images')->where('task_id', '=', $obj->id)->delete();
                $this->save_item($obj->id);
                $message = "Updated";
            }
            $this->clearFields();

            $this->client_id = '';
            $this->vname = '';
            $this->body = '';
            $this->channel = '';
            $this->allocated = '';
            $this->status = '';
            $this->verified = '';
            $this->verified_on = '';

//            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
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
            $data = Image::where('task_id','=',$id)->get();
            foreach ($data as $row){
                array_push($this->photos, $row->image);
            }
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return Task::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('user_id', '=', Auth::id())
            ->where('allocated', '=', Auth::id())
            ->where('status', '!=', 100)
            ->with('user',)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[List]
    public function clearFields(): void
    {
        $this->vname = '';
        $this->client_id = '';
        $this->body = '';
        $this->channel = '';
        $this->allocated = '';
        $this->photos = [];
        $this->isUploaded = false;
        $this->active_id = '1';

    }
    #endregion

    #region[Image]
    public function taskImage()
    {
        $this->isUploaded=true;
    }

    public function save_item($id)
    {
        foreach ($this->photos as $image) {
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
            if ($image!= \Livewire\str($image)){

        $image_name = $image->getClientOriginalName();
            return $image->storeAs('photos', $image_name,'public');
            }else{
                return $image;
            }
        }
//        return $this->image->storeAs('photos',$image_name,'public');
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
        return view('livewire.taskmanager.task.mytask', [
            'list' => $this->getList()
        ]);
    }
    #endregion
}
