<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | IATL UPN Veteran Jogja</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Sign up for user IAT UPN Veteran Jogja">
    <link rel="shortcut icon" href="{{ asset('image/logo-sm.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('image/logo-sm.png') }} " type="image/x-icon">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin') }}/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin') }}/assets/css/portal.css">

</head>

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2" src="{{ asset('image/logo-sm.png') }}" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Name</label>
                                <input id="signup-name" name="signup-name" type="text"
                                    class="form-control signup-name" placeholder="Full name" required="required">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Email</label>
                                <input id="signup-email" name="signup-email" type="email"
                                    class="form-control signup-email" placeholder="Email" required="required">
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signup-password">Password</label>
                                <input id="signup-password" name="signup-password" type="password"
                                    class="form-control signup-password" placeholder="Create a password"
                                    required="required">
                            </div>
                            <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="RememberPassword">
                                    <label class="form-check-label" for="RememberPassword">
                                        I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and
                                        <a href="#" class="app-link">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div><!--//extra-->

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                    Up</button>
                            </div>
                        </form><!--//auth-form-->

                        <div class="auth-option text-center pt-5">Already have an account? <a class="text-link"
                                href="{{ route('user.login') }}">Log in</a></div>
                    </div><!--//auth-form-container-->



                </div><!--//auth-body-->

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <small class="copyright">Copyright 2024 &copy; Ikatan Alumni Teknik Lingkungan UPNYK </small>
                    </div>
                </footer><!--//app-auth-footer-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->

    </div><!--//row-->


</body>

</html>
