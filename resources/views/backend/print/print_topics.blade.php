<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $establishment->estab_name }} Schedule</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<style>
@media print {
    @page {
        size: landscape;
    }

}

body {
    font-family: "Times New Roman", Times, serif;
}

.header {
    line-height: 1%;
}

.table td,
.table th {
    font-size: 18px;
}

.table-bordered {
    border: 1px solid black;
}

thead {
    line-height: normal;
}
</style>

<body>
    <div class="container-fluid mt-4">
        <div class="header text-center">
            <p>Republic of the Philippines</p>
            <h5><b>PROVINCE OF CAPIZ</b></h5>
            <p>City of Roxas</p>
            <p>Tel. No. 610-036</p>
        </div>
        <div class="text-center mb-4">
            <h2>OFFICE OF THE PROVINCIAL GENERAL SERVICES</h2>
            <h4><b>TOP SCHEDULE FOR <span style="text-transform:uppercase">{{ $establishment->estab_name }}</span></b>
            </h4>
            <h5><b>FOR SERVICABLE EQUIPMENT (DECEMBER. 2025)</b></h5>
            <h5>
                INVENTORY CUSTODIAN SLIP (ICS)
            </h5>
        </div>
        <table class="table table-bordered">
            <colgroup>
                <col width="1%">
                <col width="5%">
                @foreach($top_ics as $ics)
                <col width="1%">
                <col width="5%">
                @endforeach
            </colgroup>
            <thead class="center1">
                <th></th>
                <th class="text-center py-5">OFFICE/DEPARTMENT</th>
                @foreach($top_ics as $ics)
                <th class="text-center py-5">QTY</th>
                <th class="text-center">
                    <p>Total Cost</p>
                    <p><u>{{ $ics->ppe_code }}</u></p>
                    <p>{{ $ics->ppe_name }}</p>
                </th>
                @endforeach
            </thead>
            <tbody>
                <tr>
                    <td class="text-center p-4">1</td>
                    <td class="text-center p-4"><b><span
                                style="text-transform:uppercase">{{ $establishment->estab_name }}</span></b></td>
                    @foreach($top_ics as $ics)
                    <td class="text-center p-4">{{ $ics->total_qty }}</td>
                    <td class="text-center p-4">{{ number_format($ics->grand_total, 2) }}</td>
                    @endforeach
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="18" class="p-4">
                        <h4><b>OVERALL TOTAL ----------> <span
                                    class="float-end">{{ number_format($overall_grand_total, 2) }}</span></b></h4>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>