<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register | IATL UPN Veteran Jogja</title>
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
                            <h6 class="fw-light">Create Accoount Now.</h6>
                            <form class="pt-3">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        placeholder="Confirm Password">
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="#">Register</a>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    Do you have already an account? <a href="{{ route('user.login') }}"
                                        class="text-primary">Sign In</a>
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
