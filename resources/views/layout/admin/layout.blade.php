<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | IATL Veteran Jogja </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    @stack('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial navbar -->
        @include('layout.admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial sidebar -->
            @include('layout.admin.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial footer -->
                @include('layout.admin.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('dashboard-layout') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('dashboard-layout') }}/js/off-canvas.js"></script>
    <script src="{{ asset('dashboard-layout') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('dashboard-layout') }}/js/template.js"></script>
    <!-- endinject -->

    @stack('js')
</body>

</html>
