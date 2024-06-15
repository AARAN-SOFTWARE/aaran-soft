<?php

namespace App\Livewire\Sundar\Trading;

use Aaran\Sundar\Models\ShareTrades;
use Aaran\Sundar\Models\StockTrade;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StockDetails extends Component
{
    #region[properties]
    use CommonTrait;

    public $serial;
    public $vdate;
    public $trade_type;
    public $stock_name;
    public $option_type;
    public $buy = 0;
    public $sell = 0;
    public $spread = 0;
    public $shares = 0;
    public $profit = 0;
    public $loosed = 0;
    public $commission = 0;
    public $share_trade_id;
    public $users;
    public $user_id;

    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->share_trade_id = $id;

        $obj = ShareTrades::find($id);
        $this->vdate = $obj->vdate;
        $this->profit = $obj->profit;
        $this->loosed = $obj->loosed;

        $this->users = User::all();
    }
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->vid == "") {
            $obj = StockTrade::create([
                'serial' => $this->serial,
                'vdate' => $this->vdate,
                'trade_type' => $this->trade_type,
                'stock_name' => $this->stock_name,
                'option_type' => $this->option_type,
                'buy' => $this->buy,
                'sell' => $this->sell,
                'spread' => $this->spread,
                'shares' => $this->shares,
                'profit' => $this->profit,
                'loosed' => $this->loosed,
                'commission' => $this->commission?:0,
                'share_trade_id' => $this->share_trade_id,
                'active_id' => 1,
                'user_id' => $this->user_id ?: auth()->id(),
            ]);
            $this->saveProfit();
            $message = "Saved";
        } else {
            $obj = StockTrade::find($this->vid);
            $obj->serial = $this->serial;
            $obj->vdate = $this->vdate;
            $obj->trade_type = $this->trade_type;
            $obj->stock_name = $this->stock_name;
            $obj->option_type = $this->option_type;
            $obj->buy = $this->buy;
            $obj->sell = $this->sell;
            $obj->spread = $this->spread;
            $obj->shares = $this->shares;
            $obj->profit = $this->profit;
            $obj->loosed = $this->loosed;
            $obj->commission = $this->commission;
            $obj->share_trade_id = $this->share_trade_id;
            $obj->active_id = $this->active_id;
            $obj->user_id = $this->user_id ?: auth()->id();
            $obj->save();
            $this->saveProfit();
            $message = "Updated";
        }
        $this->profit = '';
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        return '';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = StockTrade::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->vdate = $obj->vdate;
            $this->trade_type = $obj->trade_type;
            $this->stock_name = $obj->stock_name;
            $this->option_type = $obj->option_type;
            $this->buy = $obj->buy;
            $this->sell = $obj->sell;
            $this->spread = $obj->spread;
            $this->shares = $obj->shares;
            $this->profit = $obj->profit;
            $this->loosed = $obj->loosed;
            $this->commission = $obj->commission;
            $this->share_trade_id = $obj->share_trade_id;
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

        return StockTrade::search($this->searches)
            ->where('share_trade_id', $this->share_trade_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

    }
    #endregion

    #region[clearFields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->serial = '';
        $this->loosed = '';
        $this->trade_type = '';
        $this->stock_name = '';
        $this->option_type = '';
        $this->buy = '';
        $this->sell = '';
        $this->spread = '';
        $this->shares = '';
        $this->commission = '';
        $this->active_id = '1';
    }
    #endregion

    #region[spreadCalculation]
    public function spreadCalculation()
    {
        $this->spread = round($this->sell - $this->buy, 2);
    }
    #endregion

    #region[getRoute]
    public function getRoute()
    {
        $this->redirect(route('shareTrades.profits'));
    }
    #endregion

    #region[render]
    public function saveProfit()
    {
        $obj = ShareTrades::find($this->share_trade_id);
        $totalProfit = DB::table('stock_trades')
            ->where('share_trade_id', $this->share_trade_id)
            ->sum('profit');
        $totalLoosed = DB::table('stock_trades')
            ->where('share_trade_id', $this->share_trade_id)
            ->sum('loosed');
        if ($obj->profit > 0) {

            $obj->profit = $totalProfit;
            $obj->save();
        } else {
            $obj->loosed = $totalLoosed;
            $obj->save();
        }
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.sundar.trading.stock-details')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
