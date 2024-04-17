<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | IATL UPN Veteran Jogja</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dashboard-layout') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('dashboard-layout') }}/image/logo.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                            <div class="logo mb-2">
                                <img src="{{ asset('image') }}/logo.png" alt="logo"
                                    style="width:180px; height:50px;" />
                            </div>
                            <h6 class="fw-light">Sign in to continue.</h6>
                            <form method="post" action="{{ route('login') }}" class="pt-3">
                                @if (session('failed'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('failed') }}
                                    </div>
                                    <br>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    Don't have an account? <a href="{{ route('user.register') }}"
                                        class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('dashboard-layout') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('dashboard-layout') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('dashboard-layout') }}/js/off-canvas.js"></script>
    <script src="{{ asset('dashboard-layout') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('dashboard-layout') }}/js/template.js"></script>
    <script src="{{ asset('dashboard-layout') }}/js/settings.js"></script>
    <script src="{{ asset('dashboard-layout') }}/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
