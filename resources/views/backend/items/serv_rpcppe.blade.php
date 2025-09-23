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
                                <select name="selectEstab" id="selectEstab" class="selectEdit selectEstab">
                                    <option value=""></option>
                                    @foreach ($estabs as $estab)
                                    <option value="{{ $estab->estab_acronym }}">{{ $estab->estab_acronym }} |
                                        {{ $estab->estab_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">PPE Account</label>
                                <select name="selectPPE" id="selectPPE" class="selectEdit selectPPE">
                                    <option value=""></option>
                                    @foreach ($ppes as $ppe)
                                    <option value="{{ $ppe->ppe_name }}">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-hovered table-bordered" id="rpcppeTable">
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
                    @foreach($serv_rpcppe as $rpcppe)
                    <tr>
                        <td>
                            {{ explode("\n", $rpcppe->serv_desc)[0] }}
                        </td>
                        <td class="text-center">
                            {{ $rpcppe->serv_acctg }}
                        </td>
                        <td class="text-center">
                            {{ $rpcppe->serv_pgso }}
                        </td>
                        <td>
                            <p>Establishment: <b>{{ $rpcppe->estab }}</b></p>
                            <p>PPE Account: <b>{{ $rpcppe->ppe }}</b></p>
                        </td>
                        <td class="text-center">
                            {{ number_format($rpcppe->serv_value * $rpcppe->serv_qty, 2) }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('serv.edit', $rpcppe->id) }}" class="btn btn-secondary">View/Edit</a>
                                <!-- <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('serv.edit', $rpcppe->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i>
                                            View/Edit</a></li>
                                </ul> -->
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection