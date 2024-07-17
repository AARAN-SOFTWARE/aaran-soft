<?php

namespace App\Livewire\Sports;

use Aaran\SportsClub\Models\News;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class SportNews extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[Properties]
    public $headline;
    public $subject;
    public $credits;
    public $image;
    public $old_image;
    public $image_desc;
    public $content;

    public $users;
    public $isUploaded=false;
    public bool $showEditModal=false;
    public mixed $editable = true;

    #endregion

    #region[mount]
    public function mount()
    {
        $this->users = User::all();
    }
    #endregion

    #region[save]
    public function getSave(): void
    {
        $this->validate(['headline' => 'required']);
        $this->validate(['subject' => 'required']);
        $this->validate(['content' => 'required']);
        if ($this->headline != '') {
            if ($this->vid == "") {
                News::create([
                    'headline' => Str::upper($this->headline),
                    'subject' => Str::ucfirst($this->subject),
                    'credits' => Str::upper($this->credits),
                    'image' => $this->save_image(),
                    'image_desc' => Str::ucfirst($this->image_desc),
                    'content' => Str::ucfirst($this->content),
                    'user_id' => auth()->id(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = News::find($this->vid);
                $obj->headline = Str::upper($this->headline);
                $obj->subject = Str::ucfirst($this->subject);
                $obj->credits = Str::ucfirst($this->credits);
                if ($obj->image != $this->image ){
                    $obj->image = $this->save_image();
                } else {
                    $obj->image = $this->image;
                }
                $obj->image_desc = Str::ucfirst($this->image_desc);
                $obj->content = Str::ucfirst($this->content);
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
            $this->clearFields();
            $this->render();
        }
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vid = '';
        $this->headline = '';
        $this->subject = '';
        $this->credits = '';
        $this->image = '';
        $this->old_image = '';
        $this->image_desc = '';
        $this->content = '';
        $this->isUploaded=false;
        $this->active_id = 1;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = News::find($id);
            $this->vid = $obj->id;
            $this->headline = $obj->headline;
            $this->subject = $obj->subject;
            $this->credits = $obj->credits;
            $this->image = $obj->image;
            $this->old_image = $obj->old_image;
            $this->image_desc = $obj->image_desc;
            $this->content = $obj->content;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

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
            return $this->image->storeAs('photos', $image_name,'public');
        }
    }
    #endregion

    #region[image]
    public function updatedimage()
    {
        $this->validate([
            'image'=>'image|max:2048',
        ]);
        $this->isUploaded=true;
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField = 'headline';

        return News::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
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
        return view('livewire.sports.sport-news')->with([
            "list" => $this->getList()
        ]);
    }
}
