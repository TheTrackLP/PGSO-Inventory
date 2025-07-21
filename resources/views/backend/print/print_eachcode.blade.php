<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Custodian Slip</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<style>
img {
    display: block;
    max-width: 100px;
    width: auto;
    height: auto;
    margin: 0 auto;
}

.head {
    background-color: #ffff00;
}

.table-bordered {
    border: 1px solid black;
}

.upper {
    text-transform: uppercase;
}
</style>
@php
$i = 1;
@endphp

<body>
    <div class="row mt-4 text-center">
        <div class="col-1" style="margin-top: -1rem">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Seal_of_Capiz.png/640px-Seal_of_Capiz.png"
                alt="Seal of Capiz">
        </div>
        <div class="col-11" style="margin-left: -2.5rem;">
            <div class="text-center">
                <h5>Republic of the Philippines</h5>
                <h6>PROVINCE OF CAPIZ</h6>
                <h6>City of Roxas</h6>
                <h4 class="fw-bold fst-italic">OFFICE OF THE PROVINCIAL GENERAL SERVICES</h4>
                @if ($type == 1)
                <h5 class="fst-italic">REPORT ON THE PHYSICAL COUNT PROPERTY, PLANT AND EQUIPMENT (RPCPPE)</h5>
                @elseif ($type == 2)
                <h5 class="fst-italic">INVENTORY CUSTODIAN SLIP (ICS)</h5>
                @endif
                <p class="fst-italic"><br>As of December 2024</p>
            </div>
        </div>
        <div class="border">
            <table class="table table-bordered">
                <thead class="head text-center">
                    <tr>
                        <th></th>
                        <th>OFFICES</th>
                        <th>QTY</th>
                        <th>{{ $ppe->ppe_name }} {{ $ppe->ppe_code }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eachcode as $data)
                    @if ($data->estab_type == 1)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td class="text-start">{{ $data->estab }}</td>
                        <td class="text-center">{{ $data->total_qty }}</td>
                        <td class="text-end">{{ number_format($data->total_value,2 ) }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>