@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-4">
            <form>
                <div class="card">
                    <div class="card-header">
                        <h3>Add Establishment</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="">Acronym of Establishment:</label>
                                <input type="text" name="estab_acronym" id="estab_acronym" class="form-control">
                            </div>
                            @error('estab_acronym')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col">
                                <label for="">Establishment Code:</label>
                                <input type="text" name="estab_code" id="estab_code" class="form-control">
                            </div>
                        </div>
                        @error('estab_code')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="mb-4">
                            <label for="">Establishment Name:</label>
                            <input type="text" name="estab_name" id="estab_code" class="form-control">
                        </div>
                        @error('estab_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="mb-4">
                            <label for="">Establishment In-Charge Name</label>
                            <input type="text" name="estab_incharge" id="estab_code" class="form-control">
                        </div>
                        @error('estab_incharge')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="mb-4">
                            <label for="">Establishment In-Charge Position</label>
                            <input type="text" name="estab_position" id="estab_code" class="form-control">
                        </div>
                        @error('estab_position')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="mb-4">
                            <label for="">Establishment Type</label>
                            <select name="estab_type" id="estab_type" class="form-control">
                                <option value="" selected disabled>Select option</option>
                                <option value="1">Office</option>
                                <option value="2">Hospital</option>
                            </select>
                        </div>
                        @error('estab_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end" data-bs-toggle="modal"
                            data-bs-target="#ofc_seq">Add Establishment</button>
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
                    <table class="table table-hovered table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Establishment In-Charge</th>
                                <th class="text-center">Establishment</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i>
                                                    Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection