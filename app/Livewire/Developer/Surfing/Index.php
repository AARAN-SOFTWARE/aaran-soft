<?php

namespace App\Livewire\Developer\Surfing;

use Aaran\Developer\Models\surfing;
use Aaran\Developer\Models\SurfingCategory;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class Index extends Component
{
    use CommonTrait;

    #region[properties]
    public $webpage;
    #endregion
    #region[save]

    public function getSave(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                surfing::create([
                    'vname' => Str::ucfirst($this->vname),
                    'webpage'=>$this->webpage,
                    'surfing_category_id'=>$this->surfing_category_id,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = surfing::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->webpage = $this->webpage;
                $obj->surfing_category_id=$this->surfing_category_id;
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->clearFields();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = surfing::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->webpage = $obj->webpage;
            $this->surfing_category_id = $obj->surfing_category_id;
            $this->surfing_category_name=$obj->sufferingCategory($obj->surfing_category_id);
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return surfing::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vname='';
        $this->webpage='';
        $this->surfing_category_id='';
        $this->active_id=true;
    }
    #endregion

    #region[surfing-category]

    public $surfing_category_name = '';
    public $surfing_category_id = '';
    public Collection $surfing_category_Collection;
    public $highlightSurfing_category = 0;
    public $surfing_category_Typed = false;

    public function decrementSurfing_category(): void
    {
        if ($this->highlightSurfing_category === 0) {
            $this->highlightSurfing_category = count($this->surfing_category_Collection) - 1;
            return;
        }
        $this->highlightSurfing_category--;
    }

    public function incrementSurfing_category(): void
    {
        if ($this->highlightSurfing_category === count($this->surfing_category_Collection) - 1) {
            $this->highlightSurfing_category = 0;
            return;
        }
        $this->highlightSurfing_category++;
    }

    public function setSurfing_category($name, $id): void
    {
        $this->surfing_category_name = $name;
        $this->surfing_category_id = $id;
        $this->getSurfing_categoryList();
    }

    public function enterSurfing_category(): void
    {
        $obj = $this->surfing_category_Collection[$this->highlightSurfing_category] ?? null;

        $this->surfing_category_name = '';
        $this->surfing_category_Collection = Collection::empty();
        $this->highlightSurfing_category = 0;

        $this->surfing_category_name = $obj['vname'] ?? '';;
        $this->surfing_category_id = $obj['id'] ?? '';;
    }

    #[On('refresh-hsncode')]
    public function refreshSurfing_category($v): void
    {
        $this->surfing_category_id = $v['id'];
        $this->surfing_category_name = $v['name'];
        $this->surfing_category_Typed = false;
    }

    public function surfing_category_Save($name):void
    {
        $obj= SurfingCategory::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshSurfing_category($v);
    }

    public function getSurfing_categoryList(): void
    {
        $this->surfing_category_Collection = $this->surfing_category_name ? SurfingCategory::search(trim($this->surfing_category_name))->get() : SurfingCategory::all();
    }
    #endregion


    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }
    public function render()
    {
        $this->getSurfing_categoryList();
        return view('livewire.developer.surfing.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
