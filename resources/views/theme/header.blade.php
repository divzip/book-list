<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a
                    class="nav-link @if(Route::currentRouteName() === 'index') active @endif"
                    href="{{ url('/') }}"
                >
                    Book List
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link @if(Route::currentRouteName() === 'addBook') active @endif"
                    href="{{ url('add-book') }}"
                >
                    Add Book
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="{{ url('api/v1/topbooks') }}"
                >
                    Top 10 Books Api
                </a>
            </li>
        </ul>
    </div>
</nav>