@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp
<div class="container-fluid">
    <button type="button" class="btn btn-primary btn-lg float-end" data-bs-toggle="modal" data-bs-target="#addUser">
        <i class="fas fa-plus"></i> Add User
    </button>
    <h1 class="mt-4">User Management</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Establishments Assigned</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center align-middle">{{ $i++ }}</td>
                        <td class="text-center align-middle">{{ $user->name }}</td>
                        <td class="text-center align-middle">{{ $user->email }}</td>
                        <td class="text-center align-middle">Role</td>
                        <td class="text-center align-middle">Establishments</td>
                        <td class="text-center align-middle">
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user-gear"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
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

<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true" data-bs->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserLabel">Add New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="userName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="userName" placeholder="Enter full name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="userEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="example@email.com">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" placeholder="Enter password">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="userConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="userConfirmPassword"
                            placeholder="Re-enter password">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="userRole" class="form-label">Role</label>
                    <select class="form-select" id="userRole">
                        <option value="" selected disabled>Select role</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Assign Establishments</label>
                    <select class="selectAssigned" id="" multiple>
                        <option value="PEO">PEO</option>
                        <option value="PDRMMO">PDRMMO</option>
                        <option value="PGO">PGO</option>
                        <option value="RMPH">RMPH</option>
                        <option value="BDH">BDH</option>
                        <option value="HRMO">HRMO</option>
                        <option value="PIO">PIO</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save User</button>
            </div>
        </div>
    </div>
</div>

@endsection