<?php

namespace App\Livewire\Audit\Discourse;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Discourse;
use App\Enums\Active;
use App\Enums\Priority;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
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
    public mixed $image='';
    public mixed $oldImage='';
    public string $verified='';
    public string $verified_on='';
    public mixed $editable = true;

    public $users;
    public $clients;
    public $isUploaded=false;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->vdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->users = User::all();
        $this->clients = Client::where('active_id', '=', Active::ACTIVE)->get();
    }
    #endregion

    #region[Save]
    public function getSave()
    {
        if ($this->editable) {

            if ($this->title) {

                if ($this->vid == "") {
                    Discourse::create([
                        'client_id' => $this->client_id,
                        'vdate' => $this->vdate,
                        'title' => $this->title,
                        'body' => $this->body,
                        'channel' => $this->channel,
                        'allocated' => $this->allocated ?: '1',
                        'priority' => $this->priority ?: Priority::NORMAL,
                        'status' => Status::NEW->value,
                        'user_id' => Auth::user()->id,
                        'editable' => '1',
                        'image' => $this->getImage(),
                        'verified' => $this->verified ?: '',
                        'verified_on' => $this->verified_on ?: '',
                        'active_id' => $this->active_id,
                    ]);
                } else {
                    $obj = Discourse::find($this->vid);
                    $obj->client_id = $this->client_id;
                    $obj->vdate = $this->vdate;
                    $obj->title = $this->title;
                    $obj->body = $this->body;
                    $obj->channel = $this->channel;
                    $obj->allocated = $this->allocated;
                    $obj->priority = $this->priority;
                    $obj->image = $this->getImage();
                    $obj->verified = $this->verified;
                    $obj->verified_on = $this->verified_on;
                    $obj->active_id = $this->active_id;
                    $obj->save();
                }
                $this->clearFields();
            }
        }
    }
    #endregion

    #region[clear field]
    public function clearFields()
    {
        $this->image='';
        $this->channel='';
        $this->isUploaded=false;
        $this->title='';
        $this->vdate=Carbon::now()->format('Y-m-d');
        $this->body='';
        $this->allocated='';
        $this->priority='';
        $this->oldImage='';
        $this->verified='';
        $this->verified_on='';
        $this->active_id=true;
        $this->client_id='';

    }
    #endregion

    #region[get Obj]
    public function getObj($id): void
    {
        if ($id) {
            $obj = Discourse::find($id);
            $this->vid = $obj->id;
            $this->client_id = $obj->client_id;
            $this->vdate = $obj->vdate;
            $this->title = $obj->title;
            $this->body = $obj->body;
            $this->priority = $obj->priority;
            $this->channel = $obj->channel;
            $this->allocated = $obj->allocated;
            $this->oldImage = $obj->image;
            $this->image = $obj->image;
            $this->active_id = $obj->active_id;

        }
    }

    #endregion

    #region[get list]
    public function getList()
    {
        $this->sortField = 'id';

        return Discourse::search($this->searches)
            ->where('active_id', '=', Active::ACTIVE)
            ->where('status', '!=', Status::ADMINCLOSED)
            ->with('user',)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.audit.discourse.index', [
            'list' => $this->getList()
        ]);
    }
    #endregion

    #region[get Image]

    public function getImage()
    {
        if ($this->image == '') {
            return $image = 'empty';
        } else {

            if ($this->image != $this->oldImage) {
                $image_name = $this->image->getClientOriginalName();
                return $this->image->storeAs('photos', $image_name, 'public');
            } else {
                return $this->oldImage;
            }
        }
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion
}
