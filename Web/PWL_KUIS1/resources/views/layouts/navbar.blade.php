<div class="header-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 site-name-container">
                <img src="../../img/logo.png" alt="Site logo" class="site-logo">
                <h1 class="site-name">Multi Pro</h1>
            </div>
            <div class="mobile-menu-icon">
                <i class="fa fa-bars"></i>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8 templatemo-nav-container">
                <nav class="templatemo-nav">
                    <ul>
                        <li><a href="{{url('/')}}" class="@yield('menu_home')">Home</a></li>
                        <li><a href="{{url('data')}}"class="@yield('menu_data')">Data</a></li>
                        <li><a href="{{url('about')}}" class="@yield('menu_about')">About</a></li>
                        <li><a href="{{url('profile')}}" class="@yield('menu_profile')">profile</a></li>
                        <li><a href="{{url('contact')}}"class="@yield('menu_contact')">contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>