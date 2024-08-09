<?php

namespace App\Livewire\ShareMarket;

use Aaran\ShareMarket\Models\Stock;
use Aaran\Web\Models\FeedCategory;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    #region[properties]
    public $symbol;
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

    #region[save]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required|unique:stocks,vname']);
                Stock::create([
                    'vname' => Str::ucfirst($this->vname),
                    'symbol' => $this->symbol,
                    'category_id' => $this->feed_category_id,
                    'tag_id' => $this->tag_id,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Stock::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->symbol = $this->symbol;
                $obj->category_id = $this->feed_category_id;
                $obj->tag_id = $this->tag_id;
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[mount]
    public function mount()
    {
        $this->feed_category_id=2;
        $this->feed_category_name="SharesTrade";
    }
    #region

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Stock::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->symbol = $obj->symbol;
            $this->feed_category_id = $obj->category_id;
            $this->feed_category_name =  Stock::type( $obj->category_id);
            $this->tag_id = $obj->tag_id;
            $this->tag_name=Stock::tagName($obj->tag_id);
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return Stock::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[clearFields]
    public function clearFields():void
    {
        $this->vid='';
        $this->tag_id = '';
        $this->tag_name = '';
        $this->feed_category_id=2;
        $this->feed_category_name="SharesTrade";
        $this->vname='';
        $this->symbol='';
        $this->active_id=1;

    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        $this->getCategoryList();
        $this->getTagList();
        return view('livewire.share-market.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
