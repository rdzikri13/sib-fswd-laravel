<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') | Dzikri Store{{ config('R Store') }}</title>
    <link rel="icon" type="x-icon" href="{{ asset('download.png') }}">
    @yield('style')
    <link rel="icon" type="image/x-icon" href="assets/download.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/master.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top shadow" id="mainNav">
        <div class="container px-4">
            <img id="img-nav" src="{{ asset('image/download.png') }}" alt="R StoreLogo" class="w-25 h-auto mr-3">
            <a class="navbar-brand fw-bold" style="color: #09757a" href="/">store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#best-seller">Best Products</a></li>
                    <li class="nav-item"><a class="nav-link @if (Request::is('products')) active @endif"
                            href="/products">Products</a></li>
                    <li class="nav-item"><a class="nav-link @if (Request::is('contact')) active @endif"
                            href="#contact">Contact</a></li>
                    <li class="nav-item mx-1">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" style="background-color : #09757a">
                                {{ auth()->user()->name }}
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profil">Profil</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    @yield('content')
    <!-- Footer-->
    <footer class="py-5" style="background-color: #09757a">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; dzikrinurfauzij</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/landing.js') }}"></script>
</body>

</html>