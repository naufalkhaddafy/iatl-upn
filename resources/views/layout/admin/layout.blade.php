<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin') }}/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin') }}/assets/css/portal.css">

</head>

<body class="app">
    <header class="app-header fixed-top">
        @include('layout.admin.navbar')<!--//app-header-inner-->
        @include('layout.admin.side')<!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            @yield('content')
        </div><!--//app-content-->

        {{-- footer --}}
        @include('layout.admin.footer')
        {{-- footer end --}}
    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('admin') }}/assets/plugins/popper.min.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('admin') }}/assets/js/app.js"></script>

</body>

</html>
