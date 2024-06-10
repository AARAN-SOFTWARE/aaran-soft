<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printing saleInvoice DC</title>
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
            border: solid 1px rgba(161, 161, 161, 0.9);
            border-collapse: collapse;
            padding: 2px;
            /*margin: 2px;*/
        }

        .page-break {
            page-break-after: always;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        thead tr td {
            font-weight: bold;
        }
    </style>
</head>
<body>
<table width="100%">
    <tr>
        <td colspan="3"
            style="text-align: center; margin-top: 2px; font-weight: bold; border-right: none; height: 16px;padding-left: 110px;">

            Tax Invoice
        </td>
        <td colspan="1" style="text-align: right; margin-top: 2px; border-left: none">Original&nbsp;Copy&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>

    <tr>
        <td rowspan="4" width="20%" style="border-right: none;border-bottom: none;">
            <img style="height: 120px; width: auto;"
                 src="{{ public_path('images/vijay_garments_logo.jpeg') }}" alt="Vijay Garments"/>
        </td>
        <td rowspan="4" width="40%" style="border-left: none;border-bottom: none;">
            <p style="line-height: .2;font-size: 20px;font-weight: bold;">{{$cmp->get('company_name')}}</p>
            <p style="line-height: .5;">{{$cmp->get('address_1')}}</p>
            <p style="line-height: .5;">{{$cmp->get('address_2')}}</p>
            <p style="line-height: .5;">{{$cmp->get('contact')}}</p>
            <p style="line-height: .5;">{{$cmp->get('email')}}</p>
            <p style="line-height: .5;">{{$cmp->get('gstin')}}</p>
        </td>
        <td width="20%" style="text-align: center;">
            Invoice no
        </td>
        <td width="20%" style="text-align: center;">
            Date
        </td>
    </tr>
    <tr>
         <td width="20%" style="text-align: center;">
             {{$obj->invoice_no}}
        </td>
         <td width="20%" style="text-align: center;">
             {{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}
        </td>
    </tr>
    <tr>
         <td width="20%" style="text-align: center;">
            Style
        </td>
         <td width="20%" style="text-align: center;">
            Style
        </td>
    </tr>
    <tr>
         <td width="20%" style="text-align: center;border-bottom: none;">
             {{ $obj->style_name }}
        </td>
         <td width="20%" style="text-align: center;border-bottom: none;">
             {{$obj->style_desc}}
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td rowspan="4" width="30%" style="">
            <p style="padding-top: 0;margin-top: 0;font-weight: bold;">Buyer :</p>
            <p style=";padding-left: 10px;font-weight: bold;">{{$obj->contact_name}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_1')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_2')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_3')}}</p>
            <p style="font-size: 10px;line-height: .3;margin-bottom: 0;padding-left: 10px">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td rowspan="4" width="30%" style="">
            <p style="padding-top: 0;margin-top: 0;font-weight: bold;">Buyer :</p>
            <p style=";padding-left: 10px;font-weight: bold;">{{$obj->contact_name}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_1')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_2')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_3')}}</p>
            <p style="font-size: 10px;line-height: .3;margin-bottom: 0;padding-left: 10px">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td width="20%" style="text-align: center;">Despatch No</td>
        <td width="20%" style="text-align: center;">Despatch Date</td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{$obj->despatch_name}}
        </td>
        <td width="20%" style="text-align: center;">
            {{date('d-m-Y', strtotime($obj->despatch_date))}}
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            Dispatch Through
        </td>
        <td width="20%" style="text-align: center;">
            Other Ref
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{ $obj->transport_name }}
        </td>
        <td width="20%" style="text-align: center;">
            {{ $obj->transport_date }}
        </td>
    </tr>


