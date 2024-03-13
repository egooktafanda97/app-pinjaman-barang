@push('header_asset')
    <link href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        .tree,
        .tree ul {
            margin: 0 0 0 1em;
            /* indentation */
            padding: 0;
            list-style: none;
            color: #369;
            position: relative;
        }

        .tree ul {
            margin-left: .5em
        }

        /* (indentation/2) */

        .tree:before,
        .tree ul:before {
            content: "";
            display: block;
            width: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            border-left: 1px solid;
        }

        .tree li {
            margin: 0;
            padding: 0 1.5em;
            /* indentation + .5em */
            line-height: 2em;
            /* default list item's `line-height` */
            font-weight: bold;
            position: relative;
        }

        .tree li:before {
            content: "";
            display: block;
            width: 10px;
            /* same with indentation */
            height: 0;
            border-top: 1px solid;
            margin-top: -1px;
            /* border top width */
            position: absolute;
            top: 1em;
            /* (line-height/2) */
            left: 0;
        }

        .tree li:last-child:before {
            background: white;
            /* same with body background */
            height: auto;
            top: 1em;
            /* (line-height/2) */
            bottom: 0;
        }
    </style>
@endpush
@push('footer_asset')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        new DataTable('#tables', {
            processing: false,
            serverSide: false,
            paging: false,
            filter: false
        });
    </script>
@endpush
