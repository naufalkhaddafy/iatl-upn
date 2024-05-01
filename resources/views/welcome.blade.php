<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IATL UPN Veteran Jogja</title>
    <link rel="shortcut icon" href="{{ asset('image/logo-sm.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('image/logo-sm.png') }} " type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/sass/landing.scss', 'resources/js/app.js'])

</head>

<body>

    <nav>
        <div class="d-flex justify-content-between p-4">
            <div class="p-4">
                <img src="{{ asset('image/logo.png') }}" alt="" style="width:200px; height: 50px;">
            </div>
            <div class="p-4">
                <ul class="d-flex justify-content-around">
                    <li>Home</li>
                    <li>About us</li>
                    <li>News</li>
                    <li>Contact us</li>
                </ul>
            </div>
            <div class="d-flex justify-content-between align-content-center">
                <button class="btn btn-success">Login</button>
                <button class="btn btn-success">Register</button>
            </div>
        </div>
    </nav>

</body>

</html>
