<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <title>Service</title>
</head>
<body>
    
    <div class="nav-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 logo">
                    <a href="/">Service</a>
                </div>
                <div class="main-menu {{ session()->has('customer_id') ? 'col-md-5' : 'col-md-7' }}">
                    <ul>
                        <li><a href="/">Services</a></li>
                        <li><a href="/mechanics">Mechanics</a></li>
                        @if(session()->has('customer_id'))
                            <li><a href="/applications">Applications</a></li>
                            <li><a href="/profile">Profile</a></li>
                        @endif
                    </ul>
                </div>
                @if(session()->has('customer_id'))
                <div class="col-md-2 greeting">Hello, {{ $customer->name }}!</div>
                @endif
                <div class="col-md-2 login-btn-container">
                @if(session()->has('customer_id'))
                    <a href="/logout" class="login-btn">Logout</a>
                @else
                    <a href="/login" class="login-btn">Login</a>
                @endif
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