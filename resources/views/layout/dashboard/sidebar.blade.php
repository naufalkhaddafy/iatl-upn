<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['dashboard']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Web Settings</li>
        <li class="nav-item active">
            <a class="nav-link" data-bs-toggle="collapse" href="#web-settings" aria-expanded="false"
                aria-controls="web-settings">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Preferensi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse show" id="web-settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link active" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">User Settings</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-settings" aria-expanded="false"
                aria-controls="user-settings">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Preferensi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="user-settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
