<header class="header" data-header>
    <div class="container">
        <a href="{{ route('root') }}" class="logo">
            <img src="{{ asset('image') }}/logo-white.png" width="170" height="70" alt="Adex home" class="logo-light">
            <img src="{{ asset('image') }}/logo.png" width="170" height="70" alt="Adex home" class="logo-dark">
        </a>

        <nav class="navbar" data-navbar>
            <div class="navbar-top">
                <a href="#" class="logo">
                    <img src="{{ asset('image') }}/logo.png" width="74" height="24" alt="Adex home">
                </a>
                <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
            </div>
            <ul class="navbar-list">
                <li>
                    <a href="{{ route('root') }}" class="navbar-link">Beranda</a>
                </li>
                <li>
                    <a href="#" class="navbar-link dropdown {{ Request::routeIs('') ? 'active' : '' }}">
                        <div>Tentang Kami</div>
                        <i class="arrow"><x-bi-chevron-down /></i>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="">Profil</a></li>
                            <li><a href="">Visi & Misi</a></li>
                            <li><a href="">Struktur Kepengurusan</a></li>
                        </ul>
                    </div>
                </li>
                {{-- <li>
                    <a href="#" class="navbar-link">Projects</a>
                </li> --}}
                <li>
                    <a href="{{ route('landing.page.news') }}" class="navbar-link ">News</a>
                </li>
                <li>
                    <a href="#" class="navbar-link">Kontak</a>
                </li>
                {{-- <li>
                    <a href="#" class="navbar-link dropdown {{ Request::routeIs('') ? 'active' : '' }}">Kontak <i
                            class="arrow"><x-bi-chevron-down /></i> </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li>Profile</li>

                        </ul>
                    </div>
                </li> --}}
            </ul>

            <ul class="social-list">
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>
            </ul>
        </nav>

        <a href="{{ route('user.login') }}" class="btn btn-primary">Sign In</a>

        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
            <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
        </button>
        <div class="overlay" data-nav-toggler data-overlay></div>
    </div>
</header>
