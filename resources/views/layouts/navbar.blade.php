<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="https://www.nic.in/wp-content/themes/NICTheme/assets/images/logo.png" alt="NIC Logo" class="d-inline-block align-top" style="height: 40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item m-4 {{ request()->routeIs('user-excel-data') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user-excel-data') }}">Dashboard</a>
            </li>
            <li class="nav-item m-4 {{ request()->routeIs('create-user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create-user') }}">Create User <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item m-4 {{ request()->routeIs('upload-excel') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('upload-excel') }}">Upload</a>
            </li>
        </ul>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="color: white; padding-right: 6rem">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                    style="width: 50px; height: 50px" alt="Avatar" />
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
    </div>
</nav>
