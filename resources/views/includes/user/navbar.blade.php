<body>

<header class="section-header border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" style="font-size: 20user.pngpx" href="{{ route('home') }}">
                Slando
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main" aria-controls="navbar_main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"  id="navbar_main">
                <ul class="navbar-nav ms-auto me-sm-2 mt-2 mt-lg-0">

                    <li class="nav-item me-2">
                        <a href="{{ route('favourites.show') }}" class="btn btn-dark">
                            Обрані
                        </a>
                    </li>

                    <li class="nav-item me-2">
                        <a href="{{ route('advertisement.create') }}" class="btn btn-success">
                            <i class="me-1 fa fa-plus-circle"></i> Оголошення
                        </a>
                    </li>

                    @auth()
                        <li class="nav-item dropdown">
                        <a class="nav-link py-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="icon-xs bg-gray rounded-circle me-2"><i class="fa fa-user"></i> </span>
                            <span>{{ \Illuminate\Support\Facades\Auth::user()['name'] }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            @admin
                                <li> <a class="dropdown-item" href="{{ route('admin.user.index') }}">Адміністративна панель</a> </li>
                                <li> <hr class="dropdown-divider"> </li>
                            @endadmin

                            <li> <a class="dropdown-item" href="{{ route('profile') }}">Налаштування</a> </li>
                            <li> <hr class="dropdown-divider"> </li>
                            <li> <a class="dropdown-item" href="{{ route('advertisement.showAll') }}">Всі оголошення</a> </li>
                            <li> <hr class="dropdown-divider"> </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    @endauth

                    @guest()
                        <li class="nav-item me-2">
                            <a href="{{ route('login') }}" class="ms-md-2 btn btn-light"> <i class="fa me-1 fa-user"></i>  Sign in</a>
                        </li>
                    @endguest
                </ul>

            </div>

        </div>
    </nav> <!-- navbar end.// -->
</header> <!-- section-header end.// -->

<!-- ========================= SECTION CONTENT END.// ========================= -->


<!-- Bootstrap js -->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('/js/script1.js?v=1.0') }}"></script>


</body>


