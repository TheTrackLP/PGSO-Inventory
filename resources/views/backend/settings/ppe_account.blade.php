@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-4">
            <form>
                <div class="card">
                    <div class="card-header">
                        <h3>Add PPE Account</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="">PPE Code:</label>
                                <input type="text" name="ppe_code" id="ppe_code" class="form-control">
                            </div>
                            @error('ppe_code')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col">
                                <label for="">Life (In years):</label>
                                <input type="text" name="ppe_life" id="ppe_life" class="form-control">
                            </div>
                        </div>
                        @error('ppe_life')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="mb-4">
                            <label for="">PPE Name:</label>
                            <input type="text" name="ppe_name" id="ppe_name" class="form-control">
                        </div>
                        @error('ppe_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end" data-bs-toggle="modal"
                            data-bs-target="#ofc_seq">Add PPE Account</button>
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
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="office">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="card-title bold">PPE Name</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li class="">
                                            <strong>PPE Code:</strong>
                                            <span class="float-end text-primary fw-bold">Code</span>
                                        </li>
                                        <li class="">
                                            <strong>PPE Life</strong>
                                            <span class="float-end text-primary fw-bold">Life</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="button" class="btn btn-warning btn-sm px-4 col-xs-3">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm px-4 col-xs-3">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection