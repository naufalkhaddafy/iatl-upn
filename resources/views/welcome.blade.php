<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IATL UPN Veteran Jogja</title>
    <link rel="shortcut icon" href="{{ asset('image/logo-sm.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('image/logo-sm.png') }} " type="image/x-icon">
    @vite(['resources/sass/landing.scss', 'resources/js/app.js'])

</head>

<body>
    {{-- Navbar  --}}
    @include('layout.landing_page.navbar')
    {{-- Navbar end --}}
    <main class="container-fluid">
        {{-- Banner --}}
        <div class="px-4 text-center">
            <h2 class="coba">Ini Banner</h2>
        </div>
        {{-- Banner End --}}
        <div class="vh-100">
            <div class="d-flex justify-content-between">
                <h2 class="">News</h2>
                <button class="btn btn-success">Lihat Semua</button>
            </div>
            <div class="row ">
                <div class="col-lg-4 bg">Text</div>
                <div class="col-lg-4 bg">bb</div>
                <div class="col-lg-4 bg">asdasd</div>
            </div>
        </div>
    </main>
    {{-- Footer --}}
    @include('layout.landing_page.footer')
    {{-- Footer End --}}

</body>

</html>
