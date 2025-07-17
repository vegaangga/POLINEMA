<div id="sidebar" class="active" style="z-index: 9999; position: relative">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#">
                        Kalimosodo
                        {{-- <img src="{{ asset('img/logo.png') }}" alt="Logo" srcset=""> --}}
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @if (Auth::user()->role == 1)
                <li class="sidebar-title">ADMINISTRATOR</li>
                <li class="sidebar-item {{Request::is('admin/dashboard') ? 'active' : ''}}">
                    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{Request::is('admin/user') ? 'active' : ''}}">
                    <a href="{{ route('user.index') }}" class='sidebar-link'>
                        <i class="fas fa-fw fa-users"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('admin/room-type') ? 'active' : ''}}">
                    <a href="{{ route('room-type.index') }}" class='sidebar-link'>
                        <i class="fas fa-fw fa-person-booth"></i>
                        <span>Tipe Kamar</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('admin/room') ? 'active' : ''}}">
                    <a href="{{ route('room.index') }}" class='sidebar-link'>
                        <i class="fas fa-fw fa-person-booth"></i>
                        <span>Kamar</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('admin/facility') ? 'active' : ''}}">
                    <a href="{{ route('facility.index') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Fasilitas</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('admin/reservation') ? 'active' : ''}}">
                    <a href="{{ route('reservation.index')}}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Reservasi</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('admin/blog') ? 'active' : ''}}">
                    <a href="{{ route('blog.index') }}" class='sidebar-link'>
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Blog</span>
                    </a>
                </li>
                @else
                <li class="sidebar-title">USER</li>
                <li class="sidebar-item {{Request::is('user/dashboard') ? 'active' : ''}}">
                    <a href="{{ route('user.dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{Request::is('user/reservation') ? 'active' : ''}}">
                    <a href="{{ route('user.reservation.index') }}" class='sidebar-link'>
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Reservasi</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-item">
                    <a href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form2').submit();" class='sidebar-link'>

                        <i class="fa fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form2" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
