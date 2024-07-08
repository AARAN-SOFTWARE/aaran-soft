<?php

namespace App\Livewire\Webs\Feed;

use Aaran\Web\Models\Feed;
use Aaran\Web\Models\FeedReply;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Show extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public $feed_id;
    public $feed_image;
    public $old_image;
    public $users;

    public $description;
    public $image;
    public $bookmark;

    public $feed_replies;
    public $comments;
    public $isUploaded=false;
    public bool $showEditModal=false;
    public mixed $editable = true;
    public $created_at;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        $this->getData($id);
        $this->users = User::find(1);
//        $this->feed_replies = FeedReply::where('feed_id', $id)->get();
//        $this->comments = FeedReply::where('feed_id', $id)->count();

    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    FeedReply::create([
                        'feed_id' => $this->feed_id,
                        'vname' => $this->vname,
                        'image' => $this->save_image(),
                        'user_id' => auth()->id(),
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = FeedReply::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    if ($obj->feed_image != $this->feed_image ){
                        $obj->feed_image = $this->save_image();
                    } else {
                        $obj->feed_image = $this->feed_image;
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

    #region[Data]
    public function getData($id)
    {
        if ($id) {

            $obj = Feed::find($id);

            $this->feed_id = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->image = $obj->image;
            $this->bookmark = $obj->bookmark;
            $this->created_at=$obj->created_at;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = FeedReply::find($id);
            $this->vid = $obj->id;
            $this->image = $obj->image;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[image]
    public function save_image()
    {
        if ($this->feed_image == '') {
            return $this->feed_image = 'empty';
        } else {
            if ($this->old_image){
                Storage::delete('public/'.$this->old_image);
            }
            $image_name=$this->feed_image->getClientOriginalName();
            return $this->feed_image->storeAs('feedReply', $image_name,'public');
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
        return view('livewire.webs.feed.show')->with([
            "list" => $this->getList()
        ]);
    }
    #endregion
}
