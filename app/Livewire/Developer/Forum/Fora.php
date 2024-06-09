<?php

namespace App\Livewire\Developer\Forum;

use Aaran\Developer\Models\UiTask;
use App\Enums\Priority;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Fora extends Component
{

    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public string $vdate;
    public string $body;
    public string $allocated;
    public string $status;
    public string $priority;
    public $verify;
    public $users;
    public $ui_pic;
    public $old_ui_pic;
    public mixed $firstFora='';
    #endregion

    #region[Mount]
    public function mount()
    {
        $this->vdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->users = User::all();
    }
    #endregion

    #region[Save]
    public function getSave()
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $obj = UiTask::create([
                    'vdate' => $this->vdate,
                    'vname' => $this->vname,
                    'body' => $this->body,
                    'allocated' => $this->allocated ?: '1',
                    'status' => $this->status ?: '1',
                    'priority' => $this->priority ?: Priority::NORMAL->value,
                    'verify' => $this->verify,
                    'user_id' => auth()->id(),
                    'active_id' => $this->active_id ? 1 : 0,
                    'ui_pic' => $this->saveImage()
                ]);
            } else {
                $obj = UiTask::find($this->vid);
                $obj->vname = $this->vname;
                $obj->body = $this->body;
                $obj->allocated = $this->allocated;
                $obj->status = $this->status;
                $obj->priority = $this->priority;
                $obj->verify = $this->verify;
                $obj->active_id = $this->active_id;
                $obj->ui_pic = $this->saveImage();

                $obj->save();
            }
            $this->clearFields();
        }
    }
    #endregion

    #region[Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = UiTask::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->body = $obj->body;
            $this->allocated = $obj->allocated;
            $this->status = $obj->status;
            $this->priority = $obj->priority;
            $this->verify = $obj->verify;
            $this->old_ui_pic = $obj->ui_pic;
            $this->active_id = $obj->active_id;
        }
    }
    #endregion

    #region[Clear-fields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vname = '';
        $this->body = '';
        $this->allocated = '';
        $this->status = '';
        $this->priority = '';
        $this->verify = '';
        $this->ui_pic = '';
        $this->old_ui_pic = '';
        $this->active_id = '1';
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->ui_pic) {

            $image = $this->ui_pic;
            $filename = $this->ui_pic->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_ui_pic))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_ui_pic));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_ui_pic) {
                return $this->old_ui_pic;
            } else {
                return 'no image';
            }
        }
    }
    #endregion

    #region[getList]
    public function getList()
    {
        $this->sortField = 'id';

        $data=UiTask::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('status', '!=', 100)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        $this->firstFora=$data[0];
        return $data;
    }
    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.developer.forum.fora')->with([
            'list' => $this->getList()
        ]);

    }
    #endregion
}
