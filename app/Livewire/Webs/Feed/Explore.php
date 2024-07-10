<?php

namespace App\Livewire\Webs\Feed;

use Aaran\Web\Models\Feed;
use Aaran\Web\Models\FeedCategory;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Explore extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public $users;
    public $description;
    public $image;
    public $old_image;
    public $categories;
    public $feed_category_id;
    public $bookmark = '';

    public $profile;
    public $user_id;
    public $isUploaded=false;
    public bool $showEditModal=false;
    public mixed $editable = true;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->users = User::all();
        $this->categories = FeedCategory::all();
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        $this->validate(['vname' => 'required']);
        $this->validate(['image' => 'required']);
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    Feed::create([
                        'vname' => $this->vname,
                        'feed_category_id' => $this->feed_category_id?:4,
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
                    $obj->feed_category_id = $this->feed_category_id;
                    $obj->description = Str::ucfirst($this->description);
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
        $this->feed_category_id = '';
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
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->feed_category_id = $obj->feed_category_id;
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
        $this->sortField = 'created_at';
        return Feed::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->categoryFilter,function ($query,$categoryFilter){
                return $query->whereIn('feed_category_id',$categoryFilter);
//                    ->where('feed_category_id', '=', $categoryFilter);
            })
//            ->where('feed_category_id', '=', $this->categoryFilter)
            ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
            ->paginate($this->perPage);
    }
    #endregion


    #region[filterUser]
    public array $categoryFilter=[];
    public function filterType($id)
    {
       return array_push($this->categoryFilter,$id);
    }
    #endregion
    public function clearFilter()
    {
        $this->categoryFilter=[];
    }

    public function removeFilter($id)
    {
        unset($this->categoryFilter[$id]);
    }


    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.webs.feed.explore')->with([
            "list" => $this->getList()
        ]);
    }
}
