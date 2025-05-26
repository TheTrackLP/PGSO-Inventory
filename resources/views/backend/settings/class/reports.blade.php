@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="{{ route('add.class') }}" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Add Class Report</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="" class="bold">Report Class Acronym:</label>
                            <input type="text" name="class_acronym" id="" class="form-control">
                            @error('class_acronym')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Report Class Name:</label>
                            <input type="text" name="class_name" id="" class="form-control">
                            @error('class_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">Description:</label>
                            <textarea name="class_desc" id="" rows="7" class="form-control"></textarea>
                            @error('class_desc')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end">Add Class</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Asset and Inventory Reports</h3>
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
                            @foreach($reports as $report)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    <p>Acronym: <b>{{ $report->class_acronym }}</b></p>
                                    <p>Name: <b>{{ $report->class_name }}</b></p>
                                </td>
                                <td>
                                    <p>{!! nl2br($report->class_desc) !!}</p>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown-center">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" id="Editofc"><i
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
</div>>
@endsection