<?php

namespace App\Livewire\Magalir\MgPassbook;

use Aaran\Finance\Models\MgLoan;
use Aaran\Finance\Models\MgMember;
use Aaran\Finance\Models\MgPassbook;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $due_date = '';
    public mixed $due_amount = '';

    public mixed $received_date = '';
    public mixed $received = '';
    public string $remarks = '';
    public MgMember $member;
    public MgLoan $loan;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id) {
            $this->loan = MgLoan::find($id);
            $this->member = MgMember::find($this->loan->mg_member_id);
        }
        $this->received_date = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->due_date = (Carbon::parse(Carbon::now())->format('Y-m-d'));
    }
    #endregion

    #region[Save]
    public function getSave()
    {
        if ($this->vid == "") {

            MgPassbook::create([
                'mg_club_id' => $this->member->mg_club_id,
                'mg_member_id' => $this->member->id,
                'mg_loan_id' => $this->loan->id,
                'due_date' => $this->due_date,
                'due_amount' => $this->due_amount,
                'received_date' => $this->received_date,
                'received' => $this->received,
                'remarks' => $this->remarks,
                'user_id' => Auth::id(),
            ]);

            $message = "Saved";

        } else {
            $obj = MgPassbook::find($this->vid);
            $obj->mg_club_id = $this->member->mg_club_id;
            $obj->mg_member_id = $this->member->id;
            $obj->mg_loan_id = $this->loan->id;
            $obj->due_date = $this->due_date;
            $obj->due_amount = $this->due_amount;
            $obj->received_date = $this->received_date;
            $obj->received = $this->received;
            $obj->remarks = $this->remarks;
            $obj->user_id = Auth::id();
            $obj->save();
            $message = "Updated";
        }
        $this->clearFields();
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }
    #endregion

    #region[Clear]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->due_date = '';
        $this->due_amount = '';
        $this->received_date = '';
        $this->received = '';
        $this->remarks = '';
        $this->searches = '';
        $this->active_id=true;
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = MgPassbook::find($id);
            $this->vid = $obj->id;
            $this->due_date = $obj->due_date;
            $this->due_amount = $obj->due_amount;
            $this->received_date = $obj->received_date;
            $this->received = $obj->received;
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

        return MgPassbook::search($this->searches)
            ->where('mg_loan_id', '=', $this->loan->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function render()
    {
        return view('livewire.magalir.mg-passbook.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
