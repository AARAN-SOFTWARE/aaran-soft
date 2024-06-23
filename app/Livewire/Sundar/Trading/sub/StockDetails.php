<?php

namespace App\Livewire\Sundar\Trading\sub;

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
    public $stock_name;
    public $trade_type;
    public $buy = 0;
    public $sell = 0;
    public $spread = 0;
    public $shares = 0;
    public $profit = 0;
    public $loosed = 0;
    public $commission = 0;
    public $share_trade;
    public $users;

    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->share_trade = ShareTrades::find($id);

        $this->users = User::all();
    }
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->vid == "") {
            $obj = StockTrade::create([
                'serial' => $this->serial,
                'vdate' => $this->share_trade->vdate,
                'stock_name' => $this->stock_name,
                'trade_type' => $this->trade_type,
                'buy' => $this->buy ?: 0,
                'sell' => $this->sell ?: 0,
                'spread' => $this->spread ?: 0,
                'shares' => $this->shares ?: 0,
                'profit' => $this->profit ?: 0,
                'loosed' => $this->loosed ?: 0,
                'commission' => $this->commission ?: 0,
                'share_trade_id' => $this->share_trade->id,
                'active_id' => 1,
            ]);
            $this->saveProfit();
            $message = "Saved";
        } else {
            $obj = StockTrade::find($this->vid);
            $obj->serial = $this->serial;
            $obj->vdate = $this->vdate;
            $obj->stock_name = $this->stock_name;
            $obj->trade_type = $this->trade_type;
            $obj->buy = $this->buy ?: 0;
            $obj->sell = $this->sell ?: 0;
            $obj->spread = $this->spread ?: 0;
            $obj->shares = $this->shares ?: 0;
            $obj->profit = $this->profit ?: 0;
            $obj->loosed = $this->loosed ?: 0;
            $obj->commission = $this->commission ?: 0;
            $obj->share_trade_id = $this->share_trade->id;
            $obj->active_id = $this->active_id;
            $obj->save();
            $this->saveProfit();
            $message = "Updated";
        }
        $this->profit = '';
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
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
            $this->buy = $obj->buy;
            $this->sell = $obj->sell;
            $this->spread = $obj->spread;
            $this->shares = $obj->shares;
            $this->profit = $obj->profit;
            $this->loosed = $obj->loosed;
            $this->commission = $obj->commission;
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
            ->where('share_trade_id', $this->share_trade->id)
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
        $this->redirect(route('shareTrades.shares'));
    }
    #endregion

    #region[render]
    public function saveProfit()
    {
        $totalProfit = DB::table('stock_trades')
            ->where('share_trade_id', $this->share_trade->id)
            ->sum('profit');

        $totalLoosed = DB::table('stock_trades')
            ->where('share_trade_id', $this->share_trade->id)
            ->sum('loosed');

        $obj = ShareTrades::find($this->share_trade->id);
        $obj->share_profit = $totalProfit;
        $obj->share_loosed = $totalLoosed;

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
