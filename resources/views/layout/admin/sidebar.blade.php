<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['dashboard']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{ in_array(Route::currentRouteName(), ['news.index']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('news.index') }}">
                <i class="mdi mdi-comment-text-outline menu-icon"></i>
                <span class="menu-title">News/Article</span>
            </a>
        </li>
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['']) ? 'active' : '' }}">
            <a class="nav-link" href="">
                <i class="mdi mdi-calendar-blank menu-icon"></i>
                <span class="menu-title">Agenda</span>
            </a>
        </li>
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['']) ? 'active' : '' }}">
            <a class="nav-link" href="">
                <i class="mdi mdi-disqus menu-icon"></i>
                <span class="menu-title">Forum</span>
                <div class="badge badge-opacity-success">DEV</div>
            </a>
        </li>
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['']) ? 'active' : '' }}">
            <a class="nav-link" href="">
                <i class="mdi mdi-play-box-outline menu-icon"></i>
                <span class="menu-title">Youtube</span>
                <div class="badge badge-opacity-success">DEV</div>
            </a>
        </li>
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['']) ? 'active' : '' }}">
            <a class="nav-link" href="">
                <i class="mdi mdi-database menu-icon"></i>
                <span class="menu-title">File Manager</span>
                <div class="badge badge-opacity-success">DEV</div>
            </a>
        </li>
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['']) ? 'active' : '' }}">
            <a class="nav-link" href="">
                <i class="mdi mdi-map-marker-multiple menu-icon"></i>
                <span class="menu-title">Sebaran</span>
                <div class="badge badge-opacity-success">DEV</div>
            </a>
        </li>
        <li class="nav-item nav-category">User Management</li>
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['user.index', '']) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-settings" aria-expanded="false"
                aria-controls="user-settings">
                <i class="menu-icon mdi mdi-account-box-outline"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ in_array(Route::currentRouteName(), ['user.index']) ? 'show' : '' }}"
                id="user-settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a
                            class="nav-link {{ in_array(Route::currentRouteName(), ['user.index']) ? 'active' : '' }}"
                            href="{{ route('user.index') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pengajuan Alumni</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Web Settings</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#web-settings" aria-expanded="false"
                aria-controls="web-settings">
                <i class="menu-icon mdi mdi-wrench"></i>
                <span class="menu-title">Web Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="web-settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Banner</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Tentang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Visi & Misi</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
