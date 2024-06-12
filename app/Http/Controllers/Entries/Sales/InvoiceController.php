<?php

namespace App\Http\Controllers\Entries\Sales;

use Aaran\Common\Models\Despatch;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use Aaran\Master\Models\Style;
use App\Enums\GstPercent;
use App\Helper\ConvertTo;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __invoke($vid)
    {
        if ($vid != '') {

            $sale = $this->getSales($vid);

            Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif','fontDir']);

            $pdf = PDF::loadView($this->getPdfViewPath()
                , [
                    'obj' => $sale,
                    'rupees' => ConvertTo::ruppesToWords($sale->grand_total),
                    'list' => $this->getSaleItems($vid),
                    'cmp' => Company::printDetails(session()->get('company_id')),
                    'billing_address' => Contact_detail::printDetails($sale->billing_id),
                    'shipping_address' => Contact_detail::printDetails($sale->shipping_id),
                ]);

            $pdf->render();

            return $pdf->stream();

        }
        return null;
    }

    public function getSales($vid): ?Sale
    {
        return Sale::select(
            'sales.*',
            'contacts.vname as contact_name',
            'contacts.msme_no as msme_no',
            'contacts.msme_type as msme_type',
            'orders.vname as order_no',
            'orders.order_name as order_name',
            'styles.vname as style_name',
            'styles.desc as style_desc',
            'despatches.vname as despatch_name',
            'despatches.vdate as despatch_date',
            'transports.vname as transport_name',
            'ledgers.vname as ledger_name',
        )
            ->join('contacts', 'contacts.id', '=', 'sales.contact_id')
            ->join('orders', 'orders.id', '=', 'sales.order_id')
            ->join('styles', 'styles.id', '=', 'sales.style_id')
            ->join('despatches', 'despatches.id', '=', 'sales.despatch_id')
            ->join('transports', 'transports.id', '=', 'sales.transport_id')
            ->join('ledgers', 'ledgers.id', '=', 'sales.ledger_id')
            ->where('sales.id', '=', $vid)
            ->get()->firstOrFail();
    }
    public function getSaleItems($vid): Collection
    {
        return DB::table('saleitems')
            ->select(
                'saleitems.*',
                'products.vname as product_name',
                'products.units as product_unit',
                'hsncodes.vname as hsncode',
                'colours.vname as colour_name',
                'sizes.vname as size_name',
            )
            ->join('products', 'products.id', '=', 'saleitems.product_id')
            ->join('hsncodes', 'hsncodes.id', '=', 'products.hsncode_id')
            ->join('colours', 'colours.id', '=', 'saleitems.colour_id')
            ->join('sizes', 'sizes.id', '=', 'saleitems.size_id')
            ->where('sale_id', '=', $vid)
            ->get()
            ->transform(function ($data) {
                return [
                    'saleitem_id' => $data->id,
                    'product_id' => $data->product_id,
                    'po_no' => $data->po_no,
                    'dc_no' => $data->dc_no,
                    'no_of_roll' => $data->no_of_roll,
                    'product_name' => $data->product_name,
                    'product_unit' => \App\Enums\Units::tryFrom($data->product_unit)->getName(),
                    'hsncode' => $data->hsncode,
                    'colour_id' => $data->colour_id,
                    'colour_name' => $data->colour_name,
                    'size_id' => $data->size_id,
                    'size_name' => $data->size_name,
                    'description' => $data->description,
                    'qty' => $data->qty,
                    'price' => $data->price,
                    'total_taxable' => number_format($data->qty * $data->price, 2, '.', ''),
                    'gst_percent' => $data->gst_percent/2,
                    'gst_amount' => number_format(($data->qty * $data->price) * (($data->gst_percent) / 100), 2, '.', ''),
                    'sub_total' => number_format((($data->qty * $data->price) * ($data->gst_percent / 100)) + ($data->qty * $data->price), 2, '.', ''),
                ];
            });
    }
    private function getPdfViewPath()
    {
        return match (config('aadmin.app_type')) {
            config('clients.GARMENT_DEMO') =>  'pdf.demo.garments_demo',
            config('clients.OFFSET_DEMO') =>  'pdf.demo.offset_demo',
            config('clients.AARAN_ERP') =>  'pdf.demo.aaran_erp',

            config('clients.SK_ENTERPRISES') =>  'pdf.sundar.sk_enterprises',
            config('clients.AARAN_INDIA_FASHION') =>  'pdf.sundar.aaran_india_fashion',
            config('clients.AARAN_ASSOCIATES') =>  'pdf.sundar.aaran_associates',
            config('clients.SK_PRINTERS') =>  'pdf.sundar.sk_printers',
            config('clients.SRI_GANAPATHI_PRINTING_PRESS') =>  'pdf.sundar.sri_ganapathy_printing',
            config('clients.AARAN_INFO_TECH') =>  'pdf.sundar.aaran_info_tech',

            config('clients.PRAPTHIIMPEX') =>  'pdf.sundar.prapthi_impex',
            config('clients.SMSUPVC') =>  'pdf.sundar.smsupvc',
            config('clients.VNINFOTECH') =>  'pdf.infotech.vninfotech',

            config('clients.SARA_SCREENS') =>  'pdf.offset.sales.sara_screens',
            config('clients.COLOURS_PRINTING') =>  'pdf.offset.sales.colours_printing',
            config('clients.NEW_AMMAN_PRINTERS') =>  'pdf.offset.sales.new_amman_printers',
            config('clients.KGS_PRINTERS') =>  'pdf.offset.sales.kgs_printer',
            config('clients.THIRUMURUGAN_PRINTERS') =>  'pdf.offset.sales.thirumurugan_printers',
            config('clients.KATHIR_PRINTERS') =>  'pdf.offset.sales.kathir_printers',
            config('clients.AJ_PRINTING') =>  'pdf.offset.sales.aj_printers',
            config('clients.SAIRF_SOURCING') =>  'pdf.offset.sales.sairf_sourcing',
            config('clients.BEST_PRINT') =>  'pdf.offset.sales.best_print',
            config('clients.VIP_GRAPHIICS') =>  'pdf.graphics.vip_graphiics',

            config('clients.VIJAY_GARMENTS') =>  'pdf.garments.sales.vijay_garments',
            config('clients.AMAL_TEX') =>  'pdf.garments.sales.amal_tex',
            config('clients.ESSA_KNITTING') =>  'pdf.Knitting.essa_knitting',
            config('clients.ESSA_KNITTING_GARMENT') =>  'pdf.garments.sales.essa_knitting_garments',
            config('clients.FASHION_FABRICS') =>  'pdf.Knitting.fashion_fabrics',
            config('clients.A1_IMPEX') =>  'pdf.offset.sales.a1_impex',
            config('clients.NEETHU_INDUSTRIES') =>  'pdf.suresh.neethu_industries',
            config('clients.VETRIVEL_GARMENTS') =>  'pdf.garments.sales.vetrivel_garments',
            config('clients.ASHWIN_TEX') =>  'pdf.garments.sales.ashwin_tex',
            config('clients.MARK_INTERNATIONAL') =>  'pdf.suresh.mark_international',
            config('clients.SRI_VENKATESWARA_TEXMART') =>  'pdf.suresh.sri_venkateswara_texmart',
            config('clients.SATHYANARAYANA_GARMENTS') =>  'pdf.garments.sales.satyanarayana',


            config('clients.SUKRAA_GARMENTS') =>  'pdf.garments.sales.invoice_1',
            config('clients.UGAN_APPARELS') =>  'pdf.garments.sales.invoice_1',
            config('clients.SEYON_FASHION') =>  'pdf.garments.sales.invoice_1',
            config('clients.SRI_SENTHUR_TEX') =>  'pdf.garments.sales.invoice_1',
            config('clients.SK_INTERNATIONAL') =>  'pdf.garments.sales.invoice_1',
            config('clients.SHONA_EXPORTS') =>  'pdf.garments.sales.invoice_1',
            config('clients.MODE_CREATIONS') =>  'pdf.garments.sales.invoice_1',
            config('clients.KARUNAAMBIKAA_EXPORT') =>  'pdf.garments.sales.invoice_1',
            config('clients.BOYANCE_INDIA') =>  'pdf.garments.sales.invoice_1',
            config('clients.ASWATH_APPARELS') =>  'pdf.garments.sales.invoice_1',
            config('clients.ATO_TEXTILES') =>  'pdf.garments.sales.invoice_1',

            default =>'pdf.garments.letterpad_withoutbank' ,
        };
//        view('pdf.offset.sales.best_print')
    }
}
