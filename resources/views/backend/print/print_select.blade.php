<div class="modal fade" id="selectPrint" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    Print Offices or Hospitals
                </h3>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Print RPCPPE and ICS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Consolidated</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="form-group mb-3">
                            <label for="" class="bold">Select Office or Hospital:</label>
                            <select name="print_ofc" class="select_print">
                                <option value="">Select an option</option>
                                @foreach($offices as $ofc)
                                <option value="{{ $ofc->id }}">{{ $ofc->office_acronym }} | {{ $ofc->office_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="bold">PPE Account</label>
                            <select name="print_ppe" class="select_print">
                                <option value="">Select an option</option>
                                @foreach($ppes as $ppe)
                                <option value="{{ $ppe->id }}">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header text-center">
                                        RPCPPE
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                            <button class="btn btn-outline-success me-md-2" type="button"
                                                onclick="PrintTopRPCPPE()">Print Top</button>
                                            <button type="button" class="btn btn-success" onclick="PrintRPCPPE()">Print
                                                RPCPPE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header text-center">
                                        ICS
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                            <button class="btn btn-outline-success me-md-2" type="button"
                                                onclick="PrintTopICS()">Print Top</button>
                                            <button type="button" class="btn btn-success" onclick="PrintICS()">Print
                                                ICS</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="form-group mb-4">
                            <label for="" class="bold">Select PPE Account</label>
                            <select name="print_ppe2" class="select_print">
                                <option value="">Select an option</option>
                                @foreach($ppes as $ppe)
                                <option value="{{ $ppe->id }}">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Select either RPCPPE or ICS:</label>
                            <select name="print_type" class="select_print">
                                <option value="" disabled selected>Select an option</option>
                                <option value="1">RPCPPE</option>
                                <option value="2">ICS</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Offices or Hospitals:</label>
                            <select name="print_estab" class="select_print">
                                <option value="" disabled selected>Select an option</option>
                                <option value="1">Offices</option>
                                <option value="2">Hosptais</option>
                            </select>
                        </div>
                        <div class="row mt-4 g-3">
                            <div class="col-sm-12 col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        <strong><i class="fas fa-building me-2"></i> All Establishments</strong>
                                    </div>
                                    <div class="card-body d-grid">
                                        <button class="btn btn-success px-4" type="button">
                                            Print
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        <strong><i class="fas fa-barcode me-2"></i> Each Code</strong>
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-success px-4" type="button" onclick="PrintEach()">
                                            Print
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        <strong><i class="fas fa-chart-pie me-2"></i> Total Summary</strong>
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-success px-4" type="button" onclick="PrintSummaryICS()">
                                            Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg float-end" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>