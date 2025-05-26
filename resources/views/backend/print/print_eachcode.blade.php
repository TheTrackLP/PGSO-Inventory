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
    <div class="mt-4">
        <div class="text-center">
            <div class="row">
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
                        <p class="fst-italic">{{ $class->class_name }} ({{ $class->class_acronym }})<br>As of December
                            2024</p>
                    </div>
                </div>
                <div class="border">
                    <table class="table table-bordered">
                        <thead class="head text-center">
                            <tr>
                                <th></th>
                                <th class="upper">OFFICES</th>
                                <th class="upper">QTY.</th>
                                <th>{{ $ppe->ppe_name }} {{ $ppe->ppe_code }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serv_data as $data)
                            @if($data->office_type == 1)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-start"><b>{{ $data->office }}</b></td>
                                <td class="text-center">{{ $data->total_qty }}</td>
                                <td class="text-end">{{ number_format($data->grand_total, 2) }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead class="head text-center">
                            <tr>
                                <th></th>
                                <th class="upper">HOSPITALS</th>
                                <th class="upper">QTY.</th>
                                <th>{{ $ppe->ppe_name }} {{ $ppe->ppe_code }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serv_data as $data)
                            @if($data->office_type == 2)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->office }}</td>
                                <td class="text-center">691</td>
                                <td class="text-end">5,175,100.00</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td>Grand Total</td>
                            <td>Overall QTY</td>
                            <td>Overall</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>