<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printing invoice DC</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .inr-sign::before {
            content: "\20B9";
        }

        table {
            font-size: x-small;
            border-collapse: collapse;
        }

        th, td {
            border: solid 1px rgba(161, 161, 161, 0.9);
            border-collapse: collapse;
            padding: 2px;
            /*margin: 2px;*/
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        thead tr td {
            font-weight: bold;
        }

        .logoLeft {
            position: fixed;
            margin-top: 10px;
            margin-left: 20px;
            height: 80px !important;
            Width: auto !important;
        }

        .companyname {
            position: fixed;
            margin-top: 2px;
            margin-left: 20px;
            /*font-weight: 400;*/
            /*font-size: 36px;*/
            /*font-size: x-large;*/
            font-size: 20px;
            text-align: left;
            text-transform: uppercase;
            height: 35px;
        }

        .address1 {
            position: fixed;
            margin-top: 34px;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        .address2 {
            position: fixed;
            margin-top: 30px;
            top: 20px !important;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        .gst {
            position: fixed;
            margin-top: 32px;
            top: 32px !important;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        div.relative {
            position: relative;
            width: 400px;
            height: 200px;
            border: 3px solid #73AD21;
        }

        div.absolute {
            position: absolute;
            top: 80px;
            right: 0;
            width: 200px;
            height: 100px;
            border: 3px solid red;
        }


        .page-break {
            page-break-after: always;
        }

    </style>

</head>
<body>
<h1 style="position: relative; text-align: center; margin-top: 4px">Tax Invoice</h1>
<table width="100%" class="print:*">
    <tr>
        <td colspan="4" rowspan="3" style="padding: 10px;">
            <div style="text-align: left; width: 100%; position: relative;" class="companyname">{{$cmp->get('company_name')}}</div>
            <div style="text-align: left; width: 100%; position: absolute;" class="address1">{{$cmp->get('address_1')}}</div>
            <div style="text-align: left; width: 100%; position: relative;" class="address2">{{$cmp->get('address_2')}}</div>
        </td>
        <td colspan="2">
            <div><span>&nbsp;&nbsp;Invoice no:&nbsp;</span><span>&nbsp;&nbsp;{{$obj->invoice_no}}</span></div>
        </td>
        <td colspan="2">
            <div><span>&nbsp;&nbsp;Date:&nbsp;</span><span>{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</span>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div>Delivery Note:</div>
        </td>
        <td colspan="2">
            <div>Mode/Terms of payment:</div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><div>Reference No. & Date:</div></td>
        <td colspan="2"><div>Other References:</div></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="3" style="padding: 10px;">

        </td>
        <td colspan="2">
            <div><span>&nbsp;&nbsp;Buyer's Order No:&nbsp;</span><span>&nbsp;&nbsp;{{$obj->invoice_no}}</span></div>
        </td>
        <td colspan="2">
            <div><span>&nbsp;&nbsp;Dated:&nbsp;</span><span>{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</span>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div>Dispatch Doc No:</div>
        </td>
        <td colspan="2">
            <div>Delivery Note Date:</div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><div>Dispatched through:</div></td>
        <td colspan="2"><div>Destination:</div></td>
    </tr>

    <tr>
        <td style="width: 12px">S.No</td>
        <td>Description of Goods</td>
        <td>HSN/SAC</td>
        <td>Quantity</td>
        <td>Rate</td>
        <td>Per</td>
        <td>Dis%</td>
        <td>Amount</td>
    </tr>
    <tr>
        <tbody>
    @foreach($list as $index => $row)

        <tr>
            <th align="center">{{$index+1}} </th>
            <th align="center" >&nbsp;{{$row['product_name']}}</th>
            <th align="center" >&nbsp;{{$row['colour_name']}}</th>
            <th align="center" >&nbsp;{{$row['size_name']}}</th>
            <th align="right" >&nbsp;{{$row['qty']}}</th>
            <th align="right" >&nbsp;{{$row['price']}}</th>
            <th align="right" >&nbsp;{{$row['price']}}</th>
            <th align="right" >&nbsp;{{$row['qty']*$row['price']}}</th>
        </tr>

    @endforeach

    @for($i = 0; $i < 22-$list->count(); $i++)

    @endfor
    <tr>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="right" style="border-bottom: none;border-top: none;">Cgst Tax</td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;">{{ $obj->total_gst/2 }}</td>
    </tr>
    <tr>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="right" style="border-bottom: none;border-top: none;">Sgst Tax</td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;">{{ $obj->total_gst/2 }}</td>
    </tr>
    <tr>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="right" style="border-bottom: none;border-top: none;">Round Off</td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;"></td>
        <td align="center" style="border-bottom: none;border-top: none;">{{ $obj->round_off }}</td>
    </tr>

    <tr>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
    </tr>

    <tr>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="2" align="right">&nbsp;Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="right"></td>
        <td align="right"></td>
        <td align="right">{{$obj->total_qty}}</td>
        <td align="right"></td>
        <td align="right"></td>
        <td align="right">{{$obj->grand_total}}</td>
    </tr>

    <tr>

        <td colspan="7"><span>Amount (in words)</span>
            <div>
                {{$rupees}}
            </div>
        </td>
        <td>E. & O.E</td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="border-bottom: none;border-top: none;">Taxable</td>
        <td colspan="2" align="center" style="border-bottom: none;border-top: none;">CGST</td>
        <td colspan="2" align="center" style="border-bottom: none;border-top: none;">SGST/UTGST</td>
        <td align="center" style="border-bottom: none;border-top: none;">Total</td>
        <td></td>
    </tr>

    <tr>
        <td colspan="2" align="center" style="border-top: none;">value</td>
        <td align="center">Rate</td>
        <td align="center">Amount</td>
        <td align="center">Rate</td>
        <td align="center">Amount</td>
        <td align="center" style="border-top: none;">Tax Amount</td>
        <td></td>
    </tr>

    @foreach($list as $index => $row)
        <tr>
            <td colspan="2" align="right"
                style="border-bottom: none;border-top: none;">{{$row['qty']*$row['price']}}</td>
            <td align="center" style="border-bottom: none; border-top: none;">{{$row['gst_percent']/2}}%</td>
            <td align="center"
                style="border-bottom: none; border-top: none;">{{($row['qty']*$row['price']*$row['gst_percent']/100)/2}}</td>
            <td align="center" style="border-bottom: none; border-top: none;">{{$row['gst_percent']/2}}%</td>
            <td align="center"
                style="border-bottom: none; border-top: none;">{{($row['qty']*$row['price']*$row['gst_percent']/100)/2}}</td>
            <td align="center"
                style="border-bottom: none;border-top: none;">{{$row['qty']*$row['price']*$row['gst_percent']/100}}</td>
            <td></td>
        </tr>

    @endforeach

    <tr>
        <td width="120px" align="center" style="border-bottom: none;">Total</td>
        <td align="right" style="border-bottom: none;">{{$obj->total_taxable}}</td>
        <td align="center" style="border-bottom: none; "></td>
        <td align="center" style="border-bottom: none; ">{{$obj->total_gst/2}}</td>
        <td align="center" style="border-bottom: none; "></td>
        <td align="center" style="border-bottom: none; ">{{$obj->total_gst/2}}</td>
        <td align="center" style="border-bottom: none;">{{$obj->total_gst}}</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="4" rowspan="4"></td>
    </tr>
    <tr>
        <td colspan="8"><span style="text-underline: #5e5e5e;">Declaration:</span>
            <div style="padding-top:5px; ">
                We declare that this invoice shows the actual price of the
                goods described and that all particulars are true and
                correct.
            </div>
        </td>

    </tr>
    <tr>
        <td colspan="4" style="height: 40px; text-align: left; vertical-align: top; padding-top: 5px ">Receiver Sign
        </td>
        <td colspan="4" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ">
            &nbsp;for&nbsp;{{$cmp->get('company_name')}}
            <div style="padding-top: 20px;">Authorized signatory</div>
        </td>
    </tr>
</table>
<div style="text-align: center;font-size:10px ">This is a Computer Generated Invoice</div>

</body>
</html>
