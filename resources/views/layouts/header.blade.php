<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link" href="{{route('pastes.index')}}">
                <button type="button" class="btn btn-danger">Home</button>
            </a>
        </li>
        @auth()
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                    <button type="button" class="btn btn-danger">Выйти</button>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('my_pastes')}}">
                    <button type="button" class="btn btn-success">Мои пасты</button>
                </a>
            </li>
        @endauth
        @guest()
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">
                    <button type="button" class="btn btn-primary">Зарегистрироваться</button>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">
                    <button type="button" class="btn btn-success">Войти</button>
                </a>
            </li>
        @endguest
    </ul>
</nav>
