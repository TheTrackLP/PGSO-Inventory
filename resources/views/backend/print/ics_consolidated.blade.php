<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary | {{ $class->class_acronym }}</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<style>
@media print {

    @page {
        size: landscape;
    }
}

.head {
    background-color: #ffff00;
}

.table-bordered {
    border: 2px solid black;
}
</style>

<body>
    <div class="container-fluid">
        <table class="table table-bordered table-hover table-striped">
            <thead class="head">
                <tr>
                    <th class="text-center">#</th>
                    <th class="">Offices</th>
                    @foreach($ppes as $ppe)
                    <th class="text-center">QTY</th>
                    <th class="text-center">{{ $ppe->ppe_name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($offices as $ofc)
                <tr>
                    <td class="text-center">{{ $ofc->office_sequence }}</td>
                    <td><b>{{ $ofc->office_name }}</b></td>
                    @foreach($ppes as $ppe)
                    @php
                    $Data = $office_ics->firstWhere(function($item) use ($ofc, $ppe) {
                    return $item->serv_ofc == $ofc->id && $item->serv_ppe == $ppe->id;
                    });
                    @endphp
                    @if($Data)
                    <td class="text-center">{{ $Data->total_qty }}</td>
                    <td class="text-center">{{ number_format($Data->grand_total,2) }}</td>
                    @else
                    <td></td>
                    <td></td>
                    @endif
                    @endforeach
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Grand Total ----------------></th>
                    @foreach($ppes as $ppe)
                    @php
                    $grand_total = $office_ics->where('serv_ppe', $ppe->id)->sum('grand_total');
                    $total_qty = $office_ics->where('serv_ppe', $ppe->id)->sum('total_qty');
                    @endphp
                    <th class="text-center">{{ $total_qty ? $total_qty: '' }}</th>
                    <th class="text-center">{{ $grand_total ? number_format($grand_total, 2) : ''}}</th>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>