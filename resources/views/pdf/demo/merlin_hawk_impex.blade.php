!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printing Sales Inovice DC</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif, Helvetica, Times;
        }
        table {
            width: 100%;
            border: 1px solid darkgray;
            border-collapse: collapse;
        }
        .page-break {
            page-break-after: always;
        }
    /*  table */
        .table-0 {
            border: none;
        }
        .table-0 tr>td {
            border: none;
            font-size: 10px;
            text-align: right;
        }
        .table-1  tr > td , .table-2 tr > td , .table-3 tr>th, .table-3 tr > td{
            border: 1px solid darkgray;
            font-size: 11px;
        }
        .table-4 tr > td, .table-5 tr > td {
            font-size: 11px;
            border-left: 1px solid darkgray;
        }
        .table-2 tr > td > p {
            line-height: 0;
        }
    </style>
</head>
<body>

{{--Original Copy --}}
<table class="table-0"><tr><td>Original Copy</td></tr></table>
<table class="table-1">
    <tr>
        <td colspan="3" style="text-align: center;">COMMERCIAL INVOICE</td>
    </tr>
    <tr>
        <td width="50%">Exporter</td>
        <td width="25%">Invoice No.& DT:</td>
        <td width="25%">Exporter's Ref.</td>
    </tr>
    <tr>
        <td width="50%"><b>{{$cmp->get('company_name')}}</b></td>
        <td width="25%"><b>{{$obj->invoice_no}}&nbsp;&nbsp;DT:{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</b></td>
        <td width="25%">IE CODE:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_1')}}</td>
        <td width="25%" rowspan="2">PO: </td>
        <td width="25%">TIN NO:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_2')}}</td>
        <td width="25%">PAN NO:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_3')}},</td>
        <td width="25%" colspan="2">Other reference(s)</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('city')}},{{$cmp->get('gstin')}}</td>
        <td width="25%" colspan="2">NOTIFY PARTY</td>
    </tr>
</table>
<table class="table-2">
    <tr>
        <td width="25%"><b>Delivery Address</b></td>
        <td width="25%"><b>Invoice Address</b></td>
        <td width="50%" colspan="2">M/s.{{$obj->contact_name}}</td>
    </tr>
    <tr>
        <td width="25%">ATTN:&nbsp;{{$obj->contact_name}}</td>
        <td width="25%">M/S:&nbsp;{{$obj->contact_name}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_1')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_1')}}</td>
        <td width="25%">{{$shipping_address->get('address_1')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_2')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_2')}}</td>
        <td width="25%">{{$shipping_address->get('address_2')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_3')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_3')}}</td>
        <td width="25%">{{$shipping_address->get('address_3')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('gstcell')}}</td>
    </tr>
    <tr class="row">
        <td width="25%">{{$billing_address->get('gstcell')}}</td>
        <td width="25%">{{$shipping_address->get('gstcell')}}</td>
        <td width="25%%" class="sub"><b>Country of Orgin of goods</b></td>
        <td width="25%" class="sub"><b>Country of Final Destination</b></td>
    </tr>
    <tr>
        <td colspan="2" width="50%"></td>
        <td width="25%">India</td>
        <td width="25%">UNITED KINGDOM</td>
    </tr>
    <tr>
        <td ><b>Pre-Carriage by</b></td>
        <td><b>Place of Receipt by Pre-Carrier</b></td>
        <td width="50%" colspan="2"><b>Terms of Delivery, Payment & Period</b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Mode of shipment</b></td>
        <td><b>Port of Loading</b></td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>

    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Port of Discharge</b></td>
        <td><b>Final Destination</b></td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
</table>
<table class="table-3">
    <tr>
        <th width="5%">S.No</th>
        <th width="10%">HSN CODE</th>
        <th width="40%">PARTICULARS</th>
        <th width="10%">STYLE NO</th>
        <th width="10%">QTY</th>
        <th width="10%">Rate (FOB/GBP)</th>
        <th width="15%">Amount (FOB/GBP)</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    @endforeach
    @for($i = 0; $i < 20-$list->count(); $i++)
        <tr >

            <td >&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endfor
    <tr>
        <td colspan="4">NET INVOICE VALUE TO BE PAID</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