</table>
<table width="100%" style="border-top: none">
    <thead style="background-color: transparent;">
    <tr>
        <th width="5px" style="padding: 5px;border-top: none">S.No</th>
        <th style="padding: 5px;border-top: none">Description of Goods&nbsp;/&nbsp;Service</th>
        <th width="80px" style="padding: 5px;border-top: none">HSN&nbsp;/&nbsp;SAC</th>
        <th width="5px" style="padding: 5px;border-top: none">Quantity</th>
        <th width="70px" style="padding: 5px;border-top: none">Rate</th>
        <th width="40px" style="padding: 5px;border-top: none">Per</th>
        <th width="70px" style="padding: 5px;border-top: none">Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index => $row)
        <tr>
            <td align="center" style="border-bottom: none;border-top: none;">{{$index+1}} </td>
            <td align="left" style="border-bottom: none;border-top: none;">&nbsp;<div>{{$row['product_name']}}</div>
                <div>{{$row['description']}}&nbsp;-&nbsp;{{$row['colour_name']}}&nbsp;-&nbsp;{{$row['size_name']}}</div>
            </td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['hsncode']}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['qty']+0}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">
                &nbsp;{{number_format($row['price'],2,'.','')}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['product_unit']}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">
                &nbsp;{{ number_format($row['qty']*$row['price'],2,'.','')}}</td>
        </tr>

    @endforeach

    @for($i = 0; $i < 7 - ($list->count()); $i++)

        <tr>
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
        </tr>
    @endfor

    <tr>
        <td>E&OE</td>
        <td colspan="2" align="right" style="padding-right: 20px;"><span>Total</span></td>
        <td colspan="1" align="right" style="padding-right: 20px;"><span>{{$obj->total_qty+0}}</span></td>
        <td colspan="3" align="right">{{number_format($obj->total_taxable,2,'.','')}}</td>
    </tr>
    @if($obj->sales_type==0)
        <tr>

            <td colspan="3" rowspan="2">
                <div style="font-weight: bold;">Amount in Words</div>
                <div style="font-weight: bold; text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;{{$rupees}}Only
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;CGSt</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ $row['gst_percent'] }}%</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <div>Add&nbsp;:&nbsp;SGST</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>
            </td>
        </tr>


        <tr>

            <td colspan="2" rowspan="3" style="border-right: none;">

                <table>
                    <tr>
                        <td style="border: none;">
                            <div>
                                <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                                     src="{{ public_path('images/client_logo/bank.png') }}"/>
                            </div>
                        </td>
                        <td style="border: none; padding-left: 20px">
                            <div style="text-align: left; font-family:Times,serif;">
                                <div style="font-family:Times,serif;">Acc.Name<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('company_name')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">ACCOUNT NO<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('acc_no')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BANK NAME<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('bank')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BRANCH <span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('branch')}}</span>&nbsp;/&nbsp;IFSC
                                    CODE<span
                                        style="font-family:Times,serif; font-weight: bolder">:{{$cmp->get('ifsc_code')}}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="3" style="border-left: none;">
                <div>
                    <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                         src="{{ public_path('images/vijaygarments_location.png') }}"/>
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;IGST</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>0%</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>-</div>

            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <div>Add&nbsp;:&nbsp;Shipping Charges</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->additional,2,'.','') }}</div>
            </td>
        </tr>
        <tr style="font-weight: bold;font-size: medium;">
            <td colspan="3" style="text-align: center">
                <div>GRAND TOTAL</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->grand_total,2,'.','')}}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2">
                <div style="text-align: center;">HSN&nbsp;/&nbsp;SAC</div>
            </td>
            <td colspan="1" rowspan="2" style="text-align: center;">
                <div>Taxable Value</div>

            </td>
            <td colspan="2" style="text-align: center;">
                <div>Central Tax</div>

            </td>
            <td colspan="2" style="text-align: center;">
                <div>Sale Tax</div>
            </td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: center">
                <div>Rate</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>Amount</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>Rate</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>Amount</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">{{$row['hsncode']}}</td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_taxable,2,'.','')}}</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Total</td>
            <td style="text-align: right;">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
    @else
        <tr>

            <td colspan="3" rowspan="2">
                <div style="font-weight: bold;">Amount in Words</div>
                <div style="font-weight: bold; text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;{{$rupees}}Only
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;CGSt</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>0%</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>-</div>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <div>Add&nbsp;:&nbsp;SGST</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>0%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>-</div>
            </td>
        </tr>


        <tr>

            <td colspan="2" rowspan="3" style="border-right: none;">
                <table>
                    <tr>
                        <td style="border: none;">
                            <div>
                                <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                                     src="{{ public_path('images/client_logo/bank.png') }}"/>
                            </div>
                        </td>
                        <td style="border: none; padding-left: 20px">
                            <div style="text-align: left; font-family:Times,serif;">
                                <div style="font-family:Times,serif;">Acc.Name<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('company_name')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">ACCOUNT NO<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('acc_no')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BANK NAME<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('bank')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BRANCH <span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('branch')}}</span>&nbsp;/&nbsp;IFSC
                                    CODE<span
                                        style="font-family:Times,serif; font-weight: bolder">:{{$cmp->get('ifsc_code')}}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="3" style="border-left: none;">
                <div>
                    <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                         src="{{ public_path('images/vijaygarments_location.png') }}"/>
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;IGST</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ $row['gst_percent']*2 }}%</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_gst,2,'.','')}}</div>

            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <div>Add&nbsp;:&nbsp;Shipping Charges</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->additional,2,'.','') }}</div>
            </td>
        </tr>
        <tr style="font-weight: bold;font-size: medium;">
            <td colspan="3" style="text-align: center">
                <div>GRAND TOTAL</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->grand_total,2,'.','')}}</div>
            </td>
        </tr>

        <tr>
            <td colspan="2" rowspan="2">
                <div style="text-align: center;">HSN&nbsp;/&nbsp;SAC</div>
            </td>
            <td colspan="1" rowspan="2" style="text-align: center;">
                <div>Taxable Value</div>

            </td>
            <td colspan="4" style="text-align: center;">
                <div>IGST(Integrate Goods and Services Tax)</div>

            </td>

        </tr>



        <tr>
            <td colspan="1" style="text-align: center">
                <div>Rate</div>
            </td>
            <td colspan="3" style="text-align: center">
                <div>Amount</div>
            </td>

        </tr>



        <tr>
            <td colspan="2" style="text-align: center;">{{$row['hsncode']}}</td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_taxable,2,'.','')}}</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>{{ $row['gst_percent']*2 }}%</div>
            </td>
            <td colspan="3" style="text-align: right">
                <div>{{ number_format($obj->total_gst,2,'.','') }}</div>
            </td>
        </tr>

        <tr>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Total</td>
            <td style="text-align: right;">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td colspan="3" style="text-align: right;">{{ number_format($obj->total_gst,2,'.','')}}</td>

        </tr>
    @endif


    <tr>
        <td colspan="3" style="height: 40px; text-align: left; vertical-align: top; padding-top: 5px ">
            <div style="font-family:Times,serif; font-weight: bolder">&nbsp;&nbsp;Terms&nbsp;:</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Subject to Barath Jurisdiction</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Payment 100% against the bill</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Goods once sold will not be taken back
            </div>
            <div>&nbsp;</div>

        </td>
        <td colspan="4" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ">
            &nbsp;For&nbsp;{{$cmp->get('company_name')}}
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div style="padding-top: 20px;">Authorised signatory</div>

        </td>
    </tr>
    <tr>
        <td colspan="5" style="border-right: none;">
            <div
                style="font-family:Times,serif; text-align: left;font-size:12px; padding-top: 5px; padding-left: 10px;">
                Thank you for your Business and have a great day!
            </div>
        </td>
        <td colspan="2" style="border-left: none;">
            <div
                style="font-family:Times,serif; text-align: right;font-size:12px; padding-top: 5px; padding-right: 10px;">
                www.vijaygarments.in
            </div>
        </td>
    </tr>
