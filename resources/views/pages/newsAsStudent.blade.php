<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cluster analysis learning system</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/assets/css/main.css" rel="stylesheet">
    <link href="/assets/css/myStyle.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Arsha
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Updated: Jun 29 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">


<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename"> Cluster analysis learning system</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/theory') }}">Theory</a></li>
                <li><a href="{{ url('/quiz') }}">Quizes</a></li>
                <li><a href="{{ url('/solved') }}">Solved quizes history</a></li>
                <li><a href="#tools ">Tools</a></li>
                <li><a href="#change ">Change user details</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn-getstarted" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>


            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


    </div>
</header>
<main class="main" id="naujas">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">


        <div class="container" >
            <br>
            <h2>@yield('title')</h2>
            <br>
        <div class="row" >


            <div class="col-10">

                @yield('content')

            </div>
            <div class="col-2" id="aside">
                <p>Welcome, student {{Auth::user()->name}}!</p>



        </div>


        </div>

        </div>



    </section><!-- /Hero Section -->

</main>

<footer id="footer" class="footer">

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Cluster analysis learning system</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">Justina Grybauskaitė</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="/assets/js/main.js"></script>

</body>

</html>
