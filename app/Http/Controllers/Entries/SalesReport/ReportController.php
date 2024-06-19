<?php

namespace App\Http\Controllers\Entries\SalesReport;

use Aaran\Common\Models\Despatch;
use Aaran\Entries\Models\Receipt;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use Aaran\Master\Models\Style;
use App\Helper\ConvertTo;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __invoke($party, $start_date, $end_date)
    {
        $sale = $this->getList($party, $start_date, $end_date);
        $this->getBalance($party, $start_date, $end_date);
        Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif', 'fontDir']);

        $pdf = PDF::loadView('pdf.salesreport.report',
            [
                'obj' => $sale,
                'cmp' => Company::printDetails(session()->get('company_id')),
                'contact' => Contact::find($party),
                'start_date' => date('d-m-Y', strtotime($start_date)),
                'end_date' => date('d-m-Y', strtotime($end_date)),
                'billing_address' => Contact_detail::printDetails($this->contact_detail_id),
                'opening_balance'=>$this->opening_balance ,
            ]
        );

        $pdf->render();
        return $pdf->stream();
    }


    private function getList($party, $start_date, $end_date)
    {

        $sales = Receipt::select([
            'receipts.company_id',
            'receipts.contact_id',
            DB::raw("'receipt' as mode"),
            "receipts.id as vno",
            'receipts.vdate as vdate',
            DB::raw("'' as grand_total"),
            'receipts.receipt_amount',
            'receipts.chq_no',
        ])
            ->where('contact_id', '=', $party)
            ->whereBetween('vdate', [$start_date, $end_date])
            ->where('company_id', '=', session()->get('company_id'));


        return Sale::select([
            'sales.company_id',
            'sales.contact_id',
            DB::raw("'invoice' as mode"),
            "sales.invoice_no as vno",
            'sales.invoice_date as vdate',
            'sales.grand_total',
            DB::raw("'' as receipt_amount"),
            DB::raw("'' as chq_no"),
        ])
            ->where('contact_id', '=', $party)
            ->whereBetween('invoice_date', [$start_date, $end_date])
            ->where('company_id', '=', session()->get('company_id'))
            ->union($sales)
            ->orderBy('vdate')
            ->orderBy('mode')->get();
    }


    #region[opening_balance]

    public mixed $opening_balance;
    public mixed $sale_total = 0;
    public mixed $receipt_total = 0;
    public mixed $contact_detail_id ;

    public function getBalance($party, $start_date, $end_date)
    {
        $obj = Contact::find($party);
        $this->opening_balance = $obj->opening_balance;

        $this->sale_total = Sale::whereDate('invoice_date', '<', $start_date)
            ->where('contact_id','=',$party)
            ->sum('grand_total');

        $this->receipt_total = Receipt::whereDate('vdate', '<', $start_date)
            ->where('contact_id','=',$party)
            ->sum('receipt_amount');

        $this->opening_balance = $this->opening_balance + $this->sale_total - $this->receipt_total;

        $this->contact_detail_id=Contact_detail::where('contact_id', '=', $party)->first()->id;

    }

    #endregion


}
