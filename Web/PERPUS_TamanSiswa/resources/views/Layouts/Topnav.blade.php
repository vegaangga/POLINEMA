<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">

        </div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>


        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        @if(Auth::user()->gambar == '')
                        <img class="img-radius" src="{{asset('images/user/default.png')}}" alt="User-Profile-Image">
                        @else
                        <img class="img-radius" src="{{asset('images/user/'.Auth::user()->gambar)}}" alt="User-Profile-Image">
                        @endif
                        {{--  <img src="{{ asset('vendors/images/photo1.jpg')}}" alt="">  --}}
                    </span>
                    <span class="profile-text">Hello, {{Auth::user()->name}} !</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{route('user.show', Auth::user()->id)}}"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="{{route('user.edit', Auth::user()->id)}}"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="{{ asset('vendors/images/github.svg')}}" alt=""></a>
        </div> --}}
    </div>
</div>