</table>
<div class="page-break"></div>
{{--Duplicate Copy--}}
<table width="100%">
    <tr>
        <td colspan="3"
            style="text-align: center; margin-top: 2px; font-weight: bold; border-right: none; height: 16px;padding-left: 110px;">

            Tax Invoice
        </td>
        <td colspan="1" style="text-align: right; margin-top: 2px; border-left: none">Duplicate&nbsp;Copy&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>

    <tr>
        <td rowspan="4" width="20%" style="border-right: none;border-bottom: none;">
            <img style="height: 120px; width: auto;"
                 src="{{ public_path('images/vijay_garments_logo.jpeg') }}" alt="Vijay Garments"/>
        </td>
        <td rowspan="4" width="40%" style="border-left: none;border-bottom: none;">
            <p style="line-height: .2;font-size: 20px;font-weight: bold;">{{$cmp->get('company_name')}}</p>
            <p style="line-height: .5;">{{$cmp->get('address_1')}}</p>
            <p style="line-height: .5;">{{$cmp->get('address_2')}}</p>
            <p style="line-height: .5;">{{$cmp->get('contact')}}</p>
            <p style="line-height: .5;">{{$cmp->get('email')}}</p>
            <p style="line-height: .5;">{{$cmp->get('gstin')}}</p>
        </td>
        <td width="20%" style="text-align: center;">
            Invoice no
        </td>
        <td width="20%" style="text-align: center;">
            Date
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{$obj->invoice_no}}
        </td>
        <td width="20%" style="text-align: center;">
            {{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            Style
        </td>
        <td width="20%" style="text-align: center;">
            Style
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;border-bottom: none;">
            {{ $obj->style_name }}
        </td>
        <td width="20%" style="text-align: center;border-bottom: none;">
            {{$obj->style_desc}}
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td rowspan="4" width="30%" style="">
            <p style="padding-top: 0;margin-top: 0;font-weight: bold;">Buyer :</p>
            <p style=";padding-left: 10px;font-weight: bold;">{{$obj->contact_name}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_1')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_2')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_3')}}</p>
            <p style="font-size: 10px;line-height: .3;margin-bottom: 0;padding-left: 10px">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td rowspan="4" width="30%" style="">
            <p style="padding-top: 0;margin-top: 0;font-weight: bold;">Buyer :</p>
            <p style=";padding-left: 10px;font-weight: bold;">{{$obj->contact_name}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_1')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_2')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_3')}}</p>
            <p style="font-size: 10px;line-height: .3;margin-bottom: 0;padding-left: 10px">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td width="20%" style="text-align: center;">Despatch No</td>
        <td width="20%" style="text-align: center;">Despatch Date</td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{$obj->despatch_name}}
        </td>
        <td width="20%" style="text-align: center;">
            {{date('d-m-Y', strtotime($obj->despatch_date))}}
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            Dispatch Through
        </td>
        <td width="20%" style="text-align: center;">
            Other Ref
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{ $obj->transport_name }}
        </td>
        <td width="20%" style="text-align: center;">
            {{ $obj->transport_date }}
        </td>
    </tr>


