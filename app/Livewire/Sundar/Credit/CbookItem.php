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
    public string $vdate = '';
    public mixed $credit = '';
    public mixed $rate = '';
    public mixed $interest = '';
    public mixed $due_date = '';
    public mixed $processing = '';
    public mixed $pending = '';
    public mixed $terms = '';
    public mixed $pending_due = '';
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
        $this->vdate = '';
        $this->credit = '';
        $this->rate = '';
        $this->interest = '';
        $this->due_date = '';
        $this->processing = '';
        $this->pending = '';
        $this->terms = '';
        $this->pending_due = '';
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
                'vdate' => ($this->vdate != '') ? $this->vdate : Carbon::parse(Carbon::now())->format('Y-m-d'),
                'credit' => $this->credit != '' ? $this->credit : 0,
                'rate' => $this->rate != '' ? $this->rate : 0,
                'interest' => $this->interest != '' ? $this->interest : 0,
                'due_date' => $this->due_date != '' ? $this->due_date : 0,
                'processing' => $this->processing != '' ? $this->processing : 0,
                'pending' => $this->pending != '' ? $this->pending : 0,
                'terms' => $this->terms != '' ? $this->terms : 0,
                'pending_due' => $this->pending_due != '' ? $this->pending_due : 0,
                'remarks' => $this->remarks,
                'active_id' => $this->active_id,
            ]);
            $message = "Saved";
        } else {
            $obj = CreditBookItem::find($this->vid);
            $obj->credit_book_id = $this->creditBook->id;
            $obj->vdate = ($this->vdate != '') ? $this->vdate : Carbon::parse(Carbon::now())->format('Y-m-d');
            $obj->credit = $this->credit != '' ? $this->credit : 0;
            $obj->rate = $this->rate != '' ? $this->rate : 0;
            $obj->interest = $this->interest != '' ? $this->interest : 0;
            $obj->due_date = $this->due_date != '' ? $this->due_date : 0;
            $obj->processing = $this->processing != '' ? $this->processing : 0;
            $obj->pending = $this->pending != '' ? $this->pending : 0;
            $obj->terms = $this->terms != '' ? $this->terms : 0;
            $obj->pending_due = $this->pending_due != '' ? $this->pending_due : 0;
            $obj->remarks = $this->remarks;
            $obj->active_id = $this->active_id ?: '0';
            $obj->save();
            $message = "Updated";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }
    #endregion

    #region[Update]
    public function updateMaster()
    {
        $XCredit = DB::table('credit_book_items')
            ->where('credit_book_id', '=', $this->creditBook->id)
            ->sum('credit');
        $XDebit = DB::table('credit_book_items')
            ->where('credit_book_id', '=', $this->creditBook->id)
            ->sum('debit');
        $this->creditBook->closing = $XCredit - $XDebit;
        $this->creditBook->save();
    }
    #endregion

    #region[GenerateDues]
    public function generateDues($id): void
    {
        $cbookItem = $this->getObj($id);

        $time = strtotime($cbookItem->due_date);
        $xDate = date("Y-m-d", strtotime("+1 month", $time));

        for ($i = 0; $i < $cbookItem->terms; $i++) {
            CreditInterest::create([
                'credit_book_item_id' => $cbookItem->id,
                'vdate' => $xDate,
                'interest' => $cbookItem->interest,
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
            $this->vdate = $obj->vdate;
            $this->credit = $obj->credit;
            $this->rate = $obj->rate;
            $this->interest = $obj->interest;
            $this->due_date = $obj->due_date;
            $this->processing = $obj->processing;
            $this->pending = $obj->pending;
            $this->terms = $obj->terms;
            $this->pending_due = $obj->pending_due;
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
