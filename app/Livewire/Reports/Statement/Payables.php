<?php

namespace App\Livewire\Reports\Statement;

use Aaran\Entries\Models\Payment;
use Aaran\Entries\Models\Purchase;
use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Payables extends Component
{
    use CommonTrait;

    #region[properties]
    public Collection $contacts;
    public $byParty;
    public $byOrder;
    public $start_date;
    public $end_date;
    public mixed $opening_balance = '0';
    public mixed $purchase_total = 0;
    public mixed $payment_total = 0;
    public mixed $purchaseDate_first = '';
    #endregion

    #region[Contact]
    public function getContact()
    {
        $this->contacts = Contact::where('company_id', '=', session()->get('company_id'))->get();
    }
    #endregion

    #region[opening_balance]

    public function opening_Balance()
    {
        if ($this->byParty) {
            $obj = Contact::find($this->byParty);
            $this->opening_balance = $obj->opening_balance;

            $this->purchaseDate_first = Carbon::now()->subYear()->format('Y-m-d');


            $this->purchase_total = Purchase::whereDate('purchase_date', '<',
                $this->start_date ?: $this->purchaseDate_first)
                ->where('contact_id', '=', $this->byParty)
                ->sum('grand_total');

            $this->payment_total = Payment::whereDate('vdate', '<', $this->start_date ?: $this->purchaseDate_first)
                ->where('contact_id', '=', $this->byParty)
                ->sum('payment_amount');

            $this->opening_balance = $this->opening_balance + $this->purchase_total - $this->payment_total;
        }
        return $this->opening_balance;
    }

    #endregion

    public function getList()
    {
        $this->opening_Balance();

        $purchase = Payment::select([
            'payments.company_id',
            'payments.contact_id',
            DB::raw("'payment' as mode"),
            "payments.id as vno",
            'payments.vdate as vdate',
            DB::raw("'' as grand_total"),
            'payments.payment_amount',
        ])
            ->where('active_id', '=', $this->activeRecord)
            ->where('contact_id', '=', $this->byParty)
            ->whereDate('vdate', '>=', $this->start_date ?: $this->purchaseDate_first)
            ->whereDate('vdate', '<=', $this->end_date ?: carbon::now()->format('Y-m-d'))
            ->where('company_id', '=', session()->get('company_id'));


        return Purchase::select([
            'purchases.company_id',
            'purchases.contact_id',
            DB::raw("'invoice' as mode"),
            "purchases.purchase_no as vno",
            'purchases.purchase_date as vdate',
            'purchases.grand_total',
            DB::raw("'' as payment_amount"),
        ])
            ->where('active_id', '=', $this->activeRecord)
            ->where('contact_id', '=', $this->byParty)
            ->whereDate('purchase_date', '>=', $this->start_date ?: $this->purchaseDate_first)
            ->whereDate('purchase_date', '<=', $this->end_date ?: carbon::now()->format('Y-m-d'))
            ->where('company_id', '=', session()->get('company_id'))
            ->union($purchase)
            ->orderBy('vdate')
            ->orderBy('mode')->paginate($this->perPage);
    }

    #endregion

    #endregion
    public function print()
    {

        if ($this->byParty != null) {
            $this->redirect(route('payables.print',
                    [
                        'party' => $this->byParty, 'start_date' => $this->start_date ?: $this->purchaseDate_first,
                        'end_date' => $this->end_date ?: Carbon::now()->format('Y-m-d'),
                    ])
            );
        }
    }

    public function render()
    {
        $this->getContact();
        return view('livewire.reports.statement.payables')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
