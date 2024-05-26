<?php

namespace App\Livewire\Erp\Production\Jobcard;

use Aaran\Erp\Models\Production\Jobcard;
use App\Livewire\Trait\EntriesIndexAbstract;
use Illuminate\Support\Facades\DB;

class Index  extends EntriesIndexAbstract
{

    #region[create]
    public function create(): void
    {
        $this->redirect(route('jobcards.upsert', ['0']));
    }
    #endregion

    #region[List]

    public function getList()
    {
        return Jobcard::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Delete]
    public function set_delete($id)
    {
        $obj=$this->getObj($id);
        DB::table('jobcard_items')->where('jobcard_id', '=', $this->vid)->delete();
        $obj->delete();

    }
    #endregion

    #region[get Obj]

    private function getObj($id)
    {
        if ($id) {
        $obj = Jobcard::find($id);
        $this->vid = $obj->id;
        $this->vno = $obj->vno;
        $this->vdate = $obj->vdate;
        $this->order_id = $obj->order_id;
        $this->order_no = $obj->order->vname;
        $this->style_id = $obj->style_id;
        $this->style_name = $obj->style->vname;
        $this->total_qty = $obj->total_qty;

        return $obj;
        }
        return null;
    }
    #endregion

    #region[Render]
    public function render()
    {
        return view('livewire.erp.production.jobcard.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
