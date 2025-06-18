@extends('admin.body.header')
@section('admin')

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
                type="button" role="tab" aria-controls="pills-uns" aria-selected="false"><strong>IIRUP</strong></button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-type" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold">PPE</h5>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal"
                                data-bs-target="#rpcppe" title="View details of RPCPPE">
                                <i class="fas fa-eye"></i> View RPCPPE
                            </button>
                            <button type="button" class="btn btn-success float-end px-4" data-bs-toggle="modal"
                                data-bs-target="#ics" title="View ICS details">
                                <i class="fas fa-eye"></i> View ICS
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-estab" role="tabpanel" aria-labelledby="pills-profile-estab" tabindex="0">
            <form class="col-4 mx-2 my-2">
                <input type="text" id="dash_filter" placeholder="Search here..." class="form-control">
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="dash_ofc">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title bold">Office Name</h5>
                        </div>
                        <div class="card-body text-center">
                            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal"
                                data-bs-target="#officeItems" title="View details of RPCPPE">
                                <i class="fas fa-eye"></i> View RPCPPE and ICS Equipments
                            </button>
                        </div>
                    </div>
                </div>
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

@endsection