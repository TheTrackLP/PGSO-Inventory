@extends('admin.body.header')
@section('admin')

<div class="container-fluid px-4">
    <h1 class="mt-4">Serviceable(s) - Report on the Count Property, Plant and Equipment (RPCPPE)</h1>
    <hr>
    <div class="card">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <label for="">Filter <i class="fa-solid fa-filter"></i></label>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Establishment</label>
                                <select name="estab" id="estab" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">PPE Account</label>
                                <select name="estab" id="estab" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-hovered table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Description</th>
                        <th class="text-center">Old Property</th>
                        <th class="text-center">Property (PGSO)</th>
                        <th class="text-center">Establishment</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Description</td>
                        <td>Old</td>
                        <td>PGSO</td>
                        <td>Establishment</td>
                        <td>Total</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i>
                                            View</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i>
                                            Edit</a></li>
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

@endsection