<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<style>
label {
    font-weight: bold;
}

td,
p {
    margin: 0;
}
</style>
@php
$estabs = App\Models\Establishment::all();
$ppes = App\Models\ppe_account::all();
@endphp

<body class="sb-nav-fixed">
    @include('admin.body.navbar')
    <div id="layoutSidenav">
        @include('admin.body.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('admin')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
</body>

</html>
<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch (type) {
    case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

    case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

    case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

    case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
}
@endif

function printRPCPPE() {
    const selectedEstab = document.querySelector("select[name='print_estab']").value;
    const selectedPPE = document.querySelector("select[name='print_ppe']").value;

    if (!selectedEstab || !selectedPPE) {
        toastr.error("Error, Establishment and PPE Account Field is empty");
        return;
    }
    const url = `{{ route('print.rpccpe') }}?print_estab=${selectedEstab}&print_ppe=${selectedPPE}`;
    printNewWindow(url);
}

function printTopRPCPPE() {
    const selectedEstab = document.querySelector("select[name='print_estab']").value;
    if (!selectedEstab) {
        toastr.error("Error, Establishment Field is empty");
        return;
    }
    const url = `{{ route('print.toprpcppe') }}?print_estab=${selectedEstab}`;
    printNewWindow(url);
}

function printICS() {
    const selectedEstab = document.querySelector("select[name='print_estab']").value;
    const selectedPPE = document.querySelector("select[name='print_ppe']").value;

    if (!selectedEstab || !selectedPPE) {
        toastr.error("Error, Establishment and PPE Account Field is empty");
        return;
    }
    const url = `{{ route('print.ics') }}?print_estab=${selectedEstab}&print_ppe=${selectedPPE}`;
    printNewWindow(url);
}

function printTopICS() {
    const selectedEstab = document.querySelector("select[name='print_estab']").value;
    if (!selectedEstab) {
        toastr.error("Error, Establishment Field is empty");
        return;
    }
    const url = `{{ route('print.topics') }}?print_estab=${selectedEstab}`;
    printNewWindow(url);
}

function printICS() {
    const selectedEstab = document.querySelector("select[name='print_estab']").value;
    const selectedPPE = document.querySelector("select[name='print_ppe']").value;

    if (!selectedEstab || !selectedPPE) {
        toastr.error("Error, Establishment and PPE Account Field is empty");
        return;
    }
    const url = `{{ route('print.ics') }}?print_estab=${selectedEstab}&print_ppe=${selectedPPE}`;
    printNewWindow(url);
}

function printEachCode() {
    const selectedPPE = document.querySelector("select[name='print_ppe']").value;
    const selectedType = document.querySelector("select[name='print_type']").value;

    if (!selectedPPE || !selectedType) {
        toastr.error("Error, PPE Account and Type Field is empty");
        return;
    }
    const url = `{{ route('print.eachcode') }}?print_ppe=${selectedPPE}&print_type=${selectedType}`;
    printNewWindow(url);
}


function printNewWindow(url) {
    const printWindow = window.open(url, '_blank');
    printWindow.addEventListener('load', function() {
        printWindow.print();
    }, true);
}

$(function() {
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })


    });

});

$(".selectPrint").select2({
    placeholder: "Select option",
    width: "100%",
    dropdownParent: $("#printSelect")
})
</script>