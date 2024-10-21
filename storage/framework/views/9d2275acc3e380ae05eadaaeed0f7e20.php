<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('<?php echo e(asset('frontend/images/bg_1.jpg')); ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container-fluid">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
            <div class="text w-100 text-center mb-md-5 pb-md-5">
                <h1 class="mb-4">Rent Your Dream Car Today!</h1>
                <p style="font-size: 18px;">Experience a seamless car leasing process with us. Whether you need a compact car for city driving or a spacious SUV for family trips, we have the perfect vehicle for you. Enjoy competitive rates, flexible terms, and exceptional customer service, making your journey as smooth as possible.</p>
            </div>

          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-12 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4 text-center">A Smarter Way to Rent Your Ideal Car</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Find a Car</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Select Your Desired Date Range</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Reserve Your Car</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center"><a href="<?php echo e(route('cars.index')); ?>" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container-fluid">
        <div class="row align-items-end mb-3">
            <div class="col-lg-8 col-sm-8 col-md-8 heading-section ftco-animate">
                <h2>Feeatured Car Listings</h2>
            </div>

            <div class="col-lg-4 d-flex justify-content-end">
                <a href="<?php echo e(route('cars.index', ['featured' => 1])); ?>" class="btn btn-primary">View All</a>
            </div>

        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
                        <?php $__currentLoopData = $featuredCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<div class="item">
        						<div class="car-wrap rounded ftco-animate">
                                    <a href="<?php echo e(route('cars.show', $car->id)); ?>">
    		    					<div class="img rounded d-flex align-items-end" style="background-image: url('<?php echo e(asset('storage/' . json_decode($car->images)[0])); ?>');">
    		    					</div>
                                    </a>
                                      <div class="text">
                                            <h2 class="heading mb-0"><a href="<?php echo e(route('cars.show', $car->id)); ?>"><?php echo e($car->name); ?></a></h2>
                                           <div class="d-flex mb-3">
                                                <span class="cat"><?php echo e($car->brand->name); ?></span>
                                                <p class="price ml-auto"><?php echo e($car->formated_price); ?> <span>/day</span></p>
                                            </div>
                                            <div class="brand-car-inner-item-main">
                                                <div class="brand-car-inner-item-two">
                                                    <div class="brand-car-inner-item-thumb">
                                                        <span>
                                                            <i class="fa fa-gas-pump"></i>
                                                        </span>
                                                    </div>
                                                    <span><?php echo e($car->fuel_type); ?></span>
                                                </div>
                                                <div class="brand-car-inner-item-two">
                                                    <div class="brand-car-inner-item-thumb">
                                                        <span>
                                                            <i class="fa fa-calendar-days"></i>
                                                        </span>
                                                    </div>
                                                    <span><?php echo e($car->model_year); ?> Model</span>
                                                </div>
                                                <div class="brand-car-inner-item-two">
                                                    <div class="brand-car-inner-item-thumb">
                                                        <span>
                                                            <i class="fa fa-car-side"></i>
                                                        </span>
                                                    </div>
                                                    <span><?php echo e($car->seatType->name); ?></span>
                                                </div>
                                            </div>
                                      </div>
    		    				</div>
        					</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    				</div>
    			</div>
    		</div>
    	</div>
    </section>


    <section class="ftco-section">
      <div class="container-fluid">
        <div class="row align-items-end mb-3">
            <div class="col-lg-8 col-sm-8 col-md-8 heading-section ftco-animate">
                <h2>Latest Car Listings</h2>
            </div>

            <div class="col-lg-4 d-flex justify-content-end">
                <a href="<?php echo e(route('cars.index')); ?>" class="btn btn-primary">View All</a>
            </div>

        </div>
        <div class="row d-flex">
            <?php $__currentLoopData = $latestCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 ftco-animate">
          	<div class="blog-entry car-card">
              <a href="<?php echo e(route('cars.show', $car->id)); ?>" class="block-20" style="background-image: url('<?php echo e(asset('storage/' . json_decode($car->images)[0])); ?>');">
              </a>
              <div class="text p-4">
                    <h3 class="heading mb-0"><a href="<?php echo e(route('cars.show', $car->id)); ?>"><?php echo e($car->name); ?></a></h3>
                   <div class="d-flex mb-3">
                        <span class="cat"><?php echo e($car->brand->name); ?></span>
                        <p class="price ml-auto"><?php echo e(number_format($car->price, 2)); ?> <span>/day</span></p>
                    </div>
                    <div class="brand-car-inner-item-main">
                        <div class="brand-car-inner-item-two">
                            <div class="brand-car-inner-item-thumb">
                                <span>
                                    <i class="fa fa-gas-pump"></i>
                                </span>
                            </div>
                            <span><?php echo e($car->fuel_type); ?></span>
                        </div>
                        <div class="brand-car-inner-item-two">
                            <div class="brand-car-inner-item-thumb">
                                <span>
                                    <i class="fa fa-calendar-days"></i>
                                </span>
                            </div>
                            <span><?php echo e($car->year); ?> Model</span>
                        </div>
                        <div class="brand-car-inner-item-two">
                            <div class="brand-car-inner-item-thumb">
                                <span>
                                    <i class="fa fa-car-side"></i>
                                </span>
                            </div>

                            <span><?php echo e($car->seatType->name); ?></span>
                        </div>
                    </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sitemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/home.blade.php ENDPATH**/ ?>