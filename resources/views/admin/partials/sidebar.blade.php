{{-- <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0 text-white" href="{{ route('admin.dashboard') }}">
            <i class="ni ni-building me-2 text-white"></i>
            <span class="ms-1 font-weight-bold">{{ config('app.name') }}</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.properties') ? 'active bg-gradient-primary' : '' }}"
                    href="#property-list">
                    <i class="ni ni-building text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">Properties</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.site-content') ? 'active bg-gradient-primary' : '' }}"
                    href="#">
                    <i class="ni ni-single-copy-04 text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">Site Content</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ni ni-button-power text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside> --}}

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0 text-white" href="{{ route('admin.dashboard') }}">
            <i class="ni ni-building me-2 text-white"></i>
            <span class="ms-1 font-weight-bold">{{ config('app.name') }}</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.site-content') ? 'active bg-gradient-primary' : '' }}"
                    href="#">
                    <i class="ni ni-single-copy-04 text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">Site Content</span>
                </a>
            </li>
            <!-- Add Property -->
            <li class="nav-item">
                <a class="nav-link text-white" href="#property-form">
                    <i class="ni ni-fat-add text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">Add Property</span>
                </a>
            </li>

            <!-- Properties Link -->
            <li class="nav-item">
                <a class="nav-link text-white" href="#property-list">
                    <i class="ni ni-building text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">Properties</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ni ni-button-power text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>

<!-- Optional Smooth Scroll -->
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
