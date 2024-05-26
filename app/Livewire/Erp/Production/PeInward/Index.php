<?php

namespace App\Livewire\Erp\Production\PeInward;

use Aaran\Erp\Models\Production\PeInward;
use App\Livewire\Trait\EntriesIndexAbstract;
use Illuminate\Support\Facades\DB;

class Index  extends EntriesIndexAbstract
{
    #region[create]
    public function create(): void
    {
        $this->redirect(route('peinwards.upsert', ['0']));
    }
    #endregion

    #region[List]
    public function getList()
    {
        return PeInward::search($this->searches)
            ->select('orders.vname as order_name',
                'styles.vname as style_name',
                'jobcards.vno as jobcard_no',
                'contacts.vname as contact_name',
                'pe_inwards.*'
            )
            ->join('contacts', 'contacts.id', '=', 'pe_inwards.contact_id')
            ->join('jobcards', 'jobcards.id', '=', 'pe_inwards.jobcard_id')
            ->join('orders', 'orders.id', '=', 'jobcards.order_id')
            ->join('styles', 'styles.id', '=', 'jobcards.style_id')
            ->where('pe_inwards.active_id', '=', $this->activeRecord)
            ->where('pe_inwards.company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Delete]
    public function set_delete($id): void
    {
        $obj=$this->getObj($id);
        DB::table('pe_inward_items')->where('pe_inward_id', '=', $this->vid)->delete();
        $obj->delete();
    }
    #endregion

    #region[get Obj]
    private function getObj($id)
    {
        if ($id) {
            $obj = PeInward::find($id);
            $this->vid = $obj->id;
            $this->vno = $obj->vno;
            $this->vdate = $obj->vdate;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->order_no = $obj->jobcard->order->vname;
            $this->jobcard_id = $obj->jobcard_id;
            $this->jobcard_no = $obj->jobcard->vno;
            $this->contact_dc = $obj->contact_dc;
            $this->dc_date = $obj->dc_date;
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
        return view('livewire.erp.production.pe-inward.index')->with([
            'list' => $this->getList()
        ]);
    }
#endregion
}
