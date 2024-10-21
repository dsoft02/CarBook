<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo e(asset('frontend/images/bg_3.jpg')); ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">About Us</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('<?php echo e(asset('frontend/images/about.jpg')); ?>');">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">About Us</span>
                        <h2 class="mb-4">Welcome to CarBook</h2>
                        <p class="text-justify">CarBook is a car leasing platform designed to make finding and renting your perfect car seamless and hassle-free. Our mission is to connect you with the best car rental deals, offering a wide range of vehicles to suit every need and budget. Whether you're planning a weekend getaway, a business trip, or just need a ride for the day, CarBook has got you covered.</p>
                        <p class="text-justify">CarBook was developed as a final year project by <span class="font-weight-bold">Ebenezer Ogidiolu (Matric No: CPS/2024/120)</span> from the <span class="font-weight-bold">Department of Computer Science, Faculty of Natural Sciences, Lagos State University</span>. The project aims to combine innovation and practicality, making car rentals accessible and straightforward for everyone. Thank you for choosing CarBook – your trusted partner in car leasing.</p>
                    </div>
					</div>
				</div>
			</div>
		</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sitemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/about.blade.php ENDPATH**/ ?>