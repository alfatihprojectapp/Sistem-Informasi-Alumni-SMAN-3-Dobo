<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="/"><img src="/assets/img/logo.png" class="img-fluid"> SMAN 8 BURU</a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : ' ' }}" href="/">Beranda</a></li>
                <li><a class="nav-link scrollto {{ Request::is('informasi') ? 'active' : ' ' }}"
                        href="/informasi">Informasi</a></li>
                @auth
                    <li class="dropdown"><a href="#"><span>Welcome back, {{ strtoupper(auth()->user()->nama) }}</span>
                            <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="#" id="dashboard">My Dashboard</a></li>
                            <li><a class="nav-link scrollto" href="#" id="logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a class="nav-link scrollto {{ Request::is('login') ? 'active' : ' ' }}" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>


<form action="/logout" method="post" id="formLogout">
    @csrf
</form>

<script>
    $(document).on('click', '#dashboard', function() {
        window.location.href = '/dashboard';
    })
    $(document).on('click', '#logout', function() {
        $('#formLogout').submit();
    })
</script>
