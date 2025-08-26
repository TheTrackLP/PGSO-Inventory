<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $estab->estab_acronym }} Property Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .property-table th,
    .property-table td {
        border: 1px solid #000;
        vertical-align: middle;
        font-size: 14px;
    }

    .fixed-row {
        display: flex;
        justify-content: space-between;
        border: 1px solid #000;
    }

    .fixed-row>div {
        flex: 1;
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        padding: 0.5rem;
    }

    .fixed-row>div:first-child {
        border-left: none;
    }

    .fixed-row>div:last-child {
        border-right: none;
    }

    .uppercase {
        text-decoration: underline;
        font-weight: bold;
        text-transform: uppercase;
    }
    </style>

</head>

<body>
    <div class="container mt-5">
        <div class="text-center border">
            <h5 class="fw-bold">PROPERTY CARD</h5>
            <p class="uppercase">{{ $estab->estab_name }}</p>
            <p class="mb-1">LGU</p>
        </div>

        <div class="fixed-row mt-3">
            <div>
                <p class="mb-0"><strong>Plant, Property & Equipment</strong></p>
                <p class="text-center uppercase">{{ $ppe->ppe_name }}</p>
            </div>
            <div>
                <p class="mb-0"><strong>Property Classification No.</strong></p>
                <p class="text-center"><strong>{{ $ppe->ppe_code }}</strong></p>
            </div>
        </div>


        <table class="table table-bordered property-table w-100">
            <thead>
                <tr>
                    <th class="text-center" rowspan="2">Date</th>
                    <th class="text-center" rowspan="2">
                        Reference<br>
                        Property No.
                    </th>
                    <th class="text-center" rowspan="2">Description</th>
                    <th class="text-center" rowspan="2">Receipt</th>
                    <th class="text-center" colspan="2">Transfers/etc.</th>
                    <th class="text-center" rowspan="2">Balance Qty.</th>
                </tr>
                <tr>
                    <th class="text-center">Qty.</th>
                    <th class="text-center">Officer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item_serv as $item) <tr>
                    <td class="text-center">
                        <p>{{ date("m/d/Y", strtotime($item->serv_date)) }}</p>
                    </td>
                    <td class="text-center">
                        <p>{{ $item->serv_pgso }}</p>
                        <p>{{ $item->serv_acctg }}</p>
                    </td>
                    <td>
                        <p>{!! nl2br($item->serv_desc) !!}</p>
                        <p><strong>₱ {{ number_format($item->serv_value, 2) }}</strong></p>
                        <p><strong>₱ {{ number_format($item->serv_value * $item->serv_qty, 2) }}</strong></p>
                    </td>
                    <td class="text-center">
                        <p>{{ $item->serv_qty }}</p>
                    </td>
                    <td class="text-center">
                        <p>{{ $item->unit }}</p>
                    </td>
                    <td>&nbsp;</td>
                    <td class="text-center">
                        <p>{{ $item->serv_qty }} {{ $item->unit }}</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <div class="row">
                <tr>
                    <td></td>
                    <td>
                        <h5 class="text-center">
                            <b>Grand Total - - - - -><b>
                        </h5>
                    </td>
                    <td class="" style="font-size: 20px;">
                        <b>₱ {{ !empty($total->total_value) ? number_format($total->total_value, 2) : null }}</b>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </div>
        </table>
    </div>
</body>

</html>