@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="{{ route('store.units') }}" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Add Unit Types</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="" class="bold">Unit Type Name:</label>
                            <input type="text" name="unit_name" id="" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end">Add Unit Type</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Property, Plant and Equipment Code/Names/Life Estimate</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-4 py-3 px-2 g-4">
                    @foreach($units as $unit)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $unit->unit_name }}(s)
                                    <div class="dropdown-center float-end">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
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

@endsection