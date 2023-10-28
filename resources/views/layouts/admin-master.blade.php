<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <title>Service Admin</title>
</head>
<body>
<div class="nav-bar admin">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 logo">
                    <a href="{{ route('admin-dashboard') }}">Service</a>
                </div>
                <div class="main-menu col-md-5 d-flex">
                    <ul>
                        <li><a href="{{ route('admin-parts-index') }}">Spare Parts</a></li>
                    </ul>
                    <ul>
                        <li><a href="{{ route('admin-services-index') }}">Services</a></li>
                    </ul>
                </div>
                <div class="col-md-2 greeting">Hello, {{ $admin_user->name }}!</div>
                <div class="col-md-2 login-btn-container">
                    <a href="{{ route('admin-logout') }}" class="login-btn">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="site-page">
        @yield('content')
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>