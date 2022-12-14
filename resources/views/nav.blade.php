<nav class="navbar navbar-expand-lg  mb-2 p-1" style="background-color: #141414;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <h1 class="text-light" style="font-size:20px; font-weight:400;">Student App</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                @if (auth()->check())
                <a class="nav-link text-light" style="padding: 10px"  href="/">Dashboard</a>
                    <a class="nav-link text-light" style="padding: 10px"  href="/posts">Posts</a>

                    <a class="nav-link text-light" style="padding: 10px" href="/users">Users</a>

                    <a class="nav-link text-light" style="padding: 10px" href="/user/create">Create  Post </a>

                    <div class=""style="position:relative; left: 10px; color: white">|
                        <li class="nav-item dropdown btn btn-sm">
                            <a class="nav-link dropdown-toggle text-light" style="font-weight: bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ url('users', ['id' => auth()->user()->id]) }}">{{ __('My Posts') }}</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ '/logout' }}">{{ __('Logout') }}</a></li>
                            </ul>
                        </li>
                    </div>
                @else
                    <a class="nav-link text-light " style="margin-left:1100px;" href="/login">Login</a>
                    <a class="nav-link text-light p-2" href="/register">Register</a>


                @endif

            </div>

        </div>
    </div>
</nav>
