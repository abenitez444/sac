
<div class="container-fluid">
    <div class="navbar-wrapper">
        <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <a class="navbar-brand" href="{{url('/')}}">
            {{-- <img src="{{asset('img/logo-light.png')}}" alt="Logo" class="log"> --}}
            LOGO
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
{{--         @guest
            <form class="form-inline">
                <a href="#" class="btn btn-link">Iniciar Sesión</a>
                <a href="#" class="btn btn-primary">Crear Cuenta</a>
            </form>
        @endguest --}}
        <ul class="navbar-nav">
         {{--    @auth --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>Usuario</span>
                        <i class="now-ui-icons users_single-02"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Cuenta</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-dropdown">
                        <a class="dropdown-item" href="#">Cuenta</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                    </div>
                    <form id="logout-form" action="#logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
{{--             @endauth --}}
        </ul>
    </div>
</div>
</nav>