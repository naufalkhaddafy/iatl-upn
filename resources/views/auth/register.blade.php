<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | IATL UPNVYK </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Sign up for user IAT UPN Veteran Jogja">
    <link rel="shortcut icon" href="{{ asset('image/logo-sm.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('image/logo-sm.png') }} " type="image/x-icon">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin') }}/assets/plugins/fontawesome/js/all.min.js"></script>

    @vite(['resources/sass/admin.scss'])

</head>

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2" src="{{ asset('image/logo-sm.png') }}" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Daftar Alumni IATL UPNVYK</h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form" action="{{ route('register.alumni') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="email mb-3">
                                <label class="sr-only" for="name">Your Name</label>
                                <input id="name" name="name" type="text"
                                    class="form-control name @error('name') is-invalid @enderror"
                                    placeholder="Full name" required="required" value="{{ old('name') }}">
                                <x-forms.error type="danger" :messages="$errors->get('name')" />

                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="email">Your Email</label>
                                <input id="email" name="email" type="email"
                                    class="form-control email @error('email') is-invalid @enderror" placeholder="Email"
                                    required="required" value="{{ old('email') }}">
                                <x-forms.error type="danger" :messages="$errors->get('email')" />
                            </div>
                            <div class="nim mb-3">
                                <label class="sr-only" for="nim">NIM</label>
                                <input id="nim" name="nim" type="number"
                                    class="form-control nim  @error('nim') is-invalid @enderror" placeholder="NIM"
                                    required="required" value="{{ old('nim') }}">
                                <x-forms.error type="danger" :messages="$errors->get('nim')" />
                            </div>
                            <div class="phone_number mb-3">
                                <label class="sr-only" for="phone_number">NO. HP</label>
                                <input id="phone_number" name="phone_number" type="text"
                                    class="form-control phone_number  @error('phone_number') is-invalid @enderror"
                                    placeholder="No. HP" required="required" value="{{ old('phone_number') }}">
                                <x-forms.error type="danger" :messages="$errors->get('phone_number')" />

                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="password">Password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control password  @error('password') is-invalid @enderror"
                                    placeholder="Masukan password" required="required">

                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="confirm-password">Konfirmasi Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control confirm-password" placeholder="Konfirmasi password"
                                    required="required">
                                <x-forms.error type="danger" :messages="$errors->get('password')" />
                            </div>
                            {{-- <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="RememberPassword">
                                    <label class="form-check-label" for="RememberPassword">
                                        I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and
                                        <a href="#" class="app-link">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div><!--//extra--> --}}

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                    Up</button>
                            </div>
                        </form><!--//auth-form-->

                        <div class="auth-option text-center pt-5" style="margin-bottom:50px;">Already have an account?
                            <a class="text-link" href="{{ route('user.login') }}">Log in</a>
                        </div>
                    </div><!--//auth-form-container-->



                </div><!--//auth-body-->

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <small class="copyright">Copyright 2024 &copy; Ikatan Alumni Teknik Lingkungan UPNVYK </small>
                    </div>
                </footer><!--//app-auth-footer-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->

    </div><!--//row-->


    <script src="{{ asset('vendor') }}/jquery-3.7.1.min.js"></script>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


</body>

</html>
