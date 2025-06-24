@extends("admin.body.header")
@section('admin')

<div class="container-fluid">
    <section class="mt-4">
        <div class="row">
            <div class="col-lg-5">
                <div class="card shadow mb-4 mb-lg-0 view">
                    <div class="card-header">
                        <button type="submit" class="btn btn-success btn-lg px-4 float-end view">
                            Edit Item
                        </button>
                        <h3>Item Info</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Old Property:</p>
                                <label class="mb-0">{{ $itemData->serv_prop }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Accounting Title Code (Acctg):</p>
                                <label class="mb-0">{{ $itemData->serv_acctg }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>PGSO Number/Code (PGSO):</p>
                                <label class="mb-0">{{ $itemData->serv_pgso }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Date Acquired:</p>
                                <label class="mb-0">{{ date("M d, Y",strtotime($itemData->serv_date)) }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Quantity Unit:</p>
                                <label class="mb-0">{{ $itemData->serv_unit }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Quantity:</p>
                                <label class="mb-0">{{ $itemData->serv_unit }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Unit Value:</p>
                                <label class="mb-0">{{ number_format($itemData->serv_value,2) }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Total Value:</p>
                                <label class="mb-0">{{ number_format($itemData->serv_value,2) }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Remarks:</p>
                                <label class="mb-0">{{ $itemData->serv_remarks }}</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card shadow view">
                    <div class="card-header">
                        <h3>Item Description</h3>
                    </div>
                    <div class="card-body view">
                        <textarea name="" id="" rows="20" style="width: 100%">{!!  $itemData->serv_desc !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card shadow mb-4 mb-lg-0 edit" style="display: none;">
                    <div class="card-header">
                        <button type="submit" class="btn btn-success btn-lg px-4 float-end edit">
                            View Item
                        </button>
                        <h3>Item EDIT</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Old Property:</p>
                                <input type="text" name="" value="{{ $itemData->serv_prop }}" class="form-control">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Accounting Title Code (Acctg):</p>
                                <label class="mb-0">{{ $itemData->serv_acctg }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>PGSO Number/Code (PGSO):</p>
                                <label class="mb-0">{{ $itemData->serv_pgso }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Date Acquired:</p>
                                <label class="mb-0">{{ date("M d, Y",strtotime($itemData->serv_date)) }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Quantity Unit:</p>
                                <label class="mb-0">{{ $itemData->serv_unit }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Quantity:</p>
                                <label class="mb-0">{{ $itemData->serv_unit }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Unit Value:</p>
                                <label class="mb-0">{{ number_format($itemData->serv_value,2) }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Total Value:</p>
                                <label class="mb-0">{{ number_format($itemData->serv_value,2) }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Remarks:</p>
                                <label class="mb-0">{{ $itemData->serv_remarks }}</label>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer edit">
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <div>
                                <button type="button" class="btn btn-success px-4 btn-lg">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card shadow edit" style="display: none;">
                    <div class="card-header">
                        <h3>Item EDIT</h3>
                    </div>
                    <div class="card-body">
                        <textarea name="" id="" rows="23" style="width: 100%">{!!  $itemData->serv_desc !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $(".view").click(function() {
        $(".view").hide();
        $(".edit").show();
    });
    $(".edit").click(function() {
        $(".edit").hide();
        $(".view").show();
    });
});
</script>
@endsection