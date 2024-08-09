<?php

namespace App\Livewire\ShareMarket;

use Aaran\ShareMarket\Models\Stock;
use Aaran\ShareMarket\Models\StockDetail;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Upsert extends Component
{
    use CommonTrait;

    #region[Properties]
    public $stock_id;
    public $vdate;
    public $ltp;
    public $chg;
    public $chg_percent;
    public $volume;
    public $open_interest;
    public $open;
    public $close;
    public $high;
    public $low;
    public $high_52;
    public $low_52;
    public $all_high;
    public $all_low;
    public $pivot;
    public $r1;
    public $r2;
    public $r3;
    public $s1;
    public $s2;
    public $s3;
    public $trend;

    public $stock;

    public bool $showDetails = false;
    public mixed $showDetailsId;

    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->stock = Stock::find($id);

        $this->stock_id = $id;

        $this->vdate = Carbon::now()->format('Y-m-d');
    }
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->open != '') {
            if ($this->vid == "") {
                StockDetail::create([
                    'stock_id' => $this->stock->id,
                    'vdate' => $this->vdate,
                    'ltp' => $this->ltp ?: 0,
                    'chg' => $this->chg ?: 0,
                    'chg_percent' => $this->chg_percent ?: 0,
                    'volume' => $this->volume ?: 0,
                    'open_interest' => $this->open_interest ?: 0,
                    'open' => $this->open ?: 0,
                    'close' => $this->close ?: 0,
                    'high' => $this->high ?: 0,
                    'low' => $this->low ?: 0,
                    'high_52' => $this->high_52 ?: 0,
                    'low_52' => $this->low_52 ?: 0,
                    'all_high' => $this->all_high ?: 0,
                    'all_low' => $this->all_low ?: 0,
                    'pivot' => $this->pivot,
                    'r1' => $this->r1 ?: 0,
                    'r2' => $this->r2 ?: 0,
                    'r3' => $this->r3 ?: 0,
                    's1' => $this->s1 ?: 0,
                    's2' => $this->s2 ?: 0,
                    's3' => $this->s3 ?: 0,
                    'trend' => $this->trend,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = StockDetail::find($this->vid);
                $obj->stock_id = $this->stock->id;
                $obj->vdate = $this->vdate;
                $obj->ltp = $this->ltp;
                $obj->chg = $this->chg;
                $obj->chg_percent = $this->chg_percent;
                $obj->volume = $this->volume;
                $obj->open_interest = $this->open_interest;
                $obj->open = $this->open;
                $obj->close = $this->close;
                $obj->high = $this->high;
                $obj->low = $this->low;
                $obj->high_52 = $this->high_52;
                $obj->low_52 = $this->low_52;
                $obj->all_high = $this->all_high;
                $obj->all_low = $this->all_low;
                $obj->pivot = $this->pivot;
                $obj->r1 = $this->r1;
                $obj->r2 = $this->r2;
                $obj->r3 = $this->r3;
                $obj->s1 = $this->s1;
                $obj->s2 = $this->s2;
                $obj->s3 = $this->s3;
                $obj->trend = $this->trend;
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = StockDetail::find($id);
            $this->vid = $obj->id;
            $this->stock_id = $obj->stock_id;
            $this->vdate = $obj->vdate;
            $this->ltp = $obj->ltp + 0;
            $this->chg = $obj->chg + 0;
            $this->chg_percent = $obj->chg_percent + 0;
            $this->volume = $obj->volume + 0;
            $this->open_interest = $obj->open_interest + 0;
            $this->open = $obj->open + 0;
            $this->close = $obj->close + 0;
            $this->high = $obj->high + 0;
            $this->low = $obj->low + 0;
            $this->high_52 = $obj->high_52 + 0;
            $this->low_52 = $obj->low_52 + 0;
            $this->all_high = $obj->all_high + 0;
            $this->all_low = $obj->all_low + 0;
            $this->pivot = $obj->pivot;
            $this->r1 = $obj->r1 + 0;
            $this->r2 = $obj->r2 + 0;
            $this->r3 = $obj->r3 + 0;
            $this->s1 = $obj->s1 + 0;
            $this->s2 = $obj->s2 + 0;
            $this->s3 = $obj->s3 + 0;
            $this->trend = $obj->trend;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[clearFields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vdate = Carbon::now()->format('Y-m-d');
        $this->ltp = '';
        $this->chg = '';
        $this->chg_percent = '';
        $this->volume = '';
        $this->open_interest = '';
        $this->open = '';
        $this->close = '';
        $this->high = '';
        $this->low = '';
        $this->high_52 = '';
        $this->low_52 = '';
        $this->all_high = '';
        $this->all_low = '';
        $this->pivot = '';
        $this->r1 = '';
        $this->r2 = '';
        $this->r3 = '';
        $this->s1 = '';
        $this->s2 = '';
        $this->s3 = '';
        $this->trend = '';
        $this->active_id = 1;

    }
    #endregion

    #region[getList]
    public function getList()
    {
        $this->sortField = 'vdate';
        return StockDetail::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('stock_id', '=', $this->stock->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Show Details]
    public function showDetailsRow($id): void
    {
        $this->showDetails = !$this->showDetails;

        $this->showDetailsId = $id;
    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.share-market.upsert')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
