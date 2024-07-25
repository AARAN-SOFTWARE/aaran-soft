<?php

namespace App\Livewire\Webs\Feed;

use Aaran\Web\Models\FeedCategory;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Aaran\Web\Models\Feed;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
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
    public $categories;

    public $profile;
    public $user_id;
    public $isUploaded=false;
    public bool $showEditModal=false;
    public mixed $editable = true;
    #endregion

    #region[Category]
    public $feed_category_id;
    public $feed_category_name;
    public Collection $feed_category_collection;
    public $highlight_feed_category;
    public $feed_category_typed;

    public function decrementCategory(): void
    {
        if ($this->highlight_feed_category === 0) {
            $this->highlight_feed_category = count($this->feed_category_collection) - 1;
            return;
        }
        $this->highlight_feed_category--;
    }

    public function incrementCategory(): void
    {
        if ($this->highlight_feed_category === count($this->feed_category_collection) - 1) {
            $this->highlight_feed_category = 0;
            return;
        }
        $this->highlight_feed_category++;
    }

    public function setCategory($name, $id): void
    {
        $this->feed_category_name = $name;
        $this->feed_category_id = $id;
        $this->getCategoryList();
    }

    public function enterCategory(): void
    {
        $obj = $this->feed_category_collection[$this->highlight_feed_category] ?? null;

        $this->feed_category_name = '';
        $this->feed_category_collection = Collection::empty();
        $this->highlight_feed_category = 0;

        $this->feed_category_name = $obj['vname'] ?? '';;
        $this->feed_category_id = $obj['id'] ?? '';;
    }

    #[On('refresh-city')]
    public function refreshCategory($v): void
    {
        $this->feed_category_id = $v['id'];
        $this->feed_category_name = $v['name'];
        $this->feed_category_typed = false;

    }
    public function categorySave($name)
    {
        $obj= FeedCategory::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshCategory($v);
    }

    public function getCategoryList(): void
    {
        $this->feed_category_collection = $this->feed_category_name ? FeedCategory::search(trim($this->feed_category_name))->get() : FeedCategory::all();
    }
    #endregion


    #region[tag]
    public $tag_id = '';
    public $tag_name = '';
    public Collection $tagCollection;
    public $highlightTag = 0;
    public $tagTyped = false;

    public function decrementTagy(): void
    {
        if ($this->highlightTag === 0) {
            $this->highlightTag = count($this->tagCollection) - 1;
            return;
        }
        $this->highlightTag--;
    }

    public function incrementTag(): void
    {
        if ($this->highlightTag === count($this->tagCollection) - 1) {
            $this->highlightTag = 0;
            return;
        }
        $this->highlightTag++;
    }

    public function setTag($name, $id): void
    {
        $this->tag_name = $name;
        $this->tag_id = $id;
        $this->getTagList();
    }

    public function enterTag(): void
    {
        $obj = $this->tagCollection[$this->highlightTag] ?? null;

        $this->tag_name = '';
        $this->tagCollection = Collection::empty();
        $this->highlightTag = 0;

        $this->tag_name = $obj['vname'] ?? '';;
        $this->tag_id = $obj['id'] ?? '';;
    }

    #[On('refresh-city')]
    public function refreshTag($v): void
    {
        $this->tag_id = $v['id'];
        $this->tag_name = $v['name'];
        $this->tagTyped = false;

    }
    public function tagSave($name)
    {
        $obj= \Aaran\Web\Models\Tag::create([
            'feed_category_id'=>$this->feed_category_id,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshTag($v);
    }

    public function getTagList(): void
    {
        $this->tagCollection = $this->tag_name ? \Aaran\Web\Models\Tag::search(trim($this->tag_name))->where('feed_category_id','=',$this->feed_category_id)->get() : \Aaran\Web\Models\Tag::where('feed_category_id','=',$this->feed_category_id)->get();
    }
    #endregion

    #region[mount]
    public function mount($category_id=null,$tag_id=null)
    {
        $this->users = User::all();
        $this->categories = FeedCategory::all();
        if ($category_id||$tag_id) {
            $this->categoryFilter=$category_id;
           return array_push($this->tagFilter, $tag_id);
        }else{
            $this->categoryFilter="";
            $this->tagFilter=[];
        }

    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        $this->validate(['vname' => 'required']);
        $this->validate(['image' => 'required']);
        $this->validate(['feed_category_id' => 'required']);
        $this->validate(['tag_id' => 'required']);
        if ($this->editable) {
            if ($this->vname != '') {
                if ($this->vid == "") {
                    Feed::create([
                        'vname' => $this->vname,
                        'feed_category_id' => $this->feed_category_id?:4,
                        'tag_id' => $this->tag_id,
                        'description' => $this->description,
                        'image' => $this->save_image(),
                        'user_id' => auth()->id(),
                        'active_id' => $this->active_id
                    ]);
                    $message = 'Saved';
                }
                else {
                    $obj = Feed::find($this->vid);
                    $obj->vname = Str::ucfirst($this->vname);
                    $obj->feed_category_id = $this->feed_category_id;
                    $obj->tag_id = $this->tag_id;
                    $obj->description = Str::ucfirst($this->description);
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



    #region[getObj]
    public function getObj($id)
    {
        if($id){
        $obj = Feed::find($id);
        $this->vid = $obj->id;
        $this->vname = $obj->vname;
        $this->feed_category_id = $obj->feed_category_id;
        $this->feed_category_name =  Feed::type( $obj->feed_category_id);
        $this->tag_id = $obj->tag_id;
        $this->tag_name=Feed::tagName($obj->tag_id);
        $this->description = $obj->description;
        $this->image = $obj->image;
        $this->old_image = $obj->old_image;
        $this->active_id = $obj->active_id;
        return $obj;
        }
        return null;
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->feed_category_id = '';
        $this->feed_category_name = '';
        $this->tag_id = '';
        $this->tag_name = '';
        $this->description = '';
        $this->image = '';
        $this->isUploaded=false;
        $this->active_id = 1;
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
                return $query->where('feed_category_id',$categoryFilter);
            })
            ->when($this->tagFilter,function ($query,$tagFilter){
                return $query->whereIn('tag_id',$tagFilter);
            })
//            ->where('user_id', '=', $this->userFilter?:auth()->id())
            ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
            ->paginate($this->perPage);
    }
    #endregion

//
//    #region[filterUser]
//    public $userFilter;
//    public function filterUser($id)
//    {
//        $this->userFilter=$id;
//    }
//    #endregion

    #region[filterUser]
    public  $categoryFilter='';
    public array $tagFilter=[];
    public $tags;

    public function categoryType($id)
    {
        $this->tagCollection($id);
        return $this->categoryFilter=$id;
    }

    public function clearCategory()
    {
        $this->tagFilter=[];
        $this->categoryFilter='';
    }


    public function tagCollection($id)
    {
        $this->tags=\Aaran\Web\Models\Tag::where('feed_category_id',$id)->get();
    }

    public function filterType($id)
    {
        if (!in_array($id,$this->tagFilter,true)) {
            return array_push($this->tagFilter, $id);
        }
    }
    #endregion
    public function clearFilter()
    {
        $this->tagFilter=[];
    }

    public function removeFilter($id)
    {
        unset($this->tagFilter[$id]);
    }


    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        $this->getCategoryList();
        $this->getTagList();

        if (auth()->id()) {
            return view('livewire.webs.feed.index')->with([
                "list" => $this->getList()
            ]);
        }else{
            return view('livewire.webs.feed.index')->layout('layouts.web')->with([
                "list" => $this->getList()
            ]);
        }
    }
    #endregion
}
