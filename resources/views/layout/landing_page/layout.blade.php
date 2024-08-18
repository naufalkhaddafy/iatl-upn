<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
    - primary meta tags
  -->
    <title>IATL UPN Veteran Jogja</title>
    <meta name="title" content="IATL UPNYK">
    <meta name="description" content=" Page official of IATL UPNYK">

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

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('landing_page/assets/css/style.css') }}">

    <!--
    - preload images
  -->
    <link rel="preload" as="image" href="{{ asset('landing_page') }}/assets/images/hero-bg.jpg">
    <link rel="preload" as="image" href="{{ asset('landing_page') }}/assets/images/hero-slide-1.jpg">
    <link rel="preload" as="image" href="{{ asset('landing_page') }}/assets/images/hero-slide-2.jpg">
    <link rel="preload" as="image" href="{{ asset('landing_page') }}/assets/images/hero-slide-3.jpg">

    @vite(['resources/sass/landing.scss'])

</head>

<body>

    <!--
      - #HEADER
    -->
    @include('layout.landing_page.navbar')
    <main>
        <article>

            <!--
          - #HERO
        -->

            <section class="section hero has-bg-image" aria-label="home"
                style="background-image: url('{{ asset('landing_page') }}/assets/images/hero-bg.jpg')">
                <div class="container">

                    <div class="hero-content">

                        <h1 class="h1 hero-title">Ikatan Alumni Teknik Lingkungan</h1>

                        <p class="hero-text">
                            IATL atau Ikatan Alumni Teknik Lingkungan adalah
                            sebuah wadah berkumpulnya para alumni Jurusan Teknik Lingkungan Universitas Veteran
                            Yogyakarta. Lahirnya Keluarga Alumni juga dilatar belakangi oleh adanya
                            dorongan kuat untuk saling membantu sesama alumni, serta rasa tanggung jawab para alumni
                            untuk ikut membina dan membangun almamaternya.
                        </p>

                        <div class="btn-wrapper">

                            <a href="#" class="btn btn-primary">Explore Now</a>

                            <a href="#" class="btn btn-outline">Contact Us</a>

                        </div>

                    </div>

                    <div class="hero-slider" data-slider>

                        <div class="slider-inner">
                            <ul class="slider-container" data-slider-container>

                                <li class="slider-item">

                                    <figure class="img-holder" style="--width: 575; --height: 550;">
                                        <img src="{{ asset('landing_page') }}/assets/images/hero-slide-1.jpg"
                                            width="575" height="550" alt="" class="img-cover">
                                    </figure>

                                </li>

                                <li class="slider-item">

                                    <div class="hero-card">
                                        <figure class="img-holder" style="--width: 575; --height: 550;">
                                            <img src="{{ asset('landing_page') }}/assets/images/hero-slide-2.jpg"
                                                width="575" height="550" alt="hero banner" class="img-cover">
                                        </figure>

                                        <button class="play-btn" aria-label="play landing_page intro">
                                            <ion-icon name="play" aria-hidden="true"></ion-icon>
                                        </button>
                                    </div>

                                </li>

                                <li class="slider-item">

                                    <figure class="img-holder" style="--width: 575; --height: 550;">
                                        <img src="{{ asset('landing_page') }}/assets/images/hero-slide-3.jpg"
                                            width="575" height="550" alt="" class="img-cover">
                                    </figure>

                                </li>

                            </ul>
                        </div>

                        <button class="slider-btn prev" aria-label="slide to previous" data-slider-prev>
                            <ion-icon name="arrow-back"></ion-icon>
                        </button>

                        <button class="slider-btn next" aria-label="slide to next" data-slider-next>
                            <ion-icon name="arrow-forward"></ion-icon>
                        </button>

                    </div>

                </div>
            </section>





            <!--
          - #SERVICE
        -->

            {{-- <section class="section service" aria-labelledby="service-label">
                <div class="container">

                    <p class="section-subtitle" id="service-label">What We Do?</p>

                    <h2 class="h2 section-title">
                        The service we offer is specifically designed to meet your needs.
                    </h2>

                    <ul class="grid-list">

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
                                </div>

                                <h3 class="h4 card-title">24/7 Support</h3>

                                <p class="card-text">
                                    Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                                    eget metus cras
                                    justo.
                                </p>

                                <a href="#" class="btn-text">
                                    <span class="span">Learn More</span>

                                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="shield-checkmark-outline" aria-hidden="true"></ion-icon>
                                </div>

                                <h3 class="h4 card-title">Secure Payments</h3>

                                <p class="card-text">
                                    Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                                    eget metus cras
                                    justo.
                                </p>

                                <a href="#" class="btn-text">
                                    <span class="span">Learn More</span>

                                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="cloud-download-outline" aria-hidden="true"></ion-icon>
                                </div>

                                <h3 class="h4 card-title">Daily Updates</h3>

                                <p class="card-text">
                                    Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                                    eget metus cras
                                    justo.
                                </p>

                                <a href="#" class="btn-text">
                                    <span class="span">Learn More</span>

                                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="pie-chart-outline" aria-hidden="true"></ion-icon>
                                </div>

                                <h3 class="h4 card-title">Market Research</h3>

                                <p class="card-text">
                                    Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                                    eget metus cras
                                    justo.
                                </p>

                                <a href="#" class="btn-text">
                                    <span class="span">Learn More</span>

                                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                    </ul>

                </div>
            </section> --}}





            <!--
          - #ABOUT
        -->

            {{-- <section class="about" aria-labelledby="about-label">
                <div class="container">

                    <figure class="about-banner">
                        <img src="{{ asset('landing_page') }}/assets/images/about-banner.png" width="800" height="580"
                            loading="lazy" alt="about banner" class="w-100">
                    </figure>

                    <div class="about-content">

                        <p class="section-subtitle" id="about-label">Why Choose Us?</p>

                        <h2 class="h2 section-title">
                            We bring solutions to make life easier for our clients.
                        </h2>

                        <ul>

                            <li class="about-item">
                                <div class="accordion-card expanded" data-accordion>

                                    <h3 class="card-title">
                                        <button class="accordion-btn" data-accordion-btn>
                                            <ion-icon name="chevron-down-outline" aria-hidden="true"
                                                class="down"></ion-icon>

                                            <spna class="span h5">Professional Design</spna>
                                        </button>
                                    </h3>

                                    <p class="accordion-content">
                                        Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                        fermentum massa justo
                                        sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent
                                        commodo cursus magna,
                                        vel.
                                    </p>

                                </div>
                            </li>

                            <li class="about-item">
                                <div class="accordion-card" data-accordion>

                                    <h3 class="card-title">
                                        <button class="accordion-btn" data-accordion-btn>
                                            <ion-icon name="chevron-down-outline" aria-hidden="true"
                                                class="down"></ion-icon>

                                            <spna class="span h5">Top-Notch Support</spna>
                                        </button>
                                    </h3>

                                    <p class="accordion-content">
                                        Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                        fermentum massa justo
                                        sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent
                                        commodo cursus magna,
                                        vel.
                                    </p>

                                </div>
                            </li>

                            <li class="about-item">
                                <div class="accordion-card" data-accordion>

                                    <h3 class="card-title">
                                        <button class="accordion-btn" data-accordion-btn>
                                            <ion-icon name="chevron-down-outline" aria-hidden="true"
                                                class="down"></ion-icon>

                                            <spna class="span h5">Exclusive Assets</spna>
                                        </button>
                                    </h3>

                                    <p class="accordion-content">
                                        Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                        fermentum massa justo
                                        sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent
                                        commodo cursus magna,
                                        vel.
                                    </p>

                                </div>
                            </li>

                        </ul>

                    </div>

                </div>
            </section> --}}





            <!--
          - #FEATURE
        -->

            {{-- <section class="section feature" aria-labelledby="feature-label">
                <div class="container">

                    <figure class="feature-banner">
                        <img src="{{ asset('landing_page') }}/assets/images/feature-banner.png" width="800" height="531"
                            loading="lazy" alt="feature banner" class="w-100">
                    </figure>

                    <div class="feature-content">

                        <p class="section-subtitle" id="feautre-label">Our Solutions</p>

                        <h2 class="h2 section-title">
                            We make your spending stress-free for you to have the perfect control.
                        </h2>

                        <p class="section-text">
                            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras
                            justo odio,
                            dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus.
                        </p>

                        <ul class="feature-list">

                            <li>
                                <div class="feature-card">

                                    <div class="card-icon">
                                        <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                                    </div>

                                    <span class="span">
                                        Aenean quam ornare. Curabitur blandit.
                                    </span>

                                </div>
                            </li>

                            <li>
                                <div class="feature-card">

                                    <div class="card-icon">
                                        <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                                    </div>

                                    <span class="span">
                                        Nullam quis risus eget urna mollis ornare.
                                    </span>

                                </div>
                            </li>

                            <li>
                                <div class="feature-card">

                                    <div class="card-icon">
                                        <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                                    </div>

                                    <span class="span">
                                        Etiam porta euismod malesuada mollis.
                                    </span>

                                </div>
                            </li>

                            <li>
                                <div class="feature-card">

                                    <div class="card-icon">
                                        <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                                    </div>

                                    <span class="span">
                                        Vivamus sagittis lacus vel augue rutrum.
                                    </span>

                                </div>
                            </li>

                        </ul>

                    </div>

                </div>
            </section> --}}





            <!--
          - #STATS
        -->

            {{-- <section class="stats" aria-label="our stats">
                <div class="container">

                    <ul class="stats-card has-bg-image"
                        style="background-image: url('{{ asset('landing_page') }}/assets/images/stats-bg.jpg')">

                        <li>
                            <p class="card-text">
                                <span class="h1">7518</span>

                                <spna class="span">Completed Projects</spna>
                            </p>
                        </li>

                        <li>
                            <p class="card-text">
                                <span class="h1">3472</span>

                                <spna class="span">Happy Customers</spna>
                            </p>
                        </li>

                        <li>
                            <p class="card-text">
                                <span class="h1">2184</span>

                                <spna class="span">Expert Employees</spna>
                            </p>
                        </li>

                        <li>
                            <p class="card-text">
                                <span class="h1">4523</span>

                                <spna class="span">Awards Won</spna>
                            </p>
                        </li>

                    </ul>

                </div>
            </section> --}}





            <!--
          - #PROJECT
        -->

            <section class="section project" aria-labelledby="project-label">
                <div class="container">

                    <p class="section-subtitle" id="project-label">Berita Terkini</p>

                    <h2 class="h2 section-title">
                        Check out some of our awesome projects with creative ideas and great design.
                    </h2>

                    <ul class="grid-list">
                        @foreach ($news as $value)
                            <li>

                                <div class="project-card">
                                    @if ($value->image)
                                        <figure class="card-banner img-holder" style="--width: 560; --height: 350;">
                                            <img src="{{ asset('storage/' . $value->image) }}" width="560"
                                                height="350" loading="lazy" alt="{{ $value->title }}"
                                                class="img-cover">
                                        </figure>
                                    @endif
                                    <div class="card-content">
                                        <h3 class="h3">
                                            <a href="{{ route('news.show', $value->id) }}"
                                                class="card-title">{{ $value->title }}</a>
                                        </h3>

                                        <p class="card-text">
                                            {{ $value->description }}
                                        </p>
                                        <ul class="card-meta-list">
                                            <li class="card-meta-item">
                                                <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                                                <time class="meta-text"
                                                    datetime="2022-04-14">{{ $value->created_at->diffForHumans() }}</time>
                                            </li>

                                            <li class="card-meta-item">
                                                <ion-icon name="document-text-outline" aria-hidden="true"></ion-icon>

                                                <span class="meta-text">Coding</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </section>





            <!--
          - #CTA
        -->

            <section class="cta" aria-label="call to action">
                <div class="container">

                    <h2 class="h2 section-title">
                        Join our community by using our services and grow your business.
                    </h2>

                    <a href="#" class="btn btn-primary">Try it For Free</a>

                </div>
            </section>

        </article>
    </main>

    <!--
      - #FOOTER
    -->
    @include('layout.landing_page.footer')
    <!--
      - custom js link
    -->
    <script src="{{ asset('landing_page') }}/assets/js/script.js"></script>

    <!--
      - ionicon
    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
