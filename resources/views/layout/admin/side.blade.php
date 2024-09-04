<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{ asset('image/logo-sm.png') }}"
                    alt="logo"><span class="logo-text text-primary">IATL UPNVYK</span></a>
        </div><!--//app-branding-->
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ in_array(Route::currentRouteName(), ['dashboard']) ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ in_array(Route::currentRouteName(), ['news.index', 'news.create', 'news.edit']) ? 'active' : '' }}"
                        href="{{ route('news.index') }}">
                        <span class="nav-icon">
                            <i class="fa-regular fa-newspaper"></i>
                        </span>
                        <span class="nav-link-text">News/Article</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ in_array(Route::currentRouteName(), ['news']) ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <i class="fa-regular fa-calendar-check"></i>
                        </span>
                        <span class="nav-link-text">Agenda</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ in_array(Route::currentRouteName(), ['news']) ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <i class="fa-regular fa-comments "> </i>
                        </span>
                        <span class="nav-link-text">Forum</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ in_array(Route::currentRouteName(), ['news']) ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <i class="fab fa-youtube-square"> </i>
                        </span>
                        <span class="nav-link-text">Youtube</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ in_array(Route::currentRouteName(), ['news']) ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <i class="fa fa-file"> </i>
                        </span>
                        <span class="nav-link-text">File Manager</span>
                    </a><!--//nav-link-->
                </li>
                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ in_array(Route::currentRouteName(), ['news']) ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <i class="fa fa-map-markerc"> </i>
                        </span>
                        <span class="nav-link-text">Sebaran</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle {{ in_array(Route::currentRouteName(), ['user.index']) ? 'active' : '' }}"
                        href="#" data-bs-toggle="collapse" data-bs-target="#users"
                        aria-expanded="{{ in_array(Route::currentRouteName(), ['user.index']) ? 'true' : 'false' }}"
                        aria-controls="users">
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span><!--//submenu-arrow-->
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-vcard" viewBox="0 0 16 16">
                                <path
                                    d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Users Settings</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span><!--//submenu-arrow-->
                    </a><!--//nav-link-->
                    <div id="users"
                        class="collapse submenu users {{ in_array(Route::currentRouteName(), ['admin.index.alumni', 'admin.index.admin', 'user.create', 'user.edit']) ? 'show' : '' }}"
                        data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a
                                    class="submenu-link {{ in_array(Route::currentRouteName(), ['admin.index.alumni', 'user.create', 'user.edit']) ? 'active' : '' }}"
                                    href="{{ route('admin.index.alumni') }}">Alumni</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="settings.html">Pengajuan
                                    Alumni</a>
                            <li class="submenu-item"><a
                                    class="submenu-link {{ in_array(Route::currentRouteName(), ['admin.index.admin']) ? 'active' : '' }} "
                                    href="{{ route('admin.index.admin') }}">Admin</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav><!--//app-nav-->


        <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
                <ul class="app-menu footer-menu list-unstyled">
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="{{ route('web.settings') }}">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                    <path fill-rule="evenodd"
                                        d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Settings</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                </ul><!--//footer-menu-->
            </nav>
        </div><!--//app-sidepanel-footer-->

    </div><!--//sidepanel-inner-->
</div><!--//app-sidepanel-->
