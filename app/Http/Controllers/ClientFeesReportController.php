<?php

namespace App\Http\Controllers;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\ClientDetail;
use Aaran\Audit\Models\ClientFee;
use Aaran\Master\Models\Company;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ClientFeesReportController extends Controller
{
    public function __invoke($vid=null,$year=null)
    {
        $clientFees = $this->getList($vid,$year);
        Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif', 'fontDir']);

        $pdf = PDF::loadView('pdf.client-fees.clientfees',
            [
                'obj' => $clientFees,
                'cmp' => Company::printDetails(session()->get('company_id')),
                'client_name'=>Client::find($vid)->vname,
                'client'=>ClientDetail::where('client_id',$vid)->first(),
            ]
        );
        $pdf->render();
        return $pdf->stream();
    }

    private function getList($vid=null,$year=null)
    {
        return ClientFee::where('client_id', '=', $vid)
            ->where('year', '=', $year)->orderBy('month','asc')->get();
    }
}
