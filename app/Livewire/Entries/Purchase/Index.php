<?php

namespace App\Livewire\Entries\Purchase;

use Aaran\Entries\Models\Purchase;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Order;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[Properties]
    public $sortField_1 = 'purchase_no';
    public Collection $contacts;
    public Collection $orders;
    #endregion

    #region[Create]
    public function create(): void
    {
        $this->redirect(route('purchases.upsert', ['0']));
    }
    #endregion

    #region[List]
    public function getList()
    {
        return Purchase::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->filter, function ($query, $filter) {
                return $query->where('contact_id', $filter);
            })
            ->when($this->byOrder, function ($query, $byOrder) {
                return $query->where('order_id', $byOrder);
            })
            ->when($this->start_date, function ($query, $start_date) {
                return $query->whereDate('purchase_date', '>=', $start_date);
            })
            ->when($this->end_date, function ($query, $end_date) {
                return $query->whereDate('purchase_date', '<=', $end_date);
            })
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField_1, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Contact]
    public function getContact()
    {
        $this->contacts = Contact::where('company_id', '=', session()->get('company_id'))->get();
    }
    #endregion

    #region[Order]
    public function getOrder()
    {
        $this->orders = Order::where('company_id', '=', session()->get('company_id'))->get();
    }
    #endregion

    #region[Sort]
    public function sortBy($field): void
    {
        if ($this->sortField_1 === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Purchase::find($id);
            $this->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->company_id = $obj->company_id;
            $this->company_name = $obj->company->vname;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->purchase_no = $obj->purchase_no;
            $this->purchase_date = $obj->purchase_date;
            $this->Entry_no = $obj->Entry_no;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport->vname;
            $this->bundle = $obj->bundle;
            $this->total_qty = $obj->total_qty;
            $this->total_taxable = $obj->total_taxable;
            $this->total_gst = $obj->total_gst;
            $this->ledger_id = $obj->ledger_id;
            $this->ledger_name = $obj->ledger->vname;
            $this->additional = $obj->additional;
            $this->round_off = $obj->round_off;
            $this->grand_total = $obj->grand_total;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }
    #endregion

    #region[Delete]
    public function delete(): void
    {
        $obj = $this->getObj($this->vid);
        DB::table('purchaseitems')->where('purchase_id', '=', $this->vid)->delete();
        $obj->delete();
        $this->showDeleteModal = false;
        $this->clearFields();
    }
    #endregion

    #region[Print]
    public function print($id)
    {

        $this->redirect(route('purchases.print', [$this->getObj($id)]));
    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getContact();
        $this->getOrder();
        return view('livewire.entries.purchase.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
