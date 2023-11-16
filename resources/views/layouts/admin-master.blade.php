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
                        <li><a href="{{ route('admin-services-index') }}">Services</a></li>
                        <li><a href="{{ route('admin-users-index') }}">Users</a></li>
                        <li><a href="{{ route('admin-dashboard') }}">Applications</a></li>
                        <li><a href="{{ route('admin-profile-index') }}">Profile</a></li>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>