<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class=navbar-brand href="#">
            Notes App
        </a>

        <div class="ms-auto">

            <span class="text-white me-3">
                Welcome {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>