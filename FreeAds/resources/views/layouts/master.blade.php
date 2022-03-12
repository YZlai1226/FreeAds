<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FreeAds @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" />
</head>

<body>
    <nav class="navbar has-shadow is white">

        <!-- =============== LOGO ================= -->
        <div class="navbar-brand">
            <a class="navbar-item">
                <img src="images/Logo.png" alt="Logo">
            </a>
        </div>
        <div class="navbar-menu" id="nav-links">

            <div class="navbar-end">

                <a class="navbar-item">Dashboard</a>
                <a class="navbar-item">Log in</a>
                <a class="navbar-item">Register</a>

            </div>
        </div>

    </nav>

    @yield('content')
    <div class="container">
    </div>
</body>

</html>