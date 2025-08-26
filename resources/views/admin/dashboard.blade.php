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
<div class="container-fluid px-4">
    <h1 class="mt-4">Summary</h1>
    <hr>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-type" data-bs-toggle="pill" data-bs-target="#pills-type"
                type="button" role="tab" aria-controls="pills-type" aria-selected="true"><strong>Report on the Count
                    Property,
                    Plant and Equipment (RPCPPE) and Inventory Custodian Slip (ICS)</strong> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-estab" data-bs-toggle="pill" data-bs-target="#pills-estab"
                type="button" role="tab" aria-controls="pills-estab" aria-selected="false"><strong>Offices and
                    Hospitals Serviceable(s)</strong></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-uns" data-bs-toggle="pill" data-bs-target="#pills-uns"
                type="button" role="tab" aria-controls="pills-uns" aria-selected="false"><strong>Inventory and
                    Inspection Report of Unserviceable Property</strong></button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-type" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @foreach ($ppes as $ppe)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}</h5>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal"
                                data-bs-target="#rpcppe_{{ $ppe->id }}" title="View details of RPCPPE">
                                <i class="fas fa-eye"></i> View RPCPPE
                            </button>
                            <button type="button" class="btn btn-success float-end px-4" data-bs-toggle="modal"
                                data-bs-target="#ics_{{ $ppe->id }}" title="View ICS details">
                                <i class="fas fa-eye"></i> View ICS
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="pills-estab" role="tabpanel" aria-labelledby="pills-profile-estab" tabindex="0">
            <form class="col-4 mx-2 my-2">
                <input type="text" id="dash_filter" placeholder="Search here..." class="form-control">
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="dash_ofc">
                @foreach ($estabs as $estab)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold">{{ $estab->estab_acronym }} | {{ $estab->estab_name }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal"
                                data-bs-target="#estab_{{ $estab->id}}" title="View details of RPCPPE">
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
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold"></h5>
                        </div>
                        <div class="card-body text-center">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#"
                                title="View details of RPCPPE">
                                <i class="fas fa-eye"></i> View RPCPPE and ICS Equipments
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($ppes as $ppe)
<div class="modal fade" id="rpcppe_{{ $ppe->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    {{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}
                </h3>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Report on the Physical Count Property, Plant and Equipment (RPCPPE)</h4>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">Establishment Name</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items_rpcppe as $rpcppe)
                        @if($ppe->id == $rpcppe->serv_ppe)
                        <tr>
                            <td>
                                <b>{{ $rpcppe->estab }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ $rpcppe->total_qty }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ number_format( $rpcppe->grand_total, 2) }}</b>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ics_{{ $ppe->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    {{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}
                </h3>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Inventory Custodian Slip (ICS)</h4>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">Establishment Name</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items_ics as $ics)
                        @if($ppe->id == $ics->serv_ppe)
                        <tr>
                            <td>
                                <b>{{ $ics->estab }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ $ics->total_qty }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ number_format( $ics->grand_total, 2) }}</b>
                            </td>
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

@foreach ($estabs as $estab)
<div class="modal fade" id="estab_{{ $estab->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h4 class="text-center">
                        {{ $estab->estab_acronym }} | {{ $estab->estab_name }}
                    </h4>
                </div>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Report on the Physical Count Property, Plant and Equipment (RPCPPE)</h4>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">PPE Account</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items_rpcppe as $rpcppe_estab)
                        @if($estab->id == $rpcppe_estab->serv_estab)
                        <tr>
                            <td>
                                <b>{{ $rpcppe_estab->ppe }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ $rpcppe_estab->total_qty }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ number_format( $rpcppe_estab->grand_total, 2) }}</b>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h4 class="text-center">Inventory Custodian Slip (ICS)</h4>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">PPE Account</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items_ics as $ics_estab)
                        @if($estab->id == $ics_estab->serv_estab)
                        <tr>
                            <td>
                                <b>{{ $ics_estab->ppe }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ $ics_estab->total_qty }}</b>
                            </td>
                            <td class="text-center">
                                <b>{{ number_format( $ics_estab->grand_total, 2) }}</b>
                            </td>
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
@endsection