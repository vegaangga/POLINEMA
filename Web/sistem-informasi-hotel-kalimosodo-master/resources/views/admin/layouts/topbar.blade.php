<div class="sticky-top">
    <header class="mb-3">
        <nav class="navbar navbar-expand navbar-white bg-white" style="height: 56px">
            <a href="#" class="burger-btn d-block d-xl-none" style="height: 24px">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-end w-100">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>Logout</span></a>
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>
