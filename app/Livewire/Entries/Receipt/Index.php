<?php

namespace App\Livewire\Entries\Receipt;

use Aaran\Common\Models\Receipttype;
use Aaran\Entries\Models\Receipt;
use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[Receipt Properties]
    public $sortField_1='vdate';
    public Collection $contacts;
    public Collection $receipt_types;
    public $byModel;
    #endregion

    #region[get contact]
    public function getContact()
    {
        $this->contacts=Contact::where('company_id','=',session()->get('company_id'))->get();

    }
    #endregion

    #region[receipt]
    public function getReceipt()
    {
        $this->receipt_types = Receipttype::where('active_id', '=', $this->activeRecord)->get();

    }
    #endregion

    #region[create]
    public function create(): void
    {
        $this->redirect(route('receipts.upsert', ['0']));
    }
    #endregion


    #region[list]
    public function getList()
    {
        return Receipt::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->filter,function ($query,$filter){
                return $query->where('contact_id',$filter);
            })
            ->when($this->byModel,function ($query,$byModel){
                return $query->where('receipttype_id',$byModel);
            })
            ->when($this->start_date,function ($query,$start_date){
                return $query->whereDate('vdate','>=',$start_date);
            })
            ->when($this->end_date,function ($query,$end_date){
                return $query->whereDate('vdate','<=',$end_date);
            })
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField_1, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[sort]
    public function sortBy($field): void
    {
        if ($this->sortField_1=== $field) {
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
        $obj=$this->getObj($this->vid);
        DB::table('receiptitems')->where('receipt_id', '=', $this->vid)->delete();
        $obj->delete();
        $this->showDeleteModal = false;

    }
    #endregion

    #region[obj]
    private function getObj($id)
    {
        if ($id) {
            $obj = Receipt::find($id);
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
            $this->receipt_amount = $obj->receipt_amount;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }
    #endregion

    #region[render]
    public function render()
    {
        $this->getContact();
        $this->getReceipt();
        return view('livewire.entries.receipt.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
