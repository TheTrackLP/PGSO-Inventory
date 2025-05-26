@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="{{ route('store.ppe') }}" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Add PPE Accounts</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="" class="bold">PPE Code</label>
                                <input type="text" name="ppe_code" id="" class="form-control">
                                @error('ppe_code')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="" class="bold">Life (In years)</label>
                                <input type="text" name="ppe_life" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="bold">PPE Name:</label>
                            <input type="text" name="ppe_name" id="" class="form-control">
                            @error('ppe_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-4 float-end">Add PPE</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Property, Plant and Equipment Code/Names/Life Estimate</h3>
                </div>
                <form class="col-4 mx-2 my-2">
                    <input type="text" id="filter" placeholder="Search here..." class="form-control">
                </form>
                <div class="row row-cols-1 row-cols-md-3 g-4" id="office">
                    @foreach($ppes as $ppe)
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header">
                                <h6 class="card-title bold">{{ $ppe->ppe_name }}</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="">
                                        <strong>PPE Code:</strong>
                                        <span class="float-end text-primary fw-bold">{{ $ppe->ppe_code }}</span>
                                    </li>
                                    <li class="">
                                        <strong>PPE Life</strong>
                                        <span class="float-end text-primary fw-bold">{{ $ppe->ppe_life }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <button type="button" class="btn btn-warning btn-sm px-4 col-xs-3">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm px-4 col-xs-3">Delete</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{ $ppes->links() }}
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#filter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#office > div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
@endsection