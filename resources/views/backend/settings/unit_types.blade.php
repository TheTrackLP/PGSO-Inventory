@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="{{ route('unit.add') }}" id="unitForm" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Add Unit Types</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <input type="hidden" name="id" id="id">
                            <label for="">Unit Type Name:</label>
                            <input type="text" name="unit_name" id="unit_name" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Unit Type Lists</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-4 py-3 px-2 g-4">
                    @foreach($types as $type)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $type->unit_name }}(s)
                                    <div class="dropdown-center float-end">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" id="unitEdit" value="{{ $type->id }}"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</button></li>
                                            <li><a class="dropdown-item" id="delete"
                                                    href="{{ route('unit.delete', $type->id) }}"><i
                                                        class="fa-solid fa-trash-can"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '#unitEdit', function() {
        var unit_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/settings/Unit Types/edit/" + unit_id,
            success: function(res) {
                $("#unit_name").val(res.type.unit_name);
                $("#id").val(unit_id);
                $("#unitForm").attr('action', "{{ route('unit.update') }}")
            }
        })
    });
});
</script>
@endsection