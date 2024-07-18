<?php

namespace App\Livewire\Webs\Feed;

use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Tag extends Component
{
    use CommonTrait;

    public $feed_category_id;

    public function mount($id)
    {
        $this->feed_category_id = $id;
    }

    #region[save]
    public function getSave(): void
    {
        $this->validate(['vname' => 'required']);
        if ($this->vname != '') {
            if ($this->vid == "") {
                \Aaran\Web\Models\Tag::create([
                    'feed_category_id' => $this->feed_category_id,
                    'vname' => Str::ucfirst($this->vname),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = \Aaran\Web\Models\Tag::find($this->vid);
                $obj->feed_category_id = $this->feed_category_id;
                $obj->vname = Str::ucfirst($this->vname);
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = \Aaran\Web\Models\Tag::find($id);
            $this->vid = $obj->id;
            $this->feed_category_id = $obj->feed_category_id;
            $this->vname = $obj->vname;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return \Aaran\Web\Models\Tag::search($this->searches)
            ->where('feed_category_id','=',$this->feed_category_id)
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
        return view('livewire.webs.feed.tag')->with([
            "list" => $this->getList()
        ]);
    }
}
