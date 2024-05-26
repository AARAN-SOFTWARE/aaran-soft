<?php

namespace App\Livewire\Erp\Production\Ironing;

use Aaran\Erp\Models\Production\Ironing;
use Illuminate\Support\Facades\DB;
use App\Livewire\Trait\EntriesIndexAbstract;

class Index extends EntriesIndexAbstract
{

    #region[create]
    public function create(): void
    {
        $this->redirect(route('ironings.upsert', ['0']));
    }
    #endregion

    #region[List]
    public function getList()
    {
        return Ironing::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Delete]
    public function set_delete($id)
    {
        $obj = $this->getObj($id);
        DB::table('ironing_items')->where('ironing_id', '=', $this->vid)->delete();
        $obj->delete();

    }
    #endregion

    #region[get obj]
    private function getObj($id)
    {
        if ($id) {
            $obj = Ironing::find($id);
            $this->vid = $obj->id;
            $this->vno = $obj->vno;
            $this->vdate = $obj->vdate;
            $this->iron_master = $obj->iron_master;
            $this->order_id = $obj->order_id;
            $this->order_no = $obj->order->vname;
            $this->style_id = $obj->style_id;
            $this->style_name = $obj->style->vname;
            $this->jobcard_id = $obj->jobcard_id;
            $this->total_qty = $obj->total_qty;
            $this->receiver_details = $obj->receiver_details;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[Render]
    public function render()
    {
        return view('livewire.erp.production.ironing.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion

}