</table>
<table width="100%" style="border-top: none">
    <thead style="background-color: transparent;">
    <tr>
        <th width="5px" style="padding: 5px;border-top: none">S.No</th>
        <th style="padding: 5px;border-top: none">Description of Goods&nbsp;/&nbsp;Service</th>
        <th width="80px" style="padding: 5px;border-top: none">HSN&nbsp;/&nbsp;SAC</th>
        <th width="5px" style="padding: 5px;border-top: none">Quantity</th>
        <th width="70px" style="padding: 5px;border-top: none">Rate</th>
        <th width="40px" style="padding: 5px;border-top: none">Per</th>
        <th width="70px" style="padding: 5px;border-top: none">Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index => $row)
        <tr>
            <td align="center" style="border-bottom: none;border-top: none;">{{$index+1}} </td>
            <td align="left" style="border-bottom: none;border-top: none;">&nbsp;<div>{{$row['product_name']}}</div>
                <div>{{$row['description']}}&nbsp;-&nbsp;{{$row['colour_name']}}&nbsp;-&nbsp;{{$row['size_name']}}</div>
            </td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['hsncode']}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['qty']+0}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">
                &nbsp;{{number_format($row['price'],2,'.','')}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['product_unit']}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">
                &nbsp;{{ number_format($row['qty']*$row['price'],2,'.','')}}</td>
        </tr>

    @endforeach

    @for($i = 0; $i < 7 - ($list->count()); $i++)

        <tr>
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
        </tr>
    @endfor

    <tr>
        <td>E&OE</td>
        <td colspan="2" align="right" style="padding-right: 20px;"><span>Total</span></td>
        <td colspan="1" align="right" style="padding-right: 20px;"><span>{{$obj->total_qty+0}}</span></td>
        <td colspan="3" align="right">{{number_format($obj->total_taxable,2,'.','')}}</td>
    </tr>
    @if($obj->sales_type==0)
        <tr>

            <td colspan="3" rowspan="2">
                <div style="font-weight: bold;">Amount in Words</div>
                <div style="font-weight: bold; text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;{{$rupees}}Only
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;CGSt</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ $row['gst_percent'] }}%</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <div>Add&nbsp;:&nbsp;SGST</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>
            </td>
        </tr>


        <tr>

            <td colspan="2" rowspan="3" style="border-right: none;">

                <table>
                    <tr>
                        <td style="border: none;">
                            <div>
                                <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                                     src="{{ public_path('images/client_logo/bank.png') }}"/>
                            </div>
                        </td>
                        <td style="border: none; padding-left: 20px">
                            <div style="text-align: left; font-family:Times,serif;">
                                <div style="font-family:Times,serif;">Acc.Name<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('company_name')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">ACCOUNT NO<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('acc_no')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BANK NAME<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('bank')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BRANCH <span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('branch')}}</span>&nbsp;/&nbsp;IFSC
                                    CODE<span
                                        style="font-family:Times,serif; font-weight: bolder">:{{$cmp->get('ifsc_code')}}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="3" style="border-left: none;">
                <div>
                    <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                         src="{{ public_path('images/vijaygarments_location.png') }}"/>
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;IGST</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>0%</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>-</div>

            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <div>Add&nbsp;:&nbsp;Shipping Charges</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->additional,2,'.','') }}</div>
            </td>
        </tr>
        <tr style="font-weight: bold;font-size: medium;">
            <td colspan="3" style="text-align: center">
                <div>GRAND TOTAL</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->grand_total,2,'.','')}}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2">
                <div style="text-align: center;">HSN&nbsp;/&nbsp;SAC</div>
            </td>
            <td colspan="1" rowspan="2" style="text-align: center;">
                <div>Taxable Value</div>

            </td>
            <td colspan="2" style="text-align: center;">
                <div>Central Tax</div>

            </td>
            <td colspan="2" style="text-align: center;">
                <div>Sale Tax</div>
            </td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: center">
                <div>Rate</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>Amount</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>Rate</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>Amount</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">{{$row['hsncode']}}</td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_taxable,2,'.','')}}</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Total</td>
            <td style="text-align: right;">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
    @else
        <tr>

            <td colspan="3" rowspan="2">
                <div style="font-weight: bold;">Amount in Words</div>
                <div style="font-weight: bold; text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;{{$rupees}}Only
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;CGSt</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>0%</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>-</div>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <div>Add&nbsp;:&nbsp;SGST</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>0%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>-</div>
            </td>
        </tr>


        <tr>

            <td colspan="2" rowspan="3" style="border-right: none;">
                <table>
                    <tr>
                        <td style="border: none;">
                            <div>
                                <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                                     src="{{ public_path('images/client_logo/bank.png') }}"/>
                            </div>
                        </td>
                        <td style="border: none; padding-left: 20px">
                            <div style="text-align: left; font-family:Times,serif;">
                                <div style="font-family:Times,serif;">Acc.Name<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('company_name')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">ACCOUNT NO<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('acc_no')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BANK NAME<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('bank')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BRANCH <span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('branch')}}</span>&nbsp;/&nbsp;IFSC
                                    CODE<span
                                        style="font-family:Times,serif; font-weight: bolder">:{{$cmp->get('ifsc_code')}}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="3" style="border-left: none;">
                <div>
                    <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                         src="{{ public_path('images/vijaygarments_location.png') }}"/>
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;IGST</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ $row['gst_percent']*2 }}%</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_gst,2,'.','')}}</div>

            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <div>Add&nbsp;:&nbsp;Shipping Charges</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->additional,2,'.','') }}</div>
            </td>
        </tr>
        <tr style="font-weight: bold;font-size: medium;">
            <td colspan="3" style="text-align: center">
                <div>GRAND TOTAL</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->grand_total,2,'.','')}}</div>
            </td>
        </tr>

        <tr>
            <td colspan="2" rowspan="2">
                <div style="text-align: center;">HSN&nbsp;/&nbsp;SAC</div>
            </td>
            <td colspan="1" rowspan="2" style="text-align: center;">
                <div>Taxable Value</div>

            </td>
            <td colspan="4" style="text-align: center;">
                <div>IGST(Integrate Goods and Services Tax)</div>

            </td>

        </tr>



        <tr>
            <td colspan="1" style="text-align: center">
                <div>Rate</div>
            </td>
            <td colspan="3" style="text-align: center">
                <div>Amount</div>
            </td>

        </tr>



        <tr>
            <td colspan="2" style="text-align: center;">{{$row['hsncode']}}</td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_taxable,2,'.','')}}</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>{{ $row['gst_percent']*2 }}%</div>
            </td>
            <td colspan="3" style="text-align: right">
                <div>{{ number_format($obj->total_gst,2,'.','') }}</div>
            </td>
        </tr>

        <tr>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Total</td>
            <td style="text-align: right;">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td colspan="3" style="text-align: right;">{{ number_format($obj->total_gst,2,'.','')}}</td>

        </tr>
    @endif


    <tr>
        <td colspan="3" style="height: 40px; text-align: left; vertical-align: top; padding-top: 5px ">
            <div style="font-family:Times,serif; font-weight: bolder">&nbsp;&nbsp;Terms&nbsp;:</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Subject to Barath Jurisdiction</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Payment 100% against the bill</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Goods once sold will not be taken back
            </div>
            <div>&nbsp;</div>

        </td>
        <td colspan="4" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ">
            &nbsp;For&nbsp;{{$cmp->get('company_name')}}
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div style="padding-top: 20px;">Authorised signatory</div>

        </td>
    </tr>
    <tr>
        <td colspan="5" style="border-right: none;">
            <div
                style="font-family:Times,serif; text-align: left;font-size:12px; padding-top: 5px; padding-left: 10px;">
                Thank you for your Business and have a great day!
            </div>
        </td>
        <td colspan="2" style="border-left: none;">
            <div
                style="font-family:Times,serif; text-align: right;font-size:12px; padding-top: 5px; padding-right: 10px;">
                www.vijaygarments.in
            </div>
        </td>
    </tr>
