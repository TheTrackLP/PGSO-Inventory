@extends('admin.body.header')
@section('admin')

<style>

</style>
<div class="container-fluid">
    <form action="{{ route('serv.store') }}" method="post">
        @csrf
        <div class="card shadow mt-3">
            <div class="card-header">
                <h3 class="mb-3">Add Serviceables</h3>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <button type="submit" class="btn btn-success btn-lg me-2">
                            <i class="fas fa-plus-circle"></i> Add Serviceables
                        </button>
                        <button type="button" id="add" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Add New Form
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                    <div class="col">
                        <label for="serv_ofc" class="bold">Office/Hospital</label>
                        <select name="inputs[1][serv_ofc]" id="serv_ofc" class="form-select select2">
                            <option value="">Select an option</option>
                            @foreach($offices as $ofc)
                            <option value="{{ $ofc->id }}">{{ $ofc->office_acronym }} | {{ $ofc->office_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="serv_ppe" class="bold">PPE Account</label>
                        <select name="inputs[1][serv_ppe]" id="serv_ppe" class="form-select select2">
                            <option value="">Select an option</option>
                            @foreach($ppes as $ppe)
                            <option value="{{ $ppe->id }}">{{ $ppe->ppe_code}} | {{ $ppe->ppe_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="serv_type" class="bold">RPCPPE or ICS</label>
                        <select name="inputs[1][serv_type]" id="serv_type" class="form-select select2">
                            <option value="" disabled selected>Select an option</option>
                            <option value="1">RPCPPE</option>
                            <option value="2">ICS</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong>Form Item #1</strong>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <button type="button" class="btn btn-primary float-end px-5">Add
                                            Item(s)</button>
                                        <h3>Item Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="" class="bold">Article</label>
                                                <input type="text" name="inputs[1][serv_article]" class="form-control">
                                            </div>
                                            <div class="col-md-7">
                                                <label for="" class="bold">Remarks</label>
                                                <input type="text" name="inputs[1][serv_remarks]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="" class="bold">Description</label>
                                            <textarea name="inputs[1][serv_desc]" class="summernote"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3>Accounting/Property Number</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="bold">Old Property No.</label>
                                                <input type="text" name="inputs[1][serv_prop]" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="bold">Accounting Title Code:</label>
                                                <input type="text" name="inputs[1][serv_acctg]" class="form-control">
                                                <small>Note: Leave blank if no Acct. code</small>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="" class="bold">Date Acquired</label>
                                                        <input type="date" name="inputs[1][serv_date]"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-4 shadow">
                                    <div class="card-header">
                                        <h3>Unit Type/Qty/Value</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="" class="bold">Unit Type</label>
                                                <select name="inputs[1][serv_unit]" class="form-select select2">
                                                    <option value=""></option>
                                                    @foreach($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="bold">QTY</label>
                                                <input type="number" name="inputs[1][serv_qty]" class="form-control">

                                            </div>
                                            <div class="col-md-5">
                                                <label for="" class="bold">Unit Value</label>
                                                <input type="number" name="inputs[1][serv_value]" step="any"
                                                    class="form-control">
                                            </div>
                                            <input type="hidden" name="inputs[1][serv_status]" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
$(document).ready(function() {
    var i = 1;
    $("#add").click(function() {
        var selectedOfc = $("#serv_ofc").val();
        var selectedPpe = $("#serv_ppe").val();
        var selectedType = $('#serv_type').val();

        if (!selectedOfc || !selectedPpe || !selectedType) {
            toastr.error(
                "Please select Office, PPE and Type before adding a new form"
            );
        } else {
            ++i;
            $("#accordionExample").append(
                `
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">
                            <strong>Form Item #${i}</strong>
                        </button>
                    </h2>
                    <div id="collapse${i}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <button type="button" class="btn btn-primary float-end px-5">Add
                                            Item(s)</button>
                                        <h3>Item Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="" class="bold">Article</label>
                                                <input type="text" name="inputs[${i}][serv_article]" class="form-control">
                                            </div>
                                            <div class="col-md-7">
                                                <label for="" class="bold">Remarks</label>
                                                <input type="text" name="inputs[${i}][serv_remarks]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="" class="bold">Description</label>
                                            <textarea name="inputs[${i}][serv_desc]" class="summernote"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3>Accounting/Property Number</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="bold">Old Property No.</label>
                                                <input type="text" name="inputs[${i}][serv_prop]" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="bold">Accounting Title Code:</label>
                                                <input type="text" name="inputs[${i}][serv_acctg]" class="form-control">
                                                <small>Note: Leave blank if no Acct. code</small>
                                            </div>
                                               <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="" class="bold">Date Acquired</label>
                                                        <input type="date" name="inputs[${i}][serv_date]"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-4 shadow">
                                    <div class="card-header">
                                        <h3>Unit Type/Qty/Value</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="" class="bold">Unit Type</label>
                                                <select name="inputs[${i}][serv_unit]" class="form-select select2">
                                                    <option value=""></option>
                                                    @foreach($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="bold">QTY</label>
                                                <input type="number" name="inputs[${i}][serv_qty]" class="form-control">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="" class="bold">Unit Value</label>
                                                <input type="number" name="inputs[${i}][serv_value]" step="any" class="form-control">
                                            </div>
                                            <input type="hidden" name="inputs[${i}][serv_status]" value="1">
                                            <input type="hidden" name="inputs[${i}][serv_ofc]" value="${selectedOfc}">
                                            <input type="hidden" name="inputs[${i}][serv_ppe]" value="${selectedPpe}">
                                            <input type="hidden" name="inputs[${i}][serv_type]" value="${selectedType}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                `
            );
        }
        initializeSelect2();
    });
    initializeSelect2();
});
</script>
@endsection