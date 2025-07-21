<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $establishment->estab_acronym }} | {{ $ppe_acct->ppe_name}} ({{ $ppe_acct->ppe_code}})</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <style>
    @media print {
        @page {
            size: portrait;
        }

        .hideextra {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    }

    body {
        margin-top: 20px;
        font-family: "Times New Roman", Times, serif;
    }

    .table-bordered {
        border: 3px solid black;
    }

    td>p {
        margin: 0;
    }

    .uppercase {
        text-transform: uppercase;
    }

    footer {
        border-left: 3px solid black;
        border-bottom: 3px solid black;
        border-right: 3px solid black;
        margin-top: -1.1rem;
    }

    header {
        border: 3px solid black;
        margin-bottom: -0.2rem;
    }

    img {
        max-width: 150px;
        width: auto;
        height: auto;
        border-radius: 50px;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="top-head">
            <div class="row">
                <div class="col-1" style="margin-top: -1rem">
                    <img src="{{ asset('assets/img/LOGO.png') }}" alt="">
                </div>
                <div class="col-11" style="margin-left: -2.5rem;">
                    <div class="text-center">
                        <h5><b>PROVINCE OF CAPIZ</b></h5>
                        <h5>City of Roxas</h5>
                        <h5><b>OFFICE OF THE PROVINCIAL GENERAL SERVICES</b></h5>
                    </div>
                </div>
            </div>
            <header>
                <h2 class="text-center uppercase"><strong>Inventory Custodian Slip</strong></h2>
                <h3 class="text-center uppercase"><strong>{{ $ppe_acct->ppe_name }} ({{ $ppe_acct->ppe_code }})</strong>
                </h3>
                <h3 class="text-center"><strong>As of <u class="uppercase">DECEMBER 2024</u></strong></h3>
                <div class="row">
                    <div class="col-6">
                        <h6>
                            <strong>Entity Name:</strong><u class="uppercase">&nbsp;{{ $establishment->estab_name }}</u>
                        </h6>
                        <h6><strong>Fund Cluster:_____________________________________</strong></h6>
                    </div>
                    <div class="col-6">
                        <h6 class="float-end"><strong>ICS No:</strong>
                            {{ $establishment->estab_acronym }}-{{ $ppe_acct->ppe_code }}-23&nbsp;&nbsp;</h6>
                    </div>
                </div>
            </header>
        </div>
        <table class="table table-bordered">
            <colgroup>
                <col width="1%">
                <col width="1%">
                <col width="1%">
                <col width="2%">
                <col width="2%">
                <col width="25%">
                <col width="5%">
                <col width="1%">
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center" rowspan="2">NO.</th>
                    <th class="text-center" rowspan="2">QTY</th>
                    <th class="text-center" rowspan="2">UNIT</th>
                    <th class="text-center" colspan="2">Amount</th>
                    <th class="text-center" rowspan="2">Description</th>
                    <th class="text-center" rowspan="2">Property Number/Code (PGSO)</th>
                    <th class="text-center" rowspan="2">ESTIMATED USEFUL LIFE</th>
                </tr>
                <tr>
                    <th class="text-center">Unit Cost</th>
                    <th class="text-center">Total Value</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach($items_ics as $ics)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-center">{{ $ics->serv_qty }}</td>
                    @if($ics->serv_qty < 1) <td class="text-center">{{ $ics->unit }}</td>
                        @else
                        <td class="text-center">{{ $ics->unit }}s</td>
                        @endif
                        <td class="text-center">{{ !empty($ics->serv_value) ? number_format($ics->serv_value, 2) : "-"}}
                        </td>
                        <td class="text-center">
                            {{ !empty($ics->serv_value * $ics->serv_qty) ? number_format($ics->serv_value * $ics->serv_qty, 2) : "-" }}
                        </td>
                        <td>
                            {!! nl2br(e($ics->serv_desc)) !!}
                        </td>
                        <td class="text-center hideextra">
                            <p>{{ $ics->serv_pgso }}</p>
                        </td>
                        <td class="text-center">Life years</td>
                </tr>
                @endforeach
            </tbody>
            <div class="row">
                <tr>
                    <td></td>
                    <td class="text-center"><b>{{ !empty($total->total_qty) ? $total->total_qty : null }}</b>
                    </td>
                    <td colspan="2" class="text-center"><b>Grand Total -----></b></td>
                    <td class="text-center">
                        <b>{{ !empty($total->grand_value) ? number_format($total->grand_value, 2) : null }}</b>
                    </td>
                </tr>
            </div>
            <tfoot>
                <tr></tr>
            </tfoot>
        </table>
        <footer>
            <div class="row mx-2 mb-4">
                <div class="col-6">
                    <h5><strong>Received from:</strong></h5>
                </div>
                <div class="col-6">
                    <h5><strong>Received by:</strong></h5>
                </div>
            </div>

            <div class="row mx-2">
                <div class="col-6 text-center">
                    <h5><strong><u>JASON R. CALDEA</u></strong></h5>
                    <h5 style="margin-bottom: 4rem;">Signature Over Printed Name</h5>
                    <h5><strong><u>Acting PGDH-PGSO</u></strong></h5>
                    <h5>Position/Office</h5>
                    <h5>______________________</h5>
                    <h5>Date: </h5>
                </div>
                <div class="col-6 text-center">
                    <h5><strong><u>{{ $establishment->estab_incharge }}</u></strong></h5>
                    <h5 style="margin-bottom: 4rem;">Signature Over Printed Name</h5>
                    <h5><strong><u>{{ $establishment->estab_position}}</u></strong></h5>
                    <h5>Position/Office</h5>
                    <h5>______________________</h5>
                    <h5>Date: </h5>
                </div>
            </div>
        </footer>
    </div>
</body>