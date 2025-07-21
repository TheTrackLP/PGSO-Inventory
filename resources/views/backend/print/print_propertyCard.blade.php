<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Property Card</title>
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
    </style>

</head>

<body>
    <div class="container mt-5">
        <div class="text-center border">
            <h5 class="fw-bold">PROPERTY CARD</h5>
            <p>{{ $estab->estab_name }}</p>
            <p class="mb-1">LGU</p>
        </div>

        <div class="fixed-row mt-3">
            <div>
                <p class="mb-0"><strong>Plant, Property & Equipment</strong></p>
                <p class="text-center">PPE</p>
            </div>
            <div>
                <p class="mb-0"><strong>Property Classification No.</strong></p>
                <p class="text-center"><strong>201</strong></p>
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
                    <td>
                        <p>{{ date("m/d/Y", strtotime($item->serv_date)) }}</p>
                    </td>
                    <td>
                        <p>{{ $item->serv_pgso }}</p>
                        <p>{{ $item->serv_acctg }}</p>
                    </td>
                    <td>
                        <p>{!! nl2br($item->serv_desc) !!}</p>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>