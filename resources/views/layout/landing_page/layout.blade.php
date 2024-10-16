<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
    - primary meta tags
  -->
    <title>@yield('title') IATL UPNVYK</title>
    <meta name="title" content="IATL UPNVYK">
    <meta name="description" content="Official Page of IATL UPNVYK">

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="{{ asset('image/logo-sm.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('image/logo-sm.png') }} " type="image/x-icon">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">

    @vite(['resources/sass/landing.scss', 'resources/js/app.js'])
    {{-- @vite(['resources/sass/app.scss']) --}}

    @stack('css')
</head>

<body>

    <!--
      - #HEADER
    -->
    @include('layout.landing_page.navbar')
    <main>
        <article>
            @yield('content-landing-page')

            <section class="cta" aria-label="call to action">
                <div class="container">

                    <h2 class="h2 section-title">
                        Daftarkan diri anda untuk pendataan Alumni Teknik Lingkungan UPNVYK
                    </h2>

                    <a href="{{ route('user.register') }}" class="btn btn-primary">Register Now</a>

                </div>
            </section>

        </article>
    </main>

    <!--
      - #FOOTER
    -->
    @include('layout.landing_page.footer')


    <!--
      - ionicon
    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    @stack('js')
</body>

</html>
