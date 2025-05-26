@extends('admin.body.header')
@section('admin')

<style>

</style>
<div class="container-fluid">
    <form action="{{ route('serv.update') }}" method="post">
        @csrf
        <div class="card shadow mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center float-end">
                    <div>
                        <button type="submit" class="btn btn-success btn-lg px-5 me-2">
                            <i class="fas fa-plus-circle"></i> Save Changes
                        </button>
                    </div>
                </div>
                <h3 class="mb-3">Edit Serviceables</h3>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                    <div class="col">
                        <label for="serv_ofc" class="bold">Office/Hospital</label>
                        <select name="serv_ofc" id="serv_ofc" class="form-select select2">
                            <option value="">Select an option</option>
                            @foreach($offices as $ofc)
                            <option value="{{ $ofc->id }}" {{ $serv_item->serv_ofc == $ofc->id ? 'selected' : '' }}>
                                {{ $ofc->office_acronym }} | {{ $ofc->office_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="serv_ppe" class="bold">PPE Account</label>
                        <select name="serv_ppe" id="serv_ppe" class="form-select select2">
                            <option value="">Select an option</option>
                            @foreach($ppes as $ppe)
                            <option value="{{ $ppe->id }}" {{ $serv_item->serv_ppe == $ppe->id ? 'selected' : ''}}>
                                {{ $ppe->ppe_code}} | {{ $ppe->ppe_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="serv_status" class="bold">Status</label>
                        <select name="serv_status" id="serv_status" class="form-select select2">
                            <option value="">Select an option</option>
                            <option value="1" {{ $serv_item->serv_status == '1' ? 'selected' : ''}}>Serviceable
                            </option>
                            <option value="0" {{ $serv_item->serv_status == '0' ? 'selected' : ''}}>Unserviceable
                            </option>
                        </select>
                        <input type="hidden" name="id" value="{{ $serv_item->id }}">
                        <input type="hidden" name="serv_type" value="{{ $serv_item->serv_type }}">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Item Info</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="" class="bold">Article</label>
                                <input type="text" name="serv_article" value="{{ $serv_item->serv_article }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-7">
                                <label for="" class="bold">Remarks</label>
                                <input type="text" name="serv_remarks" value="{{ $serv_item->remarks }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="bold">Description</label>
                            <textarea name="serv_desc" class="summernote">{!! $serv_item->serv_desc !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Accounting/Property Number</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="bold">Old Property No.</label>
                                <input type="text" name="serv_prop" value="{{ $serv_item->serv_prop }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="bold">Accounting Title Code:</label>
                                <input type="text" name="serv_acctg" value="{{ $serv_item->serv_acctg }}"
                                    class="form-control">
                                <small>Note: Leave blank if no Acct. code</small>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="bold">Date Acquired</label>
                                <input type="date" name="serv_date" value="{{ $serv_item->serv_date }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="bold">Property (PGSO):</label>
                                <input type="text" min="1970" name="serv_pgso" value="{{ $serv_item->serv_pgso }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 shadow">
                    <div class="card-header">
                        <h4>Unit Type/Qty/Value</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="bold">Unit Type</label>
                                <select name="serv_unit" class="form-select select2">
                                    <option value=""></option>
                                    @foreach($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ $serv_item->serv_unit == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->unit_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="bold">QTY</label>
                                <input type="number" name="serv_qty" value="{{ $serv_item->serv_qty }}"
                                    class="form-control">

                            </div>
                            <div class="col-md-5">
                                <label for="" class="bold">Unit Value</label>
                                <input type="number" name="serv_value" value="{{ $serv_item->serv_value }}" step="any"
                                    class="form-control">
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
    initializeSelect2();
});
</script>
@endsection