</table>
<div class="page-break"></div>
{{--Office Copy--}}
<table width="100%">
    <tr>
        <td colspan="3"
            style="text-align: center; margin-top: 2px; font-weight: bold; border-right: none; height: 16px;padding-left: 110px;">

            Tax Invoice
        </td>
        <td colspan="1" style="text-align: right; margin-top: 2px; border-left: none">Office&nbsp;Copy&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>

    <tr>
        <td rowspan="4" width="20%" style="border-right: none;border-bottom: none;">
            <img style="height: 120px; width: auto;"
                 src="{{ public_path('images/vijay_garments_logo.jpeg') }}" alt="Vijay Garments"/>
        </td>
        <td rowspan="4" width="40%" style="border-left: none;border-bottom: none;">
            <p style="line-height: .2;font-size: 20px;font-weight: bold;">{{$cmp->get('company_name')}}</p>
            <p style="line-height: .5;">{{$cmp->get('address_1')}}</p>
            <p style="line-height: .5;">{{$cmp->get('address_2')}}</p>
            <p style="line-height: .5;">{{$cmp->get('contact')}}</p>
            <p style="line-height: .5;">{{$cmp->get('email')}}</p>
            <p style="line-height: .5;">{{$cmp->get('gstin')}}</p>
        </td>
        <td width="20%" style="text-align: center;">
            Invoice no
        </td>
        <td width="20%" style="text-align: center;">
            Date
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{$obj->invoice_no}}
        </td>
        <td width="20%" style="text-align: center;">
            {{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            Style
        </td>
        <td width="20%" style="text-align: center;">
            Style
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;border-bottom: none;">
            {{ $obj->style_name }}
        </td>
        <td width="20%" style="text-align: center;border-bottom: none;">
            {{$obj->style_desc}}
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td rowspan="4" width="30%" style="">
            <p style="padding-top: 0;margin-top: 0;font-weight: bold;">Buyer :</p>
            <p style=";padding-left: 10px;font-weight: bold;">{{$obj->contact_name}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_1')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_2')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_3')}}</p>
            <p style="font-size: 10px;line-height: .3;margin-bottom: 0;padding-left: 10px">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td rowspan="4" width="30%" style="">
            <p style="padding-top: 0;margin-top: 0;font-weight: bold;">Buyer :</p>
            <p style=";padding-left: 10px;font-weight: bold;">{{$obj->contact_name}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_1')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_2')}}</p>
            <p style="font-size: 10px;line-height: .3;padding-left: 10px">{{$billing_address->get('address_3')}}</p>
            <p style="font-size: 10px;line-height: .3;margin-bottom: 0;padding-left: 10px">{{$billing_address->get('gstcell')}}</p>
        </td>
        <td width="20%" style="text-align: center;">Despatch No</td>
        <td width="20%" style="text-align: center;">Despatch Date</td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{$obj->despatch_name}}
        </td>
        <td width="20%" style="text-align: center;">
            {{date('d-m-Y', strtotime($obj->despatch_date))}}
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            Dispatch Through
        </td>
        <td width="20%" style="text-align: center;">
            Other Ref
        </td>
    </tr>
    <tr>
        <td width="20%" style="text-align: center;">
            {{ $obj->transport_name }}
        </td>
        <td width="20%" style="text-align: center;">
            {{ $obj->transport_date }}
        </td>
    </tr>


