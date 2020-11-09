<!DOCTYPE html>
<html>

<head>
    <title>BulletinBoard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="#">Bulletin Board</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user_list')}}">Users <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post_list')}}">Posts</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Create User</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                        <a class="dropdown-item" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>