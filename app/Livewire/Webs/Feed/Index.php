<?php

namespace App\Livewire\Webs\Feed;

use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Aaran\Web\Models\Feed;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;


class Index extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public $users;
    public $description;
    public $image;
    public $old_image;
    public $bookmark = '';
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

    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    Feed::create([
                        'vname' => $this->vname,
                        'description' => $this->description,
                        'image' => $this->save_image(),
                        'bookmark'=> $this->bookmark,
                        'user_id' => auth()->id(),
                        'active_id' => $this->active_id
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = Feed::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->description = $this->description;
                    $obj->bookmark = $this->bookmark;
                    if ($obj->image != $this->image ){
                        $obj->image = $this->save_image();
                    } else {
                        $obj->image = $this->image;
                    }
                    $obj->save();
                    $message = 'Updated';
                }
                $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
                $this->clearFields();
                $this->render();
            }
        }
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->description = '';
        $this->image = '';
        $this->bookmark = '';
        $this->isUploaded=false;
        $this->active_id = 1;
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if($id){
        $obj = Feed::find($id);
        $this->vid = $obj->vid;
        $this->vname = $obj->vname;
        $this->description = $obj->description;
        $this->image = $obj->image;
        $this->old_image = $obj->old_image;
        $this->bookmark = $obj->bookmark;
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
            return $this->image->storeAs('feedImage', $image_name,'public');
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

    #region[getList]
    public function getList()
    {
        return Feed::search($this->searches)
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
        return view('livewire.webs.feed.index')->with([
            "list" => $this->getList()
        ]);
    }
    #endregion
}
