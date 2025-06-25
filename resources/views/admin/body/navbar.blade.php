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
                <a href="{{ route('serv.add') }}" class="btn btn-primary px-5">Add Serviceables</a>
                <button type="button" class="btn btn-success px-5" data-bs-target="#printSelect"
                    data-bs-toggle="modal">Print
                    <i class="fa-solid fa-print"></i></button>
            </div>
        </nav>
        @include('backend.print.print_select')