<?php

namespace App\Livewire\Sundar\InterestBook;

use Aaran\Sundar\Models\Credit\CreditBook;
use Aaran\Sundar\Models\Credit\CreditInterest;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $creditBook_id;
    public string $vdate = '';
    public mixed $interest = 0;
    public mixed $received = 0;
    public string $received_date = '';
    public string $remarks = '';
    public CreditBook $creditBook;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        $this->creditBook_id = $id;
        $this->creditBook = CreditBook::find($id);
    }
    #endregion

    #region[Clear field]
    public function clearFields(): void
    {
        $this->vdate = '';
        $this->interest = 0;
        $this->received =0;
        $this->received_date = '';
        $this->remarks = '';
        $this->active_id=true;
    }
    #endregion

    #region[Save]
    public function getSave()
    {

        if ($this->vid == "") {
            CreditInterest::create([
                'credit_book_id' => $this->creditBook_id,
                'vdate' => $this->vdate,
               'interest' => $this->interest,
                'received' => $this->received,
                'received_date' => $this->received_date,
                'remarks' => $this->remarks,
                'company_id' => session()->get('company_id'),
                'user_id' => Auth::id(),
            ]);
            $message = "Saved";
        } else {
            $obj = CreditInterest::find($this->vid);
            $obj->credit_book_id = $this->creditBook->id;
            $obj->vdate = $this->vdate;
            $obj->interest = $this->interest;
            $obj->received = $this->received;
            $obj->received_date = $this->received_date;
            $obj->remarks = $this->remarks;
            $obj->company_id = session()->get('company_id');
            $obj->user_id = Auth::id();
            $obj->save();
            $message = "Updated";
        }
//        $this->updateMaster();
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }
    #endregion

//    public function updateMaster()
//    {
//        $XCredit = DB::table('interest_books')
//            ->where('credit_book_id', '=', $this->creditBook->id)
//            ->sum('credit');
//        $XDebit = DB::table('interest_books')
//            ->where('credit_book_id', '=', $this->creditBook->id)
//            ->sum('debit');
//        $this->creditBook->closing = $XCredit - $XDebit;
//        $this->creditBook->save();
//    }

#region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = CreditInterest::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->interest = $obj->interest;
            $this->received =$obj->received;
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
            ->where('credit_book_id', '=', $this->creditBook->id)
            ->where('company_id', '=', session()->get('company_id'))
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
        return view('livewire.sundar.interest-book.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
