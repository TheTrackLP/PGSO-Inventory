@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <h1 class="mt-4">Add Serviceable(s)</h1>
    <hr>
    <form action="{{ route('serv.update') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center my-3">
                    <div>
                        <button type="submit" class="btn btn-success btn-lg me-2">
                            <i class="fas fa-plus-circle"></i> Add Serviceables
                        </button>
                        <button type="button" id="addForm" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Add New Form
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body my-3">
                <div class="row">
                    <div class="col-3">
                        <label for="">Establishment</label>
                        <select name="inputs[1][serv_estab]" id="" class="selectOpt">
                            <option value=""></option>
                            @foreach($estabs as $estab)
                            <option value="{{ $estab->id }}">{{ $estab->estab_acronym }} | {{ $estab->estab_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">PPE Account</label>
                        <select name="inputs[1][serv_ppe]" id="" class="selectOpt">
                            <option value=""></option>
                            @foreach($ppes as $ppe)
                            <option value="{{ $ppe->id }}">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">RPCPPE/ICS</label>
                        <select name="inputs[1][serv_type]" id="" class="selectOpt">
                            <option value=""></option>
                            <option value="1">RPCPPE</option>
                            <option value="2">ICS</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label for="">Form #1</label>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Item Info</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="">Remarks:</label>
                                                <input type="text" name="inputs[1][serv_remarks]" id="serv_remarks"
                                                    class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Date Acquired:</label>
                                                <input type="date" name="inputs[1][serv_date]" id="serv_date"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Description</label>
                                                <textarea name="inputs[1][serv_desc]" class="form-control" id=""
                                                    cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h3>Accounting/Property Number</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Old Property No.:</label>
                                                <input type="text" name="inputs[1][serv_prop]" id="serv_remarks"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Accounting Title Code:</label>
                                                <input type="text" name="inputs[1][serv_acctg]" id="serv_remarks"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Unit Type/Quantity/Value</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Unit Type:</label>
                                                <select name="inputs[1][serv_unit]" id="serv_unit" class="form-control">
                                                    <option value="" disabled selected>Select option</option>
                                                    @foreach($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="">Quantity:</label>
                                                <input type="text" name="inputs[1][serv_qty]" id="serv_qty"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Unit Value</label>
                                                <input type="number" name="inputs[1][serv_value]" id="serv_value"
                                                    class="form-control">
                                            </div>
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
    $('#addForm').click(function() {
        ++i;
        $('#accordionExample').append(`
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${i}"
                        aria-expanded="true" aria-controls="collapse${i}">
                        <label for="">Form #${i}</label>
                    </button>
                </h2>
                <div id="collapse${i}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Item Info</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="">Remarks:</label>
                                                <input type="text" name="inputs[${i}][serv_remarks]" id="serv_remarks"
                                                    class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Date Acquired:</label>
                                                <input type="date" name="inputs[${i}][serv_date]" id="serv_date"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Description</label>
                                                <textarea name="inputs[${i}][serv_desc]" class="form-control" id="" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h3>Accounting/Property Number</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Old Property No.:</label>
                                                <input type="text" name="inputs[${i}][serv_prop]" id="serv_remarks"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Accounting Title Code:</label>
                                                <input type="text" name="inputs[${i}][serv_acctg]" id="serv_remarks"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Unit Type/Qty/Value</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Unit Type:</label>
                                                <input type="text" name="inputs[${i}][serv_unit]" id="serv_unit"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Quantity:</label>
                                                <input type="text" name="inputs[${i}][serv_qty]" id="serv_qty"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Unit Value</label>
                                                <input type="number" name="inputs[${i}][serv_value]" id="serv_value"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `)
    });

    $(".selectOpt").select2({
        width: "100%",
        placeholder: "Select option",
    })
});
</script>
@endsection