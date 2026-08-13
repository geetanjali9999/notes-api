<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="first-div d-flex justify-content-center">
            <img src="{{ asset('images/logo/app_logo.svg') }}" class="img-fluid" alt="Notes App Logo" width="40">
        </div>

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Notes App
        </a>

        <div class="ms-auto">

            <button id="themeToggle" class="btn btn-outline-secondary btn-sm">
                🌙 Dark Mode
            </button>
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