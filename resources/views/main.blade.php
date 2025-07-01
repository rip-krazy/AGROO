<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Website</title>
    <link rel="stylesheet" href={{asset ("asset/css/main.css") }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
    <div class="img">
        <img src="/asset/img/laravel (1).jpg" alt="" class="nav-logo"> </div>
<a href="{{ url('/') }}">Home</a>
</nav>
<div class="content">
    @yield('content')
    </div>
    <footer>
    <p>&copy; {{ date('Y') }} Indra Herlambang Setiawan. All rights reserved.</p>

    <div class="social-icons">
        <a href="https://www.instagram.com/linscott.17y?igsh=ams0djhjajF6M2Vm" target="_blank" class="fab fa-instagram"></a>
        <a href="https://www.facebook.com/dadut44?mibextid=ZbWKwL" target="_blank" class="fab fa-facebook"></a>
        <a href="https://x.com/miminoioi?t=FnFDUm20DXi-YW7xKGGY6g&s=09" target="_blank" class="fab fa-twitter"></a>
        <a href="https://discord.gg/ks8MsssaUf" target="_blank" class="fab fa-discord"></a>
    </div>
</footer>
<style>

footer {
    display: flex;
    justify-content: center; /* Space between text and icons */
    align-items: center; /* Center items vertically */
    padding: 15px;
    background: #007BFF;
    color: white;
    position: fixed;
    width: 100%;
    height: 40px;
    bottom: 0;
    box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
    margin-right:4px;
}

.social-icons {
    display: flex;
    gap: 15px; /* Space between icons */
}

.social-icons a {
    color: #fff; /* Icon color */
    font-size: 24px; /* Icon size */
    transition: color 0.3s ease; /* Smooth color transition */
}

.social-icons a:hover {
    color: lightskyblue; /* Change color on hover */
}
</style>

</body>
</html>
