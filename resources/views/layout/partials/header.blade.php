<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary shadow-sm py-3" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1;">
    <div class="container-fluid">
        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links and content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active d-flex align-items-center" aria-current="page" href="{{route('frontend.home.index')}}">
                        <img src="{{ asset('assets/img/Salomon_logo.svg') }}" alt="" style="width: 40px; height: auto;">
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" aria-disabled="true">Disabled</a>
                </li>
            </ul>

            <!-- Search form -->
            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>



            <!-- Authenticated user info or login option -->
            <div class="d-flex align-items-center">
                @auth
                    <span class="d-flex align-items-center">
                        <h5 class="mb-0 me-3 text-primary">{{ auth()->user()->kh_ten }}</h5>
                        <form action="{{ route('auth.login.logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Đăng xuất</button>
                        </form>
                    </span>
                @endauth
                @guest
                    <a href="{{ route('auth.login.index') }}" class="btn btn-outline-success">Đăng nhập</a>
                @endguest
            </div>&nbsp;&nbsp;&nbsp;
            <!-- Cart button -->
            <a href="{{ route('frontend.giohang.index') }}" class="btn btn-outline-secondary me-3 d-flex align-items-center">
                Cart
            </a>
        </div>
    </div>
</nav>
