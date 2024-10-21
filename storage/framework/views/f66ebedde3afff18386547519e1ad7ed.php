<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo e(getPageTitle($pageTitle ?? '')); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')([]); ?>

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/fonts/fontawesome-free-6.6.0-web/css/all.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery.timepicker.css')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/icomoon.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/custom-style.css')); ?>">
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo e(isActiveRoute('home')); ?>"><a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a></li>
                <li class="nav-item <?php echo e(isActiveRoute('about')); ?>"><a href="<?php echo e(route('about')); ?>" class="nav-link">About Us</a></li>
                <li class="nav-item <?php echo e(isActiveRoute('cars.index')); ?>"><a href="<?php echo e(route('cars.index')); ?>" class="nav-link">Cars</a></li>
                <li class="nav-item <?php echo e(isActiveRoute('contact')); ?>"><a href="<?php echo e(route('contact')); ?>" class="nav-link">Contact</a></li>

                <?php if(auth()->guard()->guest()): ?>
                    <!-- Show login and register links if the user is not authenticated -->
                    <li class="nav-item <?php echo e(isActiveRoute('login')); ?>"><a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a></li>
                    <li class="nav-item <?php echo e(isActiveRoute('register')); ?>"><a href="<?php echo e(route('register')); ?>" class="nav-link">Register</a></li>
                <?php else: ?>
                    <!-- Show different dashboard links based on user role -->
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <li class="nav-item"><a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">Admin Dashboard</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a href="<?php echo e(route('user.dashboard')); ?>" class="nav-link">Dashboard</a></li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('logout')); ?>" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

    <!-- END nav -->

    <?php echo $__env->yieldContent('content'); ?>

    <?php if(in_array(Route::currentRouteName(), ['home','about','contact'])): ?>
        <?php echo $__env->make('partials/counter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="<?php echo e(route('home')); ?>">CarBook</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.easing.1.3.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.waypoints.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.animateNumber.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.timepicker.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/scrollax.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\carbook\resources\views/layouts/sitemaster.blade.php ENDPATH**/ ?>