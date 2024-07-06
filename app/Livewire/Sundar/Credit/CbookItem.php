<?php

namespace App\Livewire\Sundar\Credit;

use Aaran\Sundar\Models\Credit\CreditBook;
use Aaran\Sundar\Models\Credit\CreditBookItem;
use Aaran\Sundar\Models\Credit\CreditInterest;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class CbookItem extends Component
{
    use CommonTrait;

    #region[Cashbook properties]
    public mixed $loan = '';
    public mixed $rate = '';
    public mixed $processing = '';
    public mixed $insurance = '';
    public mixed $commission = '';


    public mixed $credited = '';
    public string $vdate = '';
    public mixed $emi = '';
    public mixed $emi_date = '';
    public mixed $terms = '';
    public mixed $pending_due = '';
    public mixed $pending = '';

    public string $remarks = '';
    public CreditBook $creditBook;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        $this->creditBook = CreditBook::find($id);
    }
    #endregion

    #region[Clear]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->loan = '';
        $this->rate = '';
        $this->processing = '';
        $this->insurance = '';
        $this->commission = '';
        $this->credited = '';
        $this->vdate = '';
        $this->emi = '';
        $this->emi_date = '';
        $this->terms = '';
        $this->pending_due = '';
        $this->pending = '';
        $this->remarks = '';
        $this->active_id = true;
    }
    #endregion

    #region[Save]
    public function getSave()
    {

        if ($this->vid == "") {
            CreditBookItem::create([
                'credit_book_id' => $this->creditBook->id,
                'loan' => $this->loan != '' ? $this->loan : 0,
                'rate' => $this->rate != '' ? $this->rate : 0,
                'processing' => $this->processing != '' ? $this->processing : 0,
                'insurance' => $this->insurance != '' ? $this->insurance : 0,
                'commission' => $this->commission != '' ? $this->commission : 0,
                'credited' => $this->credited != '' ? $this->credited : 0,
                'vdate' => ($this->vdate != '') ? $this->vdate : Carbon::parse(Carbon::now())->format('Y-m-d'),
                'emi' => $this->emi != '' ? $this->emi : 0,
                'emi_date' => $this->emi_date != '' ? $this->emi_date : 0,
                'terms' => $this->terms != '' ? $this->terms : 0,
                'pending_due' => $this->pending_due != '' ? $this->pending_due : 0,
                'pending' => $this->pending != '' ? $this->pending : 0,
                'remarks' => $this->remarks,
                'active_id' => $this->active_id,
            ]);
            $message = "Saved";
        } else {
            $obj = CreditBookItem::find($this->vid);
            $obj->credit_book_id = $this->creditBook->id;
            $obj->loan = $this->loan != '' ? $this->loan : 0;
            $obj->rate = $this->rate != '' ? $this->rate : 0;
            $obj->processing = $this->processing != '' ? $this->processing : 0;
            $obj->insurance = $this->insurance != '' ? $this->insurance : 0;
            $obj->commission = $this->commission != '' ? $this->commission : 0;
            $obj->credited = $this->credited != '' ? $this->credited : 0;
            $obj->vdate = ($this->vdate != '') ? $this->vdate : Carbon::parse(Carbon::now())->format('Y-m-d');
            $obj->emi = $this->emi != '' ? $this->emi : 0;
            $obj->emi_date = $this->emi_date != '' ? $this->emi_date : 0;
            $obj->terms = $this->terms != '' ? $this->terms : 0;
            $obj->pending_due = $this->pending_due != '' ? $this->pending_due : 0;
            $obj->pending = $this->pending != '' ? $this->pending : 0;
            $obj->remarks = $this->remarks;
            $obj->active_id = $this->active_id ?: '0';
            $obj->save();
            $message = "Updated";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }
    #endregion

    #region[GenerateDues]
    public function generateDues($id): void
    {

        DB::table('credit_interests')
            ->where('credit_book_item_id', $id)
            ->delete();

        $cbookItem = $this->getObj($id);

        $time = strtotime($cbookItem->emi_date);
        $xDate = date("Y-m-d", strtotime("+1 month", $time));

        for ($i = 0; $i < $cbookItem->terms; $i++) {
            CreditInterest::create([
                'credit_book_item_id' => $cbookItem->id,
                'vdate' => $xDate,
                'interest' => $cbookItem->emi,
                'received' => 0,
                'received_date' => '',
                'remarks' => '',
            ]);
            $time = strtotime($xDate);
            $xDate = date("Y-m-d", strtotime("+1 month", $time));
        }

    }
    #endregion


    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = CreditBookItem::find($id);
            $this->vid = $obj->id;

            $this->loan = $obj->loan;
            $this->rate = $obj->rate;
            $this->processing = $obj->processing;
            $this->insurance = $obj->insurance;
            $this->commission = $obj->commission;
            $this->credited = $obj->credited;
            $this->vdate = $obj->vdate;
            $this->emi = $obj->emi;
            $this->emi_date = $obj->emi_date;
            $this->terms = $obj->terms;
            $this->pending_due = $obj->pending_due;
            $this->pending = $obj->pending;
            $this->remarks = $obj->remarks;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return CreditBookItem::search($this->searches)
            ->where('credit_book_id', '=', $this->creditBook->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function render()
    {
        return view('livewire.sundar.credit.cbook-item')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
