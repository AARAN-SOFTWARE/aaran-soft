<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statement</title>
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
            font-size: x-small;
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

        .table-1, .table-1 tr, .table-1 td {
            border: none;
            /*background-color: #1e3a8a;*/
        }

        /*cmp header*/

        .comp-name {
            font-size: 30px;
            font-weight: bold;
            line-height: 1;
            font-family: SansSerif;
        }

        .comp-details {
            font-size: 10px;
            line-height: .5;
            text-align: center;
            /*background-color: #84cc16;*/
        }

        .table-1 .inv-logo {
            width: 150px;
            /*background-color: #065f46;*/
        }

        .comp-logo {
            position: fixed;
            margin-left: 60px;
        }

        .party-name {
            font-size: 50px;
            font-weight: bold;
            line-height: 1;
            font-family: SansSerif;
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

        .column1 {
            width: 300px;
            height: auto;

        }

        .column2 {
            width: 300px;
            height: auto;

        }

        hr {
            border: none;
            height: 1.5px;
            /* Set the hr color */
            color: #333; /* old IE */
            background-color: #333; /* Modern Browsers */
        }
    </style>

</head>

<!-- body ------------------------------------------------------------------------------------------------------------->

<body>
<table class="table-1" style="width: 100%">
    <tr>
        <td class="inv-logo">
            <img src="{{ public_path('/storage/'.$cmp->get('logo'))}}" alt="company logo" width="100px"
                 class="comp-logo"/>
            {{--  if you change the image width,then change the inline width of 3rd col(td - empty div) to be same as well --}}
        </td>

        <!-- company details------------------------------------------------------------------------------------------->
        <td class="comp-details">
            <span class="comp-name">{{$cmp->get('company_name')}}</span>
            <span class="comp-address">
                    <p>{{$cmp->get('address_1')}}, </p>
                    <p>{{$cmp->get('address_2')}}</p>
                    <p>{{$cmp->get('contact')}} - {{$cmp->get('email')}}</p>
                    <p>{{$cmp->get('gstin')}}</p>
                </span>
        </td>

        <td>
            <div style="width: 150px; height: auto;"></div>
        </td> {{-- td - empty div  --}}
    </tr>
</table>
    <hr>

    <!-- party name & details---------------------------------------------------------------------------------------------->
    <div style="text-align: left;">
        Client Name :&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$client_name}}</b>
    </div>

    <div style="text-align: left;font-size: 10px;padding: 5px;margin-left: 10px">
    <span class="party-address">
        <p class="inv-contactAddress">{{$client->address_1}}</p>
        <p class="inv-contactAddress">{{$client->address_1}}</p>
        <p class="inv-contactAddress">{{$client->city}}</p>
        <p class="inv-contactAddress">{{$client->state}}</p>
        <p class="inv-contactAddress">{{$client->pincode}}</p>
    </span>
    </div>

<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <td style="font-size: xx-small;text-align:center;">Sl.No</td>
        <td style="font-size: xx-small;text-align:center;">Month</td>
        <td style="font-size: xx-small;text-align:center">Amount</td>
        <td style="font-size: xx-small;text-align:center">Receipt</td>
        <td style="font-size: xx-small;text-align:center">Status</td>
    </tr>
    </thead>


    <tbody>
    @php
        $invoice_total = 0;
        $received_total = 0;
         $diff=0;
    @endphp
    @foreach( $obj as $index=> $row )
    <tr>
        <td style="text-align:center">{{$index+1}}</td>
        <td style="text-align:center"> {{ \App\Enums\Months::tryFrom($row->month)->getName() }}</td>
        <td style="text-align:center">
                    {{ $row->amount +0}}
        </td>
        <td style="text-align:center">
                    {{ $row->receipt+0 }}
        </td>
        <td style="text-align:center">
            <div
                class="flex w-full text-xl text-center  items-center justify-center p-1 {{  \App\Enums\Status::tryFrom($row->status_id)->getStyle()}}">
                {{ \App\Enums\Status::tryFrom($row->status_id)->getName()}}
            </div>
        </td>
    </tr>

    @php
        $invoice_total += floatval($row->amount);
        $received_total += floatval($row->receipt);
        $diff = $invoice_total - $received_total;
    @endphp
    @endforeach
    <tr>
        <td colspan="2" style="text-align: right;"><b>Total</b></td>
        <td style="text-align:center"><b>{{number_format($invoice_total,2,'.','')}}</b></td>
        <td style="text-align:center"><b>{{number_format($received_total,2,'.','')}}</b></td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td colspan="3" style="text-align: right;"><b>Balance</b></td>
        <td style="text-align:right"><b>{{number_format($diff,2,'.','')}}</b></td>
        <td></td>
    </tr>
    </tbody>
</table>

</body>
</html>
