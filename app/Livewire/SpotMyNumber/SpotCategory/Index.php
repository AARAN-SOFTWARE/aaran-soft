<?php

namespace App\Livewire\SpotMyNumber\SpotCategory;

use Aaran\SpotMyNumber\Models\SpotCategory;
use Aaran\SpotMyNumber\Models\SpotListing;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    #region[properties]
    public $spot_customer_id;
    public array $spot_category_id;
    public $searchCategory;
    public $categoryList;
    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->spot_customer_id = $id;
    }
    #endregion

    #region[getCategory]
    public function getCategory()
    {
        if ($this->searchCategory) {
            return $this->categoryList = SpotListing::search($this->searchCategory)->get();
        }
    }
    #endregion

    #region[addCategory]
    public function addCategory($id)
    {
       return array_push($this->spot_category_id,$id);
        $this->showEditModal=true;
    }
    #endregion

    #region[removeCategory]
    public function removeCategory($id)
    {
        dd($id);
        unset($this->spot_category_id[$id]);
        $this->showEditModal=true;
    }
    #endregion

    #region[save]
    public function getSave(): void
    {


        if ($this->spot_customer_id != '') {
            if ($this->vid == "") {
                foreach ($this->spot_category_id as $id) {
                    SpotCategory::create([
                        'spot_customer_id' => $this->spot_customer_id,
                        'spot_category_id' => $id,
                        'active_id' => $this->active_id,
                    ]);
                }
                $message = "Saved";

            } else {
                $obj = SpotCategory::find($this->vid);
                $obj->spot_customer_id = $this->spot_customer_id;
                $obj->spot_category_id = $this->spot_category_id[0];
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
            $obj = SpotCategory::find($id);
            $this->vid = $obj->id;
            $this->spot_customer_id = $obj->spot_customer_id;
            array_push($this->spot_category_id,$obj->spot_category_id);
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vid='';
        $this->spot_category_id=[];
        $this->searchCategory='';
        $this->active_id=1;
        $this->categoryList='';
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField='spot_customer_id';
        return SpotCategory::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('spot_customer_id','=',$this->spot_customer_id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.spot-my-number.spot-category.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
