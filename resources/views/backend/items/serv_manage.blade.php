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
                                <label class="mb-0">{{ $itemData->unit }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Unit Value:</p>
                                <label class="mb-0">{{ number_format($itemData->serv_value,2) }}</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p>Total Value:</p>
                                <label
                                    class="mb-0">{{ number_format($itemData->serv_value * $itemData->serv_qty, 2) }}</label>
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
                        <textarea name="" id="" rows="27" class="form-control"
                            readonly>{!!  $itemData->serv_desc !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('serv.update') }}" method="post">
            <input type="hidden" name="id" value="{{ $itemData->id }}">
            <div class="row edit" style="display: none;">
                @csrf
                <div class="col-lg-4">
                    <div class="card shadow mb-4 mb-lg-0">
                        <div class="card-header">
                            <button type="button" class="btn btn-success btn-lg px-4 float-end" id="editBtn">
                                View Item
                            </button>
                            <h3>Item EDIT</h3>
                        </div>
                        <div class="card-body p-0">
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Establishment:</p>
                                    </div>
                                    <div class="col-6">
                                        <select name="serv_estab" id="" class="selecOpt">
                                            <option value=""></option>
                                            @foreach($estabs as $estab)
                                            <option value="{{ $estab->id }}"
                                                {{ $estab->id == $itemData->serv_estab ? 'selected' : '' }}>
                                                {{ $estab->estab_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">PPE Account:</p>
                                    </div>
                                    <div class="col-6">
                                        <select name="serv_ppe" id="" class="selecOpt">
                                            <option value=""></option>
                                            @foreach($ppes as $ppe)
                                            <option value="{{ $ppe->id }}"
                                                {{ $ppe->id == $itemData->serv_ppe ? 'selected' : '' }}>
                                                {{ $ppe->ppe_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Serviceable Type:</p>
                                    </div>
                                    <div class="col-6">
                                        <select name="serv_type" id="" class="selecOpt">
                                            <option value="" disabled>Select option</option>
                                            <option value="1" {{ $itemData->serv_type == 1 ? 'selected' : '' }}>RPCPPE
                                            </option>
                                            <option value="2" {{ $itemData->serv_type == 2 ? 'selected' : '' }}>ICS
                                            </option>
                                            <option value="3" {{ $itemData->serv_type == 3 ? 'selected' : '' }}>IIRUP
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Old Property:</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="serv_prop" value="{{ $itemData->serv_prop }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Accounting Title Code (Acctg):</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="serv_acctg" value="{{ $itemData->serv_acctg }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">PGSO Number/Code (PGSO):</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="serv_pgso" value="{{ $itemData->serv_pgso }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Date Acquired:</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="date" name="serv_date" value="{{ $itemData->serv_date }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Quantity Unit:</p>
                                    </div>
                                    <div class="col-6">
                                        <select name="serv_unit" id="" class="selecOpt">
                                            <option value=""></option>
                                            @foreach($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                {{ $unit->id == $itemData->serv_unit ? 'selected' : '' }}>
                                                {{ $unit->unit_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Quantity:</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="serv_qty" value="{{ $itemData->serv_qty }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Unit Value:</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="serv_value" value="{{ $itemData->serv_value }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mb-0">Remarks:</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="serv_remarks" value="{{ $itemData->serv_remarks }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success px-4 btn-lg float-end">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3>Item EDIT</h3>
                        </div>
                        <div class="card-body">
                            <textarea name="serv_desc" rows="32" class="form-control"
                                value="{{ $itemData->serv_desc }}">{!!  $itemData->serv_desc !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<script>
$(document).ready(function() {
    $(".selecOpt").select2({
        placeholder: "Select Option",
        width: "100%",
    });
    $(document).on('click', '#viewBtn', function() {
        $(".view").hide();
        $(".edit").show();
    });
    $(document).on('click', '#editBtn', function() {
        $(".view").show();
        $(".edit").hide();
    });
});
</script>
@endsection