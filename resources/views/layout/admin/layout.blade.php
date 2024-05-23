<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | IATL Veteran Jogja</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Admin - IATL UPN Veteran Jogja">
    <link rel="shortcut icon" href="{{ asset('image/logo-sm.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('image/logo-sm.png') }} " type="image/x-icon">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin') }}/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin') }}/assets/css/portal.css">
    @vite(['resources/sass/admin.scss'])
    @stack('css')
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

    <!-- Jquery-3.7.1 -->
    <script src="{{ asset('vendor') }}/jquery-3.7.1.min.js"></script>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    @stack('js')
</body>

</html>