</table>
<table class="table-4">
    <tr>
        <td width="65%" style="font-size: 10px;">THE EXPORTERS (3216917711) OF THE PRODUCTS COVERED BY THIS DOCUMENT </td>
        <td width="20%" rowspan="2"><b>Total Amount in INR</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;">DECLARES THAT EXCEPT WHERE OTHERWISE CLEARLY INDICATED, THESE PRODUCTS</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;"> ARE OF(INDIA) PREFERENTIAL ORIGIN ACCORDING TO RULES OF ORIGIN OF THE </td>
        <td width="20%" rowspan="2"><b>Add 5% IGST in INR</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;">DEVELOPING COUNTRIES TRADING SCHEME OF THE UNITED KINGDOM AND THAT THE</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;"> ORIGIN CRITERION MET IS "W" (6109).</td>
        <td width="20%" rowspan="2"><b>GRAND TOTAL</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px; text-align: center;">SUPPLY MEANT FOR EXPORT ON PAYMENT OF INTEGRATED TAX</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px; text-align: center;">GARMENTS ARE PACKED WITHOUT HANGER</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr style="border-top: 1px solid darkgray;">
        <td colspan="3">Amount Chargeable (in words)</td>
    </tr>
    <tr>
        <td colspan="3">TOTAL FOR GBP:</td>
    </tr>
</table>
<table class="table-5">
    <tr>
        <td width="20%">Carton Dimension</td>
        <td width="40%">:&nbsp;60x40x30 CM</td>
        <td width="40%" rowspan="9" style="vertical-align: top; text-align: center; font-size: 12px;">Signature & Stamp</td>
    </tr>
    <tr>
        <td>No of Cartons</td>
        <td>:&nbsp;</td>
    </tr>
    <tr>
        <td>Total Nett Weight (Kgs)</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Total Gross Weight (Kgs)</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>TOTAL CARTONS</td>
        <td>&nbsp;</td>
    </tr>
    <tr style="border-top: 1px solid darkgray;">
        <td colspan="2">Declaration</td>
    </tr>
    <tr>
        <td colspan="2">We Declare that this Invoice shows the actual price of the goods</td>
    </tr>
    <tr>
        <td colspan="2">described and that all particulars are true and correct</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>

<div class="page-break"></div>

{{--Duplicate Copy --}}
<table class="table-0"><tr><td>Duplicate Copy</td></tr></table>
<table class="table-1">
    <tr>
        <td colspan="3" style="text-align: center;">COMMERCIAL INVOICE</td>
    </tr>
    <tr>
        <td width="50%">Exporter</td>
        <td width="25%">Invoice No.& DT:</td>
        <td width="25%">Exporter's Ref.</td>
    </tr>
    <tr>
        <td width="50%"><b>{{$cmp->get('company_name')}}</b></td>
        <td width="25%"><b>{{$obj->invoice_no}}&nbsp;&nbsp;DT:{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</b></td>
        <td width="25%">IE CODE:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_1')}}</td>
        <td width="25%" rowspan="2">PO: </td>
        <td width="25%">TIN NO:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_2')}}</td>
        <td width="25%">PAN NO:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_3')}},</td>
        <td width="25%" colspan="2">Other reference(s)</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('city')}},{{$cmp->get('gstin')}}</td>
        <td width="25%" colspan="2">NOTIFY PARTY</td>
    </tr>
</table>
<table class="table-2">
    <tr>
        <td width="25%"><b>Delivery Address</b></td>
        <td width="25%"><b>Invoice Address</b></td>
        <td width="50%" colspan="2">M/s.{{$obj->contact_name}}</td>
    </tr>
    <tr>
        <td width="25%">ATTN:&nbsp;{{$obj->contact_name}}</td>
        <td width="25%">M/S:&nbsp;{{$obj->contact_name}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_1')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_1')}}</td>
        <td width="25%">{{$shipping_address->get('address_1')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_2')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_2')}}</td>
        <td width="25%">{{$shipping_address->get('address_2')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_3')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_3')}}</td>
        <td width="25%">{{$shipping_address->get('address_3')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('gstcell')}}</td>
    </tr>
    <tr class="row">
        <td width="25%">{{$billing_address->get('gstcell')}}</td>
        <td width="25%">{{$shipping_address->get('gstcell')}}</td>
        <td width="25%%" class="sub"><b>Country of Orgin of goods</b></td>
        <td width="25%" class="sub"><b>Country of Final Destination</b></td>
    </tr>
    <tr>
        <td colspan="2" width="50%"></td>
        <td width="25%">India</td>
        <td width="25%">UNITED KINGDOM</td>
    </tr>
    <tr>
        <td ><b>Pre-Carriage by</b></td>
        <td><b>Place of Receipt by Pre-Carrier</b></td>
        <td width="50%" colspan="2"><b>Terms of Delivery, Payment & Period</b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Mode of shipment</b></td>
        <td><b>Port of Loading</b></td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>

    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Port of Discharge</b></td>
        <td><b>Final Destination</b></td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
