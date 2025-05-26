@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3">
            <form action="" method="post">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Add Office/Hospital</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="" class="bold">Name:</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Username:</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Email:</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Password:</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Re-enter Password:</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end">Add Account</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Offices/Hospitals</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="officeTable">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td>
                                    <p>Name</p>
                                </td>
                                <td>
                                    Username
                                </td>
                                <td>
                                    Email
                                </td>
                                <td class="text-center">
                                    <div class="dropdown-center">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
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