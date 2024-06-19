<?php

namespace App\Http\Controllers\Entries\PurchaseReport;

use Aaran\Entries\Models\Payment;
use Aaran\Entries\Models\Purchase;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PayablesReportController extends Controller
{
    public function __invoke($party, $start_date, $end_date)
    {
        $purchase = $this->getList($party, $start_date, $end_date);
        $this->getBalance($party, $start_date, $end_date);
        Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif', 'fontDir']);

        $pdf = PDF::loadView('pdf.purchasereport.report',
            [
                'obj' => $purchase,
                'cmp' => Company::printDetails(session()->get('company_id')),
                'contact' => Contact::find($party),
                'start_date' => date('d-m-Y', strtotime($start_date)),
                'end_date' => date('d-m-Y', strtotime($end_date)),
                'billing_address' => Contact_detail::printDetails($party),
                'opening_balance'=>$this->opening_balance ,
            ]
        );

        $pdf->render();
        return $pdf->stream();
    }


    private function getList($party, $start_date, $end_date)
    {


        $purchase = Payment::select([
            'payments.company_id',
            'payments.contact_id',
            DB::raw("'payment' as mode"),
            "payments.id as vno",
            'payments.vdate as vdate',
            DB::raw("'' as grand_total"),
            'payments.payment_amount',
        ])
            ->where('contact_id', '=', $party)
            ->whereBetween('vdate', [$start_date, $end_date])
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
            ->where('contact_id', '=', $party)
            ->whereBetween('purchase_date', [$start_date, $end_date])
            ->where('company_id', '=', session()->get('company_id'))
            ->union($purchase)
            ->orderBy('vdate')
            ->orderBy('mode')->get();
    }


    #region[opening_balance]

    public mixed $opening_balance;
    public mixed $purchase_total = 0;
    public mixed $payment_total = 0;
    public function getBalance($party, $start_date, $end_date)
    {
        $obj = Contact::find($party);
        $this->opening_balance = $obj->opening_balance;

        $this->purchase_total = Purchase::whereDate('purchase_date', '<', $start_date)
            ->where('contact_id','=',$party)
            ->sum('grand_total');

        $this->payment_total = Payment::whereDate('vdate', '<', $start_date)
            ->where('contact_id','=',$party)
            ->sum('payment_amount');

        $this->opening_balance = $this->opening_balance + $this->purchase_total - $this->payment_total;

    }

    #endregion


}
