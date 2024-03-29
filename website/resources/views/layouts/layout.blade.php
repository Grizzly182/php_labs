<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>Products</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('website.home') }}">
                <img src="{{ asset('storage/logo.png') }}" style="width:200px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('website.home') }}">Home
                            <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>

            </div>
            @guest
                <div class="d-grid gap-2 d-md-block">
                    <a href="{{ route('login.show') }}" class="btn btn-outline-light" role="button" tabindex="-1">Log
                        In</a>
                    <a href="{{ route('register.show') }}" class="btn btn-warning" role="button" tabindex="-1">Sign
                        Up</a>
                </div>
            @else
                <div class="gap-5 mr-3 ">
                    <a href="{{ route('products.create') }}" class="btn btn-warning" role="button" tabindex="-1">New
                        Product</a>
                </div>
                <ul class="navbar-nav mb-2 mt-10 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('home.profile', auth()->user()) }}">My Accounts</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <!-- ADMIN PANEL -->
                            @if (auth()->user()->hasRole('Admin'))
                                <li><a class="dropdown-item" href="{{ route('users.editor') }}">Admin Panel</a></li>
                            @endif

                            <!-- EDITOR PANEL -->
                            @if (auth()->user()->hasRole('Editor') ||
                                    auth()->user()->hasRole('Admin'))
                                <li><a class="dropdown-item" href="{{ route('products.index') }}">Editor Panel</a></li>
                            @endif

                            <li><a class="dropdown-item" href="{{ route('logout.perform') }}">Logout</a></li>
                        </ul>
                        @auth
                            {{-- <img class="nav-link" href="#" width="64" height="64" id="userAvatar"
                                src="{{ asset(auth()->user()->avatar) }}"> --}}
                        @endauth
                    </li>
                </ul>
            @endguest
        </div>
    </nav>
    <!-- Navbar-->

    <div class="container">

        @yield('content')

    </div>

    <!-- Footer -->
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2023 Bleach 3D Mobile Accounts, Inc</p>

        <a href="{{ route('website.home') }}"
            class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <img src="{{ asset('storage/logo.png') }}" width="200">
            </svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="{{ route('website.home') }}" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
    </footer>
    <!-- Footer -->
</body>

</html>
