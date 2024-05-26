<?php

namespace App\Http\Controllers\Entries\Purchase;

use Aaran\Entries\Models\Purchase;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use App\Helper\ConvertTo;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __invoke($vid)
    {
        if($vid != ''){
            $peout = Purchase::select(
                'purchases.*',
                'contacts.vname as contact_name',
                'orders.vname as order_name'
            )
                ->join('contacts', 'contacts.id', '=', 'purchases.contact_id')
                ->join('orders', 'orders.id', '=', 'purchases.order_id')
                ->where('purchases.id', '=', $vid)
                ->get()->firstOrFail();


            $contact = Contact::printDetails($peout->contact_id);
            $tenant = Company::printDetails(1);

            $data = DB::table('purchaseitems')
                ->select(
                    'purchaseitems.*',
                    'products.vname as product_name',
                    'colours.vname as colour_name',
                    'sizes.vname as size_name'
                )
                ->join('products', 'products.id', '=', 'purchaseitems.product_id')
                ->join('colours', 'colours.id', '=', 'purchaseitems.colour_id')
                ->join('sizes', 'sizes.id', '=', 'purchaseitems.size_id')
                ->where('purchase_id', '=', $vid)
                ->get()
                ->transform(function ($data) {
                    return [
                        'purchaseitem_id' => $data->id,
                        'product_id' => $data->product_id,
                        'product_name' => $data->product_name,
                        'colour_id' => $data->colour_id,
                        'colour_name' => $data->colour_name,
                        'size_id' => $data->size_id,
                        'size_name' => $data->size_name,
                        'qty' => $data->qty,
                        'price' => $data->price,
                        'gst_percent' => $data->gst_percent,
                    ];
                });


            $peoutItem  = $data;

            Pdf::setOption(['dpi' => 150, 'defaultPaperSize'=>'a4', 'defaultFont' => 'sans-serif']);

            $pdf = PDF::loadView('pdf.entries.purchase.invoice',[
                'obj' => $peout,
                'rupees'=>ConvertTo::ruppesToWords($peout->grand_total),
                'list' => $peoutItem,
                'cmp' => $tenant,
                'contact' => $contact
            ]);


            $pdf->render();

            return $pdf->stream();

        }
        return null;
    }
}