</table>
<table width="100%" style="border-top: none">
    <thead style="background-color: transparent;">
    <tr>
        <th width="5px" style="padding: 5px;border-top: none">S.No</th>
        <th style="padding: 5px;border-top: none">Description of Goods&nbsp;/&nbsp;Service</th>
        <th width="80px" style="padding: 5px;border-top: none">HSN&nbsp;/&nbsp;SAC</th>
        <th width="5px" style="padding: 5px;border-top: none">Quantity</th>
        <th width="70px" style="padding: 5px;border-top: none">Rate</th>
        <th width="40px" style="padding: 5px;border-top: none">Per</th>
        <th width="70px" style="padding: 5px;border-top: none">Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index => $row)
        <tr>
            <td align="center" style="border-bottom: none;border-top: none;">{{$index+1}} </td>
            <td align="left" style="border-bottom: none;border-top: none;">&nbsp;<div>{{$row['product_name']}}</div>
                <div>{{$row['description']}}&nbsp;-&nbsp;{{$row['colour_name']}}&nbsp;-&nbsp;{{$row['size_name']}}</div>
            </td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['hsncode']}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['qty']+0}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">
                &nbsp;{{number_format($row['price'],2,'.','')}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['product_unit']}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">
                &nbsp;{{ number_format($row['qty']*$row['price'],2,'.','')}}</td>
        </tr>

    @endforeach

    @for($i = 0; $i < 7 - ($list->count()); $i++)

        <tr>
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
        </tr>
    @endfor

    <tr>
        <td>E&OE</td>
        <td colspan="2" align="right" style="padding-right: 20px;"><span>Total</span></td>
        <td colspan="1" align="right" style="padding-right: 20px;"><span>{{$obj->total_qty+0}}</span></td>
        <td colspan="3" align="right">{{number_format($obj->total_taxable,2,'.','')}}</td>
    </tr>
    @if($obj->sales_type==0)
        <tr>

            <td colspan="3" rowspan="2">
                <div style="font-weight: bold;">Amount in Words</div>
                <div style="font-weight: bold; text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;{{$rupees}}Only
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;CGSt</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ $row['gst_percent'] }}%</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <div>Add&nbsp;:&nbsp;SGST</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>
            </td>
        </tr>


        <tr>

            <td colspan="2" rowspan="3" style="border-right: none;">

                <table>
                    <tr>
                        <td style="border: none;">
                            <div>
                                <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                                     src="{{ public_path('images/client_logo/bank.png') }}"/>
                            </div>
                        </td>
                        <td style="border: none; padding-left: 20px">
                            <div style="text-align: left; font-family:Times,serif;">
                                <div style="font-family:Times,serif;">Acc.Name<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('company_name')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">ACCOUNT NO<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('acc_no')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BANK NAME<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('bank')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BRANCH <span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('branch')}}</span>&nbsp;/&nbsp;IFSC
                                    CODE<span
                                        style="font-family:Times,serif; font-weight: bolder">:{{$cmp->get('ifsc_code')}}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="3" style="border-left: none;">
                <div>
                    <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                         src="{{ public_path('images/vijaygarments_location.png') }}"/>
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;IGST</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>0%</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>-</div>

            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <div>Add&nbsp;:&nbsp;Shipping Charges</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->additional,2,'.','') }}</div>
            </td>
        </tr>
        <tr style="font-weight: bold;font-size: medium;">
            <td colspan="3" style="text-align: center">
                <div>GRAND TOTAL</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->grand_total,2,'.','')}}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2">
                <div style="text-align: center;">HSN&nbsp;/&nbsp;SAC</div>
            </td>
            <td colspan="1" rowspan="2" style="text-align: center;">
                <div>Taxable Value</div>

            </td>
            <td colspan="2" style="text-align: center;">
                <div>Central Tax</div>

            </td>
            <td colspan="2" style="text-align: center;">
                <div>Sale Tax</div>
            </td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: center">
                <div>Rate</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>Amount</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>Rate</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>Amount</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">{{$row['hsncode']}}</td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_taxable,2,'.','')}}</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
            </td>
            <td colspan="1" style="text-align: center;">
                <div>{{ $row['gst_percent'] }}%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Total</td>
            <td style="text-align: right;">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
        </tr>
    @else
        <tr>

            <td colspan="3" rowspan="2">
                <div style="font-weight: bold;">Amount in Words</div>
                <div style="font-weight: bold; text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;{{$rupees}}Only
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;CGSt</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>0%</div>

            </td>
            <td colspan="1" style="text-align: right;">
                <div>-</div>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <div>Add&nbsp;:&nbsp;SGST</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>0%</div>
            </td>
            <td colspan="1" style="text-align: right;">
                <div>-</div>
            </td>
        </tr>


        <tr>

            <td colspan="2" rowspan="3" style="border-right: none;">
                <table>
                    <tr>
                        <td style="border: none;">
                            <div>
                                <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                                     src="{{ public_path('images/client_logo/bank.png') }}"/>
                            </div>
                        </td>
                        <td style="border: none; padding-left: 20px">
                            <div style="text-align: left; font-family:Times,serif;">
                                <div style="font-family:Times,serif;">Acc.Name<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('company_name')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">ACCOUNT NO<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('acc_no')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BANK NAME<span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('bank')}}</span>
                                </div>
                                <div style="font-family:Times,serif;">BRANCH <span
                                        style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('branch')}}</span>&nbsp;/&nbsp;IFSC
                                    CODE<span
                                        style="font-family:Times,serif; font-weight: bolder">:{{$cmp->get('ifsc_code')}}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="3" style="border-left: none;">
                <div>
                    <img style="margin-left: 2px;height: 60px;width: auto;position: relative;"
                         src="{{ public_path('images/vijaygarments_location.png') }}"/>
                </div>
            </td>
            <td colspan="2" style="text-align: center;">
                <div>Add&nbsp;:&nbsp;IGST</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ $row['gst_percent']*2 }}%</div>

            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_gst,2,'.','')}}</div>

            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <div>Add&nbsp;:&nbsp;Shipping Charges</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{ number_format($obj->additional,2,'.','') }}</div>
            </td>
        </tr>
        <tr style="font-weight: bold;font-size: medium;">
            <td colspan="3" style="text-align: center">
                <div>GRAND TOTAL</div>
            </td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->grand_total,2,'.','')}}</div>
            </td>
        </tr>

        <tr>
            <td colspan="2" rowspan="2">
                <div style="text-align: center;">HSN&nbsp;/&nbsp;SAC</div>
            </td>
            <td colspan="1" rowspan="2" style="text-align: center;">
                <div>Taxable Value</div>

            </td>
            <td colspan="4" style="text-align: center;">
                <div>IGST(Integrate Goods and Services Tax)</div>

            </td>

        </tr>



        <tr>
            <td colspan="1" style="text-align: center">
                <div>Rate</div>
            </td>
            <td colspan="3" style="text-align: center">
                <div>Amount</div>
            </td>

        </tr>



        <tr>
            <td colspan="2" style="text-align: center;">{{$row['hsncode']}}</td>
            <td colspan="1" style="text-align: right">
                <div>{{number_format($obj->total_taxable,2,'.','')}}</div>
            </td>
            <td colspan="1" style="text-align: center">
                <div>{{ $row['gst_percent']*2 }}%</div>
            </td>
            <td colspan="3" style="text-align: right">
                <div>{{ number_format($obj->total_gst,2,'.','') }}</div>
            </td>
        </tr>

        <tr>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Total</td>
            <td style="text-align: right;">{{number_format($obj->total_taxable,2,'.','')}}</td>
            <td>&nbsp;</td>
            <td colspan="3" style="text-align: right;">{{ number_format($obj->total_gst,2,'.','')}}</td>

        </tr>
    @endif


    <tr>
        <td colspan="3" style="height: 40px; text-align: left; vertical-align: top; padding-top: 5px ">
            <div style="font-family:Times,serif; font-weight: bolder">&nbsp;&nbsp;Terms&nbsp;:</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Subject to Barath Jurisdiction</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Payment 100% against the bill</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Goods once sold will not be taken back
            </div>
            <div>&nbsp;</div>

        </td>
        <td colspan="4" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ">
            &nbsp;For&nbsp;{{$cmp->get('company_name')}}
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div style="padding-top: 20px;">Authorised signatory</div>

        </td>
    </tr>
    <tr>
        <td colspan="5" style="border-right: none;">
            <div
                style="font-family:Times,serif; text-align: left;font-size:12px; padding-top: 5px; padding-left: 10px;">
                Thank you for your Business and have a great day!
            </div>
        </td>
        <td colspan="2" style="border-left: none;">
            <div
                style="font-family:Times,serif; text-align: right;font-size:12px; padding-top: 5px; padding-right: 10px;">
                www.vijaygarments.in
            </div>
        </td>
    </tr>
</table>

</body>
</html>
