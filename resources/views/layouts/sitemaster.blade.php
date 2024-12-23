<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ getPageTitle($pageTitle ?? '') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/fontawesome-free-6.6.0-web/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom-style.css') }}">
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ isActiveRoute('home') }}"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item {{ isActiveRoute('about') }}"><a href="{{ route('about') }}" class="nav-link">About Us</a></li>
                <li class="nav-item {{ isActiveRoute('cars.index') }}"><a href="{{ route('cars.index') }}" class="nav-link">Cars</a></li>
                <li class="nav-item {{ isActiveRoute('contact') }}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>

                @guest
                    <!-- Show login and register links if the user is not authenticated -->
                    <li class="nav-item {{ isActiveRoute('login') }}"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item {{ isActiveRoute('register') }}"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @else
                    <!-- Show different dashboard links based on user role -->
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Admin Dashboard</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('user.dashboard') }}" class="nav-link">Dashboard</a></li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

    <!-- END nav -->

    @yield('content')

    @if(in_array(Route::currentRouteName(), ['home','about','contact']))
        @include('partials/counter')
    @endif

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="{{ route('home') }}">CarBook</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend/js/aos.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>
    @stack('scripts')
  </body>
</html>
