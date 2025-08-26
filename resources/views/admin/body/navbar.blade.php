        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                    class="fas fa-bars"></i></button>
            <div class="order-1 order-lg-0 me-4 me-lg-0">

            </div>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </div>
            <!-- Navbar-->
            <div class="navbar-nav d-grid gap-2 d-md-flex justify-content-md-end mx-3">
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary dropdown-toggle px-5" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        Edit Serviceable(s)
                    </button>
                    <form class="dropdown-menu p-2" action="{{ route('serv.edits') }}">
                        <div class="mb-3">
                            <label for="" class="form-label">Establishment</label>
                            <select name="estabEdit" id="" class="selectEdit">
                                <option value=""></option>
                                @foreach ($estabs as $estab)
                                <option value="{{ $estab->id }}">{{ $estab->estab_acronym }} | {{ $estab->estab_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">PPE Account</label>
                            <select name="ppeEdit" id="" class="selectEdit">
                                <option value=""></option>
                                @foreach ($ppes as $ppe)
                                <option value="{{ $ppe->id }}">{{ $ppe->ppe_code }} | {{ $ppe->ppe_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">RPCPPE/ICS</label>
                            <select name="typeEdit" id="" class="selectEdit">
                                <option value=""></option>
                                <option value="1">RPCPPE</option>
                                <option value="2">ICS</option>
                            </select>
                        </div>
                        <div class="button text-center">
                            <button type="submit" class="btn btn-primary px-5">Edit</button>
                        </div>
                    </form>
                </div>
                <a href="{{ route('serv.add') }}" class="btn btn-primary px-5">Add Serviceables</a>
                <button type="button" class="btn btn-success px-5" data-bs-target="#printSelect"
                    data-bs-toggle="modal">Print
                    <i class="fa-solid fa-print"></i></button>
            </div>
        </nav>
        @include('backend.print.print_select')