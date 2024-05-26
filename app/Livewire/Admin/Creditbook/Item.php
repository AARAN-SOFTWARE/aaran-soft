<?php

namespace App\Livewire\Admin\Creditbook;

use Aaran\Sundar\Models\CreditBook;
use Aaran\Sundar\Models\CreditBookItem;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Item extends Component
{
    use CommonTrait;

    #region[Cashbook properties]
    public string $vdate = '';
    public string $purpose = '';
    public mixed $credit = 0;
    public mixed $debit = 0;
    public mixed $interest = 0;
    public mixed $closing = 0;
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
        $this->purpose = '';
        $this->credit = '';
        $this->debit = '';
        $this->interest = '';
        $this->active_id=true;
    }
    #endregion

    #region[Save]
    public function getSave()
    {

        if ($this->vdate == '') {
            $this->vdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        }

        if ($this->credit == '') {
            $this->credit = 0;
        }
        if ($this->debit == '') {
            $this->debit = 0;
        }

        if ($this->interest == '') {
            $this->interest = 0;
        }

        if ($this->vid == "") {
            CreditBookItem::create([
                'credit_book_id' => $this->creditBook->id,
                'vdate' => $this->vdate,
                'purpose' => $this->purpose,
                'credit' => $this->credit,
                'debit' => $this->debit,
                'interest' => $this->interest,
                'active_id' => $this->active_id,
                'user_id' => Auth::id(),
            ]);
            $message = "Saved";
        } else {
            $obj = CreditBookItem::find($this->vid);
            $obj->credit_book_id = $this->creditBook->id;
            $obj->vdate = $this->vdate;
            $obj->purpose = $this->purpose;
            $obj->credit = $this->credit;
            $obj->debit = $this->debit;
            $obj->interest = $this->interest;
            $obj->active_id = $this->active_id ?: '0';
            $obj->user_id = Auth::id();
            $obj->save();
            $message = "Updated";
        }
        $this->updateMaster();
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
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
            $obj = CreditBookItem::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->purpose = $obj->purpose;
            $this->credit = $obj->credit;
            $this->debit = $obj->debit;
            $this->interest = $obj->interest;
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
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.admin.creditbook.item')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