</table>
<table class="table-3">
    <tr>
        <th width="5%">S.No</th>
        <th width="10%">HSN CODE</th>
        <th width="40%">PARTICULARS</th>
        <th width="10%">STYLE NO</th>
        <th width="10%">QTY</th>
        <th width="10%">Rate (FOB/GBP)</th>
        <th width="15%">Amount (FOB/GBP)</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    @endforeach
    @for($i = 0; $i < 20-$list->count(); $i++)
        <tr >

            <td >&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endfor
    <tr>
        <td colspan="4">NET INVOICE VALUE TO BE PAID</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

</table>
<table class="table-4">
    <tr>
        <td width="65%" style="font-size: 10px;">THE EXPORTERS (3216917711) OF THE PRODUCTS COVERED BY THIS DOCUMENT </td>
        <td width="20%" rowspan="2"><b>Total Amount in INR</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;">DECLARES THAT EXCEPT WHERE OTHERWISE CLEARLY INDICATED, THESE PRODUCTS</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;"> ARE OF(INDIA) PREFERENTIAL ORIGIN ACCORDING TO RULES OF ORIGIN OF THE </td>
        <td width="20%" rowspan="2"><b>Add 5% IGST in INR</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;">DEVELOPING COUNTRIES TRADING SCHEME OF THE UNITED KINGDOM AND THAT THE</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;"> ORIGIN CRITERION MET IS "W" (6109).</td>
        <td width="20%" rowspan="2"><b>GRAND TOTAL</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px; text-align: center;">SUPPLY MEANT FOR EXPORT ON PAYMENT OF INTEGRATED TAX</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px; text-align: center;">GARMENTS ARE PACKED WITHOUT HANGER</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr style="border-top: 1px solid darkgray;">
        <td colspan="3">Amount Chargeable (in words)</td>
    </tr>
    <tr>
        <td colspan="3">TOTAL FOR GBP:</td>
    </tr>
</table>
<table class="table-5">
    <tr>
        <td width="20%">Carton Dimension</td>
        <td width="40%">:&nbsp;60x40x30 CM</td>
        <td width="40%" rowspan="9" style="vertical-align: top; text-align: center; font-size: 12px;">Signature & Stamp</td>
    </tr>
    <tr>
        <td>No of Cartons</td>
        <td>:&nbsp;</td>
    </tr>
    <tr>
        <td>Total Nett Weight (Kgs)</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Total Gross Weight (Kgs)</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>TOTAL CARTONS</td>
        <td>&nbsp;</td>
    </tr>
    <tr style="border-top: 1px solid darkgray;">
        <td colspan="2">Declaration</td>
    </tr>
    <tr>
        <td colspan="2">We Declare that this Invoice shows the actual price of the goods</td>
    </tr>
    <tr>
        <td colspan="2">described and that all particulars are true and correct</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>

<div class="page-break"></div>

{{--Triplicate Copy --}}
<table class="table-0"><tr><td>Triplicate Copy</td></tr></table>
<table class="table-1">
    <tr>
        <td colspan="3" style="text-align: center;">COMMERCIAL INVOICE</td>
    </tr>
    <tr>
        <td width="50%">Exporter</td>
        <td width="25%">Invoice No.& DT:</td>
        <td width="25%">Exporter's Ref.</td>
    </tr>
    <tr>
        <td width="50%"><b>{{$cmp->get('company_name')}}</b></td>
        <td width="25%"><b>{{$obj->invoice_no}}&nbsp;&nbsp;DT:{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</b></td>
        <td width="25%">IE CODE:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_1')}}</td>
        <td width="25%" rowspan="2">PO: </td>
        <td width="25%">TIN NO:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_2')}}</td>
        <td width="25%">PAN NO:</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('address_3')}},</td>
        <td width="25%" colspan="2">Other reference(s)</td>
    </tr>
    <tr>
        <td width="50%">{{$cmp->get('city')}},{{$cmp->get('gstin')}}</td>
        <td width="25%" colspan="2">NOTIFY PARTY</td>
    </tr>
