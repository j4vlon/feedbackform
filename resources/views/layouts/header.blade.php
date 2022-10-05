<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/ff-favicon.ico') }}" type="image/x-icon" />

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/fontawesome-kit.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/createadmin">User List <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/feedback">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Feedbacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registration">Registration</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">@yield('content')</div>
            </div>
        </div>
    </div>
</body>

</html>
