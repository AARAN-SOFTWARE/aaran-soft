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
            border: 1px solid black;
            border-collapse: collapse;
        }

        .page-break {
            page-break-after: always;
        }

        .item-r {
            text-align: right;
        }

        /* table copy*/
        .table-copy {
            border: none;
        }

        .inv-copy {
            line-height: 1;
            text-align: right;
        }

        .inv-copy td {
            font-size: 12px;
            font-weight: bold;
        }

        /* company logo , name and address  */
        .table-1 {
            border: 1px solid black;
        }

        .comp-name {
            font-size: 30px;
            font-weight: bold;
            line-height: 1;
            font-family: sans-serif;
        }

        .comp-details {
            font-size: 11px;
            line-height: .5;
            text-align: center;
        }

        .inv-logo {
            text-align: center;

        }

        .comp-logo {
            text-align: center;
            margin-left: 10px;
        }

        .inv-headOne {
            line-height: 0;
            border: 1px solid black;
            font-size: 14px;
            font-weight: bold;
            padding-top: 12px;
        }

        .inv-header {
            line-height: 0;
            background-color: black;
            text-align: center;
            color: white;
            font-size: 14px;
            letter-spacing: 1px;
        }

        /*  company Invoice header, address, no. and date.    */
        .table-2 {
            border-top: none;
            border-bottom: none;
        }

        .inv-contactName {
            font-size: 12px;
            font-weight: bold;
            padding-left: 20px;
            line-height: 1.5;
            display: block;
        }

        .inv-address .inv-contactAddress, .inv-address .inv-contactGST {
            font-size: 10px;
            line-height: .4;
            padding-left: 30px;
        }

        .inv-address .inv-contactGST {
            font-weight: bold;
            padding-top: 3px;
            font-family: sans-serif;
        }

        .inv-tab2 .inv-headTwo {
            line-height: 0;
        }

        .inv-headTwo {
            border: 1px solid black;
            border-top: none;
            border-right: none;
            padding-top: 12px;
            padding-left: 5px;
            font-size: 14px;
            font-weight: bold;

        }

        .inv-headThree {
            border: 1px solid black;
            border-top: none;
            border-left: none;
            padding-left: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .poNum, .poDate {
            font-size: 14px;
        }

        .inv-po, .poDate {
            border-bottom: none;
        }

        /* Invoice table data and Total */
        .inv-tableHeader {
            background-color: transparent;
            line-height: 1.5;
            border: 1px solid black;
        }

        .inv-tableHeader > th {
            font-size: 10px;
            font-weight: normal;
        }

        /* table data condition one */
        .inv-tableData1 {
            font-size: 11px;
            font-weight: bold;
            text-align: justify-all;
            vertical-align: top;
        }

        .inv-tableData1 > td {
            height: 40px;
            padding-left: 5px;
        }

        .inv-tableData1 .items-r {
            text-align: right;
        }

        .inv-tableData1 .items-l {
            text-align: left;

        }

        .inv-tableData1 .items-c {
            text-align: center;
        }

        /* table data condition two  */
        .inv-tableData2 {
            font-size: 11px;
            font-weight: bold;
            text-align: justify-all;
            vertical-align: top;
        }

        .inv-tableData2 > td {
            height: 40px;
            padding-left: 5px;
        }

        .inv-tableData2 .items-r {
            text-align: right;
        }

        .inv-tableData2 .items-l, .inv-tableTotal .items-l {
            text-align: left;
        }

        .inv-tableData2 .items-c {
            text-align: center;
        }

        .inv-tableHeader > th, .inv-tableData1 > td, .inv-tableData2 > td, .inv-tableSpace > td {
            border-right: 1px solid black;
        }

        /* spacing */
        .inv-tableSpace {
            line-height: 2.5;
        }

        /*total, Tax table */
        .table-4 {
            border: none;
        }
        .inv-totHead, .inv-totVal, .inv-total, .table-4 td {
            border: 1px solid black;
            border-top: none;
        }
        .inv-totHead .inv-totCol {
            border: none;
            border-left: 1px solid black;
        }
        .inv-totHead {
            font-size: 10px;
            line-height: 2;
            text-align: center;
        }
        .inv-totVal {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
            border-bottom: none;
            vertical-align: top;
        }
        .inv-totVal td {
            border-bottom: none;
            height: 27px;
        }
        .inv-total {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
            border-top: 1px solid black;
        }
        .inv-gTotal td {
            height: 23px;
        }
        .gTotal-col1 {
            font-size: 12px;
            padding-left: 10px;
        }
        .gTotal-col2 {
            font-size: 13px;
        }
        .gTot-amount {
            font-size: 12px;
            vertical-align: top;
            padding-left: 10px;
        }

        /*bank details , signature, description  */
        .bankDetails1 {
            font-size: 11px;
            font-weight: bold;
            line-height: 1.5;
            padding-left: 10px;

        }

        .bankRow .bankDetails1 {
            border-right: none;
        }

        .bankRow .bankDetails2 {
            border-left: none;
        }

        .bankHd {
            text-decoration: underline;
            color: #4b5563;
        }

        .bankDetails2 {
            font-size: 11px;
            font-weight: bold;
            line-height: 1.5;

        }

        .customer-sign {
            font-size: 12px;
            text-align: center;
            vertical-align: top;
            padding-top: 5px;
            font-weight: bold;
        }

        .auth-sign {
            font-size: 12px;
            text-align: center;
            vertical-align: top;
            padding-top: 5px;
        }

        .description > td {
            padding-left: 10px;
            font-size: 12px;
            border: none;
        }

        .description, .table-4 .description > td {
            border: none;
        }


    </style>
</head>
<body>

{{--Original Copy --}}
{{--/* company logo , name and address  */--}}
<table class="table-copy">
    <tr class="inv-copy">
        <td>ORIGINAL COPY</td>
    </tr>
</table>
<table class="table-1">
    <tr>
        <td rowspan="3" width="190px">
            <div class="inv-logo"><img src="{{ public_path('/storage/'.$cmp->get('logo'))}}"
                                       alt="company logo" width="160px" class="comp-logo"/>
            </div>
        </td>
        <td rowspan="3" class="comp-details">
            <span class="comp-name">{{$cmp->get('company_name')}}</span>
            <span class="comp-address">
                    <p>{{$cmp->get('address_1')}},</p>
                    <p>{{$cmp->get('address_2')}},</p>
                    <p>{{ $cmp->get('city') }} , {{$cmp->get('contact')}}</p>
                    <p>{{$cmp->get('email')}}</p>
                </span>
        </td>
        <td width="220px" class="inv-headOne inv-header">
            <p class="inv-taxInv">TAX INVOICE</p>
        </td>
    </tr>
    <tr>
        <td class="inv-headOne">&nbsp;&nbsp;{{$cmp->get('gstin')}}</td>
    </tr>
    <tr>
        <td class="inv-headOne">
            &nbsp;&nbsp;Date:&nbsp;&nbsp;{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</td>
    </tr>
</table>
{{--/*  company Invoice header, address, no. and date.    */--}}
<table class="table-2">
    <tr class="inv-tab2">
        <td rowspan="3" colspan="2" class="inv-address">
            <span class="inv-contactName"><span>To</span><br>M/s.{{$obj->contact_name}}</span>
            <p class="inv-contactAddress">{{$billing_address->get('address_1')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_2')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_3')}}</p>
            <p class="inv-contactGST">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td class="inv-headTwo" width="70px"> Invoice No</td>
        <td class="inv-headThree" width="130px">:&nbsp;&nbsp;{{$obj->invoice_no}}</td>

    </tr>
    <tr class="inv-tab2">
        <td class="inv-headTwo" width="80px"><p>Po No</p></td>
        <td class="inv-headThree poNum" width="120px">:&nbsp;&nbsp;{{ $obj->despatch_name }}</td>
    </tr>
    <tr class="inv-tab2">
        <td class="inv-headTwo inv-po" width="80px"><p>Po Date</p></td>
        <td class="inv-headThree poDate" width="120px">:&nbsp;&nbsp;{{ $obj->despatch_date }}</td>
    </tr>
</table>
{{--  /* Invoice table data and Total */ --}}
<table class="table-3" width="100%">
    <tr class="inv-tableHeader">
        <th width="4.66%">S.No</th>
        <th width="6.66%">Dc.No</th>
        <th width="8.33%">HSN Code</th>
        <th width="33.33%">Particulars</th>
        <th width="8.33%">Quantity</th>
        <th width="8.33%">Price</th>
        <th width="8.33%">Taxable value</th>
        <th width="4.33%">%</th>
        <th width="8.33%">GST</th>
        <th width="12.33%">sub Total</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        @if(strlen($row['hsncode'])<=8 && strlen($row['product_name']) && strlen($row['description'])<=38)
            <tr class="inv-tableData1">
                <td class="items-c">{{$index+1}} </td>
                <td class="items-c">{{$row['dc_no']}} </td>
                <td class="items-c">{{$row['hsncode']}}</td>
                <td class="items-l" style="">
                    @if($row['description'])
                        {{$row['product_name'].' - '.$row['description']}}
                    @else
                        {{$row['product_name']}}
                    @endif
                </td>
                <td class="items-c">{{$row['qty']+0}}</td>
                <td class="items-r">{{number_format($row['price'],2,'.','')}}</td>
                <td class="items-r">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
                <td class="items-c">{{$row['gst_percent']*2}}</td>
                <td class="items-r">{{number_format($row['gst_amount'],2,'.','')}}</td>
                <td class="items-r">{{number_format($row['sub_total'],2,'.','')}}</td>
            </tr>
        @else
            <tr class="inv-tableData2">
                <td class="items-c">{{$index+1}} </td>
                <td class="items-c">{{$row['dc_no']}} </td>
                <td class="items-c">{{$row['hsncode']}}</td>
                <td class="items-l" style="">
                    @if($row['description'])
                        {{$row['product_name'].' - '.$row['description']}}
                    @else
                        {{$row['product_name']}}
                    @endif
                </td>
                <td class="items-c">{{$row['qty']+0}}</td>
                <td class="items-r">{{number_format($row['price'],2,'.','')}}</td>
                <td class="items-r">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
                <td class="items-c">{{$row['gst_percent']*2}}</td>
                <td class="items-r">{{number_format($row['gst_amount'],2,'.','')}}</td>
                <td class="items-r">{{number_format($row['sub_total'],2,'.','')}}</td>
            </tr>
        @endif
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endforeach

    {{-- Spacing  --}}
    @for($i = 0; $i < 6-$list->count(); $i++)
        <tr class="inv-tableSpace">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    @endfor
</table>
{{-- Tax , Total table--}}
<table class="table-4" width="100%">
    {{--  Total header      --}}
    <tr class="inv-totHead">
        <td class="inv-totCol" rowspan="2" width="4.50%">S.No</td>
        <td class="inv-totCol" rowspan="2" width="14.66%">HSN Code</td>
        <td class="inv-totCol" rowspan="2">Quantity</td>
        <td class="inv-totCol" rowspan="2" width="14.66%">Total Value</td>
        <td colspan="2" width="">State Tax</td>
        <td colspan="2">Central Tax</td>
        <td colspan="2" wi>IGST Tax</td>
    </tr>
    <tr class="inv-totHead">
        <td width="8.33%">Rate %</td>
        <td width="10.33%">Amount</td>
        <td width="8.33%">Rate %</td>
        <td width="10.33%">Amount</td>
        <td width="8.33%">Rate %</td>
        <td width="10.33%">Amount</td>
    </tr>
    {{--   Total value     --}}
    @php
        $i=1;
        $qty=0;
        $hsncode = '';
        $totalValue=0;
        $totalGst=0;
        $gst_percent=0;

        $qty_12=0;
        $hsncode_12 = '';
        $totalValue_12=0;
        $totalGst_12=0;
        $gst_percent_12=0;

         $qty_18=0;
         $hsncode_18 = '';
        $totalValue_18=0;
        $totalGst_18=0;
        $gst_percent_18=0;

         $qty_24=0;
         $hsncode_24 = '';
        $totalValue_24=0;
        $totalGst_24=0;
        $gst_percent_24=0;
    @endphp
    @foreach($list as $index => $row)
        @if(($row['gst_percent']*2)==5)
            {{$hsncode = $hsncode.' '.$row['hsncode']}}
            {{$qty += $row['qty']}}
            {{ $totalValue += $row['total_taxable'] }}
            {{$totalGst += $row['gst_amount']}}
            {{$gst_percent=$row['gst_percent']}}
        @endif
        @if(($row['gst_percent']*2)==12)
            {{$hsncode_12 = $hsncode_12.' '.$row['hsncode']}}
            {{$qty_12 += $row['qty']}}
            {{ $totalValue_12 += $row['total_taxable'] }}
            {{$totalGst_12 += $row['gst_amount']}}
            {{$gst_percent_12=$row['gst_percent']}}
        @endif
        @if(($row['gst_percent']*2)==18)
            {{$hsncode_18 = $hsncode_18.' '.$row['hsncode']}}
            {{$qty_18 += $row['qty']}}
            {{ $totalValue_18 += $row['total_taxable'] }}
            {{$totalGst_18 += $row['gst_amount']}}
            {{$gst_percent_18=$row['gst_percent']}}
        @endif
        @if(($row['gst_percent']*2)==24)
            {{$hsncode_24 = $hsncode_24.' '.$row['hsncode']}}
            {{$qty_24 += $row['qty']}}
            {{ $totalValue_24 += $row['total_taxable'] }}
            {{$totalGst_24 += $row['gst_amount']}}
            {{$gst_percent_24=$row['gst_percent']}}
        @endif
    @endforeach
    <tr class="inv-totVal">
        @if($qty &&  $totalValue && $gst_percent && $totalGst)
            <td>{{$i++}}</td>
            <td>{{$hsncode}}</td>
            <td>&nbsp;{{$qty}}</td>
            <td class="item-r">{{number_format($totalValue,2)}}</td>
            @if($obj->sales_type==0)
                <td>{{number_format($gst_percent,2)}}</td>
                <td class="item-r">{{number_format($totalGst/2,2) }}</td>
                <td>{{number_format($gst_percent,2)}}</td>
                <td class="item-r">{{number_format($totalGst/2,2) }} </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>{{number_format($gst_percent*2,2 )}}</td>
                <td class="item-r">{{number_format($totalGst,2 )}}</td>
            @endif
        @else
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        @endif
    </tr>
    <tr class="inv-totVal">
        @if($qty_12 &&  $totalValue_12 && $gst_percent_12 && $totalGst_12)
            <td>{{$i++}}</td>
            <td>{{$hsncode_12}}</td>
            <td>&nbsp;{{$qty_12}}</td>
            <td class="item-r">{{number_format($totalValue_12,2)}}</td>
            @if($obj->sales_type==0)
                <td>{{number_format($gst_percent_12,2)}}</td>
                <td class="item-r">{{number_format($totalGst_12/2,2) }}</td>
                <td>{{number_format($gst_percent_12,2)}}</td>
                <td class="item-r">{{number_format($totalGst_12/2,2) }} </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>{{number_format($gst_percent_12*2,2 )}}</td>
                <td class="item-r">{{number_format($totalGst_12,2 )}}</td>
            @endif
        @else
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        @endif
    </tr>

    <tr class="inv-totVal">
        @if($qty_18 &&  $totalValue_18 && $gst_percent_18 && $totalGst_18)
            <td>{{$i++}}</td>
            <td>{{$hsncode_18}}</td>
            <td>&nbsp;{{$qty_18}}</td>
            <td class="item-r">{{number_format($totalValue_18,2)}}</td>
            @if($obj->sales_type==0)
                <td>{{number_format($gst_percent_18,2)}}</td>
                <td class="item-r">{{number_format($totalGst_18/2,2) }}</td>
                <td>{{number_format($gst_percent_18,2)}}</td>
                <td class="item-r">{{number_format($totalGst_18/2,2) }} </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>{{number_format($gst_percent_18*2,2 )}}</td>
                <td class="item-r">{{number_format($totalGst_18,2 )}}</td>
            @endif
        @else
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        @endif
    </tr>
    <tr class="inv-totVal">
        @if($qty_24 &&  $totalValue_24 && $gst_percent_24 && $totalGst_24)
            <td>{{$i++}}</td>
            <td>{{$hsncode_24}}</td>
            <td>&nbsp;{{$qty_24}}</td>
            <td class="item-r">{{number_format($totalValue_24,2)}}</td>
            @if($obj->sales_type==0)
                <td>{{number_format($gst_percent_24,2)}}</td>
                <td class="item-r">{{number_format($totalGst_24/2,2) }}</td>
                <td>{{number_format($gst_percent_24,2)}}</td>
                <td class="item-r">{{number_format($totalGst_24/2,2) }} </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>{{number_format($gst_percent_24*2,2 )}}</td>
                <td class="item-r">{{number_format($totalGst_24,2 )}}</td>
            @endif
        @else
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        @endif
    </tr>
    {{--   Table total   --}}
    <tr class="inv-total" >
        <td colspan="3">Total Taxable Value</td>
        <td class="item-r">{{number_format($obj->total_taxable,2,'.','')}}</td>
        @if($obj->sales_type==0)
            <td>SGST</td>
            <td class="item-r"> {{number_format($obj->total_gst/2,2,'.','')}}</td>
            <td>CGST</td>
            <td class="item-r"> {{number_format($obj->total_gst/2,2,'.','')}}</td>
            <td>IGST</td>
            <td>&nbsp;</td>
        @else
            <td>&nbsp;</td>
            <td> &nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>IGST</td>
            <td class="item-r">{{number_format($obj->total_gst,2,'.','')}}</td>
        @endif
    </tr>
    <tr class="inv-gTotal">
        <td rowspan="4" colspan="6" class="gTot-amount">
            <p>Invoice Amount (in words) Rupees</p>
            <p><b>{{$rupees}}Only</b></p>
        </td>
        <td colspan="2" class="gTotal-col1">Total Taxable Amount</td>
        <td colspan="2" class="gTotal-col2 item-r"><b>{{number_format($obj->total_taxable,2,'.','')}}</b></td>
    </tr>
    <tr class="inv-gTotal">
        <td colspan="2" class="gTotal-col1">Total GST Value</td>
        <td colspan="2" class="gTotal-col2 item-r"><b>{{number_format($obj->total_gst,2,'.','')}}</b></td>
    </tr>
    <tr class="inv-gTotal">
        <td colspan="2" class="gTotal-col1">Round off (+/-)</td>
        <td colspan="2" class="gTotal-col2 item-r"><b>{{number_format($obj->round_off,2,'.','')}}</b></td>
    </tr>
    <tr class="inv-gTotal">
        <td colspan="2" class="gTotal-col1"><b>Net Amount</b></td>
        <td colspan="2" class="gTotal-col2 item-r"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
    </tr>
    <tr class="bankRow">
        <td colspan="2" class="bankDetails1">
            <div class="bankHd">Bank Details</div>
            <div>NAME</div>
            <div>ACCOUNT NO</div>
            <div>IFSC CODE</div>
            <div>BANK NAME</div>
            <div>BRANCH</div>
        </td>
        <td colspan="2" class="bankDetails2">
            <div>&nbsp;</div>
            <div>:&nbsp;{{$cmp->get('company_name')}}</div>
            <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
            <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
            <div>:&nbsp;{{$cmp->get('bank')}}</div>
            <div>:&nbsp;{{$cmp->get('branch')}}</div>
        </td>
        <td colspan="2" class="customer-sign">Customer Signature</td>
        <td colspan="4" class="auth-sign">For <b>{{$cmp->get('company_name')}}</b></td>
    </tr>
    <tr class="description">
        <td colspan="10">
            <div>The Bill Payment should be settled within 30 days from date of delivery</div>
            <div>Goods once sold cannot br returned or exchanged</div>
            <div>Please inform any deviation from PO Quantity issue or table Mistaken DC/INVOICE within one week of
                delivery
            </div>
            <div>All Transaction are Subject to Tirupur Jurisdiction.</div>
        </td>
    </tr>
</table>

</body>
</html>
