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
            /* company logo , name and address  */
            .comp-name {
                font-size: 50px;
                font-weight: bold;
                line-height: 1;
                font-family: SansSerif;
            }

            .comp-nameEsha {
                font-size: 40px;
                font-weight: bold;
                line-height: 1;
                font-family: sans-serif;
            }

            /* Neethu Industries*/
            .table-1Neethu {
                border: none;
            }

            .comp-nameNeethu {
                font-size: 40px;
                font-weight: bold;
                line-height: 1;
                font-family: sans-serif;
            }
            /* ****  *****  ****  */

            .comp-details {
                font-size: 10px;
                line-height: .5;
                text-align: center;
            }
            .comp-logo {
                position: fixed;
                margin-left: 20px;
                padding-top: 10px;
            }

            /*  company Invoice header, address, no. and date.    */
            .table-2 {
                border-top: none;
                border-bottom: none;
            }
            .inv-header {
                background-color: dimgray;
                text-align: center;
                color: white;
                font-size: 18px;
                font-weight: bold;
                border-right: none;
            }
            .inv-copy {
                font-size: 15px;
                padding: 0;
                padding-right: 10px;
                text-align: right;
                border-left: none;

            }
            .inv-contactName {
                font-size: 12px;
                font-weight: bold;
                line-height: 1.5;
                padding-left: 20px;
                padding-top: 5px;
                display: block;
            }
            .inv-address .inv-contactAddress{
                font-size: 12px;
                line-height: .3;
                padding-left: 30px;
            }
            .inv-date {
                width: 250px;
                border-left: .5px solid darkgray;
                padding-left: 10px;
                font-weight: bold;
            }
            /* Neethu industries */
            .inv-dateNeethu {
                width: 250px;
                border-left: .5px solid darkgray;
                padding-left: 10px;
                font-weight: bold;
                line-height: .5;
            }

            .inv-dateNeethu .inv-po {
                font-weight: bold;
                font-size: 12px;
            }
            /* ****  **** ****  */


            /* Invoice table data and Total */
            .inv-tableHeader {
                background-color: transparent;
                border-bottom: 1px solid darkgray;
                font-size: 10px;
                line-height: 1.5;
                margin-bottom: 15px;
            }
            .inv-tableData {
                font-size: 12px;
                text-align: center;
                justify-items: flex-start;
                vertical-align: top;
                padding-top: 5px;padding-bottom: 5px;
            }
            .inv-tableData .items-r {
                text-align: right;
                padding-top: 5px;padding-bottom: 5px;
            }
            .inv-tableData .items-l {
                text-align: left;
                padding-top: 5px;padding-bottom: 5px;
            }
            .inv-tableData .items-c {
                text-align: center;
                padding-top: 5px;padding-bottom: 5px;
            }
            .inv-tableHeader > th, .inv-tableData > td, .inv-tableSpace > td {
                border-right: 1px solid darkgray;
            }
            .inv-tableTotal, .total-r {
                border: 1px solid darkgray;
                font-size: 12px;
                line-height: 1.5;
                text-align: right;
            }

            /* Description and Total table */
            .description-1 {
                font-size: 10px;
                line-height: 1.5;
            }
            .description-2 {
                font-size: 10px;
                font-weight: bold;

            }
            .bankDetails {
                font-size: 10px;
                font-weight: bold;
                padding-left: 5px;
            }
            .total-col-1 {

                font-size: 12px;
                text-align: left;
                border: 1px solid dimgray;
                line-height: 2;
                border-right: none;
                border-top: none;
                padding: 3px;
            }
            .total-col-2 {
                font-size: 12px;
                text-align: right;
                border: 1px solid dimgray;
                line-height: 2;
                border-top: none;
                border-left: none;
            }
            .amount {
                border-top: 1px solid dimgray;
                line-height: 1.5;
            }
            .rupees {
                font-size: 12px;
                padding-left: 3px;
            }

            /* Signature */
            .sign-col1 {
                vertical-align: top;
                height: 70px;
                font-size: 12px;
                padding-left: 5px;
                border-top: 1px solid dimgray;
            }
            .sign-col2 {
                font-size: 12px;
                text-align: center;
            }
            .pageBreak {
                font-size: 10px;
                text-align: center;
                padding-top: 5px;
            }

    </style>
</head>
<body>

