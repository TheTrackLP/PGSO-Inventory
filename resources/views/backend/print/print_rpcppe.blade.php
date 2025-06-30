<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $establishment->estab_acronym }} | {{ $ppe_acct->ppe_name }} ({{ $ppe_acct->ppe_code }})</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<style>
@media print {
    @page {
        size: landscape;
    }

    .hideextra {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
}

body {
    font-family: "Times New Roman", Times, serif;
}

footer {
    border: 3px solid black;
    margin-top: -1.1rem;
}

.tab {
    margin-left: 68%;
}

.table-bordered {
    border: 3px solid black !important;
}

td,
p {
    margin: -1px;
}

td.remarks-column p {
    border-bottom: 1px solid black;
    padding-bottom: 2px;
    margin-bottom: 4px;
}
</style>

<body>
    @php
    $current_date = date("F Y");
    @endphp
    <div class="container-fluid">
        <div class="col">
            <div class="text-center">
                <h4>
                    <b>REPORT ON THE PHYSICAL COUNT ON PROPERTY PLANT AND EQUIPMENT</b>
                </h4>
                <h5>(Type of Property, Plant and Equipment)</h5>
                <h4><b>{{ $ppe_acct->ppe_name }} ({{ $ppe_acct->ppe_code }})</b></h4>
                <h4>
                    <b>Made as of <u>{{ strtoupper($current_date) }}</u></b>
                </h4>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-1">
                <h5>For Which </h5>
            </div>
            <div class="col-2 text-center">
                <h5><b><u>{{ $establishment->estab_incharge }}</u></b></h5>
                <p>(Name of Accountable Officer)</p>
            </div>
            <div class="col-3 text-center">
                <h5><b><u>{{ $establishment->estab_position }}</u></b></h5>
                <p>(Official Designation)</p>
            </div>
            <div class="col-2 text-center">
                <h5><b><u>{{ $establishment->estab_name }}
                        </u></b></h5>
                <p>(Bureau of Office)</p>
            </div>
            <div class="col-4">
                <h5>
                    is accountable having assumed such as accountability on_________
                </h5>
                <p><span class="tab">(Date of Assumption)</span></p>
            </div>
        </div>
        <div class="custom-border">
            <div class="col-12 borders" style="">
                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:10%">ARTICLE</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">Old Property</th>
                            <th class="text-center" style="width:10%">ACCOUNT TITLE CODE (Acctg)</th>
                            <th class="text-center" style="width:10%">Property/Number Code (PGSO)</th>
                            <th class="text-center">Date Acquired</th>
                            <th class="text-center" style="width: 2%">Quantity Unit</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Unit Value</th>
                            <th class="text-center">Total Value</th>
                            <th class="text-center" style="width: 7%">REMARKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items_rpcppe as $rpcppe)
                        @php
                        $lines = explode("\n", trim($rpcppe->serv_desc));
                        $firstLine = $lines[0] ?? '';
                        $restLines = implode("\n", array_slice($lines, 1));
                        @endphp
                        <tr data-value="{{ $rpcppe->serv_value }}" data-qty="{{ $rpcppe->serv_qty }}">
                            <td>{{ $firstLine }}</td>
                            <td class="">{!! nl2br(e($restLines)) !!}</td>
                            <td class="text-center hideextra">{{ $rpcppe->serv_prop }}</td>
                            <td class="text-center hideextra">{{ $rpcppe->serv_acctg }}</td>
                            <td class="text-center hideextra">{{ $rpcppe->serv_pgso }}</td>
                            <td class="text-center">
                                {{ !empty($rpcppe->serv_date) ? date('m/d/Y', strtotime($rpcppe->serv_date)) : null }}
                            </td>
                            <td class="text-center">{{ $rpcppe->unit }}</td>
                            <td class="text-center">{{ $rpcppe->serv_qty }}</td>
                            <td class="text-center">
                                {{ !empty($rpcppe->serv_value) ? number_format($rpcppe->serv_value, 2) : null }}
                            </td>
                            <td class="text-center">
                                @if($rpcppe->serv_qty == 0)
                                <p>{{ !empty($rpcppe->serv_value) ? number_format($rpcppe->serv_value, 2) : null }}</p>
                                @else
                                <p>{{ !empty($rpcppe->serv_value) ? number_format($rpcppe->serv_value * $rpcppe->serv_qty, 2) : null }}
                                </p>
                                @endif
                            </td>
                            <td class="text-center">
                                <p>{{ $rpcppe->serv_remarks }}</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                    <div class="row">
                        <tr>
                            <td></td>
                            <td colspan="6">
                                <h5 class="text-center">
                                    <b>Grand Total----------------------------------</b>
                                </h5>
                            </td>
                            <td class="text-center"><b>{{ !empty($total->total_qty) ? $total->total_qty : null }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ !empty($total->total_value) ? number_format($total->total_value, 2) : null }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ !empty($total->grand_value) ? number_format($total->grand_value, 2) : null }}</b>
                            </td>
                        </tr>
                    </div>
                </table>
                <!-- <footer>
                    <div class="row mx-2 mb-3">
                        <div class="col-6">
                            <h5><strong>Received by:</strong></h5>
                        </div>
                        <div class="col-6">
                            <h5><strong>Received from:</strong></h5>
                        </div>
                    </div>

                    <div class="row mx-2">
                        <div class="col-6 text-center">
                            <h5><strong><u>{{ $establishment->estab_incharge}}</u></strong></h5>
                            <h5 style="margin-bottom: 3rem;">Signature Over Printed Name</h5>
                            <h5><strong><u>{{ $establishment->estab_name }}</u></strong></h5>
                            <h5>Position/Office</h5>
                            <h5>______________________</h5>
                            <h5>Date: </h5>
                        </div>
                        <div class="col-6 text-center">
                            <h5><strong><u>JASON R. CALDEA</u></strong></h5>
                            <h5 style="margin-bottom: 3rem;">Signature Over Printed Name</h5>
                            <h5><strong><u>Acting PGDH-PGSO</u></strong></h5>
                            <h5>Position/Office</h5>
                            <h5>______________________</h5>
                            <h5>Date: </h5>
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>
    </div>
</body>

</html>