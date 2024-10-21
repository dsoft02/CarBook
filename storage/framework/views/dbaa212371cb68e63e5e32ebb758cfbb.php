<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section class="hero-wrap hero-wrap-2 js-fullheight"
         style="background-image: url('<?php echo e(asset('frontend/images/bg_3.jpg')); ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span><a
                            href="<?php echo e(route('cars.show', $car->id)); ?>">Cars <i
                                class="ion-ios-arrow-forward"></i></a></span></p>
                <h1 class="mb-3 bread">Car Booking</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-car-details">
    <div class="container-fluid">
        <div class="row gy-5">
            <!-- Car Information Section -->
            <div class="col-md-12">
            <div class="car-details">
                    <h3 class="title font-weight-bold text-primary mb-0"><?php echo e($car->name); ?></h3>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="detail-item mr-3"><strong>Brand:</strong> <?php echo e($car->brand->name); ?></div>
                        <div class="detail-item mr-3"><strong>Model:</strong> <?php echo e($car->carModel->name); ?></div>
                        <div class="detail-item mr-3"><strong>Year:</strong> <?php echo e($car->year); ?></div>
                        <div class="detail-item mr-3"><strong>Color:</strong> <?php echo e($car->color); ?></div>
                    </div>
                    <div class="ratings mb-0 text-warning">
                        <p class="star mb-0">
                        <span>
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <i class="ion-ios-star<?php echo e($i <= $car->averageRating() ? '' : '-outline'); ?>"></i>
                            <?php endfor; ?>
                        </span>
                            (<?php echo e($car->totalRatings()); ?> ratings)
                        </p>
                    </div>
                    <div class="price-area mb-3">
                        <h5 class="price font-weight-bold text-primary"><?php echo e($car->formated_price); ?> <sub>/day</sub></h5>
                    </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="car-details">
                     <div class="img img-main rounded mb-3"
                         style="background-image: url('<?php echo e(asset('storage/' . json_decode($car->images)[0])); ?>');"></div>
                </div>
            </div>

            <!-- Booking Form Section -->
            <div class="col-md-6">
                <div class="booking-form">
                    <h3 class="font-weight-bold">Booking Form</h3>
                    <form id="booking-form" action="<?php echo e(route('user.booking.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="car_id" value="<?php echo e($car->id); ?>">
                        <input type="hidden" name="trx" id="trx">
                        <input type="hidden" name="total_price" id="total_price_value">

                        <div class="form-group">
                            <label for="pickup_date">Pickup Date:</label>
                            <input type="date" name="pickup_date" id="pickup_date" class="form-control" placeholder="dd-mm-yyyy" required>
                        </div>
                        <div class="form-group">
                            <label for="return_date">Return Date:</label>
                            <input type="date" name="return_date" id="return_date" class="form-control" required>
                        </div>

                        <!-- Total Price Display -->
                        <div class="form-group d-flex align-items-center">
                            <label for="total_price" class="mr-2 mb-0">Total Price:</label>
                            <h5 id="total_price" class="text-primary font-weight-bold mb-0">₦0</h5>
                        </div>

                        <!-- Paystack Payment Button -->
                        <button type="button" id="pay-now-btn" class="btn btn-primary">Pay & Confirm Booking</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://js.paystack.co/v2/inline.js"></script>
<script>
    const dailyPrice = <?php echo e($car->price); ?>;
    const carId = <?php echo e($car->id); ?>;
    const carName = "<?php echo e($car->name); ?>";
    const paystackPublicKey = '<?php echo e(config("services.paystack.key")); ?>';
    const userEmail = '<?php echo e(auth()->user()->email); ?>';
</script>

<script src="<?php echo e(asset('frontend/js/pages/booking.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sitemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/user/bookings/create.blade.php ENDPATH**/ ?>