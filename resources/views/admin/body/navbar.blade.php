<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">PIMD Division</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0 float-end" id="sidebarToggle" href="#!"><i
            class="fa-solid fa-arrow-left"></i></button>
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mx-3">
        <a href="{{route('add.service')}}" class="btn btn-primary px-5">Add Serviceables</a>
        <button type="button" class="btn btn-success px-5" data-bs-target="#selectPrint" data-bs-toggle="modal">Print
            <i class="fa-solid fa-print"></i></button>
    </div>

</nav>
@include('backend.print.print_select')