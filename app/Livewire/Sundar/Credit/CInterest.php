<?php

namespace App\Livewire\Sundar\Credit;

use Aaran\Sundar\Models\Credit\CreditBookItem;
use Aaran\Sundar\Models\Credit\CreditInterest;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class CInterest extends Component
{
    use CommonTrait;

    #region[Cashbook properties]
    public string $serial = '';
    public string $vdate = '';
    public mixed $interest = '';
    public mixed $received = '';
    public mixed $received_date = '';
    public string $remarks = '';
    public CreditBookItem $creditBookItem;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        $this->creditBookItem = CreditBookItem::find($id);
    }
    #endregion

    #region[Clear]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->serial = '';
        $this->vdate = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->interest = '';
        $this->received = '';
        $this->received_date = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->remarks = '';
        $this->active_id = true;
    }
    #endregion

    #region[Save]
    public function getSave()
    {

        if ($this->vid == "") {
            CreditInterest::create([
                'credit_book_item_id' => $this->creditBookItem->id,
                'serial' => $this->serial != '' ? $this->serial : 0,
                'vdate' => ($this->vdate != '') ? $this->vdate : Carbon::parse(Carbon::now())->format('Y-m-d'),
                'interest' => $this->interest != '' ? $this->interest : 0,
                'received' => $this->received != '' ? $this->received : 0,
                'received_date' => ($this->received_date != '') ? $this->received_date : Carbon::parse(Carbon::now())->format('Y-m-d'),
                'remarks' => $this->remarks,
            ]);
            $message = "Saved";
        } else {
            $obj = CreditInterest::find($this->vid);
            $obj->credit_book_item_id = $this->creditBookItem->id;
            $obj->vdate = ($this->vdate != '') ? $this->vdate : Carbon::parse(Carbon::now())->format('Y-m-d');
            $obj->interest = $this->interest != '' ? $this->interest : 0;
            $obj->received = $this->received != '' ? $this->received : 0;
            $obj->received_date = ($this->received_date != '') ? $this->received_date : Carbon::parse(Carbon::now())->format('Y-m-d');
            $obj->remarks = $this->remarks;
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

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = CreditInterest::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->vdate = $obj->vdate;
            $this->interest = $obj->interest;
            $this->received = $obj->received;
            $this->received_date = $obj->received_date;
            $this->remarks = $obj->remarks;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return CreditInterest::search($this->searches)
            ->where('credit_book_item_id', '=', $this->creditBookItem->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function render()
    {
        return view('livewire.sundar.credit.cinterest')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
