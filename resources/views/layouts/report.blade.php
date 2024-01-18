{{-- <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011-04-25</td>
            <td>$320,800</td>
        </tr>
    </tbody>
</table> --}}

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.bootstrap5.min.css">

    <style>
        table.dataTable thead tr,
        table.dataTable thead th,
        table.dataTable tbody th,
        table.dataTable tbody td {
            text-align: center;
            white-space: nowrap;
        }

        /* mode dark */
        .pagination .page-item.disabled .page-link {
            color: #fff;
            /* Set disabled link text color to white */
            background-color: #323349;
            /* Set disabled link background color to match paginate background */
        }

        .pagination .page-item .page-link:hover {
            color: #fff;
            /* Set link text color to white on hover */
            background-color: #6c757d;
            /* Set link background color on hover */
            border-color: #6c757d;
            /* Set link border color on hover */
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/searchBuilder.bootstrap5.min.js"></script>
@endpush

@push('js')
    $('#example').DataTable({
    dom: 'QBfrtip',
    buttons: [
    'excel', {
    extend: 'print',
    orientation: 'landscape',
    title:'',
    pageSize: 'A4',
    messageTop:'<header> <div class="row"> <div id="img" class="col-md-3"> <img id="logo" src="/image/logo.png" width="140" height="160" /> </div> <div id="text-header" class="col-md-9"> <h3 class="kablogo"></h3> <h1 class="keclogo"><strong>SEKOLAH MENENGAH KEJURUAN <br> PERTANIAN PEMBANGUNAN NEGERI JAMBI</strong></h1> <h6 class="alamatlogo">JL. JAMBI- MUARA BULIAN KM 36 JEMBATAN MAS, Jembatan Mas, Kec. Pemayung, Kab. Batang Hari Prov. Jambi</h6> </div>     <hr class="garis1"/> </div> <style> h1,h3,h5,h6{ text-align:center; padding-right:200px; } .row{ margin-top: 20px; } .keclogo{ font-size:24px; font-size:3vw; } .kablogo{ font-size:2vw; } .alamatlogo{ font-size:1.5vw; } .kodeposlogo{ font-size:1.7vw; } #logo{ margin: auto; margin-left: 50%; margin-right: auto; } .garis1{ border-top:3px solid black; height: 2px; border-bottom:1px solid black; } </style> </header>',
    messageBottom: '<div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: 1fr; grid-column-gap: 0px; grid-row-gap: 0px; height: 400px; padding-top:50px;"> <div></div> <div style=" grid-area: / 3;"> <p style="text-align: center;">Jambi, {{ Carbon\carbon::now()->format('d F Y') }}</p> <p style="text-align: center">Yang bertanda tangan dibawah ini:</p> <p style="text-align: center;padding-top:100px;">{{ Auth::user()->name }}</p> </div> </div>',
    customize: function ( win ) {
    $(win.document.body).find( 'table' )
    .css( 'font-size', '8pt' );
    }
    }
    ]
    });
@endpush
