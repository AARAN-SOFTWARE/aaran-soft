<?php

namespace App\Livewire\Sundar\Trading;

use Aaran\Sundar\Models\Share\ShareTrades;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ShareSummary extends Component
{
    #region[property]
    use CommonTrait;

    public $vdate;
    public mixed $opening_balance;
    public mixed $deposit;
    public mixed $withdraw;
    public mixed $share_profit;
    public mixed $share_loosed;
    public mixed $option_profit;
    public mixed $option_loosed;
    public mixed $charges;
    public mixed $user_id = '';
    public $remarks = '';
    public mixed $k_id = '';

    public mixed $users;

    #endregion

    public function mount()
    {
        $this->users = User::all();
    }


    #region[save]
    public function getSave(): string
    {
        if ($this->vid == "") {
            ShareTrades::create([
                'user_id' => $this->user_id,
                'vdate' => $this->vdate ?: Carbon::now()->format('Y-m-d'),
                'opening_balance' => $this->opening_balance ?: 0,
                'deposit' => $this->deposit ?: 0,
                'profit' => $this->share_profit ?: 0,
                'loosed' => $this->share_loosed ?: 0,
                'option_profit' => $this->option_profit ?: 0,
                'option_loosed' => $this->option_loosed ?: 0,
                'withdraw' => $this->withdraw ?: 0,
                'charges' => $this->charges ?: 0,
                'remarks' => $this->remarks ?: '',
                'active_id' => $this->active_id,

            ]);
            $message = "Saved";

        } else {
            $obj = ShareTrades::find($this->vid);
            $obj->user_id = $this->user_id;
            $obj->vdate = $this->vdate;
            $obj->opening_balance = $this->opening_balance;
            $obj->deposit = $this->deposit;
            $obj->withdraw = $this->withdraw;
            $obj->share_profit = $this->share_profit;
            $obj->share_loosed = $this->share_loosed;
            $obj->option_profit = $this->option_profit;
            $obj->option_loosed = $this->option_loosed;
            $obj->charges = $this->charges;
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
            $this->user_id = $obj->user_id;
            $this->vdate = $obj->vdate;
            $this->opening_balance = $obj->opening_balance;
            $this->deposit = $obj->deposit;
            $this->share_profit = $obj->share_profit;
            $this->share_loosed = $obj->share_loosed;
            $this->option_profit = $obj->option_profit;
            $this->option_loosed = $obj->option_loosed;
            $this->withdraw = $obj->withdraw;
            $this->charges = $obj->charges;
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
        $this->sortField = 'vdate';

        return ShareTrades::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[clearFields]
    public function clearFields(): void
    {
        $this->user_id = '';
        $this->vdate = '';
        $this->opening_balance = '';
        $this->deposit = '';
        $this->share_profit = '';
        $this->share_loosed = '';
        $this->option_profit = '';
        $this->option_loosed = '';
        $this->withdraw = '';
        $this->charges = '';
        $this->remarks = '';
        $this->active_id = '1';
    }
    #endregion

    #region[reRender]
    public function reRender(): void
    {
        $this->render()->render();
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.sundar.trading.share-summary')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
