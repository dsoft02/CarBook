<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="hero-wrap hero-wrap-2 js-fullheight"
         style="background-image: url('<?php echo e(asset('frontend/images/bg_3.jpg')); ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="<?php echo e(route('home')); ?>">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span>Choose Your Car <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Choose Your Car</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-box">
                    <h2 class="heading text-primary">Filter</h2>
                    <form action="<?php echo e(route('cars.index')); ?>" method="GET">
                        <div class="form-group">
                            <label for="car_name">Car Name</label>
                            <input type="text" name="car_name" id="car_name" class="form-control" value="<?php echo e(request('car_name')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="min_price">Min Price</label>
                            <input type="number" name="min_price" id="min_price" class="form-control" value="<?php echo e(request('min_price')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="max_price">Max Price</label>
                            <input type="number" name="max_price" id="max_price" class="form-control" value="<?php echo e(request('max_price')); ?>">
                        </div>
                        <div class="form-group">
                            <div class="accordion" id="accordionBrands">
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <a href="#collapseBrands" class="accordion-button d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapseBrands" aria-expanded="true" aria-controls="collapseBrands" style="flex-grow: 1; text-decoration: none;">
                                            Select Brand
                                            <span class="ms-auto" id="toggleArrow">
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </a>
                                    </h5>
                                    <div id="collapseBrands" class="accordion-collapse collapse show" aria-labelledby="headingBrands">
                                        <div class="accordion-body">
                                            <span class="select-Brand-box py-3">
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="form-check d-flex justify-content-between">
                                                    <div>
                                                        <input name="brands[]" class="form-check-input" type="checkbox" id="brand_<?php echo e($brand->id); ?>" value="<?php echo e($brand->id); ?>" <?php echo e(in_array($brand->id, request('brands', [])) ? 'checked' : ''); ?>>
                                                        <label class="form-check-label ml-2" for="brand_<?php echo e($brand->id); ?>">
                                                            <?php echo e($brand->name); ?>

                                                        </label>
                                                    </div>
                                                    <span class="text-muted ms-auto">(<?php echo e($brand->total_cars); ?>)</span>
                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-9 d-flex flex-wrap">
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-12 ftco-animate">
                        <div class="blog-entry car-card">
                            <?php
                                // Decode the JSON-encoded images
                                $images = json_decode($car->images, true);
                                // Get the first image or use the default if empty
                                $firstImage = !empty($images) ? asset('storage/' . $images[0]) : asset('frontend/images/car-1.jpg');
                            ?>

                            <a href="<?php echo e(route('cars.show', $car->id)); ?>" class="block-20" style="background-image: url('<?php echo e($firstImage); ?>');">
                            </a>

                            <div class="text p-4">
                                <h3 class="heading mb-0"><a href="<?php echo e(route('cars.show', $car->id)); ?>"><?php echo e($car->name); ?></a></h3>
                                <div class="d-flex mb-3">
                                    <span class="cat"><?php echo e($car->brand->name); ?></span>
                                    <p class="price ml-auto"><?php echo e($car->formated_price); ?> <span>/day</span></p>
                                </div>
                                <div class="brand-car-inner-item-main">
                                    <div class="brand-car-inner-item-two">
                                        <div class="brand-car-inner-item-thumb">
                                            <span><i class="fa fa-gas-pump"></i></span>
                                        </div>
                                        <span><?php echo e($car->fuel_type); ?></span>
                                    </div>
                                    <div class="brand-car-inner-item-two">
                                        <div class="brand-car-inner-item-thumb">
                                            <span><i class="fa fa-calendar-days"></i></span>
                                        </div>
                                        <span><?php echo e($car->model_year); ?> Model</span>
                                    </div>
                                    <div class="brand-car-inner-item-two">
                                        <div class="brand-car-inner-item-thumb">
                                            <span><i class="fa fa-car-side"></i></span>
                                        </div>
                                        <span><?php echo e($car->seatType->name); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12">
                    <div class="row mt-5">
                        <div class="col d-flex justify-content-center">
                            <?php echo e($cars->links('vendor.pagination.custom-pagination')); ?> <!-- Use the custom pagination view -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', () => {
            const arrow = button.querySelector('#toggleArrow i');
            const isExpanded = button.getAttribute('aria-expanded') === 'true';

            // Toggle the arrow icon classes based on the expanded state
            arrow.classList.toggle('fa-chevron-down', !isExpanded);
            arrow.classList.toggle('fa-chevron-right', isExpanded);
        });
    });

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sitemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/car/index.blade.php ENDPATH**/ ?>