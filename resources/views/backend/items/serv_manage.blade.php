@extends("admin.body.header")
@section('admin')

<div class="container-fluid">
    <section class="mt-4">
        <div class="row view">
            <div class="col-lg-4">
                <div class="card shadow mb-4 mb-lg-0">
                    <div class="card-header">
                        <button type="submit" class="btn btn-success btn-lg px-4 float-end" id="viewBtn">
                            Edit Item
                        </button>
                        <h3>Item Info</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Establishment:</p>
                                <label class="mb-0">{{ $itemData->estab }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>PPE Account:</p>
                                <label class="mb-0">{{ $itemData->ppe }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>RPCPPE/ICS:</p>
                                @if($itemData->serv_type == 1)
                                <label class="mb-0">RPCPPE</label>
                                @elseif($itemData->serv_type == 2)
                                <label class="mb-0">ICS</label>
                                @endif
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
                                <label class="mb-0">{{ $itemData->unit }}</label>
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
            <div class="col-lg-8">
                <div class="card shadow view">
                    <div class="card-header">
                        <h3>Item Description</h3>
                    </div>
                    <div class="card-body">
                        <textarea name="" id="" rows="20" class="form-control">{!!  $itemData->serv_desc !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row edit" style="display: none;">
            <div class="col-lg-4">
                <div class="card shadow mb-4 mb-lg-0">
                    <div class="card-header">
                        <button type="submit" class="btn btn-success btn-lg px-4 float-end" id="editBtn">
                            View Item
                        </button>
                        <h3>Item EDIT</h3>
                    </div>
                    <div class="card-body p-0">
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Establishment:</label>
                                </div>
                                <div class="col-6">
                                    <select name="" id="" class="selecOpt">
                                        <option value=""></option>
                                        @foreach($estabs as $estab)
                                        <option value="{{ $estab->id }}" {{ $estab->id === $estab->id ? $estab->id : '' }}>{{ $estab->estab_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">PPE Account:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->ppe }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Serviceable Type:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->serv_type }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Old Property:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->serv_prop }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Accounting Title Code (Acctg):</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->serv_acctg }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">PGSO Number/Code (PGSO):</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->serv_pgso }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Date Acquired:</label>
                                </div>
                                <div class="col-6">
                                    <input type="date" name="" value="{{ $itemData->serv_date }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Quantity Unit:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->unit }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Quantity:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->serv_qty }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Unit Value:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->serv_value }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <label class="mb-0">Remarks:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" value="{{ $itemData->serv_remarks }}" class="form-control">
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="card-footer">
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
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Item EDIT</h3>
                    </div>
                    <div class="card-body">
                        <textarea name="" id="" rows="23" class="form-control">{!!  $itemData->serv_desc !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $(".selecOpt").select2({
        placeholder: "Select Option",
        width: "100%",
    });
    $(document).on('click', '#viewBtn', function(){
        $(".view").hide();
        $(".edit").show();
    });
    $(document).on('click', '#editBtn', function(){
        $(".view").show();
        $(".edit").hide();
    });
});
</script>
@endsection