@php
$id_h = 1;
$x = 1;
@endphp
<style>
.input-group-text {
    white-space: nowrap;
    background-color: #f8f9fa;
    font-weight: bold;
}
</style>
<div class="modal fade" id="hospital_seq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('seq.hospital') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-sort me-2"></i> Change Hospitals Sequence
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5 class="text-center p-3 mb-2 bg-dark text-white bold">HOSPITALS</h5>
                        @foreach($offices as $ofc)
                        @if($ofc->office_type == 2)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="input-group">
                                <input type="hidden" name="inputs[{{ $id_h++ }}][id]" value="{{ $ofc->id }}">
                                <input type="number" name="inputs[{{ $x++ }}][office_sequence]"
                                    value="{{ $ofc->office_sequence }}" class="form-control order_hos"
                                    placeholder="Order" min="1">
                                <span class="input-group-text"
                                    title="{{ $ofc->office_name }}">{{ $ofc->office_acronym }}</span>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>