</table>
<table class="table-2">
    <tr>
        <td width="25%"><b>Delivery Address</b></td>
        <td width="25%"><b>Invoice Address</b></td>
        <td width="50%" colspan="2">M/s.{{$obj->contact_name}}</td>
    </tr>
    <tr>
        <td width="25%">ATTN:&nbsp;{{$obj->contact_name}}</td>
        <td width="25%">M/S:&nbsp;{{$obj->contact_name}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_1')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_1')}}</td>
        <td width="25%">{{$shipping_address->get('address_1')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_2')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_2')}}</td>
        <td width="25%">{{$shipping_address->get('address_2')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('address_3')}}</td>
    </tr>
    <tr>
        <td width="25%">{{$billing_address->get('address_3')}}</td>
        <td width="25%">{{$shipping_address->get('address_3')}}</td>
        <td width="50%" colspan="2">{{$shipping_address->get('gstcell')}}</td>
    </tr>
    <tr class="row">
        <td width="25%">{{$billing_address->get('gstcell')}}</td>
        <td width="25%">{{$shipping_address->get('gstcell')}}</td>
        <td width="25%%" class="sub"><b>Country of Orgin of goods</b></td>
        <td width="25%" class="sub"><b>Country of Final Destination</b></td>
    </tr>
    <tr>
        <td colspan="2" width="50%"></td>
        <td width="25%">India</td>
        <td width="25%">UNITED KINGDOM</td>
    </tr>
    <tr>
        <td ><b>Pre-Carriage by</b></td>
        <td><b>Place of Receipt by Pre-Carrier</b></td>
        <td width="50%" colspan="2"><b>Terms of Delivery, Payment & Period</b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Mode of shipment</b></td>
        <td><b>Port of Loading</b></td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>

    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Port of Discharge</b></td>
        <td><b>Final Destination</b></td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="50%" colspan="2">&nbsp;</td>
    </tr>
</table>
<table class="table-3">
    <tr>
        <th width="5%">S.No</th>
        <th width="10%">HSN CODE</th>
        <th width="40%">PARTICULARS</th>
        <th width="10%">STYLE NO</th>
        <th width="10%">QTY</th>
        <th width="10%">Rate (FOB/GBP)</th>
        <th width="15%">Amount (FOB/GBP)</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    @endforeach
    @for($i = 0; $i < 20-$list->count(); $i++)
        <tr >

            <td >&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endfor
    <tr>
        <td colspan="4">NET INVOICE VALUE TO BE PAID</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

</table>
<table class="table-4">
    <tr>
        <td width="65%" style="font-size: 10px;">THE EXPORTERS (3216917711) OF THE PRODUCTS COVERED BY THIS DOCUMENT </td>
        <td width="20%" rowspan="2"><b>Total Amount in INR</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;">DECLARES THAT EXCEPT WHERE OTHERWISE CLEARLY INDICATED, THESE PRODUCTS</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;"> ARE OF(INDIA) PREFERENTIAL ORIGIN ACCORDING TO RULES OF ORIGIN OF THE </td>
        <td width="20%" rowspan="2"><b>Add 5% IGST in INR</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;">DEVELOPING COUNTRIES TRADING SCHEME OF THE UNITED KINGDOM AND THAT THE</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px;"> ORIGIN CRITERION MET IS "W" (6109).</td>
        <td width="20%" rowspan="2"><b>GRAND TOTAL</b></td>
        <td width="15%" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px; text-align: center;">SUPPLY MEANT FOR EXPORT ON PAYMENT OF INTEGRATED TAX</td>
    </tr>
    <tr>
        <td width="65%" style="font-size: 10px; text-align: center;">GARMENTS ARE PACKED WITHOUT HANGER</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr style="border-top: 1px solid darkgray;">
        <td colspan="3">Amount Chargeable (in words)</td>
    </tr>
    <tr>
        <td colspan="3">TOTAL FOR GBP:</td>
    </tr>
</table>
<table class="table-5">
    <tr>
        <td width="20%">Carton Dimension</td>
        <td width="40%">:&nbsp;60x40x30 CM</td>
        <td width="40%" rowspan="9" style="vertical-align: top; text-align: center; font-size: 12px;">Signature & Stamp</td>
    </tr>
    <tr>
        <td>No of Cartons</td>
        <td>:&nbsp;</td>
    </tr>
    <tr>
        <td>Total Nett Weight (Kgs)</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Total Gross Weight (Kgs)</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>TOTAL CARTONS</td>
        <td>&nbsp;</td>
    </tr>
    <tr style="border-top: 1px solid darkgray;">
        <td colspan="2">Declaration</td>
    </tr>
    <tr>
        <td colspan="2">We Declare that this Invoice shows the actual price of the goods</td>
    </tr>
    <tr>
        <td colspan="2">described and that all particulars are true and correct</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>

</body>
</html>
