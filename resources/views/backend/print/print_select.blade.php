<div class="modal fade" id="printSelect" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header">
                <h3>Print Serviceable(s)/Unserviceable(s)/Summaries</h3>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-lg-6 form-group mb-3">
                        <label for="">Select Establishments:</label>
                        <select name="print_estab" id="" class="selectPrint">
                            <option value="" selected disabled>Select Option</option>
                            @foreach ($estabs as $estab)
                            <option value="{{ $estab->id }}">{{ $estab->estab_acronym }} | {{ $estab->estab_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 form-group mb-3">
                        <label for="">Select PPE Account:</label>
                        <select name="print_ppe" id="" class="selectPrint">
                            <option value="" selected disabled>Select Option</option>
                            @foreach ($ppes as $ppe)
                            <option value="{{ $ppe->id }}">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 form-group mb-3">
                        <label for="">Select Type:</label>
                        <select name="print_type" id="" class="selectPrint">
                            <option value="" selected disabled>Select Option</option>
                            <option value="1">RPCPPE</option>
                            <option value="2">ICS</option>
                            <option value="3">IIRUP</option>
                        </select>
                    </div>
                    <div class="col-lg-6 form-group mb-3">
                        <label for="">Offices/Hospitals:</label>
                        <select name="print_estabtype" id="" class="selectPrint">
                            <option value="" selected disabled>Select Option</option>
                            <option value="1">Offices</option>
                            <option value="2">Hospitals</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3 h-100 d-flex flex-column">
                            <div class="card-header text-center">
                                Print RPCPPE
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-success"
                                        onclick="printTopRPCPPE()">Print
                                        Top</button>
                                    <button type="button" class="btn btn-success" onclick="printRPCPPE()">Print
                                        RPCPPE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3 h-100 d-flex flex-column">
                            <div class="card-header text-center">
                                Print ICS
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-success" onclick="printTopICS()">Print
                                        Top</button>
                                    <button type="button" class="btn btn-success" onclick="printICS()">Print
                                        ICS</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3 h-100 d-flex flex-column">
                            <div class="card-header text-center">
                                Print IIRUP
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-success" onclick="">Print
                                        Top</button>
                                    <button type="button" class="btn btn-success" onclick="">Print
                                        IIRUP</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3 h-100 d-flex flex-column">
                            <div class="card-header text-center">
                                Print Property Card
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-success"
                                        onclick="printPropertyCard()">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3 h-100 d-flex flex-column">
                            <div class="card-header text-center">
                                Print Each Code
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-success"
                                        onclick="printEachCode()">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3 h-100 d-flex flex-column">
                            <div class="card-header text-center">
                                Print Consolidated
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-success"
                                        onclick="printConsolidated()">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>