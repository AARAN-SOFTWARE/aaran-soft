<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printing SalesInovice DC</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif, Helvetica, Times;
        }

        .inr-sign::before {
            content: "\20B9";
        }

        table {
            font-size: x-small;
            border-collapse: collapse;
        }

        th, td {
            font-size: xx-small;
            border: solid 1px rgba(161, 161, 161, 0.9);
            border-collapse: collapse;
            padding: 2px;
            position: relative;
            /*margin: 2px;*/
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        thead tr td {
            font-weight: bold;
        }

        /*.logoLeft {*/
        /*    position: fixed;*/
        /*    margin-top: 10px;*/
        /*    margin-left: 20px;*/
        /*    height: 80px !important;*/
        /*    Width: auto !important;*/
        /*}*/

        /*.companyname {*/
        /*    position: fixed;*/
        /*    margin-top: 2px;*/
        /*    margin-left: 20px;*/
        /*    !*font-weight: 400;*!*/
        /*    !*font-size: 36px;*!*/
        /*    !*font-size: x-large;*!*/
        /*    font-size: 30px;*/
        /*    text-align: center;*/
        /*    text-transform: uppercase;*/
        /*    height: 35px;*/
        /*}*/

        /*.address1 {*/
        /*    position: fixed;*/
        /*    margin-top: 34px;*/
        /*    font-weight: 400;*/
        /*    font-size: 12px;*/
        /*    text-align: center;*/
        /*    font-family: sans-serif;*/
        /*}*/

        /*.address2 {*/
        /*    position: fixed;*/
        /*    margin-top: 30px;*/
        /*    top: 20px !important;*/
        /*    font-weight: 400;*/
        /*    font-size: 12px;*/
        /*    text-align: center;*/
        /*    font-family: sans-serif;*/
        /*}*/

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

        .column1 {
            width: 300px;
            height: auto;

        }
        .column2 {
            width: 300px;
            height: auto;

        }


    </style>

</head>
<body>

<table width="100%" class="print:*">
    <thead>
    <tr>
        <td colspan="2" style="border: none;">
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="  background-color: darkgray">
            <div style=" height: 18px;text-align: center;  vertical-align: middle; color: white; font-size: medium  ">
                Invoice
            </div>
            <div style="text-align: right; color: white; margin-top: -20px; margin-bottom: 4px">
                Original copy&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </td>
    </tr>
    <tr>
        <td style="padding: 0;margin: 0;">
            <div style="text-align: left;">
                <p style="font-size: 12px; line-height: 5px ">&nbsp;&nbsp;M/s.{{$obj->contact_name}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$billing_address->get('address_1')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$billing_address->get('address_2')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$billing_address->get('address_3')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$billing_address->get('gstcell')}}</p>
            </div>
        </td>
        <td width="40%" style="padding: 0;margin: 0;">
            <div style="text-align: left; width: 100%;">
                <div><span style="vertical-align: middle;font-size: 13px;">&nbsp;&nbsp;Invoice no:&nbsp;</span><span
                        style="font-size: 18px;">&nbsp;&nbsp;{{$obj->invoice_no}}</span></div>
                <div><span >&nbsp;&nbsp;Date:&nbsp;</span>
                    <span>{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</span>
                </div>
                <div><span >&nbsp;&nbsp;Transport:&nbsp;</span>
                    <span>{{ $obj->ledger_name}}</span>
                </div>
                <div><span >&nbsp;&nbsp;Delivery To:&nbsp;</span>
                    <span>{{$obj->destination}}</span>
                </div>
                <div><span >&nbsp;&nbsp;No of Bundel:&nbsp;</span>
                    <span>{{$obj->bundle}}</span>
                </div>
            </div>
        </td>
    </tr>
    </thead>
</table>
<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        @if($obj->sales_type==0)
        <th width="5px" style="padding: 5px;">S.No</th>
        <th width="40px" style="padding: 5px;">HSN Code</th>
        <th width="120px"  style="padding: 5px;">Particulars</th>
        <th width="40px" style="padding: 5px; ">Size</th>
        <th width="40px" style="padding: 5px; ">Colour</th>
        <th width="40px" style="padding: 5px;">Quantity</th>
        <th width="40px" style="padding: 5px;">Price</th>
        <th width="40px" style="padding: 5px;">Taxable Amt</th>
        <th style="padding: 1px; width: 1px; border-right: none;text-align: left; margin-bottom: 0;">%</th>
        <th width="40px" style="padding: 2px; border-left: none; margin-left: 0px;">SGST Amt</th>
        <th style="padding: 1px; width: 1px; border-right: none;text-align: left; margin-bottom: 0;">%</th>
        <th width="40px" style="padding: 2px; border-left: none; margin-left: 0px;">CGST Amt</th>
        <th width="40px" style="padding: 5px;">sub Total</th>
        @else
            <th width="5px" style="padding: 5px;">S.No</th>
            <th width="40px" style="padding: 5px;">HSN Code</th>
            <th width="160px"  style="padding: 5px;">Particulars</th>
            <th width="40px" style="padding: 5px; ">Size</th>
            <th width="40px" style="padding: 5px; ">Colour</th>
            <th width="40px" style="padding: 5px;">Quantity</th>
            <th width="40px" style="padding: 5px;">Price</th>
            <th width="40px" style="padding: 5px;">Taxable Amt</th>
            <th colspan="2" style="padding: 1px; width: 1px;text-align: center; margin-bottom: 0;">%</th>
            <th colspan="2" width="40px" style="padding: 2px; border-left: none; margin-left: 0px;">IGST Amt</th>
            <th width="40px" style="padding: 5px;">sub Total</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @if($obj->sales_type==0)
    @foreach($list as $index => $row)
        <tr>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center"  style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center"  style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
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
            <td align="center" style="border-bottom: none;border-top: none;">{{$index+1}} </td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['hsncode']}}</td>
            <td align="left"  style="border-bottom: none;border-top: none;">&nbsp;{{$row['product_name']}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">{{$row['size_name']}} </td>
            <td align="center" style="border-bottom: none;border-top: none;">{{$row['colour_name']}} </td>
            <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{$row['qty']+0}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{number_format($row['price'],2,'.','')}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
            <td align="center" style="border-bottom: none;border-top: none; border-left: none;">{{$row['gst_percent']}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{number_format(($row['qty']*$row['price']*$row['gst_percent']/100)/2,2,'.','')}}</td>
            <td align="center" style="border-bottom: none;border-top: none; border-left: none;">{{$row['gst_percent']}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{number_format(($row['qty']*$row['price']*$row['gst_percent']/100)/2,2,'.','')}}</td>
            <td align="right" style="border-bottom: none;border-top: none; ">&nbsp;{{number_format($row['qty']*$row['price']*$row['gst_percent']/100+$row['qty']*$row['price'],2,'.','')}}</td>
        </tr>


    @endforeach

    @for($i = 0; $i < 28-($list->count()*2); $i++)


        <tr>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        </tr>

    @endfor

    <tr>
        <td colspan=2" align="left" style="border-right: none;">&nbsp;E&OE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td colspan="3" align="right" style="border-left: none;">&nbsp;Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td  align="right">{{$obj->total_qty+0}}</td>
        <td  align="right"></td>
        <td  align="right">{{number_format($obj->total_taxable,2,'.','')}}</td>
        <td colspan="2" align="right">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        <td colspan="2" align="right">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        <td colspan="1" align="right">{{number_format($obj->grand_total,2,'.','')}}</td>
    </tr>
    <tr>
        <td colspan="7" align="left" style="border-bottom: none;border-top: none; margin-bottom: 0px;">
            <div style="font-family:Times,serif">We hereby certify that our registration under the GST Act 2017 is inforceon the date on which sale of </div>
               <div style="font-family:Times,serif">the goods specified in this invoice is made by us and the transcation of sale is covered by this invoice</div>
        </td>
        <td colspan="5" align="left" style="border-bottom: none;border-top: none; border-right: none;">Taxable value</td>
        <td align="right" style="border-bottom: none;border-top: none; border-left: none;">{{number_format($obj->total_taxable,2,'.','')}}</td>
    </tr>
    <tr>
        <td colspan="7" align="left" style="border-bottom: none;border-top: none;margin-top: 0px;">
            <div style="font-family:Times,serif">
                has been effected by us in the regular
                course of our business. All the Disputes are subject to Tirupur Jurisdiction Only.
            </div>
        </td>
        <td colspan="5" align="left" style="border-bottom: none;border-right: none;">Add&nbsp;CGST&nbsp;{{ $row['gst_percent']}}&nbsp;%</td>
        <td align="right" style="border-bottom: none; border-left: none;">{{number_format($obj->total_gst/2,2,'.','')}}</td>
    </tr>
    <tr>
        <td colspan="7" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;">
        <div>* Goods once sold cannot be return back or exchanged</div>
        <div>* Seller cannot be responsible for any damage/mistakes.</div>
        </td>
        <td colspan="5" align="left" style="border-bottom: none;border-right: none;">Add&nbsp;SGST&nbsp;{{ $row['gst_percent']}}&nbsp;%</td>
        <td align="right" style="border-bottom: none; border-left: none;">{{number_format($obj->total_gst/2,2,'.','')}}</td>
    </tr>
    <tr>
        <td colspan="7" align="center" style="border-bottom: none;border-top: none;">
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </td>
        <td colspan="5" align="left" style="border-bottom: none;border-right: none;">Total GST</td>
        <td align="right" style="border-bottom: none; border-left: none;">{{number_format($obj->total_gst,2,'.','')}}</td>
    </tr>
    <tr>
        <td colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;">
            <div>ACCOUNT NO</div>
            <div>IFSC CODE</div>
        </td>
        <td  align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;border-left: none">
            <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
            <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
        </td>
        <td  colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-left: none;"></td>
        <td colspan="5" align="left" style="border-bottom: none;border-right: none;">&nbsp;Add&nbsp;Shipping Charges</td>
        <td align="right" style="border-bottom: none; border-left: none;">&nbsp;{{ number_format($obj->additional,2,'.','') }}</td>
    </tr>
    <tr>
        <td colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;">
            <div>BANK NAME</div>
            <div>BRANCH </div>
        </td>
        <td  align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;border-left: none">
            <div>:&nbsp;{{$cmp->get('bank')}}</div>
            <div>:&nbsp;{{$cmp->get('branch')}}</div>
        </td>
        <td  colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-left: none;"></td>
        <td colspan="5" align="left" style="border-bottom: none;border-right: none;">Round Off</td>
        <td align="right" style="border-bottom: none; border-left: none;">{{number_format($obj->round_off,2,'.','')}}</td>
    </tr>
    @else
        @foreach($list as $index => $row)
            <tr>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td colspan="2" align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td colspan="2" align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            </tr>

            <tr>
                <td align="center" style="border-bottom: none;border-top: none;">{{$index+1}} </td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['hsncode']}}</td>
                <td align="left" style="border-bottom: none;border-top: none;">&nbsp;{{$row['product_name']}}</td>
                <td align="center" style="border-bottom: none;border-top: none;">{{$row['size_name']}} </td>
                <td align="center" style="border-bottom: none;border-top: none;">{{$row['colour_name']}} </td>
                <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{$row['qty']+0}}</td>
                <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{number_format($row['price'],2,'.','')}}</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
                <td colspan="2" align="center" style="border-bottom: none;border-top: none; border-left: none;">{{$row['gst_percent']*2}}</td>
                <td colspan="2" align="right" style="border-bottom: none;border-top: none;">&nbsp;{{number_format($row['qty']*$row['price']*($row['gst_percent']*2)/100,2,'.','')}}</td>
                <td align="right" style="border-bottom: none;border-top: none; ">&nbsp;{{number_format($row['qty']*$row['price']*$row['gst_percent']/100+$row['qty']*$row['price'],2,'.','')}}</td>
            </tr>

        @endforeach

        @for($i = 0; $i < 28-($list->count()*2); $i++)


            <tr>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td colspan="2" align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td colspan="2" align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
                <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            </tr>

        @endfor

        <tr>
            <td colspan=2" align="left" style="border-right: none;">&nbsp;E&OE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="3" align="right" style="border-left: none;">&nbsp;Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td  align="right">{{$obj->total_qty+0}}</td>
            <td  align="right"></td>
            <td  align="right">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td colspan="2" align="right"></td>
            <td colspan="2" align="right">{{number_format($obj->total_gst,2,'.','')}}</td>
            <td colspan="1" align="right">{{number_format($obj->grand_total,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="7" align="left" style="border-bottom: none;border-top: none; margin-bottom: 0px;">
                <div style="font-family:Times,serif">We hereby certify that our registration under the GST Act 2017 is inforceon the date on which sale of </div>
                <div style="font-family:Times,serif">the goods specified in this invoice is made by us and the transcation of sale is covered by this invoice</div>
            </td>
            <td colspan="5" align="left" style="border-bottom: none;border-top: none; border-right: none;">Taxable value</td>
            <td align="right" style="border-bottom: none;border-top: none; border-left: none;">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="7" align="left" style="border-bottom: none;border-top: none;margin-top: 0px;">
                <div style="font-family:Times,serif">
                    has been effected by us in the regular
                    course of our business. All the Disputes are subject to Tirupur Jurisdiction Only.
                </div>
            </td>
            <td colspan="5" align="left" style="border-bottom: none;border-right: none;">Add&nbsp;IGST&nbsp;{{ $row['gst_percent']*2}}&nbsp;%</td>
            <td align="right" style="border-bottom: none; border-left: none;">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="7" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td colspan="5" align="left" style="border-bottom: none;border-right: none;">&nbsp;&nbsp;</td>
            <td align="right" style="border-bottom: none; border-left: none;"></td>
        </tr>
        <tr>
            <td colspan="7" align="center" style="border-bottom: none;border-top: none;">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
            </td>
            <td colspan="5" align="left" style="border-bottom: none;border-right: none;">Total GST</td>
            <td align="right" style="border-bottom: none; border-left: none;">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
            </td>
            <td  align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;border-left: none">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
            </td>
            <td  colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-left: none;"></td>
            <td colspan="5" align="left" style="border-bottom: none;border-right: none;">&nbsp;Add&nbsp;Shipping Charges</td>
            <td align="right" style="border-bottom: none; border-left: none;">&nbsp;{{ number_format($obj->additional,2,'.','') }}</td>
        </tr>
        <tr>
            <td colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;">
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td  align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-right: none;border-left: none">
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            <td  colspan="3" align="left" style="border-bottom: none;border-top: none;font-weight: bolder;border-left: none;"></td>
            <td colspan="5" align="left" style="border-bottom: none;border-right: none;">Round Off</td>
            <td align="right" style="border-bottom: none; border-left: none;">{{ number_format($obj->round_off,2,'.','')}}</td>
        </tr>

    @endif
    <tr>
        <td colspan="7"><span style="font-weight: bold;">Amount (in words)</span>
            <div style="margin-top: 5px;font-weight: bold;">
                {{$rupees}}Only
            </div>
        </td>
        <td colspan="5" align="left" style="border-bottom: none;border-right: none; font-weight: bold; font-size:medium;">GRAND TOTAL</td>
        <td align="center" style="border-bottom: none; border-left: none;font-weight: bold; font-size:medium;">{{ number_format($obj->grand_total,2,'.','')}}</td>
    </tr>
    <tr>
        <td colspan="6" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ;">Receiver Sign
        </td>
        <td colspan="7" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px; ">
            &nbsp;for&nbsp;{{$cmp->get('company_name')}}
            <div style="padding-top: 34px;  margin-top:16px">Authorized signatory</div>
        </td>
    </tr>
    </tbody>
</table>
<div style="text-align: left;font-size:10px; padding-top: 2px;padding-left: 10px; ">Subject to Tirupur Juridication</div>

</body>
</html>
