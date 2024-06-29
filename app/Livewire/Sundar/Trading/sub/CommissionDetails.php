<?php

namespace App\Livewire\Sundar\Trading\sub;

use Aaran\Sundar\Models\Share\ShareTrades;
use Aaran\Sundar\Models\Share\TradeCommission;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class CommissionDetails extends Component
{
    #region[property]
    use CommonTrait;

    public $vdate;
    public mixed $share_trade_id;
    public mixed $stt;
    public mixed $sebi_fee;
    public mixed $stamp_duty;
    public mixed $gst;
    public mixed $amount;
    public $remarks = '';
    public mixed $search_user_id = '';

    public mixed $users;

    #endregion

    public function mount($id)
    {
        $this->users = User::all();

        $this->share_trade_id = $id;
    }


    #region[save]
    public function getSave(): string
    {
        if ($this->vid == "") {
            TradeCommission::create([
                'share_trade_id' => $this->share_trade_id,
                'vdate' => $this->vdate ?: Carbon::now()->format('Y-m-d'),
                'stt' => $this->stt ?: 0,
                'sebi_fee' => $this->sebi_fee ?: 0,
                'stamp_duty' => $this->stamp_duty ?: 0,
                'gst' => $this->gst ?: 0,
                'amount' => $this->amount ?: 0,
                'remarks' => $this->remarks ?: 0,
                'active_id' => $this->active_id,

            ]);
            $message = "Saved";

        } else {
            $obj = TradeCommission::find($this->vid);
            $obj->share_trade_id = $this->share_trade_id;
            $obj->vdate = $this->vdate;
            $obj->stt = $this->stt;
            $obj->sebi_fee = $this->sebi_fee;
            $obj->stamp_duty = $this->stamp_duty;
            $obj->gst = $this->gst;
            $obj->amount = $this->amount;
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
            $obj = TradeCommission::find($id);
            $this->vid = $obj->id;
            $this->share_trade_id = $obj->share_trade_id;
            $this->vdate = $obj->vdate;
            $this->stt = $obj->stt;
            $this->sebi_fee = $obj->sebi_fee;
            $this->stamp_duty = $obj->stamp_duty;
            $this->gst = $obj->gst;
            $this->amount = $obj->amount;
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

        return TradeCommission::search($this->searches)->where('user_id', '=', $this->k_id?:auth()->id())
            ->where('share_trade_id', '=', $this->share_trade_id)
            ->where('active_id', '=', $this->activeRecord)
            ->where('charges', '>', 0)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[clearFields]
    public function clearFields(): void
    {
        $this->vid='';
        $this->vdate = '';
        $this->stt = '';
        $this->sebi_fee = '';
        $this->stamp_duty = '';
        $this->gst = '';
        $this->amount = '';
        $this->remarks = '';
        $this->active_id = '1';
    }
    #endregion

    #region[getRoute]
    public function getRoute()
    {
        $this->redirect(route('shareTrades.charges'));
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.sundar.trading.sub.commission-details')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
