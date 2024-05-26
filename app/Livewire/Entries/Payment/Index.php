<?php

namespace App\Livewire\Entries\Payment;

use Aaran\Common\Models\Receipttype;
use Aaran\Entries\Models\Payment;
use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[Properties]
    public $sortField_1 = 'vdate';
    public $byModel;
    public Collection $contacts;
    public Collection $receipt_types;
    #endregion

    #region[Contact]
    public function getContact()
    {
        $this->contacts = Contact::where('company_id', '=', session()->get('company_id'))->get();

    }
    #endregion

    #region[Receipt]
    public function getReceipt()
    {
        $this->receipt_types = Receipttype::where('active_id', '=', $this->activeRecord)->get();
    }
    #endregion

    #region[Create]
    public function create(): void
    {
        $this->redirect(route('payments.upsert', ['0']));
    }
    #endregion

    #region[List]
    public function getList()
    {
        return Payment::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->filter, function ($query, $filter) {
                return $query->where('contact_id', $filter);
            })
            ->when($this->byModel, function ($query, $byModel) {
                return $query->where('receipttype_id', $byModel);
            })
            ->when($this->start_date, function ($query, $start_date) {
                return $query->whereDate('vdate', '>=', $start_date);
            })
            ->when($this->end_date, function ($query, $end_date) {
                return $query->whereDate('vdate', '<=', $end_date);
            })
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField_1, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
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

    #region[delete]
    public function delete()
    {
        $obj = $this->getObj($this->vid);
        DB::table('paymentitems')->where('payment_id', '=', $this->vid)->delete();
        $obj->delete();
        $this->showDeleteModal = false;
    }
    #endregion

    #region[get Obj]
    private function getObj($id)
    {
        if ($id) {
            $obj = Payment::find($id);
            $this->vid = $obj->id;
            $this->acyear = $obj->acyear;
            $this->vdate = $obj->vdate;
            $this->company_id = $obj->company_id;
            $this->company_name = $obj->company->vname;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->receipttype_id = $obj->receipttype_id;
            $this->receipttype_name = $obj->receipttype->vname;
            $this->chq_no = $obj->chq_no;
            $this->chq_date = $obj->chq_date;
            $this->bank_id = $obj->bank_id;
            $this->bank_name = $obj->bank->vname;
            $this->payment_amount = $obj->payment_amount;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getContact();
        $this->getReceipt();
        return view('livewire.entries.payment.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
