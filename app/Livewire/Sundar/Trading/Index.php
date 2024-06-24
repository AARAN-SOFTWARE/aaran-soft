<?php

namespace App\Livewire\Sundar\Trading;

use Aaran\Sundar\Models\Share\ShareTrades;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    #region[property]
    use CommonTrait;

    public $vdate;
    public $search_user_id = '';

    public $users;

    #endregion
    public string $user_name = '';

    public function mount(): void
    {
        $this->users = User::all();
    }

    #region[getList]
    public function getList()
    {
        if ($this->search_user_id == '') {
            $this->search_user_id = auth()->id();
        }

        return ShareTrades::select(
            DB::raw("SUM(opening_balance) as opening_balance"),
            DB::raw("SUM(deposit) as deposit"),
            DB::raw("SUM(withdraw) as withdraw"),
            DB::raw("SUM(share_profit) as share_profit"),
            DB::raw("SUM(share_loosed) as share_loosed"),
            DB::raw("SUM(option_profit) as option_profit"),
            DB::raw("SUM(option_loosed) as option_loosed"),
            DB::raw("SUM(charges) as charges")
        )->where("user_id", $this->search_user_id ?: auth()->id())
            ->get();
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
