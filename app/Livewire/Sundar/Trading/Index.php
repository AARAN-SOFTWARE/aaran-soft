<?php

namespace App\Livewire\Sundar\Trading;

use Aaran\Sundar\Models\ShareTrades;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    #region[property]
    use CommonTrait;

    public $vdate;
    public mixed $opening_balance;
    public mixed $deposit;
    public mixed $profit;
    public mixed $loosed;
    public mixed $withdraw;
    public mixed $charges;
    public mixed $balance;
    public $remarks = '';
    public $k_id = '';

    public $users;

    #endregion
    public string $user_name = '';

    public function mount(): void
    {
        $this->users = User::all();
    }


    #region[save]
    public function getSave(): string
    {
        if ($this->vid == "") {
            ShareTrades::create([
                'vdate' => $this->vdate ?: Carbon::now()->format('Y-m-d'),
                'opening_balance' => $this->opening_balance ?: 0,
                'deposit' => $this->deposit ?: 0,
                'profit' => $this->profit ?: 0,
                'loosed' => $this->loosed ?: 0,
                'withdraw' => $this->withdraw ?: 0,
                'charges' => $this->charges ?: 0,
                'balance' => $this->balance ?: 0,
                'remarks' => $this->remarks,
                'active_id' => $this->active_id,
            ]);
            $message = "Saved";

        } else {
            $obj = ShareTrades::find($this->vid);
            $obj->vdate = $this->vdate;
            $obj->opening_balance = $this->opening_balance;
            $obj->deposit = $this->deposit;
            $obj->profit = $this->profit;
            $obj->loosed = $this->loosed;
            $obj->withdraw = $this->withdraw;
            $obj->charges = $this->charges;
            $obj->balance = $this->balance;
            $obj->remarks = $this->remarks;
            $obj->active_id = $this->active_id;
            $obj->save();
            $message = "Updated";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);

        return '';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ShareTrades::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->opening_balance = $obj->opening_balance;
            $this->deposit = $obj->deposit;
            $this->profit = $obj->profit;
            $this->loosed = $obj->loosed;
            $this->withdraw = $obj->withdraw;
            $this->charges = $obj->charges;
            $this->balance = $obj->balance;
            $this->remarks = $obj->remarks;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[getList]
    public function getList()
    {
        $this->user_name =Auth::user()->name;

        return ShareTrades::select(
            DB::raw("SUM(opening_balance) as opening_balance"),
            DB::raw("SUM(deposit) as deposit"),
            DB::raw("SUM(withdraw) as withdraw"),
            DB::raw("SUM(profit) as profit"),
            DB::raw("SUM(loosed) as loosed"),
            DB::raw("SUM(charges) as charges")
        )->where("user_id", $this->k_id ?: auth()->id())
            ->get();
    }
    #endregion

    #region[clearFields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vdate = '';
        $this->opening_balance = '';
        $this->deposit = '';
        $this->profit = '';
        $this->loosed = '';
        $this->withdraw = '';
        $this->charges = '';
        $this->balance = '';
        $this->remarks = '';
        $this->active_id = '1';
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.sundar.trading.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
