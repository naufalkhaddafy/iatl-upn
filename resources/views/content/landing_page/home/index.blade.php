@extends('layout.landing_page.layout')
@section('content-landing-page')
    <section class="section hero has-bg-image" aria-label="home"
        style="background-image: url('{{ asset('images') }}/landing-page/hero-bg.jpg')">
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
                                <img src="{{ asset('image') }}/logo-sm.png" width="575" height="550" alt=""
                                    class="img-cover">
                            </figure>

                        </li>

                        <li class="slider-item">

                            <div class="hero-card">
                                <figure class="img-holder" style="--width: 575; --height: 550;">
                                    <img src="{{ asset('image') }}/logo-white.png" width="575" height="550"
                                        alt="hero banner" class="img-cover">
                                </figure>
                                <button class="play-btn" aria-label="play landing_page intro">
                                    <ion-icon name="play" aria-hidden="true"></ion-icon>
                                </button>
                            </div>
                        </li>
                        <li class="slider-item">
                            <figure class="img-holder" style="--width: 575; --height: 550;">
                                <img src="{{ asset('image') }}/logo.png" width="575" height="550" alt=""
                                    class="img-cover">
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

    <section id="news" class="section service" aria-labelledby="project-label">
        <div class="container">

            <p class="section-subtitle" id="project-label">Berita Terkini</p>

            <h2 class="h2 section-title">
                Lihat beberapa blog yang menarik dari kami.
            </h2>

            <ul class="grid-list">
                @foreach ($news as $value)
                    <li>
                        <div class="project-card">
                            @if ($value->image)
                                <figure class="card-banner img-holder" style="--width: 560; --height: 350;">
                                    <img src="{{ asset('storage/' . $value->image) }}" width="560" height="350"
                                        loading="lazy" alt="{{ $value->title }}" class="img-cover">
                                </figure>
                            @endif

                            <div class="card-content">
                                <h3 class="h3">
                                    <div class="card-title">{{ $value->title }}</div>
                                </h3>
                                <ul class="card-meta-list">
                                    <li class="card-meta-item">
                                        <x-bi-person />
                                        <span class="meta-text">{{ $value->user->name }}</span>
                                    </li>
                                    <li class="card-meta-item">
                                        <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>
                                        <time class="meta-text"
                                            datetime="">{{ $value->created_at->diffForHumans() }}</time>
                                    </li>
                                </ul>

                                <p class="card-text responsive-content">
                                    {!! \Illuminate\Support\Str::limit($value->description, 100, '...') !!}
                                </p>

                                <a href="{{ route('landing.page.news.show', $value->slug) }}" class="btn-text">
                                    <span class="span">Baca Selengkapnya</span>

                                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                                </a>
                            </div>
                            </a>
                    </li>
                @endforeach
            </ul>

            <div class="button-action">
                <a class="btn btn-secondary" href="{{ route('landing.page.news') }}">Lihat Berita
                    Lainnya</a>
            </div>

        </div>
    </section>

    <section class="section project" aria-labelledby="service-label">
        <div class="container">

            <p class="section-subtitle" id="service-label">Agenda</p>

            <h2 class="h2 section-title">
                Ikuti agenda menarik dari kami
            </h2>

            {{-- <ul class="grid-list">

                <li>
                    <div class="service-card">

                        <div class="card-icon">
                            <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
                        </div>

                        <h3 class="h4 card-title">24/7 Support</h3>

                        <p class="card-text">
                            Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus cras
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
                            Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus cras
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
                            Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus cras
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
                            Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus cras
                            justo.
                        </p>

                        <a href="#" class="btn-text">
                            <span class="span">Learn More</span>

                            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                        </a>

                    </div>
                </li>

            </ul> --}}

        </div>
    </section>
@endsection
