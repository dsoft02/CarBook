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
                                class="ion-ios-arrow-forward"></i></a></span> <span><a href="<?php echo e(route('cars.index')); ?>">Cars <i
                            class="ion-ios-arrow-forward"></i></a></span></p>
                <h1 class="mb-3 bread">Car Details</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-car-details">
    <div class="container-fluid">
        <div class="row gy-5">
            <div class="col-lg-6">
                <div class="car-details">
                    <div class="img img-main rounded mb-3"
                         style="background-image: url('<?php echo e(asset('storage/' . json_decode($car->images)[0])); ?>');"></div>

                    <?php if(isset($car) && $car->images): ?>
                    <?php
                    $images = json_decode($car->images, true);
                    ?>
                    <?php if(is_array($images) && count($images) > 0): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-gallery owl-carousel car-gallery-carousel">
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <div class="car-wrap rounded ftco-animate">
                                        <div class="img car-gallery rounded d-flex align-items-end"
                                             style="background-image: url('<?php echo e(asset('storage/' . $image)); ?>');">
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 align-self-start pt-3">
                <div class="rent__single">
                    <h3 class="title font-weight-bold text-primary mb-0"><?php echo e($car->name); ?></h3>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="detail-item mr-3">
                            <strong>Brand:</strong> <?php echo e($car->brand->name); ?>

                        </div>
                        <div class="detail-item mr-3">
                            <strong>Model:</strong> <?php echo e($car->carModel->name); ?>

                        </div>
                        <div class="detail-item mr-3">
                            <strong>Year:</strong> <?php echo e($car->year); ?>

                        </div>
                        <div class="detail-item mr-3">
                            <strong>Color:</strong> <?php echo e($car->color); ?>

                        </div>
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

                    <div class="content text-justify"><?php echo $car->description; ?></div>
                    <div class="btn__grp">
                         <?php if(auth()->guard()->check()): ?>
                            <!-- Redirect authenticated users to the booking page -->
                            <a href="<?php echo e(route('user.booking.create', $car->id)); ?>" class="btn btn-lg btn-primary">Book Your Ride</a>
                        <?php else: ?>
                            <!-- Redirect unauthenticated users to the login page -->
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-lg btn-primary">Book Your Ride</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-dashboard"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Mileage
                                    <span><?php echo e(number_format($car->mileage, 0)); ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-pistons"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Transmission
                                    <span><?php echo e($car->transmission); ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-car-seat"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Seats
                                    <span><?php echo e($car->seatType->name); ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-backpack"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Doors
                                    <span><?php echo e($car->doors); ?> Doors</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-diesel"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Fuel
                                    <span><?php echo e($car->fuel_type); ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pills mt-0">
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                   href="#pills-description" role="tab" aria-controls="pills-description"
                                   aria-expanded="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                   role="tab" aria-controls="pills-review" aria-expanded="true">Review (<?php echo e($car->totalRatings()); ?>)</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                             aria-labelledby="pills-description-tab">
                            <div class="row">
                                <?php $__currentLoopData = $carFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $carFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($index % 4 === 0 && $index !== 0): ?>
                            </div> <!-- Close the previous column -->
                            <div class="col-md-4"> <!-- Start a new column -->
                                <ul class="features">
                                    <?php elseif($index === 0): ?>
                                    <div class="col-md-4"> <!-- Start the first column -->
                                        <ul class="features">
                                            <?php endif; ?>

                                            <li class="<?php echo e(in_array($carFeature->id, $car->selectedFeatures()) ? 'check' : 'remove'); ?>">
                                                <span
                                                    class="ion-ios-<?php echo e(in_array($carFeature->id, $car->selectedFeatures()) ? 'checkmark' : 'close'); ?>"></span>
                                                <?php echo e($carFeature->name); ?>

                                                <!-- Adjust this based on how you're accessing the feature's name -->
                                            </li>

                                            <?php if($index === count($carFeatures) - 1): ?>
                                        </ul> <!-- Close the last column's list -->
                                    </div> <!-- Close the last column -->
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rating-wrap mb-4">
                                        <?php if(auth()->guard()->check()): ?>
                                        <!-- Show the review form for authenticated users -->
                                        <?php if(!$car->userHasReviewed()): ?>
                                            <h3 class="head mb-0">Leave a Review</h3>
                                            <form action="<?php echo e(route('ratings.store', $car->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group mb-0">
                                                    <label for="rating">Rating:</label>
                                                    <div class="star-rating mb-0">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <input type="radio" name="rating" value="<?php echo e($i); ?>" id="star<?php echo e($i); ?>"
                                                               required>
                                                        <label for="star<?php echo e($i); ?>" class="mb-0">
                                                            <i class="ion-ios-star"></i>
                                                        </label>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Your Review:</label>
                                                    <textarea name="comment" id="comment" class="form-control" rows="5"
                                                              required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit Review</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if(auth()->guard()->guest()): ?>
                                        <!-- Show a message for unauthenticated users -->
                                        <p class="mt-3">Please <a href="<?php echo e(route('login')); ?>">login</a> to leave a
                                            review.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <?php if($car->totalRatings() > 0): ?>
                                    <h3 class="head"><?php echo e($car->totalRatings()); ?> Reviews</h3>
                                    <?php else: ?>
                                    <h3 class="head">Not yet reviewed</h3>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $car->ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="review d-flex mb-3">
                                        <div class="user-img"
                                             style="background-image: url('<?php echo e($rating->user->profile_picture_url); ?>')"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left"><?php echo e($rating->user->name); ?></span>
                                                <span
                                                    class="text-right"><?php echo e($rating->created_at->format('d F Y')); ?></span>
                                            </h4>
                                            <p class="star">
                    <span>
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="ion-ios-star<?php echo e($i <= $rating->rating ? '' : '-outline'); ?>"></i>
                        <?php endfor; ?>
                    </span>
                                            </p>
                                            <p><?php echo e($rating->comment); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="col-md-5">
                                    <div class="rating-wrap">
                                        <h3 class="head">Review Analysis</h3>
                                        <div class="wrap">
                                            <?php $__currentLoopData = $car->reviewAnalysis(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stars => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="star">
                                                    <span>
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <i class="ion-ios-star<?php echo e($i <= $stars ? '' : '-outline'); ?>"></i>
                                                        <?php endfor; ?>
                                                        (<?php echo e($data['percentage']); ?>%)
                                                    </span>
                                                    <span><?php echo e($data['count']); ?> Reviews</span>
                                                </p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sitemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/car/show.blade.php ENDPATH**/ ?>