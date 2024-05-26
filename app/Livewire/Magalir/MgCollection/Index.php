<?php

namespace App\Livewire\Magalir\MgCollection;

use Aaran\Audit\Models\ClientBank;
use Aaran\Audit\Models\ClientBankBalance;
use Aaran\Finance\Models\MgPassbook;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[properties]
    public string $client_bank_id = '';
    public mixed $cdate;
    public mixed $balance = 0;
    public $clients;
    public $dates;
    #endregion

    #region[Mount]
    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->clients = ClientBank::where('active_id', '=', '1')->get();
        $this->dates = DB::table('bank_balances')->select('cdate')->distinct('cdate')->limit(3)->orderBy('cdate', 'desc')->get();
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->client_bank_id != '' or $this->acno != '' or $this->ifsc != '') {
            if ($this->vid !== "") {
                $obj = ClientBankBalance::find($this->vid);
                $obj->client_bank_id = $this->client_bank_id;
                $obj->cdate = $this->cdate;
                $obj->balance = $this->balance;
                $obj->user_id = Auth::id();
                $obj->save();
                $message = "Updated";
            }

            $this->client_bank_id = '';
            $this->balance = '';

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ClientBankBalance::find($id);
            $this->vid = $obj->id;
            $this->client_bank_id = $obj->client_bank_id;
            $this->cdate = $obj->cdate;
            $this->balance = $obj->balance;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[Generate]
    public function generate(): void
    {

    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return MgPassbook::search($this->searches)
            ->whereDate('due_date', '=', $this->cdate)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function reRender()
    {
        return $this->render();
    }

    public function render()
    {
        return view('livewire.magalir.mg-collection.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
