<?php

namespace App\Livewire\Webs\Feed;

use Aaran\Web\Models\Feed;
use Aaran\Web\Models\FeedReply;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Show extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public $feed_id;
    public $reply;
    public $reply_image;
    public $reply_old_image;


    public $description;
    public $image;

    public $feed_category;
    public $users;
    public $user_id;
    public $isUploaded = false;
    public mixed $editable = true;
    public $created_at;
    public $tag_id;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        $this->getData($id);
        $obj = Feed::find($id)->user_id;
        $this->feed_category = Feed::find($id)->feed_category_id;
        $this->tag_id = Feed::find($id)->tag_id;
        $this->users=User::find($obj);
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        $this->validate(['reply' => 'required']);
        if ($this->editable) {
            if ($this->reply != '') {
                if ($this->vid == '') {
                    FeedReply::create([
                        'feed_id' => $this->feed_id,
                        'reply' => $this->reply,
                        'reply_image' => $this->save_image(),
                        'user_id' => auth()->id(),
                    ]);
                    $message = 'Saved';
                } else {
                    $obj = FeedReply::find($this->vid);
                    $obj->reply = $this->reply;
                    if ($this->reply_image != '') {
                        $obj->reply_image = $this->save_image();
                    } else {
                        $obj->reply_image = $this->reply_image;
                    }
                    $obj->save();
                    $message = 'Updated';
                }
                $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
                $this->clearFields();
                $this->render();
            }
        }
        return '';
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

    #region[clearFields]
    public function clearFields()
    {
        $this->vid = '';
        $this->reply = '';
        $this->reply_image = '';
        $this->reply_old_image='';
        $this->isUploaded=false;
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if($id){
            $obj = FeedReply::find($id);
            $this->vid = $obj->id;
            $this->reply = $obj->reply;
            $this->reply_old_image = $obj->reply_image;
            return $obj;
        }
        return null;
    }
    #endregion


    #region[image]
    public function save_image()
    {
        if ($this->reply_image == '') {
            return $this->reply_image = 'empty';
        } else {
            if ($this->reply_old_image){
                Storage::delete('public/'.$this->reply_old_image);
            }
            $image_name=$this->reply_image->getClientOriginalName();
            return $this->reply_image->storeAs('photos', $image_name,'public');
        }
    }
    #endregion

    #region[image]
    public function updatedimage()
    {
        $this->validate([
            'reply_image'=>'image|max:2048',
        ]);
        $this->isUploaded=true;
    }
    #endregion


    #region[getList]
    public function getList()
    {
        $this->sortField = 'created_at';
        return FeedReply::search($this->searches)
            ->where('feed_id','=',$this->feed_id)
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
