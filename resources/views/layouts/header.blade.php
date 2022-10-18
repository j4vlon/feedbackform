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
                {{-- Hide UserList page for users without admin permission --}}
                @auth
                    @if (Auth()->user()->role)
                        <li class="nav-item active">
                            <a class="nav-link" href="/createadmin">User List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Feedbacks List</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="/feedback">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
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
