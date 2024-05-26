<?php

namespace App\Livewire\Attendance\Attendance;

use Aaran\Attendance\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #region[Attendance properties]
    public Attendance $attendance;
    public $vid = '';
    public $vdate = '';
    public $in_time = '';
    public $out_time = '';
    public mixed $amount = '';
    public mixed $total_amount = 307.69;
    public $user_name = '';
    public $user_id = '';
    public Collection $data;
    public $days;
    public Collection $present;
    public string $uniqueno;
    #endregion

    #region[Save]
    public function save()
    {
        $this->validate(['uniqueno'=>'unique:attendances,uniqueno']);
        if ($this->vid == "") {
            Attendance::create([
                'user_id' => Auth::id(),
                'vdate' => $this->vdate,
                'uniqueno'=> $this->uniqueno,
                'in_time' => $this->in_time,
                'out_time' => $this->out_time,
                'amount' => $this->amount,
                'company_id' => session()->get('company_id'),
            ]);
        } else {
            $obj = Attendance::find($this->vid);
            $obj->user_id = Auth::id();
            $obj->uniqueno = $this->uniqueno;
            $obj->vdate = $this->vdate;
            $obj->in_time = $this->in_time;
            $obj->out_time = Carbon::now()->format('g:i:s');
            $obj->amount = 307.69;
            $obj->company_id = session()->get('company_id');
            $obj->save();
        }
    }
    #endregion

    #region[List]
    public function getlist()
    {
        return Attendance::all()->whereBetween('vdate', [
            Carbon::now()->startOfMonth()->format('Y-m-d'),
            Carbon::now()->endOfMonth()->format('Y-m-d')
        ])->where('company_id', '=', session()->get('company_id'))->where('user_id', Auth::id());
    }
    public function getlist_1()
    {
        $this->data=User::all();
    }
    public function getdays()
    {
        $this->present=Attendance::all()
            ->when($this->days, function ($query, $days) {
            return $query->where('user_id', $days);
        });
    }
    #endregion
    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Attendance::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->uniqueno = $obj->uniqueno;
            $this->in_time = $obj->in_time;
            $this->out_time = $obj->out_time;
            $this->user_id = $obj->user_id;
            $this->user_name = $obj->user->vname;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[Mark In]
    public function mark_in()
    {
        if ($this->vid == "") {
            $this->in_time = Carbon::now()->format('g:i:s');
            $this->vdate = Carbon::parse(Carbon::now());
            $this->uniqueno=Carbon::now()->format('Y-m-d').'~'.Auth::id();
            $this->out_time = '';
            $this->save();
        }
    }
    #endregion

    #region[Mark Out]
    public function mark_out($id)
    {
        $this->getObj($id);
        if ($this->out_time == "") {
            $this->save();
        }
    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getlist_1();
        $this->getdays();
        return view('livewire.attendance.attendance.index')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
