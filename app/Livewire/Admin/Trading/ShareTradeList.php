<?php

namespace App\Livewire\Admin\Trading;

use Aaran\Sundar\Models\ShareTrades;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class ShareTradeList extends Component
{
    #region[property]
    use CommonTrait;
    public $vdate;
    public mixed $opening_balance;
    public mixed $deposit;
    public mixed $loosed;
    public mixed $withdraw;
    public mixed $charges;
    public mixed $balance;
    public $remarks='';
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->vdate != '') {
            if ($this->vid == "") {
                ShareTrades::create([
                    'vdate' => $this->vdate,
                    'opening_balance' => $this->opening_balance?:0,
                    'deposit' => $this->deposit?:0,
                    'loosed' => $this->loosed?:0,
                    'withdraw' => $this->withdraw?:0,
                    'charges' => $this->charges?:0,
                    'balance' => $this->balance?:0,
                    'remarks' => $this->remarks,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = ShareTrades::find($this->vid);
                $obj->vdate =$this->vdate;
                $obj->opening_balance =$this->opening_balance;
                $obj->deposit =$this->deposit;
                $obj->loosed =$this->loosed;
                $obj->withdraw =$this->withdraw;
                $obj->charges =$this->charges;
                $obj->balance =$this->balance;
                $obj->remarks =$this->remarks;
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
            $obj = ShareTrades::find($id);
            $this->vid = $obj->id;
            $this->vdate =$obj->vdate;
            $this->opening_balance =$obj->opening_balance;
            $this->deposit =$obj->deposit;
            $this->loosed =$obj->loosed;
            $this->withdraw =$obj->withdraw;
            $this->charges =$obj->charges;
            $this->balance =$obj->balance;
            $this->remarks =$obj->remarks;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[getList]
    public function getList()
    {
        $this->sortField='vdate';

        return ShareTrades::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vdate = '';
        $this->opening_balance = '';
        $this->deposit = '';
        $this->loosed = '';
        $this->withdraw = '';
        $this->charges = '';
        $this->balance = '';
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
        return view('livewire.admin.trading.share-trade-list')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
