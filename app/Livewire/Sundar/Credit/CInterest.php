<?php

namespace App\Livewire\Sundar\Credit;

use Aaran\Sundar\Models\Credit\CreditBook;
use Aaran\Sundar\Models\Credit\CreditBookItem;
use Aaran\Sundar\Models\Credit\CreditInterest;
use Aaran\Sundar\Models\Credit\CreditMember;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class CInterest extends Component
{
    use CommonTrait;

    #region[Cashbook properties]
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
            $this->updateMaster();
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }
    #endregion

    #region[Update]
    public function updateMaster()
    {
        $obj = CreditBookItem::find($this->creditBookItem->id);

        $count = DB::table('credit_interests')
            ->where('credit_book_item_id', '=', $this->creditBookItem->id)
            ->where('received', '!=', 0)
            ->count('received');

        $XDebit = DB::table('credit_interests')
            ->where('credit_book_item_id', '=', $this->creditBookItem->id)
            ->where('received', '!=', 0)
            ->sum('received');

        $obj->pending_due = $obj->terms - $count;
        $obj->pending = ($obj->emi * $obj->terms) - $XDebit;
        $obj->save();

        $creditBook = CreditBook::find($this->creditBookItem->credit_book_id);
        $creditBook->closing = $obj->pending;
        $creditBook->save();

        $creditMembers = CreditMember::find($creditBook->credit_member_id);



        $closing = DB::table('credit_books')
            ->where('credit_member_id', '=', $creditMembers->id)
            ->sum('closing');

        $creditMembers->closing = $closing;
        $creditMembers->save();

    }
    #endregion

    #region[Pay Due]
    public function payDue($id): void
    {
        if ($id) {
            $obj = CreditInterest::find($id);
            $this->received = $obj->interest;
            $this->received_date = Carbon::parse(Carbon::now())->format('Y-m-d');
            $obj->save();
        }
    }

    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = CreditInterest::find($id);
            $this->vid = $obj->id;
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
