@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="{{ route('add.offices') }}" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Add Office/Hospital</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="office_acronym" class="bold">Acronym of Office:</label>
                                <input type="text" name="office_acronym" id="" class="form-control">
                                @error('office_acronym')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="bold">Office Code:</label>
                                <input type="text" name="office_code" id="" class="form-control">
                                @error('office_code')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Office/Hospital Name:</label>
                            <input type="text" name="office_name" id="" class="form-control">
                            @error('office_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Office/Hospital In-Charge Name:</label>
                            <input type="text" name="office_incharge" id="" class="form-control">
                            @error('office_incharge')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Office/Hospital In-Charge Position:</label>
                            <input type="text" name="office_position" id="" class="form-control">
                            @error('office_position')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Office/Hospital:</label>
                            <select name="office_type" id="" class="form-control">
                                <option value="" selected disable>Select Type:</option>
                                <option value="1">Office</option>
                                <option value="2">Hospital</option>
                            </select>
                            @error('office_type')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end" data-bs-toggle="modal"
                            data-bs-target="#ofc_seq">Add Office/Hospital</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <button type="button" class="btn btn-secondary float-end mx-3" data-bs-toggle="modal"
                        data-bs-target="#office_seq">
                        Change Sequence Offices
                    </button>
                    <button type="button" class="btn btn-secondary float-end" data-bs-toggle="modal"
                        data-bs-target="#hospital_seq">
                        Change Sequence Hospitals
                    </button>
                    <h3>Offices/Hospitals</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="example">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Office/Hospital In-Charge</th>
                                <th>Office</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($offices as $ofc)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    <p>In-Charge: <b>{{ $ofc->office_incharge }}</b></p>
                                    <p>Position: <b>{{ $ofc->office_position }}</b></p>
                                </td>
                                <td>
                                    <p>Acronym: <b>{{ $ofc->office_acronym }}</b></p>
                                    <p>Office/Hospital: <b>{{ $ofc->office_name }}</b></p>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown-center">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" value="{{ $ofc->id }}" id="Editofc"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</button></li>
                                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i>
                                                    Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();

    $(document).on('click', '#Editofc', function() {
        var ofc_id = $(this).val();
        $('#editOffice').modal('show');

        $.ajax({
            type: "GET",
            url: '/admin/settings/offices/edit/' + ofc_id,
            success: function(data) {
                $('#office_acronym').val(data.ofc.office_acronym);
                $('#office_code').val(data.ofc.office_code);
                $('#office_name').val(data.ofc.office_name);
                $('#office_incharge').val(data.ofc.office_incharge);
                $('#office_position').val(data.ofc.office_position);
                $('#office_type').val(data.ofc.office_type);
                $('#id').val(ofc_id);
            }
        });
    });

    $(".order_hos").on("keyup", function() {
        let values = {};
        let inputs = document.getElementsByClassName("order_hos");

        for (let i = 0; i < inputs.length; i++) {
            let value = inputs[i].value;
            values[value] = (values[value] || 0) + 1;
        }

        for (let i = 0; i < inputs.length; i++) {
            if (values[inputs[i].value] > 1) {
                inputs[i].style.backgroundColor = "#FF7F7F";
                $(':input[type="submit"]').prop('disabled', true);
            } else {
                inputs[i].style.backgroundColor = "";
                $(':input[type="submit"]').prop('disabled', false);
            }
        }
    });

    $(".order_ofc").on("keyup", function() {
        let values = {};
        let inputs = document.getElementsByClassName("order_ofc");

        for (let i = 0; i < inputs.length; i++) {
            let value = inputs[i].value;
            values[value] = (values[value] || 0) + 1;
        }

        for (let i = 0; i < inputs.length; i++) {
            if (values[inputs[i].value] > 1) {
                inputs[i].style.backgroundColor = "#FF7F7F";
                $(':input[type="submit"]').prop('disabled', true);
            } else {
                inputs[i].style.backgroundColor = "";
                $(':input[type="submit"]').prop('disabled', false);
            }
        }
    });

})
</script>
@include('backend.settings.office.edit_office')
@include('backend.settings.office.sequence_office')
@include('backend.settings.office.sequence_hospital')
@endsection