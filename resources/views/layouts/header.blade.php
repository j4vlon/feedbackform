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
        <link
            rel="shortcut icon"
            href="{{ asset('images/ff-favicon.ico') }}"
            type="image/x-icon"
        />

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/fontawesome-kit.js') }}" defer></script>
        <script src="{{ asset('assets/js/script.js') }}" defer></script>
    </head>
    <body>
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-12">@yield('content')</div>
            </div>
        </div>
    </body>
</html>
