<!DOCTYPE html>
<html>
<head>  
    <link rel="icon" href="{{ asset('assets/images/logo-polinema.png') }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flat-admin.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue-sky.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/red.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/yellow.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}">
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <title>@yield('title')</title>

</head>
<body>
    <div class="app app-default">
        <aside class="app-sidebar" id="sidebar">
            <div class="sidebar-header">
                <a class="sidebar-brand" href="#"><span class="highlight">Pengajuan</span>Magang</a>
                <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
                </button>
            </div>
            <!-- Admin -->
            @if(Auth::user()->level == 'Admin')
            <div class="sidebar-menu">
                <ul class="sidebar-nav">
                    <li class="active">
                        <a href="{{ route('users.index') }}">
                            <div class="icon">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="title">Dashboard</div>
                        </a>
                    </li>
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="icon">
                                <i class="fa fa-cube" aria-hidden="true"></i>
                            </div>
                            <div class="title">Data User</div>
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li class="section"><i class="fa fa-database" aria-hidden="true"></i> Users</li>
                                <li><a href="{{ route('admin.index') }}">Admin</a></li>
                                <li><a href="{{ route('dosen.index') }}">Dosen</a></li>
                                <li><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="icon">
                                <i class="fa fa-bank" aria-hidden="true"></i>
                            </div>
                            <div class="title">Data Magang</div>
                        </a>
                        <div class="dropdown-menu">
                        <ul>
                            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Magang</li>
                            <li><a href="{{ route('aplication_letter.index') }}">Surat Pengajuan</a></li>
                            <li><a href="{{ route('report.index') }}">Laporan</a></li>
                        </ul>
                        </div>
                    </li>
                </ul>
            </div>
            @endif
            <!-- End Admin -->
            <!-- Mahasiswa -->
            @if(Auth::user()->level == 'Mahasiswa')
            <div class="sidebar-menu">
                <ul class="sidebar-nav">
                    <li class="active">
                        <a href="{{ route('home.index') }}">
                            <div class="icon">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="title">Dashboard</div>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('proposal.index') }}">
                            <div class="icon">
                                <i class="fa fa-bank" aria-hidden="true"></i>
                            </div>
                            <div class="title">Laporan Magang</div>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
            <!-- End Mahasiswa -->
        </aside>

    <div class="app-container">

    <nav class="navbar navbar-default" id="navbar">
        <div class="container-fluid">
            <div class="navbar-collapse collapse in">
                
                
                <ul class="nav navbar-nav navbar-left">
                    <li class="navbar-title">Universitas Negeri Malang</li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown profile">
                    <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
                        <img class="profile-img" src="{{ asset('assets/images/user.png') }}">
                        <div class="title">Profile</div>
                    </a>
                    <div class="dropdown-menu">
                        <div class="profile-info">
                            <h4 class="username">
                               {{ Auth::user()->name }}
                            </h4>
                        </div>
                        <ul class="action">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-cog" aria-hidden="true"></i></i> Setting Account
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                            </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="post"> @csrf </form>
                        </li>
                        </ul>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card" >
                <div class="card-header" style="justify-content: center;">
                    <p><b>Copyright</b> &copy 2020 Madara</p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>