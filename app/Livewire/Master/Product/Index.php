<?php

namespace App\Livewire\Master\Product;

use Aaran\Master\Models\Product;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[create]
    public function create(): void
    {
        $this->redirect(route('products.upsert', ['0']));
    }
    #endregion

    #region[list]
    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Product::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Product::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->product_type = $obj->product_type;
            $this->units = $obj->units;
            $this->gst_percent = $obj->gst_percent;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[delete]
    public function delete(): void
    {
        $obj=$this->getObj($this->vid);
        $obj->delete();
        $this->showDeleteModal = false;
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.master.product.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
