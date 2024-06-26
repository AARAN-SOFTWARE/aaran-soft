<?php

namespace App\Http\Controllers;

use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Size;
use Aaran\Entries\Models\Sale;
use Aaran\Entries\Models\Saleitem;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact_detail;
use Aaran\Master\Models\Product;
use App\Livewire\Webs\Contact\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnteryController extends Controller
{
    public function createEntry(Request $request)
    {



        $validator = Validator::make($request->sale, [
            'uniqueno' => 'nullable',
            'acyear' => 'required',
            'company_id' => 'required',
            'contact_id' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required|date',
        ]);





        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $data = $request->sale;
        $data['company_id'] = Company::where('vname',$data['company_id'])->first()->id;
        $data['contact_id'] = \Aaran\Master\Models\Contact::where('vname',$data['contact_id'])->first()->id;
        $data['invoice_no'] = Sale::where('company_id', '=', $data['company_id'])->max('invoice_no') + 1;
        $data['uniqueno'] = $data['company_id']."~".$data['acyear']."~".$data['invoice_no'];
        $data['order_id'] = 1;
        $data['billing_id'] = Contact_detail::getId($data['contact_id']);
        $data['shipping_id'] = Contact_detail::getId($data['contact_id']);
        $data['style_id'] = 1;
        $data['despatch_id'] = 1;
        $data['sales_type'] = 0;
        $data['transport_id'] = 1;
        $data['ledger_id'] = 1;
        $data['destination'] = "";
        $data['bundle'] = "";
        $data['total_qty'] = 0;
        $data['total_taxable'] = 0;
        $data['total_gst'] = 0;
        $data['additional'] = 0;
        $data['round_off'] = 0;
        $data['grand_total'] = 0;
        $data['active_id'] = 1;
        $sales = Sale::create($data);

        foreach ($request->saleitem as $row) {


            $validator_2 = Validator::make($row, [
                'po_no' => 'nullable',
                'dc_no' => 'nullable',
                'no_of_roll' => 'nullable',
                'product_id' => 'required',
                'description' => 'nullable',
                'colour_id' => 'required',
                'size_id' => 'required',
                'qty' => 'required',
                'price' => 'required',
                'gst_percent' => 'required',
            ]);
            if ($validator_2->fails()) {
                return response()->json(['error' => $validator_2->errors()], 401);
            }
            $obj = $row;
            $obj['sale_id'] = $sales->id;
            $obj['po_no'] = "";
            $obj['dc_no'] = "";
            $obj['no_of_roll'] = "";
            $obj['product_id'] = Product::where('vname', $obj['product_id'])->first()->id;
            $obj['colour_id'] = Colour::where('vname', $obj['colour_id'])->first()->id;
            $obj['size_id'] = Size::where('vname', $obj['size_id'])->first()->id;
            $salesItem = Saleitem::create($obj);
            $response_item = $salesItem->id;
        }



        $response['invoice_no'] =  $sales->invoice_no;
        return response()->json([
            'success' => $response,
            'salesItems'=>$response_item
        ], 200);


    }
}
