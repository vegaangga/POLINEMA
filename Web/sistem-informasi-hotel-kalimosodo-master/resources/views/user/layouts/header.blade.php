<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - HOTEL KALIMOSODO</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template-hotel') }}/vendor/bootstrap/css/bootstrap.min.css" />
    <!-- Hamburger CSS -->
    <link rel="stylesheet" href="{{ asset('template-hotel') }}/vendor/hamburgers-master/_sass/hamburgers/hamburgers.css" />
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template-hotel') }}/vendor/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('template-hotel') }}/vendor/slick/slick/slick-theme.css" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template-hotel') }}/vendor/fontawesome/css/fontawesome.min.css" />
    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset('template-hotel') }}/assets/css/style.css" />
    @yield('css')
</head>

<body>

    <!-- Topbar -->
    <header>
        <div class="wrap__top__header" data-aos="fade-right">
            <div class="container">
                <div class="top__header text-center py-2">
                    <p class="m-0">Selamat Datang di Website Kalimosodo Hotel</p>
                </div>
            </div>
        </div>
    </header>
    <!-- End Topbar -->

    <!-- Navbar -->
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-primary navbar__title" href="{{ route('home.index')}}">KALIMOSODO HOTEL</a>
                <div class="hamburger hamburger--spring navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Session::get('nav') == 1 ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('home.index')}}">Beranda</a>
                        </li>
                        <li class="nav-item {{ Session::get('nav') == 2 ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('home.blog')}}">Blog</a>
                        </li>
                        <li class="nav-item {{ Session::get('nav') == 3 ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('home.rooms')}}">Kamar</a>
                        </li>
                        <li class="nav-item {{ Session::get('nav') == 4 ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('home.facility')}}">Fasilitas</a>
                        </li>
                        <li class="nav-item {{ Session::get('nav') == 5 ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('home.about')}}">Tentang Kami</a>
                        </li>
                        {{-- <li class="nav-item {{ Session::get('nav') == 6 ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('home.contact')}}">Kontak Kami</a>
                        </li> --}}

                        @if (Auth::user())
                        @if (Auth::user()->role == 1)
                        <li class="nav-item mx-md-2 my-md-0 my-sm-2 my-2">
                            <a class="nav-link btn btn-sm btn-primary text-light" href="{{ route('dashboard.index')}}">Dashboard</a>
                        </li>
                        @elseif (Auth::user()->role == 0)
                        <li class="nav-item mx-md-2 my-md-0 my-sm-2 my-2">
                            <a class="nav-link btn btn-sm btn-primary text-light" href="{{ route('user.dashboard.index')}}">Dashboard</a>
                        </li>
                        @endif
                        <li class="nav-item mx-md-2 my-md-0 my-sm-2 my-2">
                            <form action="{{ route('auth.logout')}}" method="POST">
                                @csrf
                                <button class="nav-link btn btn-sm btn-outline-primary w-100" type="submit" id="btn__login">Logout</button>
                            </form>
                        </li>
                        @else
                        <li class="nav-item mx-md-2 my-md-0 my-sm-2 my-2">
                            <a class="nav-link btn btn-sm btn-outline-primary " id="btn__login" href="{{ route('auth.showLogin')}}">Login</a>
                        </li>
                        <li class="nav-item mx-md-2 my-md-0 my-sm-2 my-2">
                            <a class="nav-link btn btn-sm btn-primary text-light" href="{{ route('auth.showRegister')}}">Register</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Navbar -->
