<?php

namespace App\Livewire\Attendance\Attendance;

use Aaran\Attendance\Models\Attendance;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;
    public $data;
    public mixed $user="";
    public function getUser()
    {
        $this->data = User::all();
    }

    public function getlist()
    {
        $this->sortField='vdate';

        return Attendance::where('user_id','=',$this->user?:auth()->id())
            ->whereBetween('vdate', [
                Carbon::now()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->endOfMonth()->format('Y-m-d')
            ])
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->where('company_id', '=', session()->get('company_id'))->get();
    }

    public function render()
    {
        $this->getUser();
        return view('livewire.attendance.attendance.show')->with([
            'list' => $this->getList(),
        ]);
    }
}
