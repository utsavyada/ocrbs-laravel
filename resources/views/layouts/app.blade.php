<!DOCTYPE html>
<html>
<head>
    <title>OCRBS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav class="navbar">
        <a href="/">HOME</a>
        <a href="/about">ABOUT</a>

        <div class="nav-dropdown">
            <a href="/services" class="nav-parent">SERVICES</a>
            <div class="nav-dropdown-menu">
                <a href="/services">Booking Hall Availability</a>
            </div>
        </div> <a href="/account">MY ACCOUNT</a>
        <a href="/contact">CONTACT US</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <div class="footer">
        © 2025 Online Conference Room Booking System (OCRBS). All rights reserved
    </div>
</body>
</html>
