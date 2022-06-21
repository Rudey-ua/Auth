<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Slando</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <div class="navbar-nav ms-auto">

                    @admin
                        <a style="text-decoration: none; color: white" href="{{ route('admin.index') }}">
                                <button style="margin-right: 10px;" class="btn btn-dark" type="button"  aria-expanded="false">
                                    Admin
                                </button>
                            </a>
                    @endadmin

                    <div class="dropdown">

                        @auth
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ \Illuminate\Support\Facades\Auth::user()['name'] }}
                            </button>
                        @endauth

                        @guest()
                                <a style="text-decoration: none; color: black" href="/login">
                                    <strong>
                                        Войти
                                    </strong>
                                </a>
                        @endguest

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Профиль</a></li>
                            <li><a class="dropdown-item" href="{{ route('advertisement.create') }}">Добавить объяву</a></li>
                            <li><a class="dropdown-item" href="{{ route('advertisement.showAll') }}">Все объявления</a></li>
                            <li><a class="dropdown-item" href="{{ route('favourites.show') }}">Избранные</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



