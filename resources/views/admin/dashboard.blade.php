@extends('admin.body.header')
@section('admin')

<style>
.card {
    border-top: 4px solid green;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: scale(1.03);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.btn-success:hover {
    transform: scale(1.03);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

hr {
    height: 0px;
    border: none;
    border-top: 3px solid black;
}
</style>
@php
$i = 1;
$x = 1;
@endphp
<div class="container-fluid px-4">
    <h1 class="mt-4">Summary</h1>
    <hr>
    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-type" data-bs-toggle="pill" data-bs-target="#pills-type"
                type="button" role="tab" aria-controls="pills-type" aria-selected="true"><strong>Report on the Count
                    Property,
                    Plant and Equipment (RPCPPE) and Inventory Custodian Slip (ICS)</strong> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-ofc_hos" data-bs-toggle="pill" data-bs-target="#pills-ofc_hos"
                type="button" role="tab" aria-controls="pills-ofc_hos" aria-selected="false"><strong>Offices and
                    Hospitals Serviceable(s)</strong></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-uns" data-bs-toggle="pill" data-bs-target="#pills-uns"
                type="button" role="tab" aria-controls="pills-ofc_hos" aria-selected="false"><strong>Offices and
                    Hospitals Unserviceable(s)</strong></button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-type" role="tabpanel" aria-labelledby="pills-home-type"
            tabindex="0">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @foreach($ppes as $ppe)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}</h5>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal"
                                data-bs-target="#rpcppe{{ $ppe->id }}" title="View details of RPCPPE">
                                <i class="fas fa-eye"></i> View RPCPPE
                            </button>
                            <button type="button" class="btn btn-success float-end px-4" data-bs-toggle="modal"
                                data-bs-target="#ics{{ $ppe->id }}" title="View ICS details">
                                <i class="fas fa-eye"></i> View ICS
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="pills-ofc_hos" role="tabpanel" aria-labelledby="pills-profile-ofc_hos"
            tabindex="0">
            <form class="col-4 mx-2 my-2">
                <input type="text" id="dash_filter" placeholder="Search here..." class="form-control">
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="dash_ofc">
                @foreach($offices as $ofc)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold">{{ $ofc->office_acronym }} |
                                {{ $ofc->office_name }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal"
                                data-bs-target="#officeItems{{ $ofc->id }}" title="View details of RPCPPE">
                                <i class="fas fa-eye"></i> View RPCPPE and ICS Equipments
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="pills-uns" role="tabpanel" aria-labelledby="pills-profile-uns" tabindex="0">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @foreach($offices as $ofc)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold">{{ $ofc->office_acronym }} | {{ $ofc->office_name }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#"
                                title="View details of RPCPPE">
                                <i class="fas fa-eye"></i> View RPCPPE and ICS Equipments
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@foreach($ppes as $ppe)
<div class="modal fade" id="ics{{ $ppe->id }}" tabindex="-1" aria-labelledby="ics{{ $ppe->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    {{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">Offices/Hospitals</th>
                            <th class="text-center">Total Qty</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items_ics as $ics)
                        @if($ppe->id == $ics->serv_ppe)
                        <tr>
                            <td class="bold">{{ $ics->office }}</td>
                            <td class="text-center bold">{{ $ics->total_qty}}</td>
                            <td class="text-center bold">{{ number_format($ics->grand_total,2 ) }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="rpcppe{{ $ppe->id }}" tabindex="-1" aria-labelledby="rpcppe{{ $ppe->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    {{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">Offices/Hospitals</th>
                            <th class="text-center">Total Qty</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items_rpcppe as $rpcppe)
                        @if($ppe->id == $rpcppe->serv_ppe)
                        <tr>
                            <td class="bold">{{ $rpcppe->office }}</td>
                            <td class="text-center bold">{{ $rpcppe->total_qty}}</td>
                            <td class="text-center bold">{{ number_format($rpcppe->grand_total,2 ) }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($offices as $ofc)
<div class="modal fade" id="officeItems{{ $ofc->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    {{ $ofc->office_acronym }} | {{ $ofc->office_name }}
                </h3>
            </div>
            <div class="modal-body">
                <h5 class="text-center bold">Report on the Physical Count Property, Plant and Equipment (RPCPPE)</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">PPE Code / PPE Name</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($office_rpcppe as $ofc_rpcppe)
                        @if($ofc->id == $ofc_rpcppe->serv_ofc)
                        <tr>
                            <td class="bold">{{ $ofc_rpcppe->ppe_code }} | {{ $ofc_rpcppe->ppe_name }}</td>
                            <td class="bold text-center">{{ $ofc_rpcppe->total_qty }}</td>
                            <td class="bold text-center">{{ number_format($ofc_rpcppe->grand_total, 2) }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h5 class="text-center bold">Inventory Custodian Slip (ICS)</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">PPE Code / PPE Name</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($office_ics as $ofc_ics)
                        @if($ofc->id == $ofc_ics->serv_ofc)
                        <tr>
                            <td class="bold">{{ $ofc_ics->ppe_code }} | {{ $ofc_ics->ppe_name }}</td>
                            <td class="bold text-center">{{ $ofc_ics->total_qty }}</td>
                            <td class="bold text-center">{{ number_format($ofc_ics->grand_total, 2) }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
$(document).ready(function() {
    $("#dash_filter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dash_ofc > div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
@endsection