<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | IATL UPNVYK</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Error IAT UPN Veteran Jogja">

    <link rel="shortcut icon" href="{{ asset('image/logo-sm.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('image/logo-sm.png') }} " type="image/x-icon">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin') }}/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin') }}/assets/css/portal.css">

</head>

<body class="app app-404-page">

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
                <div class="app-branding text-center mb-5">
                    <a class="app-logo" href="/"><img class="logo-icon me-2"
                            src="{{ asset('image/logo-sm.png') }}" alt="logo"></a>

                </div><!--//app-branding-->
                <div class="app-card p-5 text-center shadow-sm">
                    <h1 class="page-title mb-4">@yield('code')<br><span
                            class="font-weight-light">@yield('message')</span></h1>
                    <div class="mb-4">
                        Sorry, we can't find the page you're looking for.
                    </div>
                    <a class="btn app-btn-primary" href="/">Go to home page</a>
                </div>
            </div><!--//col-->
        </div><!--//row-->
    </div><!--//container-->


    <footer class="app-footer">
        <div class="container text-center py-3">
            <small class="copyright">Copyright 2024&copy; Ikatan Alumni Teknik Lingkungan UPNYK </small>
        </div>
    </footer>
</body>

</html>
