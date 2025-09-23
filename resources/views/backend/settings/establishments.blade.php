@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-4">
            <form action="{{ route('estab.add') }}" id="estabFrom" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3>Add Establishment</h3>
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="">Acronym of Establishment:</label>
                                <input type="text" name="estab_acronym" id="estab_acronym" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">Establishment Code:</label>
                                <input type="text" name="estab_code" id="estab_code" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">Establishment Name:</label>
                            <input type="text" name="estab_name" id="estab_name" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Establishment In-Charge Name</label>
                            <input type="text" name="estab_incharge" id="estab_incharge" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Establishment In-Charge Position</label>
                            <input type="text" name="estab_position" id="estab_position" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Establishment Type</label>
                            <select name="estab_type" id="estab_type" class="form-control">
                                <option value="" selected disabled>Select option</option>
                                <option value="1">Office</option>
                                <option value="2">Hospital</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-5 float-end" data-bs-toggle="modal"
                            data-bs-target="#ofc_seq">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Establishments</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered" id="estabTable">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Establishment In-Charge</th>
                                <th class="text-center">Establishment</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($estabs as $estab)
                            <tr>
                                <td class="text-center align-middle">{{ $i++ }}</td>
                                <td>
                                    <p>Name: <b>{{ $estab->estab_incharge }}</b></p>
                                    <p>Position: <b>{{ $estab->estab_position }}</b></p>
                                </td>
                                <td class="text-center align-middle">
                                    <b>{{ $estab->estab_acronym }} | {{ $estab->estab_name }}</b>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" id="estabID" value="{{ $estab->id }}"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</button></li>
                                            <li><a class="dropdown-item" id="delete"
                                                    href="{{ route('estab.delete', $estab->id) }}"><i
                                                        class="fa-solid fa-trash-can"></i>
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
    $(document).on('click', '#estabID', function() {
        var estab_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/settings/establishments/edit/" + estab_id,
            success: function(res) {
                $("#estab_acronym").val(res.estab.estab_acronym);
                $("#estab_code").val(res.estab.estab_code);
                $("#estab_name").val(res.estab.estab_name);
                $("#estab_incharge").val(res.estab.estab_incharge);
                $("#estab_position").val(res.estab.estab_position);
                $("#estab_type").val(res.estab.estab_type);
                $("#id").val(estab_id);

                $("#estabFrom").attr("action", "{{ route('estab.update') }}");
            }
        })
    });
});
</script>
@endsection