<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'Sistem Informasi Perpustakaan' }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
    <link rel="stylesheet" href="/assets/vendor/fonts/materialdesignicons.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=Gabarito:wght@500;600;700;800&display=swap');

        * {
            font-family: 'Belanosima', sans-serif;
            font-family: 'Gabarito', cursive;
        }
    </style>

    @livewireStyles

</head>

<body>
    @include('layouts.payment_date')

    <x-guest.navbar></x-guest.navbar>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible mb-3" role="alert">
                <h4 class="alert-heading d-flex align-items-center"><i
                        class="mdi mdi-check-circle-outline mdi-24px me-2"></i>Well done :)</h4>
                <hr>
                <p class="mb-0">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                <h4 class="alert-heading d-flex align-items-center"><i
                        class="mdi mdi-close-circle mdi-24px me-2"></i>Opps :(</h4>

                <hr>
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session('warning'))
            <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                <h4 class="alert-heading d-flex align-items-center"><i
                        class="mdi mdi-close-circle mdi-24px me-2"></i>Opps :(</h4>
                <hr>
                <p class="mb-0">{{ session('warning') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
    </div>
    {{ $slot }}

    <div class="container-fluid">
        <footer class="text-center">
            <!-- Copyright -->
            <div class="text-center p-3">
                © 2020 Copyright:
                <a class=" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @livewireScripts
</body>

</html>
