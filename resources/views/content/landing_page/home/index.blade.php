@extends('layout.landing_page.layout')
@section('content-landing-page')
    <!--
                          - #HERO
                        -->
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
                                <img src="{{ asset('landing_page') }}/assets/images/hero-slide-1.jpg" width="575"
                                    height="550" alt="" class="img-cover">
                            </figure>

                        </li>

                        <li class="slider-item">

                            <div class="hero-card">
                                <figure class="img-holder" style="--width: 575; --height: 550;">
                                    <img src="{{ asset('landing_page') }}/assets/images/hero-slide-2.jpg" width="575"
                                        height="550" alt="hero banner" class="img-cover">
                                </figure>
                                <button class="play-btn" aria-label="play landing_page intro">
                                    <ion-icon name="play" aria-hidden="true"></ion-icon>
                                </button>
                            </div>
                        </li>
                        <li class="slider-item">
                            <figure class="img-holder" style="--width: 575; --height: 550;">
                                <img src="{{ asset('landing_page') }}/assets/images/hero-slide-3.jpg" width="575"
                                    height="550" alt="" class="img-cover">
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

    <section class="section project" aria-labelledby="project-label">
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
                                    <a href="{{ route('news.show', $value->id) }}"
                                        class="card-title">{{ $value->title }}</a>
                                </h3>

                                <p class="card-text">
                                    {!! $value->description !!}
                                </p>
                                <ul class="card-meta-list">
                                    <li class="card-meta-item">
                                        <ion-icon name="document-text-outline" aria-hidden="true"></ion-icon>
                                        <span class="meta-text">{{ $value->user->name }}</span>
                                    </li>
                                    <li class="card-meta-item">
                                        <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>
                                        <time class="meta-text"
                                            datetime="">{{ $value->created_at->diffForHumans() }}</time>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </section>
@endsection
