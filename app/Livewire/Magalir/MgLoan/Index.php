<?php

namespace App\Livewire\Magalir\MgLoan;

use Aaran\Finance\Models\MgClub;
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
    public string $ac_no = '';
    public string $open_date = '';
    public mixed $loan = 0;
    public mixed $interest = 0;
    public mixed $dues = 0;
    public mixed $due_amount;
    public mixed $due_date = '';
    public mixed $clubs;
    public mixed $members;
    public string $club_id = '';
    public string $member_id = '';
    public MgMember $member;
    public MgLoan $mgLoan;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id) {
            $this->member = MgMember::find($id);
            $this->club_id = $this->member->mg_club_id;
        }

        $this->members = MgMember::where('mg_club_id','=' ,$this->club_id)->where('active_id', '1')->get();
        $this->clubs = MgClub::where('active_id', '1')->get();

        $this->open_date = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->due_date = (Carbon::parse(Carbon::now())->format('Y-m-d'));
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->ac_no != '') {
            if ($this->vid == "") {

                $this->mgLoan = MgLoan::create([
                    'mg_club_id' => $this->member->mg_club_id,
                    'mg_member_id' => $this->member->id,
                    'ac_no' => $this->ac_no,
                    'open_date' => $this->open_date ?: Carbon::parse(Carbon::now())->format('Y-m-d'),
                    'loan' => $this->loan ?: 0,
                    'interest' => $this->interest ?: 0,
                    'dues' => $this->dues ?: 0,
                    'due_amount' => $this->due_amount ?: 0,
                    'due_date' => $this->due_date ?: Carbon::parse(Carbon::now())->format('Y-m-d'),
                    'user_id' => Auth::id(),
                ]);

                $message = "Saved";

            } else {
                $this->mgLoan = MgLoan::find($this->vid);
                $this->mgLoan->mg_club_id = $this->member->mg_club_id;
                $this->mgLoan->mg_member_id = $this->member->id;
                $this->mgLoan->ac_no = $this->ac_no;
                $this->mgLoan->open_date = $this->open_date;
                $this->mgLoan->loan = $this->loan;
                $this->mgLoan->interest = $this->interest;
                $this->mgLoan->dues = $this->dues;
                $this->mgLoan->due_amount = $this->due_amount;
                $this->mgLoan->due_date = $this->due_date;
                $this->mgLoan->user_id = Auth::id();
                $this->mgLoan->save();
                $message = "Updated";
            }
            $this->clearFields();
            $this->generateDues();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[calculation]
    public function calculation(): void
    {
        $rate = $this->interest / 100 / 12;

        $x = pow(1 + $rate, $this->dues);

        $this->due_amount = round(($this->loan * $x * $rate) / ($x - 1),2);
    }
    #endregion

    #region[Generate]
    public function generateDues(): void
    {
        $time = strtotime($this->mgLoan->due_date);
        $xDate = date("Y-m-d", strtotime("+1 month", $time));

        if ($this->vid == "") {
            for ($i = 0; $i < $this->mgLoan->dues; $i++) {
                MgPassbook::create([
                    'mg_club_id' => $this->mgLoan->mg_club_id,
                    'mg_member_id' => $this->mgLoan->mg_member_id,
                    'mg_loan_id' => $this->mgLoan->id,
                    'due_date' => $xDate,
                    'due_amount' => $this->mgLoan->due_amount,
                    'received_date' => '',
                    'received' => 0,
                    'remarks' => '',
                    'user_id' => Auth::id(),
                ]);
                $time = strtotime($xDate);
                $xDate = date("Y-m-d", strtotime("+1 month", $time));
            }
        }
    }
    #endregion

    #region[Clear]
    public function clearFields(): void
    {
        $this->ac_no = '';
        $this->open_date = '';
        $this->loan = '';
        $this->interest = '';
        $this->dues = '';
        $this->due_amount = '';
        $this->due_date = '';
        $this->searches = '';
        $this->active_id = true;
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = MgLoan::find($id);
            $this->vid = $obj->id;
            $this->ac_no = $obj->ac_no;
            $this->open_date = $obj->open_date;
            $this->loan = $obj->loan;
            $this->interest = $obj->interest;
            $this->dues = $obj->dues;
            $this->due_amount = $obj->due_amount;
            $this->due_date = $obj->due_date;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return MgLoan::search($this->searches)
            ->where('mg_member_id', '=', $this->member->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Get by Club]

    public function getByClub()
    {
        $this->members = MgMember::where('mg_club_id','=' ,$this->club_id)->where('active_id', '1')->get();
    }

    public function getByMember()
    {
        if ($this->member_id) {
            $this->member = MgMember::find($this->member_id);
            $this->club_id = $this->member->mg_club_id;
        }
    }

    #endregion

    public function create()
    {
        $this->clearFields();
        $this->showEditModal = true;
        $this->ac_no = MgLoan::nextNo();
        $this->open_date = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->due_date = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->interest = '30.2';
        $this->dues = '24';
    }

    #region[Render]
    public function render()
    {
        return view('livewire.magalir.mg-loan.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