{{-- sk Printers --}}
{{--/* company logo , name and address  */--}}
    <table class="table-1">
        <tr>
            <td>
                <img src="{{ public_path('images/client_logo/skprint.jpeg')}}" alt="company logo" width="100px" class="comp-logo"/>
                {{--  if you change the image width,then change the inline width of 3rd col(td - empty div) to be same as well --}}
            </td>
            <td class="comp-details">
                <span class="comp-name">SK PRINTERS</span>
                <span class="comp-address">
                    <p>10/20 A, Kumaranathapuram East Extension,1st street, Tiruppur - 641602</p>
                    <p>Contact: 9965499117 - Email: skprinterstirupur@gmail.com</p>
                    <p>GST: 33DGMPK5497Q1ZD</p>
                </span>
            </td>
            <td><div style="width: 90px; height: auto;"></div></td> {{-- td - empty div  --}}
        </tr>
    </table>
{{--/*  company Invoice header, address, no. and date.    */--}}
    <table class="table-2">
        <tr class="inv-header">
            <td style="width: 250px"></td>
            <td >INVOICE</td>
            <td style="width: 250px" class="inv-copy">Original copy</td>
        </tr>
        <tr style=>
            <td colspan="2" class="inv-address">
                <span class="inv-contactName">M/s.{{$obj->contact_name}}</span>
                <p class="inv-contactAddress">{{$billing_address->get('address_1')}}</p>
                <p class="inv-contactAddress">{{$billing_address->get('address_2')}}</p>
                <p class="inv-contactAddress">{{$billing_address->get('address_3')}}</p>
                <p class="inv-contactAddress">{{$billing_address->get('gstcell')}}</p>
            </td>
            <td class="inv-date">
                    <p>Invoice no:&nbsp;&nbsp;{{$obj->invoice_no}}</p>
                    <p>Date:&nbsp;&nbsp;{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</p>
            </td>
        </tr>
    </table>
{{--  /* Invoice table data and Total */ --}}
    <table class="table-3" width="100%">
        <tr class="inv-tableHeader">
            <th width="4.33%">S.No</th>
            <th width="6.33%">P.No</th>
            <th width="6.33%">Dc.No</th>
            <th width="8.33%">HSN Code</th>
            <th width="auto">Particulars</th>
            <th width="4.33%">Quantity</th>
            <th width="8.33%">Price</th>
            <th width="8.33%">Taxable Amnt</th>
            <th width="4.33%">%</th>
            <th width="16.66">GST</th>
            <th width="16.66">sub Total</th>
        </tr>
        @php
            $gstPercent = 0;
        @endphp
        @foreach($list as $index => $row)
            <tr class="inv-tableData">
                    <td class="items-c">{{$index+1}} </td>
                    <td class="items-l">{{$row['po_no']}}</td>
                    <td class="items-c">{{$row['dc_no']}} </td>
                    <td class="items-c">{{$row['hsncode']}}</td>
                    <td class="items-l" style="">&nbsp;{{$row['product_name']}}</td>
                    <td class="items-c">{{$row['qty']+0}}</td>
                    <td class="items-r">{{number_format($row['price'],2,'.','')}}</td>
                    <td class="items-r">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
                    <td class="items-c">{{$row['gst_percent']*2}}</td>
                <td class="items-r">{{number_format($row['gst_amount'],2,'.','')}}</td>
                <td class="items-r">{{number_format($row['sub_total'],2,'.','')}}</td>
            </tr>
            @php
                $gstPercent = $row['gst_percent'];
            @endphp
        @endforeach

        {{-- Spacing  --}}
        @if(strlen($row['po_no'])<=8)
            @if(strlen($row['product_name'])<=35)
                @for($i = 0; $i < 16-$list->count(); $i++)
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
                        <td>&nbsp;</td>
                    </tr>
                @endfor
            @else
                @for($i = 0; $i < 9-$list->count(); $i++)

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
                        <td>&nbsp;</td>
                    </tr>
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
                        <td>&nbsp;</td>
                    </tr>
                @endfor
            @endif
        @else
            @for($i = 0; $i < 9-$list->count(); $i++)

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
                    <td>&nbsp;</td>
                </tr>
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @endif


        <tr class="inv-tableTotal">
            <td colspan="2">E&OE</td>
            <td colspan="3" class="total-r" style="border-left: none; text-align: right;">Total</td>
            <td style="text-align: center" class="total-r">{{$obj->total_qty+0}}</td>
            <td class="total-r"></td>
            <td class="total-r">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td colspan="2" class="total-r">{{number_format($obj->total_gst,2,'.','')}}</td>
            <td class="total-r">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
        </tr>

        @if($obj->sales_type==0)
{{--        SGST and CGST Description and total gst and grand total--}}
            <tr>
                <td rowspan="2" colspan="6" class="description-1">
                            <span>We hereby certify that our registration under the GST Act 2017 is in force on
                                the date on which sale of the goods specified in this invoice is made by us
                                and the transaction of sale is covered by this invoice has been effected by
                                us in the regular course of our business. All the Disputes are subject to
                                Tirupur Jurisdiction Only.
                            </span>
                </td>
                <td class="total-col-1" colspan="2">Taxable Value</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
            </tr>
            <tr>
                <td class="total-col-1" colspan="2">CGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
            </tr>
            <tr>
                <td colspan="6" class="description-2">
                    <div>* Goods once sold cannot be return back or exchanged</div>
                    <div>* Seller cannot be responsible for any damage/mistakes.</div>
                </td>
                <td class="total-col-1" colspan="2">SGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
            </tr>
            <tr>
                <td colspan="6"><div></div></td>
                <td class="total-col-1" colspan="2">Total GST</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
            </tr>
            <tr>
                <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                    <div>ACCOUNT NO</div>
                    <div>IFSC CODE</div>
                    <div>BANK NAME</div>
                    <div>BRANCH </div>
                </td>
                <td rowspan="2" colspan="3" class="bankDetails">
                    <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                    <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                    <div>:&nbsp;{{$cmp->get('bank')}}</div>
                    <div>:&nbsp;{{$cmp->get('branch')}}</div>
                </td>
                @if($obj->additional!=0)
                    <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                    </td>
                    <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
                @else
                    <td class="total-col-1" colspan="2">&nbsp;</td>
                    <td  class="total-col-2" colspan="3">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <td class="total-col-1" colspan="2">Round Off</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
            </tr>
            <tr class="amount">
                <td colspan="6">
                    <div class="rupees">Amount (in words)</div>
                    <div class="rupees"><b>{{$rupees}}Only</b></div>
                </td>
                <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
                <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
            </tr>
        @else
            <tr>
                <td rowspan="2" colspan="6" class="description-1">
                    <span>We hereby certify that our registration under the GST Act 2017 is in force on
                        the date on which sale of the goods specified in this invoice is made by us
                        and the transaction of sale is covered by this invoice has been effected by
                        us in the regular course of our business. All the Disputes are subject to
                        Tirupur Jurisdiction Only.
                    </span>
                </td>
                <td class="total-col-1" colspan="2">Taxable Value</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
            </tr>
            <tr>
                <td class="total-col-1" colspan="2"><div></div></td>
                <td class="total-col-2" colspan="3"><div></div></td>
            </tr>
            <tr>
                <td colspan="6" class="description-2">
                    <div>* Goods once sold cannot be return back or exchanged</div>
                    <div>* Seller cannot be responsible for any damage/mistakes.</div>
                </td>
                <td class="total-col-1" colspan="2">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
            </tr>
            <tr>
                <td colspan="6"><div></div></td>
                <td class="total-col-1" colspan="2">Total GST</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
            </tr>
            <tr>
                <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                    <div>ACCOUNT NO</div>
                    <div>IFSC CODE</div>
                    <div>BANK NAME</div>
                    <div>BRANCH </div>
                </td>
                <td rowspan="2" colspan="3" class="bankDetails">
                    <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                    <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                    <div>:&nbsp;{{$cmp->get('bank')}}</div>
                    <div>:&nbsp;{{$cmp->get('branch')}}</div>
                </td>
                @if($obj->additional!=0)
                    <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                    </td>
                    <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
                @else
                    <td class="total-col-1" colspan="2">&nbsp;</td>
                    <td  class="total-col-2" colspan="3">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <td class="total-col-1" colspan="2">Round Off</td>
                <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
            </tr>
            <tr class="amount">
                <td colspan="5">
                    <div class="rupees">Amount (in words)</div>
                    <div class="rupees"><b>{{$rupees}}Only</b></div>
                </td>
                <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
                <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
            </tr>
        @endif
        <tr >
            <td colspan="7" class="sign-col1"  >Receiver Sign</td>
            <td colspan="4"  class="sign-col2" width="250px"  style="vertical-align: top">for&nbsp;<b>{{$cmp->get('company_name')}}</b></td>
        </tr>
        <tr>
            <td colspan="7"><div></div></td>
            <td colspan="4" class="sign-col2">Authorized Signatory</td>
        </tr>
    </table>
    <div class="pageBreak">This is a Computer generated Invoice</div>

<div class="page-break"></div>

{{-- saara Screens --}}
{{--/* company logo , name and address  */--}}
<table class="table-1">
    <tr>
        <td>
            <img src="{{ public_path('images/client_logo/saara.PNG')}}" alt="company logo" width="100px" class="comp-logo"/>
            {{--  if you change the image width,then change the inline width of 3rd col(td - empty div) to be same as well --}}
        </td>
        <td class="comp-details">
                <span class="comp-name">
                    <img src="{{ public_path('images/sara_screen.png')}}" alt="logo" width=""/>
                </span>
            <span class="comp-address">
                    <p>No. 579, Ponmani compound, P.n. road, tiruppur - 641602.</p>
                    <p>Contact: 9994854486 - Email: sarascreens2008@gmail.com</p>
                    <p>GST: 33BIMPS8964C1ZT - MSME No: 5DDEA543</p>
                </span>
        </td>
        <td><div style="width: 90px; height: auto;"></div></td> {{-- td - empty div  --}}
    </tr>
</table>
{{--/*  company Invoice header, address, no. and date.    */--}}
<table class="table-2">
    <tr class="inv-header">
        <td style="width: 250px;border-right: none;"></td>
        <td style="border: none;">TAX INVOICE</td>
        <td style="width:250px;border-left: none;" class="inv-copy">Original copy</td>
    </tr>
    <tr style=>
        <td colspan="2" class="inv-address">
            <span class="inv-contactName">M/s.{{$obj->contact_name}}</span>
            <p class="inv-contactAddress">{{$billing_address->get('address_1')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_2')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_3')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td class="inv-date">
            <p>Invoice no:&nbsp;&nbsp;{{$obj->invoice_no}}</p>
            <p>Date:&nbsp;&nbsp;{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</p>
        </td>
    </tr>
</table>
{{--  /* Invoice table data and Total */ --}}
<table class="table-3" width="100%">
    <tr class="inv-tableHeader">
        <th width="4.33%">S.No</th>
        <th width="6.33%">P.No</th>
        <th width="6.33%">Dc.No</th>
        <th width="8.33%">HSN Code</th>
        <th width="auto">Particulars</th>
        <th width="4.33%">Quantity</th>
        <th width="8.33%">Price</th>
        <th width="8.33%">Taxable Amnt</th>
        <th width="4.33%">%</th>
        <th width="16.66">GST</th>
        <th width="16.66">sub Total</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr class="inv-tableData">
            <td class="items-c">{{$index+1}} </td>
            <td class="items-l">{{$row['po_no']}}</td>
            <td class="items-c">{{$row['dc_no']}} </td>
            <td class="items-c">{{$row['hsncode']}}</td>
            <td class="items-l" style="">&nbsp;{{$row['product_name']}}</td>
            <td class="items-c">{{$row['qty']+0}}</td>
            <td class="items-r">{{number_format($row['price'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
            <td class="items-c">{{$row['gst_percent']*2}}</td>
            <td class="items-r">{{number_format($row['gst_amount'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['sub_total'],2,'.','')}}</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endforeach

    {{-- Spacing  --}}
    @if(strlen($row['po_no'])<=8)
        @if(strlen($row['product_name'])<=35)
            @for($i = 0; $i < 16-$list->count(); $i++)
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @else
            @for($i = 0; $i < 9-$list->count(); $i++)

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
                    <td>&nbsp;</td>
                </tr>
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @endif
    @else
        @for($i = 0; $i < 9-$list->count(); $i++)

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
                <td>&nbsp;</td>
            </tr>
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
                <td>&nbsp;</td>
            </tr>
        @endfor
    @endif


    <tr class="inv-tableTotal">
        <td colspan="2">E&OE</td>
        <td colspan="3" class="total-r" style="border-left: none; text-align: right;">Total</td>
        <td style="text-align: center" class="total-r">{{$obj->total_qty+0}}</td>
        <td class="total-r"></td>
        <td class="total-r">{{number_format($obj->total_taxable,2,'.','')}}</td>
        <td colspan="2" class="total-r">{{number_format($obj->total_gst,2,'.','')}}</td>
        <td class="total-r">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
    </tr>

    @if($obj->sales_type==0)
        {{--        SGST and CGST Description and total gst and grand total--}}
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                            <span>We hereby certify that our registration under the GST Act 2017 is in force on
                                the date on which sale of the goods specified in this invoice is made by us
                                and the transaction of sale is covered by this invoice has been effected by
                                us in the regular course of our business. All the Disputes are subject to
                                Tirupur Jurisdiction Only.
                            </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">CGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">SGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="3" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @else
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                    <span>We hereby certify that our registration under the GST Act 2017 is in force on
                        the date on which sale of the goods specified in this invoice is made by us
                        and the transaction of sale is covered by this invoice has been effected by
                        us in the regular course of our business. All the Disputes are subject to
                        Tirupur Jurisdiction Only.
                    </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2"><div></div></td>
            <td class="total-col-2" colspan="3"><div></div></td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="3" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @endif
    <tr >
        <td colspan="6" class="sign-col1"  >Receiver Sign</td>
        <td colspan="5"  class="sign-col2" width="250px"  style="vertical-align: top">For&nbsp;<b>{{$cmp->get('company_name')}}</b></td>
    </tr>
    <tr>
        <td colspan="6"><div></div></td>
        <td colspan="5" class="sign-col2">Authorized Signatory</td>
    </tr>
</table>
<div class="pageBreak">This is a Computer generated Invoice</div>

<div class="page-break"></div>

{{--Neethu Industries --}}
{{--/* company logo , name and address  */--}}
<table class="table-1Neethu">
    <tr>
        <td>
            <img src="{{ public_path('images/client_logo/Neethu.PNG')}}" alt="company logo" width="90px" class="comp-logo"/>
            {{--  if you change the image width,then change the inline width of 3rd col(td - empty div) to be same as well --}}
        </td>
        <td class="comp-details">
            <span class="comp-nameNeethu">NEETHU INDUSTRIES</span>
            <span class="comp-address">
                    <p>3/135 H, Kasturibai Nagar, Kannakampalayam pirivu, P.N. Road, Tiruppur - 641666</p>
                    <p>Contact: 7904660934 - Email: neethuindus@gmail.com</p>
                    <p>GSTIN: 33AATFN0321Q1ZY</p>
                </span>
        </td>
        <td><div style="width: 80px; height: auto;"></div></td> {{-- td - empty div  --}}
    </tr>
</table>
{{--/*  company Invoice header, address, no. and date.    */--}}
<table class="table-2">
    <tr class="inv-header">
        <td style="width: 250px;border-right: none;"></td>
        <td style="border: none;">TAX INVOICE</td>
        <td style="width:250px;border-left: none;" class="inv-copy">Original copy</td>
    </tr>
    <tr style=>
        <td colspan="2" class="inv-address">
            <span class="inv-contactName">M/s.{{$obj->contact_name}}</span>
            <p class="inv-contactAddress">{{$billing_address->get('address_1')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_2')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_3')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td class="inv-dateNeethu">
            <p>Invoice No:&nbsp;&nbsp;{{$obj->invoice_no}}</p>
            <p>Date:&nbsp;&nbsp;{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</p>
            <p class="inv-po">PO No:&nbsp;&nbsp;{{ $obj->despatch_name }}</p>
            <p class="inv-po">PO Date:&nbsp;&nbsp;{{ $obj->despatch_date }}</p>

        </td>
    </tr>
</table>
{{--  /* Invoice table data and Total */ --}}
<table class="table-3" width="100%">
    <tr class="inv-tableHeader">
        <th width="4.33%">S.No</th>
        <th width="8.33%">HSN Code</th>
        <th width="auto">Particulars</th>
        <th width="6.33%">Size</th>
        <th width="6.33%">Colours</th>
        <th width="4.33%">Quantity</th>
        <th width="8.33%">Price</th>
        <th width="8.33%">Taxable Amnt</th>
        <th width="4.33%">%</th>
        <th width="16.66">GST</th>
        <th width="16.66">sub Total</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr class="inv-tableData">
            <td class="items-c">{{$index+1}} </td>
            <td class="items-c">{{$row['hsncode']}}</td>
            <td class="items-l" style="">&nbsp;{{$row['product_name']}}</td>
            <td class="items-c">{{$row['size_name']}}</td>
            <td class="items-c">{{$row['colour_name']}} </td>
            <td class="items-c">{{$row['qty']+0}}</td>
            <td class="items-r">{{number_format($row['price'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
            <td class="items-c">{{$row['gst_percent']*2}}</td>
            <td class="items-r">{{number_format($row['gst_amount'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['sub_total'],2,'.','')}}</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endforeach

    {{-- Spacing  --}}
    @if(strlen($row['size_name'])<=8)
        @if(strlen($row['product_name'])<=35)
            @for($i = 0; $i < 16-$list->count(); $i++)
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @else
            @for($i = 0; $i < 9-$list->count(); $i++)

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
                    <td>&nbsp;</td>
                </tr>
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @endif
    @else
        @for($i = 0; $i < 9-$list->count(); $i++)

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
                <td>&nbsp;</td>
            </tr>
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
                <td>&nbsp;</td>
            </tr>
        @endfor
    @endif


    <tr class="inv-tableTotal">
        <td colspan="2">E&OE</td>
        <td colspan="3" class="total-r" style="border-left: none; text-align: right;">Total</td>
        <td style="text-align: center" class="total-r">{{$obj->total_qty+0}}</td>
        <td class="total-r"></td>
        <td class="total-r">{{number_format($obj->total_taxable,2,'.','')}}</td>
        <td colspan="2" class="total-r">{{number_format($obj->total_gst,2,'.','')}}</td>
        <td class="total-r">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
    </tr>

    @if($obj->sales_type==0)
        {{--        SGST and CGST Description and total gst and grand total--}}
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                            <span>We hereby certify that our registration under the GST Act 2017 is in force on
                                the date on which sale of the goods specified in this invoice is made by us
                                and the transaction of sale is covered by this invoice has been effected by
                                us in the regular course of our business. All the Disputes are subject to
                                Tirupur Jurisdiction Only.
                            </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">CGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">SGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="2" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="4" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @else
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                    <span>We hereby certify that our registration under the GST Act 2017 is in force on
                        the date on which sale of the goods specified in this invoice is made by us
                        and the transaction of sale is covered by this invoice has been effected by
                        us in the regular course of our business. All the Disputes are subject to
                        Tirupur Jurisdiction Only.
                    </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2"><div></div></td>
            <td class="total-col-2" colspan="3"><div></div></td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="2" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="4" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @endif
    <tr >
        <td colspan="6" class="sign-col1"  >Receiver Sign</td>
        <td colspan="5"  class="sign-col2" width="250px"  style="vertical-align: top">For&nbsp;<b>{{$cmp->get('company_name')}}</b></td>
    </tr>
    <tr>
        <td colspan="6"><div></div></td>
        <td colspan="5" class="sign-col2">Authorized Signatory</td>
    </tr>
</table>
<div class="pageBreak">This is a Computer generated Invoice</div>

<div class="page-break"></div>

{{-- Best Printers --}}
{{--/* company logo , name and address  */--}}
<table class="table-1">
    <tr>
        <td><div style="width: 90px; height: auto;">&nbsp;</div></td> {{-- td - empty div  --}}
        <td class="comp-details">
                <span class="comp-name">
                    <img src="{{ public_path('images/client_logo/bestprint_black.png')}}" alt="logo" width="60%" height="35px"/>
                </span>
            <span class="comp-address">
                    <p>No. 579, Ponmani compound, P.N. Road, tirupur - 641602.</p>
                    <p>Contact: 9994854486 - Email: bestprint1232gmail.com</p>
                    <p>GST; 33BIMPS8964C1ZT - MSME No: 5DDEA543</p>
                </span>
        </td>
        <td><div style="width: 90px; height: auto;">&nbsp;</div></td> {{-- td - empty div  --}}
    </tr>
</table>
{{--/*  company Invoice header, address, no. and date.    */--}}
<table class="table-2">
    <tr class="inv-header">
        <td style="width: 250px;border-right: none;"></td>
        <td style="border: none;">TAX INVOICE</td>
        <td style="width:250px;border-left: none;" class="inv-copy">Original copy</td>
    </tr>
    <tr style=>
        <td colspan="2" class="inv-address">
            <span class="inv-contactName">M/s.{{$obj->contact_name}}</span>
            <p class="inv-contactAddress">{{$billing_address->get('address_1')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_2')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_3')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td class="inv-date">
            <p>Invoice no:&nbsp;&nbsp;{{$obj->invoice_no}}</p>
            <p>Date:&nbsp;&nbsp;{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</p>
        </td>
    </tr>
</table>
{{--  /* Invoice table data and Total */ --}}
<table class="table-3" width="100%">
    <tr class="inv-tableHeader">
        <th width="4.33%">S.No</th>
        <th width="6.33%">P.No</th>
        <th width="6.33%">Dc.No</th>
        <th width="8.33%">HSN Code</th>
        <th width="auto">Particulars</th>
        <th width="4.33%">Quantity</th>
        <th width="8.33%">Price</th>
        <th width="8.33%">Taxable Amnt</th>
        <th width="4.33%">%</th>
        <th width="16.66">GST</th>
        <th width="16.66">sub Total</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr class="inv-tableData">
            <td class="items-c">{{$index+1}} </td>
            <td class="items-l">{{$row['po_no']}}</td>
            <td class="items-c">{{$row['dc_no']}} </td>
            <td class="items-c">{{$row['hsncode']}}</td>
            <td class="items-l" style="">&nbsp;{{$row['product_name']}}</td>
            <td class="items-c">{{$row['qty']+0}}</td>
            <td class="items-r">{{number_format($row['price'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
            <td class="items-c">{{$row['gst_percent']*2}}</td>
            <td class="items-r">{{number_format($row['gst_amount'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['sub_total'],2,'.','')}}</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endforeach

    {{-- Spacing  --}}
    @if(strlen($row['po_no'])<=8)
        @if(strlen($row['product_name'])<=35)
            @for($i = 0; $i < 16-$list->count(); $i++)
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @else
            @for($i = 0; $i < 9-$list->count(); $i++)

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
                    <td>&nbsp;</td>
                </tr>
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @endif
    @else
        @for($i = 0; $i < 9-$list->count(); $i++)

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
                <td>&nbsp;</td>
            </tr>
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
                <td>&nbsp;</td>
            </tr>
        @endfor
    @endif


    <tr class="inv-tableTotal">
        <td colspan="2">E&OE</td>
        <td colspan="3" class="total-r" style="border-left: none; text-align: right;">Total</td>
        <td style="text-align: center" class="total-r">{{$obj->total_qty+0}}</td>
        <td class="total-r"></td>
        <td class="total-r">{{number_format($obj->total_taxable,2,'.','')}}</td>
        <td colspan="2" class="total-r">{{number_format($obj->total_gst,2,'.','')}}</td>
        <td class="total-r">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
    </tr>

    @if($obj->sales_type==0)
        {{--        SGST and CGST Description and total gst and grand total--}}
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                            <span>We hereby certify that our registration under the GST Act 2017 is in force on
                                the date on which sale of the goods specified in this invoice is made by us
                                and the transaction of sale is covered by this invoice has been effected by
                                us in the regular course of our business. All the Disputes are subject to
                                Tirupur Jurisdiction Only.
                            </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">CGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">SGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="3" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @else
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                    <span>We hereby certify that our registration under the GST Act 2017 is in force on
                        the date on which sale of the goods specified in this invoice is made by us
                        and the transaction of sale is covered by this invoice has been effected by
                        us in the regular course of our business. All the Disputes are subject to
                        Tirupur Jurisdiction Only.
                    </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2"><div></div></td>
            <td class="total-col-2" colspan="3"><div></div></td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="3" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @endif
    <tr >
        <td colspan="6" class="sign-col1"  >Receiver Sign</td>
        <td colspan="5"  class="sign-col2" width="250px"  style="vertical-align: top">For&nbsp;<b>{{$cmp->get('company_name')}}</b></td>
    </tr>
    <tr>
        <td colspan="6"><div></div></td>
        <td colspan="5" class="sign-col2">Authorized Signatory</td>
    </tr>
</table>
<div class="pageBreak">This is a Computer generated Invoice</div>

<div class="page-break"></div>

{{-- Esha Knittings --}}
{{--/* company logo , name and address  */--}}
<table class="table-1">
    <tr>
        <td>
            <img src="{{ public_path('images/client_logo/easha.PNG')}}" alt="company logo" width="100px" class="comp-logo"/>
            {{--  if you change the image width,then change the inline width of 3rd col(td - empty div) to be same as well --}}
        </td>
        <td class="comp-details">
            <span class="comp-nameEsha">ESHA KNITTINGS</span>
            <span class="comp-address">
                    <p>49 Venkatesapuram 4 th street, P.N.Road, Mettupalayam</p>
                    <p>Tiruppur- 641602, Tamilnadu - (33) . Email : eshaknitting@gmail.com</p>
                    <p>GSTIN : 33BCOPP9533Q1ZN , Mobile : 9843220864, 9943812864</p>
                </span>
        </td>
        <td><div style="width: 90px; height: auto;"></div></td> {{-- td - empty div  --}}
    </tr>
</table>
{{--/*  company Invoice header, address, no. and date.    */--}}
<table class="table-2">
    <tr class="inv-header">
        <td style="width: 250px"></td>
        <td >INVOICE</td>
        <td style="width: 250px" class="inv-copy">Original copy</td>
    </tr>
    <tr style=>
        <td colspan="2" class="inv-address">
            <span class="inv-contactName">M/s.{{$obj->contact_name}}</span>
            <p class="inv-contactAddress">{{$billing_address->get('address_1')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_2')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('address_3')}}</p>
            <p class="inv-contactAddress">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td class="inv-date">
            <p>Invoice no:&nbsp;&nbsp;{{$obj->invoice_no}}</p>
            <p>Date:&nbsp;&nbsp;{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</p>
            <p>Job No:&nbsp;{{$obj->job_no}}</p>
        </td>
    </tr>
</table>
{{--  /* Invoice table data and Total */ --}}
<table class="table-3" width="100%">
    <tr class="inv-tableHeader">
        <th width="4.33%">S.No</th>
        <th width="6.33%">P.No</th>
        <th width="6.33%">Dc.No</th>
        <th width="8.33%">HSN Code</th>
        <th width="auto">Particulars</th>
        <th width="4.33%">Quantity</th>
        <th width="8.33%">Price</th>
        <th width="8.33%">Taxable Amnt</th>
        <th width="4.33%">%</th>
        <th width="16.66">GST</th>
        <th width="16.66">sub Total</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr class="inv-tableData">
            <td class="items-c">{{$index+1}} </td>
            <td class="items-l">{{$row['po_no']}}</td>
            <td class="items-c">{{$row['dc_no']}} </td>
            <td class="items-c">{{$row['hsncode']}}</td>
            <td class="items-l" style="">&nbsp;{{$row['product_name']}}</td>
            <td class="items-c">{{$row['qty']+0}}</td>
            <td class="items-r">{{number_format($row['price'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
            <td class="items-c">{{$row['gst_percent']*2}}</td>
            <td class="items-r">{{number_format($row['gst_amount'],2,'.','')}}</td>
            <td class="items-r">{{number_format($row['sub_total'],2,'.','')}}</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endforeach

    {{-- Spacing  --}}
    @if(strlen($row['po_no'])<=8)
        @if(strlen($row['product_name'])<=35)
            @for($i = 0; $i < 16-$list->count(); $i++)
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @else
            @for($i = 0; $i < 9-$list->count(); $i++)

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
                    <td>&nbsp;</td>
                </tr>
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
                    <td>&nbsp;</td>
                </tr>
            @endfor
        @endif
    @else
        @for($i = 0; $i < 9-$list->count(); $i++)

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
                <td>&nbsp;</td>
            </tr>
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
                <td>&nbsp;</td>
            </tr>
        @endfor
    @endif


    <tr class="inv-tableTotal">
        <td colspan="2">E&OE</td>
        <td colspan="3" class="total-r" style="border-left: none; text-align: right;">Total</td>
        <td style="text-align: center" class="total-r">{{$obj->total_qty+0}}</td>
        <td class="total-r"></td>
        <td class="total-r">{{number_format($obj->total_taxable,2,'.','')}}</td>
        <td colspan="2" class="total-r">{{number_format($obj->total_gst,2,'.','')}}</td>
        <td class="total-r">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
    </tr>

    @if($obj->sales_type==0)
        {{--        SGST and CGST Description and total gst and grand total--}}
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                            <span>We hereby certify that our registration under the GST Act 2017 is in force on
                                the date on which sale of the goods specified in this invoice is made by us
                                and the transaction of sale is covered by this invoice has been effected by
                                us in the regular course of our business. All the Disputes are subject to
                                Tirupur Jurisdiction Only.
                            </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">CGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">SGST&nbsp;@&nbsp;{{$gstPercent}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="3" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @else
        <tr>
            <td rowspan="2" colspan="6" class="description-1">
                    <span>We hereby certify that our registration under the GST Act 2017 is in force on
                        the date on which sale of the goods specified in this invoice is made by us
                        and the transaction of sale is covered by this invoice has been effected by
                        us in the regular course of our business. All the Disputes are subject to
                        Tirupur Jurisdiction Only.
                    </span>
            </td>
            <td class="total-col-1" colspan="2">Taxable Value</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_taxable,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="total-col-1" colspan="2"><div></div></td>
            <td class="total-col-2" colspan="3"><div></div></td>
        </tr>
        <tr>
            <td colspan="6" class="description-2">
                <div>* Goods once sold cannot be return back or exchanged</div>
                <div>* Seller cannot be responsible for any damage/mistakes.</div>
            </td>
            <td class="total-col-1" colspan="2">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td colspan="6"><div></div></td>
            <td class="total-col-1" colspan="2">Total GST</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->total_gst,2,'.','')}}</td>
        </tr>
        <tr>
            <td class="bankDetails" rowspan="2" colspan="3" width="100px">
                <div>ACCOUNT NO</div>
                <div>IFSC CODE</div>
                <div>BANK NAME</div>
                <div>BRANCH </div>
            </td>
            <td rowspan="2" colspan="3" class="bankDetails">
                <div>:&nbsp;{{$cmp->get('acc_no')}}</div>
                <div>:&nbsp;{{$cmp->get('ifsc_code')}}</div>
                <div>:&nbsp;{{$cmp->get('bank')}}</div>
                <div>:&nbsp;{{$cmp->get('branch')}}</div>
            </td>
            @if($obj->additional!=0)
                <td  class="total-col-1" colspan="2">Add&nbsp;:&nbsp;{{ $obj->ledger_name }}
                </td>
                <td  class="total-col-2" colspan="3">{{ number_format($obj->additional,2,'.','') }}</td>
            @else
                <td class="total-col-1" colspan="2">&nbsp;</td>
                <td  class="total-col-2" colspan="3">&nbsp;</td>
            @endif
        </tr>
        <tr>
            <td class="total-col-1" colspan="2">Round Off</td>
            <td class="total-col-2" colspan="3">{{number_format($obj->round_off,2,'.','')}}</td>
        </tr>
        <tr class="amount">
            <td colspan="6">
                <div class="rupees">Amount (in words)</div>
                <div class="rupees"><b>{{$rupees}}Only</b></div>
            </td>
            <td class="total-col-1 total" colspan="2"><b>GRAND TOTAL</b></td>
            <td class="total-col-2 total" colspan="3"><b>{{number_format($obj->grand_total,2,'.','')}}</b></td>
        </tr>
    @endif
    <tr >
        <td colspan="7" class="sign-col1"  >Receiver Sign</td>
        <td colspan="4"  class="sign-col2" width="250px"  style="vertical-align: top">for&nbsp;<b>{{$cmp->get('company_name')}}</b></td>
    </tr>
    <tr>
        <td colspan="7"><div></div></td>
        <td colspan="4" class="sign-col2">Authorized Signatory</td>
    </tr>
</table>
<div class="pageBreak">This is a Computer generated Invoice</div>
</html>
