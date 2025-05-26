@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="mt-4"></div>
    <div class="card shadow">
        <div class="card-header my-2">
            <h3 class="card-title">Serviceable(s) - Inventory Custodian Slip (ICS)</h3>
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                            <div class="col">
                                <label for="ofc_hos" class="bold">Office/Hospital</label>
                                <select name="ofc_hos" id="ofc_hos" class="form-select select2">
                                    <option value="">Select an option</option>
                                    @foreach($offices as $ofc)
                                    <option value="{{ $ofc->office_acronym }}">{{ $ofc->office_acronym }} |
                                        {{ $ofc->office_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="ppe_code" class="bold">PPE Account</label>
                                <select name="ppe_code" id="ppe_code" class="form-select select2">
                                    <option value="">Select an option</option>
                                    @foreach($ppes as $ppe)
                                    <option value="{{ $ppe->ppe_code }}">{{ $ppe->ppe_code}} | {{ $ppe->ppe_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="type" class="bold">RPCPPE/ICS</label>
                                <select name="type" id="type" class="form-select select2">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="1">Serviceable</option>
                                    <option value="0">Unserviceables</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="servTable">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Article</th>
                        <th class="text-center">Old Property</th>
                        <th class="text-center">Property (PGSO)</th>
                        <th class="text-center">Office/PPE</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($items_ics as $ics)
                    <tr>
                        <td>
                            <p>{{ $ics->serv_article }}</p>
                        </td>
                        <td>
                            <p>{{ !empty($ics->serv_prop) ? $ics->serv_prop : "N/A"  }}</p>
                        </td>
                        <td>
                            <p>{{ !empty($ics->serv_pgso) ? $ics->serv_pgso : "N/A"  }}</p>
                        </td>
                        <td>
                            <p>Ofice: <b>{{ $ics->office }}</b></p>
                            <p>PPE: <b>{{ $ics->ppe }}</b></p>
                        </td>
                        <td class="text-center">
                            <p>{{ !empty($ics->serv_value * $ics->serv_qty) ? number_format($ics->serv_value * $ics->serv_qty, 2) : "----"}}
                            </p>
                        </td>
                        <td class="text-center">
                            @if($ics->serv_status == 1)
                            <span class="badge rounded-pill text-bg-success">Serviceable</span>
                            @elseif($ics->serv_status == 0)
                            <span class="badge rounded-pill text-bg-danger">Unserviceable</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a></li>
                                    <li><a class="dropdown-item" href="{{ route('serv.edit', $ics->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i>
                                            Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i>
                                            Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#ICSTable").dataTable();
    $(".select2").select2({
        width: "100%",
        placeholder: "Select an option",
    });
});
</script>
@endsection