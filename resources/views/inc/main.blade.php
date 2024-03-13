<!DOCTYPE html>

<html class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" data-assets-path="{{ url('assets/') }}/"
    data-template="vertical-menu-template-no-customizer" data-theme="theme-default" dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        name="viewport" />
    <title>{{ $title ?? '-' }} - {{ config('app.name') }}</title>
    <meta content="{{ $desk ?? '-' }}" name="description" />
    <meta content="{{ config('app.author') }}" name="author" />
    <link href="{{ url(config('app.favicon')) }}" rel="icon" type="image/x-icon" />
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <meta content="{{ auth()->user()->token ?? null }}" name="api-token">
    <meta content="{{ url('/') }}" name="url">

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" rel="stylesheet" />

    <link class="template-customizer-core-css" href="{{ asset('assets/vendor/css/rtl/core.css') }}" rel="stylesheet" />
    <link class="template-customizer-theme-css" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script>
        const header_token = {
            headers: {
                "Authorization": `Bearer {{ auth()->user()->token ?? null }}`
            }
        }
    </script>
    {{--    @yield('header_asset') --}}
    @stack('header_asset')
    @stack('styles')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">


            @include('inc.sidebar')

            <div class="layout-page">

                @include('inc.header')

                <div class="content-wrapper">

                    @yield('content')
                    @include('inc.footer')

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <div class="drag-target"></div>
    </div>


    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    {{-- <script src="{{ asset("assets/vendor/libs/i18n/i18n.js") }}"></script> --}}
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>


    {{--    @yield('footer_asset') --}}
    @stack('footer_asset')
    @stack('script')
    <script>
        $(document).ready(function() {
            var baseUrl = 'http://127.0.0.1:8000';
            var currentPath = window.location.href;
            $('aside.layout-menu ul.menu-inner li.menu-item a').each(function() {
                var menuItemUrl = $(this).attr('href');
                if (currentPath.indexOf(menuItemUrl) === 0 && currentPath.startsWith(baseUrl)) {
                    $(this).closest('li.menu-item').addClass('active');
                    $(this).closest('li.menu-item').parents('li.menu-item').addClass('open');
                }

            });
        });
    </script>
</body>

</html>
