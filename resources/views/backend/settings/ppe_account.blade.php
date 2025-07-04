@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-4">
            <form action="{{ route('ppe.add') }}" id="ppeForm" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3>Add PPE Account</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <input type="hidden" name="id" id="id">
                            <div class="col">
                                <label for="">PPE Code:</label>
                                <input type="text" name="ppe_code" id="ppe_code" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Life (In years):</label>
                                <input type="text" name="ppe_life" id="ppe_life" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">PPE Name:</label>
                            <input type="text" name="ppe_name" id="ppe_name" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Property, Plant and Equipment Code/Names/Life Estimate</h3>
                </div>
                <form class="col-4 mx-2 my-2">
                    <input type="text" id="filter" placeholder="Search here..." class="form-control">
                </form>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="establishment">
                        @foreach($ppes as $ppe)
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="card-title bold">{{ $ppe->ppe_name }}</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li class="">
                                            <strong>PPE Code:</strong>
                                            <span class="float-end text-primary fw-bold">{{ $ppe->ppe_code }}</span>
                                        </li>
                                        <li class="">
                                            <strong>PPE Life</strong>
                                            <span class="float-end text-primary fw-bold">{{ $ppe->ppe_life }}
                                                Years</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="button" id="ppeEdit" value="{{ $ppe->id }}"
                                        class="btn btn-warning btn-sm px-4 col-xs-3">Edit</button>
                                    <a href="{{ route('ppe.delete', $ppe->id) }}" id="delete"
                                        class="btn btn-danger btn-sm px-4 col-xs-3">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#filter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#establishment > div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $(document).on('click', '#ppeEdit', function() {
        var ppe_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/settings/PPE-Accounts/edit/" + ppe_id,
            success: function(res) {
                $("#ppe_code").val(res.ppe.ppe_code);
                $("#ppe_life").val(res.ppe.ppe_life);
                $("#ppe_name").val(res.ppe.ppe_name);
                $("#id").val(ppe_id);
                $("#ppeForm").attr("action", "{{ route('ppe.update') }}");
            }
        });
    });
})
</script>
@endsection