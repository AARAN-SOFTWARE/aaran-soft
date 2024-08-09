<?php

namespace App\Livewire\Audit\ClientFee;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\ClientFee;
use App\Enums\Status;
use App\Enums\Years;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Report extends Component
{
    #region[property]
    use CommonTrait;
    public $clientId;
    public $year;
    public string $month;
    public mixed $client_id;
    public string $invoice_no;
    public mixed $invoice_date;
    public mixed $taxable;
    public mixed $gst;
    public mixed $amount;
    public mixed $receipt;
    public mixed $receipt_date;
    public string $receipt_ref;
    public string $status_id;
    public $clients;

    public mixed $diff;
    #endregion

    #region[mount]
    public function mount($id): void
    {
        $this->clientId=$id;
        $this->year = Years::AY_2024->value;
        $this->clients = Client::all();
    }
    #endregion

    #region[getObj]
    public function getObj($id): void
    {
        if ($id) {
            $obj = ClientFee::find($id);
            $this->vid = $obj->id;
            $this->client_id = $obj->client_id;
            $this->month = $obj->month;
            $this->year = $obj->year;
            $this->invoice_no = $obj->invoice_no;
            $this->invoice_date = $obj->invoice_date;
            $this->taxable = $obj->taxable;
            $this->gst = $obj->gst;
            $this->amount = $obj->amount;
            $this->receipt = $obj->receipt;
            $this->receipt_date = $obj->receipt_date;
            $this->receipt_ref = $obj->receipt_ref;
            $this->active_id = $obj->active_id;
        }
    }
    #endregion

    public function getSave(): string
    {
        if ($this->vid) {
            $obj = ClientFee::find($this->vid);
            $obj->invoice_no = $this->invoice_no;
            $obj->invoice_date = $this->invoice_date;

            $obj->taxable = $this->taxable;
            $obj->gst = $this->gst;
            $obj->amount = $this->taxable + $this->gst;

            $obj->receipt = $this->receipt;
            $obj->receipt_date = $this->receipt_date;

            $total = ($this->taxable + $this->gst) - $this->receipt;

            if ($total == 0) {
                $obj->status_id = Status::RECEIVED->value;
            } else {
                $obj->status_id = Status::PENDING->value;
            }

            $obj->receipt_ref = $this->receipt_ref;
            $obj->active_id = $this->active_id ?: '0';
//            $obj->company_id = session()->get('company_id');
            $obj->user_id = Auth::id();
            $obj->save();
        }

        $this->gst = '';
        return 'Updated';
    }

    #region[List]
    public function getList()
    {
        $this->sortField = 'client_id';

        return ClientFee::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('client_id', '=', $this->clientId)
            ->where('year', '=', $this->year)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion


    public function reRender()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.audit.client-fee.report')->with([
            'list' => $this->getList()
        ]);
    }
}
