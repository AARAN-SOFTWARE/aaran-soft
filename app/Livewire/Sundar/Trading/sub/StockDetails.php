<?php

namespace App\Livewire\Sundar\Trading\sub;

use Aaran\Sundar\Models\Share\ShareTrades;
use Aaran\Sundar\Models\Share\StockName;
use Aaran\Sundar\Models\Share\StockTrade;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class StockDetails extends Component
{
    #region[properties]
    use CommonTrait;

    public $serial;
    public $vdate;

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

    #region[Stock Name]
    public $stock_name_id;
    public $stock_name = '';
    public Collection $stockNameCollection;
    public $highlightStockName = 0;
    public $stockNameTyped = false;

    public function decrementStockName(): void
    {
        if ($this->highlightStockName === 0) {
            $this->highlightStockName = count($this->stockNameCollection) - 1;
            return;
        }
        $this->highlightStockName--;
    }

    public function incrementStockName(): void
    {
        if ($this->highlightStockName === count($this->stockNameCollection) - 1) {
            $this->highlightStockName = 0;
            return;
        }
        $this->highlightStockName++;
    }

    public function setStockName($name, $id): void
    {
        $this->stock_name = $name;
        $this->stock_name_id = $id;
        $this->getStockNameList();
    }

    public function enterStockName(): void
    {
        $obj = $this->stockNameCollection[$this->highlightStockName] ?? null;

        $this->stock_name = '';
        $this->stockNameCollection = Collection::empty();
        $this->highlightStockName = 0;

        $this->stock_name = $obj['vname'] ?? '';
        $this->stock_name_id = $obj['id'] ?? '';
    }

    public function stockSave($name): void
    {
        $obj= StockName::create([
            'vname' => $name,
            'active_id' => '1'
        ]);

        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshStockName($v);

    }
    #[On('refresh-StockName')]
    public function refreshStockName($v): void
    {
        $this->stock_name_id = $v['id'];
        $this->stock_name = $v['name'];
        $this->stockNameTyped = false;

    }

    public function getStockNameList(): void
    {
        $this->stockNameCollection = $this->stock_name ? StockName::search(trim($this->stock_name))
            ->get() : StockName::all();
    }

    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->vid == "") {
            $obj = StockTrade::create([
                'serial' => $this->serial,
                'vdate' => $this->share_trade->vdate,
                'stock_name_id' => $this->stock_name_id,
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
            $obj->stock_name_id = $this->stock_name_id;
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
            $this->stock_name_id = $obj->stock_name_id;
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
        $this->stock_name_id = '';
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
        $obj->save();

    }
    #endregion

    #region[render]
    public function render()
    {
        $this->getStockNameList();

        return view('livewire.sundar.trading.sub.stock-details')->with([
            'list' => $this->getList(),
        ]);
    }
    #endregion
}
