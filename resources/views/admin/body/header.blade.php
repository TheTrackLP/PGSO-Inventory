<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PIMD | PGSO</title>
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
    .bold {
        font-weight: bold;
    }

    td,
    p {
        margin: 0;
        font-size: 15px;
    }
    </style>
</head>
@php
$offices = Illuminate\Support\Facades\DB::table('offices')->get();
$ppes = Illuminate\Support\Facades\DB::table('ppe_accounts')->get();
$id = Auth::user()->id;
$user_log = App\Models\User::findorfail($id);
@endphp

<body class="sb-nav-fixed">
    @include('admin.body.navbar')
    <div id="layoutSidenav">
        @include('admin.body.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('admin')
            </main>
            @include('admin.body.footer')
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/filter.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

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

function PrintRPCPPE() {
    const selectedOfc = document.querySelector('select[name="print_ofc"]').value;
    const selectedPPE = document.querySelector('select[name="print_ppe"]').value;
    if (!selectedOfc || !selectedPPE) {
        toastr.error("Error, Office and PPE Account Field is Empty");
        return;
    }
    const url = `{{ route('print.rpcppe') }}?print_ofc=${selectedOfc}&print_ppe=${selectedPPE}`;
    newPrintWindow(url);
}

function PrintTopRPCPPE() {
    const selectedOfc = document.querySelector('select[name="print_ofc"]').value;
    if (!selectedOfc) {
        toastr.error("Error, Office and PPE Account Field is Empty");
        return;
    }
    const url = `{{ route('print.toprpcppe') }}?print_ofc=${selectedOfc}`;
    newPrintWindow(url);
}

function PrintICS() {
    const selectedOfc = document.querySelector('select[name="print_ofc"]').value;
    const selectedPPE = document.querySelector('select[name="print_ppe"]').value;
    if (!selectedOfc || !selectedPPE) {
        toastr.error("Error, Office and PPE Account Field is Empty");
        return;
    }
    const url = `{{ route('print.ics') }}?print_ofc=${selectedOfc}&print_ppe=${selectedPPE}`;
    newPrintWindow(url);
}

function PrintTopICS() {
    const selectedOfc = document.querySelector('select[name="print_ofc"]').value;
    if (!selectedOfc) {
        toastr.error("Error, Office and PPE Account Field is Empty");
        return;
    }
    const url = `{{ route('print.topics') }}?print_ofc=${selectedOfc}`;
    newPrintWindow(url);
}

function PrintSummaryICS() {
    const selectedType = document.querySelector('select[name="print_type"]').value;
    const selectedEstab = document.querySelector('select[name="print_estab"]').value;
    if (!selectedType || !selectedEstab) {
        toastr.error("Error, RPCPPE or ICS? Offices or Hospitals?");
        return;
    }
    const url = `{{ route('print.icsconso') }}?print_type=${selectedType}&print_estab=${selectedEstab}`;
    newPrintWindow(url);
}

function PrintEach() {
    const selectedType = document.querySelector('select[name="print_type"]').value;
    const selectedPPE = document.querySelector('select[name="print_ppe2"]').value;
    if (!selectedType || !selectedPPE) {
        toastr.error("Error, RPCPPE or ICS or PPE Code Field is Empty");
        return;
    }
    const url = `{{ route('print.each') }}?print_type=${selectedType}&print_ppe2=${selectedPPE}`;
    newPrintWindow(url);
}

function newPrintWindow(url) {
    const printWindow = window.open(url, '_blank');
    printWindow.addEventListener('load', function() {
        printWindow.print();
    }, true);
}

$(document).ready(function() {
    $(".select_print").select2({
        width: "100%",
        placeholder: "Select an option",
        dropdownParent: $("#selectPrint"),
    });
});
</script>