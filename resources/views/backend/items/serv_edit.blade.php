@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    @if ($typeEdit == 1)
    <h1 class="mt-4">Edit Serviceable(s) | RPCPPE</h1>
    @elseif($typeEdit == 2)
    <h1 class="mt-4">Edit Serviceable(s) | ICS</h1>
    @endif
    <hr>
    <form action="{{ route('serv.store') }}" method="POST">
        @csrf
        @foreach ($items_serv as $serv)
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse{{ $serv->id }}" aria-expanded="false"
                        aria-controls="flush-collapseOne">
                        <label for="">Property PGSO: {{ $serv->serv_pgso }}</label>
                    </button>
                </h2>
                <div id="flush-collapse{{ $serv->id }}" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
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
                                                    class="form-control" value="{{ $serv->serv_remarks }}">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Date Acquired:</label>
                                                <input type="date" name="inputs[1][serv_date]" id="serv_date"
                                                    class="form-control" value="{{ $serv->serv_date }}">
                                            </div>
                                            <div class="col">
                                                <label for="">Description</label>
                                                <textarea name="inputs[1][serv_desc]" class="form-control" id=""
                                                    cols="30" rows="10">{{ $serv->serv_desc }}</textarea>
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
                                                    class="form-control" value="{{ $serv->serv_prop }}">
                                            </div>
                                            <div class="col">
                                                <label for="">Property PGSO:</label>
                                                <input type="text" name="inputs[1][serv_acctg]" id="serv_remarks"
                                                    class="form-control" value="{{ $serv->serv_pgso }}">
                                            </div>
                                            <div class="col">
                                                <label for="">Accounting Title Code:</label>
                                                <input type="text" name="inputs[1][serv_acctg]" id="serv_remarks"
                                                    class="form-control" value="{{ $serv->serv_acctg }}">
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
                                                <input type="text" name="inputs[1][serv_unit]" id="serv_unit"
                                                    class="form-control" value="{{ $serv->serv_unit }}">
                                            </div>
                                            <div class="col">
                                                <label for="">Quantity:</label>
                                                <input type="number" name="inputs[1][serv_qty]" id="serv_qty"
                                                    class="form-control" value="{{ $serv->serv_qty }}">
                                            </div>
                                            <div class="col">
                                                <label for="">Unit Value</label>
                                                <input type="number" name="inputs[1][serv_value]" step="any"
                                                    id="serv_value" class="form-control"
                                                    value="{{ $serv->serv_value }}">
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
        @endforeach
    </form>
</div>
@endsection