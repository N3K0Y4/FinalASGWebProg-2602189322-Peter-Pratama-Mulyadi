<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.index') }}">Connect Friend</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('active_home')" href="{{ route('user.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('active_request')" href="{{ route('friend-request.index') }}">Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('active_message')" href="{{ route('friend.index') }}">Friend</a>
                </li>
            </ul>
            <div class="d-flex">
                Welcome, {{ Auth::user()->name }}
            </div>
            <div style="width: 1rem"></div>
            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button type="submit" class="button">Logout</button>
            </form>
        </div>
    </div>
</nav>
